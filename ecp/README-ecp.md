POR AKO:        https://shibboleth.atlassian.net/wiki/spaces/CONCEPT/pages/928645275/MetadataForIdP


https://github.com/iay/shibboleth-idp-docker

https://github.com/alejandro-perez/moonshot_ecp_test/blob/master/idp/shibboleth-idp/metadata/idp-metadata.xml
https://github.com/UniconLabs/dockerized-idp-testbed

https://github.com/unikent-ms1/simple-soap-ecp-test

The values for ENTITYID and ENDPOINT are the defaults.

CRED=user:pass \
ENTITYID=urn:federation:MicrosoftOnline \
ENDPOINT=https://login.microsoftonline.com/login.srf \
URL=https://idp.example.com/idp/profile/SAML2/SOAP/ECP \
bash test.sh | xmllint --pretty 1 -


/etc/hosts
127.0.0.1       ghsamlstack.localhost
127.0.0.1       home.ghsamlstack.localhost
127.0.0.1       ldap.ghsamlstack.localhost
127.0.0.1       sp.simplesamlphp.ghsamlstack.localhost
127.0.0.1       idp.simplesamlphp.ghsamlstack.localhost
127.0.0.1       sp.shibboleth.ghsamlstack.localhost
127.0.0.1       spidps.shibboleth.ghsamlstack.localhost
127.0.0.1       idp.shibboleth.ghsamlstack.localhost
127.0.0.1       cas.ghsamlstack.localhost


Esto testea el IDP, como si fueramos el SP, asi que solo llama al IDP

CRED=student1:password \
ENTITYID=https://sprovider.secaas-labs-poc-01.org/sp/shibboleth \
ENDPOINT=https://sp.shibboleth.ghsamlstack.localhost/Shibboleth.sso/SAML2/ECP \
URL=https://idp.shibboleth.ghsamlstack.localhost/idp/profile/SAML2/SOAP/ECP \
bash test.sh

Con SP

/shib-protected
curl -k -s -D cabeceras_sp.txt \
  -H "Accept: application/vnd.paos+xml" \
  -H 'PAOS: ver="urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp";"urn:oasis:names:tc:SAML:2.0:bindings:PAOS"' \
  https://sp.shibboleth.ghsamlstack.localhost/shib-protected/ > soap_desde_sp.xml

curl -k -i \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.shibboleth.ghsamlstack.localhost/shib-protected/index.php

¡Excelente! Si el IdP ya te devolvió el XML con la aserción firmada tras enviarle el sobre SOAP hecho a mano, el motor de identidad está listo.

Para involucrar al **SP de Shibboleth** en el proceso real de tres pasos (que es como funciona ECP de verdad), necesitas configurar tu script o terminal para que actúe como el "Proxy" (el cliente intermedio) que coordina el flujo.

Aquí tienes el proceso exacto paso a paso de cómo se integran ambos usando el flujo ECP real:

---

### El Flujo ECP de 3 Pasos con tu SP e IdP

#### Paso 1: El cliente pide acceso al SP indicando que soporta ECP

Hacemos la petición inicial a la ruta protegida de tu SP (`/secure`). Al enviarle las cabeceras `PAOS`, el SP de Shibboleth (gracias al `ecp="true"` que pusimos en el `shibboleth2.xml`) no te redirigirá a una web, sino que generará el XML SOAP que necesita el IdP.

```bash
curl -k -s -D cabeceras_sp.txt \
  -H "Accept: application/vnd.paos+xml" \
  -H 'PAOS: ver="urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp";"urn:oasis:names:tc:SAML:2.0:bindings:PAOS"' \
  https://sp.ghsamlstack.localhost/secure > soap_desde_sp.xml

```

* **¿Qué acabamos de hacer?** Guardamos las cabeceras HTTP de respuesta en `cabeceras_sp.txt` (las necesitaremos ahora) y el sobre SOAP generado por tu SP en `soap_desde_sp.xml`.

#### Paso 2: El cliente le envía ese XML exacto al IdP

Ahora tomamos el archivo `soap_desde_sp.xml` (que contiene el `<samlp:AuthnRequest>` firmado/creado por tu SP) y se lo enviamos al endpoint ECP de tu IdP de Shibboleth junto con tus credenciales de prueba:

```bash
curl -k -s \
  -H "Content-Type: application/vnd.paos+xml" \
  --basic -u "tu_usuario:tu_password" \
  -d @soap_desde_sp.xml \
  https://idp.ghsamlstack.localhost/idp/profile/SAML2/SOAP/ECP > soap_desde_idp.xml

```

* **¿Qué acaba de pasar?** El IdP procesó el requerimiento del SP, validó tu usuario/password contra el LDAP y te devolvió la aserción SAML envuelta en un sobre SOAP dentro del archivo `soap_desde_idp.xml`.

#### Paso 3: El cliente le entrega la respuesta del IdP al SP

Este es el paso crítico donde el SP se "involucra" para validar todo y darte acceso. Tienes que enviarle el archivo `soap_desde_idp.xml` al endpoint **ACS PAOS** de tu SP de Shibboleth.

Para que el SP sepa a qué petición original corresponde esta respuesta, debes incluir una cabecera de RelayState o contexto que venía en el Paso 1. El endpoint ACS por defecto para ECP en Shibboleth SP es `/Shibboleth.sso/SAML2/ECP`.

```bash
curl -k -i \
  -H "Content-Type: application/vnd.paos+xml" \
  -d @soap_desde_idp.xml \
  https://sp.ghsamlstack.localhost/Shibboleth.sso/SAML2/ECP

```

---

### ¿Cómo sabes si el SP validó el proceso correctamente?

Si el paso 3 fue un éxito, el SP de Shibboleth procesará el SOAP del IdP, verificará las firmas digitales de la aserción y te responderá con un **HTTP 200 OK** (o una redirección interna) acompañado de la cabecera de cookie de sesión de Shibboleth:

```text
HTTP/1.1 200 OK
Set-Cookie: _shibsession_64656661756c74...= _xxxxx; Path=/; Secure; HttpOnly

```

A partir de ese momento, tu script de `curl` ya está "logueado". Si guardas esa cookie (usando los parámetros `-c` y `-b` de `curl`), podrás consumir cualquier página o API protegida por ese SP de Shibboleth enviando la cookie en la cabecera, simulando perfectamente una sesión autenticada sin haber abierto jamás un navegador web.