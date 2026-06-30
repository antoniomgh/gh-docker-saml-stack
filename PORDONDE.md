No hemos sido capaces de hacer funcionar ECP, así que de momento nos centramos en otras cosas.

Las pruebas están en la rama feature/ecp

Lo primero es dar con una app que sea capaz de testearlo, más allá del curl:

## 1
Example script for testing OpenStack Keystone SAML 2.0 ECP authentication with Python libraries
https://gist.github.com/01000101/f73b7eb8a1a25c9a50c0dd9a411d5b06

## 2
saml_ecp_demo is a Python3 implementation of ECP designed both to educate implementors about ECP and perform a complete ECP authentication flow with the ability to dump all protocol interactions for the purpose of education and/or diagnosing ECP transactions.
https://github.com/jdennis/saml_ecp_demo/blob/master/saml_ecp_demo/saml_ecp_demo.py

## 3
This is a demo, based on dockerized-idp-testbed, demonstrating how to configure a Moonshot IDP (FreeRADIUS) to use SAML ECP to authenticate users and get a SAML Assertion.
https://github.com/alejandro-perez/moonshot_ecp_test/tree/master

## Logros

solo hemos logrado probar el idp, sin pasar por el SP:

Esto testea el IDP, como si fueramos el SP, asi que solo llama al IDP

CRED=student1:password \
ENTITYID=https://sprovider.secaas-labs-poc-01.org/sp/shibboleth \
ENDPOINT=https://sp.shibboleth.ghsamlstack.localhost/Shibboleth.sso/SAML2/ECP \
URL=https://idp.shibboleth.ghsamlstack.localhost/idp/profile/SAML2/SOAP/ECP \
bash ./ecp/test/test_idp.sh


# Ponde:
utilizar opcion 1 trasladada a nuestra conf, menos el ecp_test, que no es posible y que utilizaremos desde nuestro script

# 1-  Esta opción no es posible recuperarla, así que solo sirve de referencia



This is a demo, based on dockerized-idp-testbed, demonstrating how to configure a Moonshot IDP (FreeRADIUS) to use SAML ECP to authenticate users and get a SAML Assertion.
https://github.com/alejandro-perez/moonshot_ecp_test/tree/master


% docker pull toska/shibboleth-sp
% docker images
REPOSITORY                                TAG       IMAGE ID       CREATED       SIZE
toska/shibboleth-sp                       latest    7fd2764386dd   6 years ago   436MB
% docker run -it 7fd2764386dd /bin/bash
# cat /etc/os-release 
NAME="CentOS Linux"
VERSION="7 (Core)"
PRETTY_NAME="CentOS Linux 7 (Core)"
% dive 7fd2764386dd  

Aunque esto no lo podemos levantar nos sirve de test:
/Users/agomez/root/agomez/saml/moonshot_ecp_test



Aki, montar un SP con ECP
 python3 saml_ecp_demo.py -s 'https://sp.shibboleth.ghsamlstack.localhost/shib-protected/dummy.php' -i 'https://secaas-labs-poc-01.org/idp/shibboleth' -u student1 -p password --show-traceback
https://github.com/sugwg/apache-shibd/blob/master/Dockerfile
https://github.com/unikent-ms1/simple-soap-ecp-test/blob/master/template.xml
https://gist.github.com/arnobroekhof/3c2e5bb9b9943b1f1364583f1d6c75fc

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



CRED=user:pass \
ENTITYID=https://sprovider.secaas-labs-poc-01.org/sp/shibboleth \
ENDPOINT=https://login.microsoftonline.com/login.srf \
URL=https://idp.example.com/idp/profile/SAML2/SOAP/ECP \
bash test.sh


curl -k -i \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
http://localhost:80/shib-protected


Bueno? --->
curl -k -i \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.shibboleth.ghsamlstack.localhost/shib-protected/index.php

curl -k -i --http1.1 \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.shibboleth.ghsamlstack.localhost/shib-protected/index.php

curl -k -i \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  http://localhost:80/shib-protected/shib-protected/index.php


docker exec -it sp-shibboleth curl -i --http1.1 \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  http://localhost/shib-protected/index.php

docker exec -it sp-shibboleth curl -i  \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  http://localhost/shib-protected/index.php

Metadata
curl -k -i https://sp.shibboleth.ghsamlstack.localhost/Shibboleth.sso/Metadata


docker exec -it sp-shibboleth curl -i -H "Host: sp.shibboleth.ghsamlstack.localhost" http://localhost/Shibboleth.sso/Metadata

docker exec -it sp-shibboleth httpd -k restart
docker exec -it sp-shibboleth ls /etc/httpd/conf.d
docker exec -it sp-shibboleth cat /etc/httpd/conf.d/shib.conf
docker exec -it sp-shibboleth shibd -t
docker exec -it sp-shibboleth rm -f /var/run/shibboleth/shibd.sock
docker exec -it sp-shibboleth /usr/sbin/shibd -u shibd -g shibd -c /etc/shibboleth/shibboleth2.xml
curl -k -s --http1.1 \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.shibboleth.ghsamlstack.localhost/shib-protected/dummy.php


docker exec -it sp-shibboleth curl -k -i --http1.1 \
  -H "Host: sp.shibboleth.ghsamlstack.localhost" \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  http://localhost:80/shib-protected/index.php

docker exec -it sp-shibboleth curl -k -i --http1.1 \
  -H "Host: sp.shibboleth.ghsamlstack.localhost" \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  http://sp.shibboleth.ghsamlstack.localhost/shib-protected/dummy.php


docker exec -it sp-shibboleth curl -k -i --http1.1 \
  -H "Host: sp.shibboleth.ghsamlstack.localhost" \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  http://localhost/shib-protected/dummy.php

# SOAP ECP

Para montar un entorno de pruebas SAML con soporte para **SOAP ECP (Enhanced Client or Proxy)**, necesitas un flujo donde el cliente (un script, una app móvil o `curl`) actúe como "Proxy" enviando credenciales vía SOAP directamente, saltándose el típico inicio de sesión por navegador web.

Configurar esto desde cero es doloroso porque requiere modificar perfiles internos de SAML. La forma más rápida y limpia de hacerlo hoy en día es utilizando **Shibboleth IdP v4/v5** (que tiene ECP nativo y maduro) o un stack preconfigurado.

Aquí tienes la guía paso a paso para levantar un stack de test usando **Docker**.

---

## 1. El archivo `docker-compose.yml`

Usaremos una imagen de Shibboleth IdP preconfigurada para desarrollo y un contenedor OpenLDAP como fuente de usuarios, ya que ECP requiere autenticación básica (HTTP Basic Auth) transmitida por SOAP.

Crea un directorio llamado `saml-ecp-test` y guarda este archivo como `docker-compose.yml`:

```yaml
version: '3.8'

services:
  # Servidor de Identidad (IdP) con soporte ECP
  idp:
    image: unicon/shibboleth-idp:4.1.4 # Versión estable y muy usada para tests rápidos
    ports:
      - "8080:8080"
      - "8443:8443"
    environment:
      - IDP_HOST=idp.example.org
      - LDAP_URL=ldap://ldap:389
    volumes:
      - ./idp-config:/ext-idp
    depends_on:
      - ldap

  # Directorio LDAP para validar usuarios de prueba
  ldap:
    image: osixia/openldap:1.5.0
    ports:
      - "389:389"
    environment:
      - LDAP_ORGANISATION=Example Org
      - LDAP_DOMAIN=example.org
      - LDAP_ADMIN_PASSWORD=admin

```

---

## 2. Habilitar ECP en el IdP

Shibboleth IdP tiene el perfil ECP desactivado por defecto en algunas configuraciones o requiere mapearlo.

1. Levanta los contenedores una vez para que generen la estructura (o descarga los archivos de configuración).
2. En la carpeta de configuración de tu IdP (`idp-config/credentials/`), asegúrate de que el IdP tenga endpoints HTTPS activos en el puerto `8443`.
3. En el archivo `conf/relying-party.xml` del IdP, asegúrate de que el perfil ECP esté activo para tus Service Providers (SPs):

```xml
<bean parent="RelyingPartyByName" c:relyingPartyIds="https://sp.example.org/shibboleth">
    <property name="profileConfigurations">
        <list>
            <bean parent="SAML2.SSO" p:encryptAssertions="false" />
            <bean parent="SAML2.ECP" p:encryptAssertions="false" /> 
        </list>
    </property>
</bean>

```

---

## 3. ¿Cómo se testea el Login SOAP ECP? (El cliente)

A diferencia de SAML web normal, aquí no usas Chrome. El cliente ECP debe enviar una petición HTTP al **Service Provider**, este le responderá con una solicitud SAML envuelta en un sobre SOAP, el cliente la reenvía al **IdP** con las credenciales, y el IdP devuelve la aserción por SOAP.

Puedes simular el cliente ECP con este script de `curl` en tu terminal:

### Paso 1: El cliente avisa al SP que soporta ECP

Hacemos una petición al SP (por ejemplo, tu SimpleSAMLphp o Shibboleth SP) enviando las cabeceras que indican que somos un cliente ECP:

```bash
curl -k -u "usuario_test:password_test" \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.example.org/secure-page > respuesta_sp.xml

```


El SP te devolverá un sobre **SOAP** que contiene el `<samlp:AuthnRequest>`.

### Paso 2: El cliente reenvía ese SOAP al IdP

El cliente toma ese XML (`respuesta_sp.xml`) y se lo envía al endpoint ECP del IdP (usualmente `/idp/profile/SAML2/SOAP/ECP`) autenticándose mediante HTTP Basic Auth:

```bash
curl -k -u "usuario_ldap:password_ldap" \
  -H "Content-Type: application/vnd.paos+xml" \
  -d @respuesta_sp.xml \
  https://idp.example.org:8443/idp/profile/SAML2/SOAP/ECP > respuesta_idp.xml

```

Si las credenciales son correctas, el IdP responderá con otro sobre SOAP que contiene la **Aserción SAML firmada** (`<saml:Assertion>`).

### Paso 3: El cliente entrega la aserción al SP

Finalmente, el cliente le "inyecta" la respuesta del IdP al endpoint del SP (Assertion Consumer Service - ACS):

```bash
curl -k -H "Content-Type: application/vnd.paos+xml" \
  -d @respuesta_idp.xml \
  https://sp.example.org/Shibboleth.sso/SAML2/POST

```

El SP validará el SOAP y te devolverá una cookie de sesión (ej. `_shibsession_` o `SimpleSAMLAuthToken`), permitiéndote consumir la API o servicio protegido sin haber tocado un navegador web.

---

### Si prefieres usar SimpleSAMLphp como SP en este Stack:

Si integras el contenedor de SimpleSAMLphp que estabas usando antes en este docker-compose, recuerda que para que actúe como SP ECP, en su archivo `metadata/saml20-idp-remote.php` debes añadir el endpoint SOAP del IdP:

```php
$metadata['https://idp.example.org/idp/shibboleth'] = [
    'SingleSignOnService' => [
        ['Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect', 'Location' => 'https://idp.example.org:8080/idp/profile/SAML2/Redirect/SSO'],
        # Endpoint para SOAP ECP:
        ['Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP', 'Location' => 'https://idp.example.org:8443/idp/profile/SAML2/SOAP/ECP'],
    ],
    // ... tus llaves y certificados
];

```


## GH

curl -k -u "usuario_test:password_test" \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.shibboleth.ghsamlstack.localhost/php-shib-protected/


curl -kv https://sp.shibboleth.ghsamlstack.localhost/php-shib-protected/

Para habilitar **ECP (Enhanced Client or Proxy)** en **Shibboleth SP 3.x (incluyendo la versión 3.5)**, la buena noticia es que el software ya viene con el soporte nativo prácticamente listo. No necesitas instalar módulos adicionales, solo debes configurar el manejador de sesiones (`SessionInitiator`) y asegurar los endpoints correctos en tu archivo `shibboleth2.xml`.

Aquí tienes los pasos exactos para activarlo:

---

### Paso 1: Configurar el inicio de sesión para soportar ECP

Abre tu archivo `/etc/shibboleth/shibboleth2.xml` y busca el bloque `<Sessions>`. Debes asegurarte de que la directiva `SAML2` tenga activo el soporte para ECP.

Modifica o añade el elemento `<SSO>` para que incluya el protocolo ECP:

```xml
<Sessions lifetime="28800" timeout="3600" relayState="ss:mem"
          checkAddress="false" handlerSSL="true" cookieProps="https">

    <SSO entityID="https://tu-idp.example.org/idp/shibboleth"
         discoveryProtocol="SAMLDS" 
         discoveryURL="https://ds.example.org/DS"
         ecp="true"> SAML2
    </SSO>

    ...
</Sessions>

```

> 💡 **Nota de seguridad:** Asegúrate de que `handlerSSL="true"` y `cookieProps="https"` estén así configurados. ECP transmite credenciales y tokens mediante SOAP/PAOS, por lo que **obligatoriamente** debe viajar sobre HTTPS.
---

### Paso 2: Verificar los Endpoints PAOS (Opcional pero recomendado)

Por defecto, Shibboleth SP genera automáticamente los endpoints necesarios para ECP en sus metadatos usando el binding **PAOS** (Reverse SOAP).

Si estás definiendo tus endpoints de forma manual en el archivo XML de metadatos que le entregas al IdP, asegúrate de que incluya la siguiente línea dentro del bloque `<md:SPSSODescriptor>`:

```xml
<md:AssertionConsumerService 
    Binding="urn:oasis:names:tc:SAML:2.0:bindings:PAOS" 
    Location="https://tu-sp.example.com/Shibboleth.sso/SAML2/ECP" 
    index="4"/> ```
*(Si dejas que Shibboleth autogenere sus metadatos visitando `https://tu-sp.com/Shibboleth.sso/Metadata`, verás que esta línea ya aparece sola).*

---

### Paso 3: Configurar el IdP Remoto (Muy Importante)
Para que el flujo ECP funcione, tu SP necesita saber a dónde enviar al cliente si este solicita ECP. En el metatado del **Identity Provider (IdP)** que tu SP está consumiendo (el archivo XML del IdP que guardas localmente en el SP), el IdP **debe** declarar su endpoint de SOAP.

Busca en el XML del IdP que tenga esto:
```xml
<md:SingleSignOnService 
    Binding="urn:oasis:names:tc:SAML:2.0:bindings:SOAP" 
    Location="https://tu-idp.example.org:8443/idp/profile/SAML2/SOAP/ECP"/>

```

Si el IdP no declara ese binding de SOAP, tu SP ignorará las peticiones ECP de los clientes porque no sabrá a qué URL del IdP derivar la autenticación.

---

### Paso 4: Reiniciar el servicio

Una vez guardados los cambios en el `shibboleth2.xml`, reinicia el demonio de Shibboleth para aplicar la configuración:

```bash
sudo systemctl restart shibd

```

---

### ¿Cómo probar que tu Shibboleth SP 3.5 ya acepta ECP?

Puedes hacer un test rápido usando `curl` emulando ser un cliente ECP (como un script de Python o una app de consola). Lanza una petición simulando las cabeceras PAOS obligatorias hacia una ruta protegida de tu SP:

```bash
curl -i -k \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://tu-sp.example.com/ruta-protegida/

```

**Resultado esperado:**
Si el SP está bien configurado, en lugar de redirigirte mediante un código HTTP 302 a una página web de LogIn, te devolverá un **HTTP 200 OK** acompañado de un chorro de XML con un sobre **SOAP** (`<soap11:Envelope>`). Dentro verás el bloque `<samlp:AuthnRequest>` listo para ser enviado al IdP.

curl -i -kv \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://sp.shibboleth.ghsamlstack.localhost/php-shib-protected/

curl -i -kv https://sp.shibboleth.ghsamlstack.localhost/php-shib-protected/
curl -i -kv https://sp.shibboleth.ghsamlstack.localhost/php-shib-protected/
https://sp.shibboleth.ghsamlstack.localhost/Shibboleth.sso/Login?entityID=https://secaas-labs-poc-01.org/idp/shibboleth&target=/php-shib-protected/idp-default/


--- simplesamlphp --

curl -i -k \
  -H "Accept: application/vnd.paos+xml" \
  -H "PAOS: ver=\"urn:oasis:names:tc:SAML:2.0:profiles:SSO:ecp\";\"urn:oasis:names:tc:SAML:2.0:bindings:PAOS\"" \
  https://tu-sp.example.com/ruta-protegida/