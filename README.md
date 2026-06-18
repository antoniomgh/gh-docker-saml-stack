# GH SAML Stack

Stack completemo de SAML con docker compose, que incluye:

- Un IdP de Shibboleth
- Un SP de Shibboleth
- Un IdP de SimpleSAMLphp
- Un SP de SimpleSAMLphp
- Un servidor LDAP de OpenLDAP
- CAS como IdP adicional
- Un proxy inverso de Apache para enrutar el tráfico a los diferentes contenedores
- Certificados SSL basados en una CA Propia
- Una red de Docker personalizada para que los contenedores se comuniquen entre sí
- No requiere crear entradas en /etc/hosts

# Datos generales

## Dominios utilizados

* ghsamlstack.localhost
* home.ghsamlstack.localhost
* ldap.ghsamlstack.localhost
* sp.simplesamlphp.ghsamlstack.localhost
* idp.simplesamlphp.ghsamlstack.localhost
* sp.shibboleth.ghsamlstack.localhost
* spidps.shibboleth.ghsamlstack.localhost
* idp.shibboleth.ghsamlstack.localhost
* cas.ghsamlstack.localhost

## Acceso

__Main page:__  
https://ghsamlstack.localhost

__LDAP Web Admin:__
http://ldap.ghsamlstack.localhost:8081/

## Comandos

__Standard clean:__
```shell
./bin/dxstart.sh
./bin/dxstop.sh
./bin/dxstart.sh 1
./bin/dxstop.sh 1
./bin/dxstart.sh ldap
./bin/dxstop.sh ldap
```

__Full clean:__
```shell
./bin/dstart.sh
./bin/dstop.sh
./bin/dstart.sh 1
./bin/dstop.sh 1
./bin/dstart.sh ldap
./bin/dstop.sh ldap
```

## Docker, dive tool

Muy útil inspección de imagenes y capas de docker, ademas de comparar dos imagenes y ver que capas son iguales o diferentes.

https://github.com/wagoodman/dive

https://dev.to/klip_klop/dive-into-docker-part-4-inspecting-docker-image-568o

## Docker commands

https://gist.github.com/codewithleader/4fb24e08d623858e329c625932900947

Down:
docker compose -f docker-compose.r1.yml down -v

Up:
docker compose --progress plain -f docker-compose.r1.yml up --detach --build --force-recreate

Logs:
docker logs -f ldap

## LDAP

### Web Admin

__LDAP Web Admin:__
http://ldap.ghsamlstack.localhost:8081/

User: cn=admin,dc=ghsamlstack,dc=localhost
Pwd: password

### ladpsearch

#### Inside the container

Entramos al contenedor y ejecutamos los comandos de ldapsearch:

    docker exec -it ldap /bin/bash
    
    ldapsearch -x -b "ou=people,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(uid=student1)" "*"
    ldapsearch -x -b "ou=people,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(uid=student1)" "*" memberOf
    ldapsearch -x -b "ou=people,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(uid=student1)" "*" "+"
    
    ok: Query using admin all objects
    % ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "objectclass=*"
    
    ok: Query using admin a specific user
    % ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(uid=student1)"
    
    ok: Query using admin a organizational unit
    % ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(ou=people)"
    
    ok: Query using admin a specific user without attributes
    % ldapsearch -x -b "ou=People,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s one "(uid=student1)" 1.1
    
    --> 32 No such object
    % ldapsearch -x -b "ou=People,dc=ghsamlstack,dc=localhost" -D "uid=student1,ou=People,dc=ghsamlstack,dc=localhost" -w password
    
    ok: memberOf
    % ldapsearch -x -b "ou=People,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s one "(uid=student1)" memberOf

#### Outside the container (docker exec)

    ok: Query using admin all objects
    % docker exec ldap ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "objectclass=*"
    
    ok: Query using admin a specific user
    % docker exec ldap ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(uid=student1)"
    
    ok: Query using admin a organizational unit
    % docker exec ldap ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(ou=people)"
    
    ok: Query using admin a specific user without attributes
    % docker exec ldap ldapsearch -x -b "ou=People,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s one "(uid=student1)" 1.1
    
    docker exec ldap ldapsearch -x -H ldap://ldap:389 -b "ou=people,dc=ghsamlstack,dc=localhost" -s one "(uid=student1)" 1.1
    docker exec ldap ldapsearch -x -b "ou=people,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s one "(uid=student1)" 1.1

#### Outside the container

    ok: Query using admin all objects
    % ldapsearch -x -H ldap://ldap:389 -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "objectclass=*"
    
    ok: Query using admin a specific user
    % ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(uid=student1)"
    
    ok: Query using admin a organizational unit
    % ldapsearch -x -b dc=ghsamlstack -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s sub "(ou=people)"
    
    ok: Query using admin a specific user without attributes
    % ldapsearch -x -H ldap://ldap:389 -b "ou=People,dc=ghsamlstack,dc=localhost" -D "cn=admin,dc=ghsamlstack,dc=localhost" -w password -s one "(uid=student1)" 1.1

## Proyecto referencia

**dockerized-idp-testbed**

Used to validate the following Unicon docker images:

- shibboleth-idp: [https://hub.docker.com/r/unicon/shibboleth-idp](https://github.com/Unicon/shibboleth-idp-dockerized).
- shibboleth-sp: [https://hub.docker.com/r/unicon/shibboleth-sp](https://github.com/Unicon/shibboleth-sp-dockerized).
- simplesamlphp: [https://hub.docker.com/r/unicon/simplesamlphp](https://github.com/Unicon/simplesamlphp-dockerized).

# Items

## 1. El idp de shibboleth se monta sobre la carpeta /idp

**Sí, correcto.** La imagen clásica `unicon/shibboleth-idp` (y prácticamente cualquier despliegue estándar de Shibboleth IdP v3 o v4) despliega y sirve el Identity Provider utilizando la ruta base u operador de contexto **`/idp`**.

Esto significa que todos sus endpoints críticos de autenticación y federación colgarán obligatoriamente de ese path.

#### Escenario A: Si usas un subdominio dedicado (Recomendado)

Si tienes un subdominio como `auth.ghsamlstack.localhost` apuntando en exclusiva al contenedor de Unicon, tu proxy debe pasarle el path `/idp` de forma transparente:

```apache
<VirtualHost *:443>
    ServerName auth.ghsamlstack.localhost
    Include conf.d/ssl-proxy-comun.conf

    # Reenviamos manteniendo el path /idp intacto
    ProxyPass /idp http://contenedor_shib_idp:8080/idp
    ProxyPassReverse /idp http://contenedor_shib_idp:8080/idp
</VirtualHost>

```

#### Escenario B: Si quisieras "esconder" el path `/idp` (¡Cuidado!)

Si intentaras hacer que el subdominio fuera plano (`ProxyPass / http://contenedor_shib_idp:8080/idp/`), el IdP **se rompería**.

Shibboleth está compilado internamente (dentro de su archivo `.war` de Java/Tomcat) sabiendo que su contexto es `/idp`. Si el proxy le "roba" ese prefijo en la URL externa, los formularios de inicio de sesión de la imagen base fallarán al enviar los datos del usuario porque apuntarán a rutas absolutas que el proxy no sabrá procesar.

Por tanto, mantén siempre el `/idp` visible tanto en la URL del navegador como en el backend del proxy.
Explicar el problema que comenta GEMINI, es curioso

## 2. IDP en Shibboleth SP

Hacerlo por ApplicationId tiene un problema.

### 3. El gran problema del ACS compartido con `ApplicationOverride`

Aquí viene la trampa de por qué se "pierde" y no diferencia los IdPs: **Cada `ApplicationOverride` genera sus propios endpoints independientes.**

Si usas el ID `idAppNauthilusPreIdP`, el endpoint de retorno para este IdP específico ya **no debería ser** el general (`https://app1.testbed.local/Shibboleth.sso/SAML2/POST`). Shibboleth SP espera recibir el POST en una ruta modificada que incluye el ID de la aplicación en la URL de los metadatos.

#### Cómo comprobarlo:

Entra desde fuera a la URL de metadatos específica de tu override:
`https://app1.testbed.local/Shibboleth.sso/Metadata?resource=idAppNauthilusPreIdP`  

**ESTO NO TENGO CLARO QUE FUNCIONE PQ NO TENEMOS UNA DIRECCION PROPIA PARA EL SP**

Verás que el XML que genera el SP para este caso tendrá unos endpoints ACS indexados o con rutas relativas que le indican a Shibboleth internamente: *"Oye, este token que entra por aquí pertenece a la aplicación idAppNauthilusPreIdP"*.

> ⚠️ **Tu mina de oro:** Si en los metadatos que le diste al IdP de Nauthilus pusiste a mano el ACS a secas (`/SAML2/POST`), cuando el IdP responde, el SP procesa la petición con el contexto **`default`** (general), ignorando por completo el `ShibRequestSetting applicationId` que pusiste en Apache. **Debes importar en el IdP de Nauthilus los metadatos que genera el parámetro `?resource=idAppNauthilusPreIdP`.**

/Users/agomez/root/agomez/saml/gh-docker-saml-stack/gh-sp-shibboleth/etc-httpd/conf.d/sp.conf
```
ServerName ghsamlstack.localhost

<VirtualHost *:80>
    ServerName https://ghsamlstack.localhost:443
    UseCanonicalName On
    <Location /php-shib-protected/idp-default>
        AuthType shibboleth
        ShibRequestSetting requireSession 1
        ShibRequestSetting applicationId default
        Require valid-user
    </Location>
    <Location /php-shib-protected/idp-nauthilus-preidp>
        AuthType shibboleth
        ShibRequestSetting requireSession 1
        ShibRequestSetting applicationId idAppNauthilusPreIdP
        Require valid-user
    </Location>
</VirtualHost>
```

/Users/agomez/root/agomez/saml/gh-docker-saml-stack/gh-sp-shibboleth/etc-shibboleth/shibboleth2.xml
```
<SPConfig ...">

    <ApplicationDefaults id="default" entityID="https://sprovider.secaas-labs-poc-01.org/spidps/shibboleth"
                         REMOTE_USER="eppn uid persistent-id targeted-id">

        <Sessions lifetime="28800" timeout="3600" relayState="ss:mem" checkAddress="false" handlerSSL="true"
                  cookieProps="https" cookieName="gh-idp-local">
            <SSO entityID="https://secaas-labs-poc-01.org/idp/shibboleth">
                SAML2 SAML1
            </SSO>
        </Sessions>

        <MetadataProvider type="XML" validate="true" path="idp-default-metadata.xml"/>
        <ApplicationOverride id="idAppNauthilusPreIdP" REMOTE_USER="eppn uid persistent-id targeted-id">
            <Sessions lifetime="28800" timeout="3600" relayState="cookie" checkAddress="false" handlerSSL="true"
                      cookieProps="https"
                      cookieName="gh-nauthilus-preidp">
                <SSO entityID="https://preidp.work.global.platform.bbva.com/idp/metadata">
                    SAML2 SAML1
                </SSO>
                <Logout>SAML2 Local</Logout>
            </Sessions>
            <MetadataProvider type="XML" validate="true" path="idp-nauthilus-preidp-metadata.xml"/>
        </ApplicationOverride>
    </ApplicationDefaults>
</SPConfig>
```

## Pq funciona en SimpleSAMLPHP y no en Shibboleth?

**SimpleSAMLphp** es mucho más flexible y "relajado" en ese aspecto. Cuando inicia una petición, guarda en la sesión del navegador (o en su base de datos/memoria) un identificador único del tipo `_saml_auth_source...`. Cuando el IdP responde haciendo un POST al ACS común, SimpleSAMLphp abre la cookie de sesión del cliente, ve el hilo de dónde venía el usuario y reconstruye el contexto dinámicamente. Para él, la URL de destino da igual mientras la cookie esté viva.

**Shibboleth SP**, en cambio, es un motor nativo en C++ hiperestricto y con mentalidad de arquitectura multi-tenancy (para alojar cientos de aplicaciones virtuales independientes en un mismo servidor corporativo).

Shibboleth **no se fía de las cookies** para determinar a qué aplicación pertenece un token SAML entrante por dos razones:

1. **Seguridad:** Evita que una aplicación virtual maliciosa en el mismo servidor pueda interceptar o pisar las sesiones de otra manipulando cookies en el cliente.
2. **Autenticación iniciada por el IdP (IdP-Initiated SSO):** Shibboleth está preparado para recibir un login que tú no has pedido (el usuario va primero a su panel del IdP, pincha en tu aplicación y el IdP le lanza un POST directo a tu ACS). En ese escenario **no existe ninguna cookie previa** en el navegador. Si Shibboleth dependiera de la cookie para saber qué aplicación procesa el token, el flujo fallaría de inmediato.

---

### La solución definitiva para mantener el ACS común

Si por requisitos de tu infraestructura (o porque no puedes cambiar los metadatos en el IdP de Nauthilus) **te obligan a usar exactamente la URL común** `/Shibboleth.sso/SAML2/POST` sin parámetros ni rutas extrañas, tienes que cambiar de estrategia. No uses `ApplicationOverride` para separar los IdPs.

La forma correcta en Shibboleth de gestionar múltiples IdPs bajo un mismo ACS común sin que se pierda es tratarlos a todos dentro de la aplicación **`default`**, delegando el enrutamiento al inicio del flujo:

1. **Mantén todo en `default`:** Borra el `<ApplicationOverride>` y pon los metadatos de Nauthilus junto a los demás IdPs en el bloque general de `shibboleth2.xml`.
2. **Usa `relayState="cookie"` en `default`:** Al hacer esto, la cookie general se encargará de recordar a dónde enviar al usuario *después* de que el ACS común valide el token.
3. **Diferencia en el botón de login:** En tu pantalla o lógica de Apache, si el usuario quiere ir a Nauthilus, mándalo al login forzando su `entityID`:

```html
/Shibboleth.sso/Login?entityID=https://nauthilus-pre.idp.local/idp/shibboleth&target=/secure/nauthilus
```

De esta manera, el ACS común recibe el POST, busca el emisor (`Issuer`) en la lista global de metadatos del `default`, valida la firma con éxito y luego lee la cookie de relay para redirigir al usuario a la subcarpeta `/secure/nauthilus`. Al final consigues el mismo aislamiento en tu aplicación, pero jugando bajo las estrictas reglas de Shibboleth.

## 3. Certificados

Hemos creado una CA root y CA intermedia propias a traves del proyecto https://github.com/antoniomgh/gh-openssl-certificates

Posteriormente hemos creado un certificado que cubre a todos los dominios utilizados en este proyecto. Por último, hemos añadido nuestra CA, de modo que el navegador confíe en los certificados que hemos generado para nuestros
Dominios. Se encuentran en `resources/certificates/`.

Aceptar CA:

    sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain ca-chain.cert.pem
    sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain ca.cert.pem

![Texto alternativo](gh-ca-trust.png)


### Certificado IDP Shibboleth

La password del certificado viene definida en el `docker-compose.yml`, en la variable de entorno `JETTY_BROWSER_SSL_KEYSTORE_PASSWORD` del servicio `idp-shibboleth`. Por defecto el valor es `itsasecret`. En nuestro caso es `password`.

El certificado en sí en nuestro caso viene definido por el secret `idp_browser`, que especifica el archivo `./secrets/idp/idp-browser.p12`

```yaml
idp-shibboleth:
  container_name: idp-shibboleth
  platform: linux/amd64
  build: ./gh-idp-shibboleth-3.4/
  depends_on:
    ldap:
    condition: service_healthy
  environment:
    - JETTY_MAX_HEAP=128m
    - JETTY_BROWSER_SSL_KEYSTORE_PASSWORD=password
  secrets:
    - source: idp_backchannel
    - source: idp_browser
    - source: idp_sealer

secrets:
  idp_browser:
    file: ./secrets/idp/idp-browser.p12
```

**./gh-idp-shibboleth-3.4/shib-jetty-base/start.d/ssl.ini**
```
--module=ssl
jetty.ssl.port=4443
jetty.sslContext.keyStorePath=/run/secrets/idp_browser
jetty.sslContext.keyStoreType=PKCS12
```

Es un archivo **p12** que  podemos ver desde nuestro terminal, pero utilizando el flag `-legacy` ya que es muy antiguo: 

__Exportamos certificado y clave privada__

```shell
% openssl pkcs12 -legacy -in ./secrets/idp/idp-browser.p12 -passin pass:password -clcerts -nokeys -nomacver -out idp.cert.pem
% openssl pkcs12 -legacy -in ./secrets/idp/idp-browser.p12 -passin pass:password -nocerts -nodes -out idp.key.pem
% openssl x509 -noout -text -in idp.cert.pem
    Certificate:
        Data:
            Version: 3 (0x2)
            Serial Number:
                a7:2a:eb:d9:fc:47:90:fe
            Signature Algorithm: sha1WithRSAEncryption
            Issuer: CN=idp.ccc.local
            Validity
                Not Before: Nov 20 02:16:24 2015 GMT
                Not After : Apr  6 02:16:24 2044 GMT
            Subject: CN=idp.ccc.local
            Subject Public Key Info:
                Public Key Algorithm: rsaEncryption
                    Public-Key: (2048 bit)
                    Modulus:
                        00:be:...
                    Exponent: 65537 (0x10001)
            X509v3 extensions:
                X509v3 Subject Key Identifier: 
                    D6:02:2E:55:36:5D:1B:F0:06:A2:CF:3E:FB:03:14:07:39:AB:70:AA
                X509v3 Authority Key Identifier: 
                    keyid:D6:02:2E:55:36:5D:1B:F0:06:A2:CF:3E:FB:03:14:07:39:AB:70:AA
                    DirName:/CN=idp.ccc.local
                    serial:A7:2A:EB:D9:FC:47:90:FE
                X509v3 Basic Constraints: 
                    CA:TRUE
        Signature Algorithm: sha1WithRSAEncryption
        Signature Value:
            0a:45:...
% cat idp.key.pem 
    Bag Attributes
        friendlyName: myAlias
        localKeyID: BE 42 60 64 E2 5E 81 97 C7 64 3B 4D B1 8D 41 85 C7 86 FE 21 
    Key Attributes: <No Attributes>
    -----BEGIN PRIVATE KEY-----
    MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC+MgTlvRf9O3ss
    ...3lM/1fDFJ3AR5zr9JNc2Q38=
    -----END PRIVATE KEY-----
```

También lo podríamos ver desde el contenedor:

```shell
% docker exec -it idp-shibboleth /bin/bash
[root@9c0ce4b64614 /]# su -
[root@9c0ce4b64614 ~]# yum install -y openssl
[root@9c0ce4b64614 ~]# openssl pkcs12 -in /run/secrets/idp_browser
    Enter Import Password:
    MAC verified OK
    Bag Attributes
        localKeyID: 44 AD 3B 7F 28 1E 13 1E D9 F5 D4 89 4E 92 77 10 B2 A5 A4 BC 
    subject=/C=ES/ST=Madrid/L=Alcorcon/O=GH Development Ltd/OU=IT/CN=ghsamlstack.localhost/emailAddress=antoniomgh@gmail.com
    issuer=/C=ES/ST=Madrid/O=GH Development Ltd/OU=IT/CN=GH Development Intermediate CA/emailAddress=antoniomgh@gmail.com
    -----BEGIN CERTIFICATE-----
    MIIGajCCBVKgAwIBAgICEAAwDQYJKoZIhvcNAQELBQAwgZYxCzAJBgNVBAYTAkVT
    xqa6CFdhr3zW9Ngb310WyeKI7yBbPCuaKFxpi17Y4pVnABwTi6AiIXvlmqQsteyj
    SzmUUD//vxeSlyGXAu0=
    -----END CERTIFICATE-----
    Bag Attributes
        localKeyID: 44 AD 3B 7F 28 1E 13 1E D9 F5 D4 89 4E 92 77 10 B2 A5 A4 BC 
[root@9c0ce4b64614 ~]#
```
Lo volvemos a pasar a p12, que no se nos olvide el flag legacy:

```bash
openssl pkcs12 -legacy -export \
  -inkey idp.key.pem \
  -in idp.cert.pem \
  -out idp-browser.p12 \
  -passout pass:password
```

Del mismo modo, si lo trasladamos a nuestro certificado generico...

```bash
openssl pkcs12 -legacy -export \
  -in ./resources/certificates/ghsamlstack.localhost.cert.pem \
  -inkey ./resources/certificates/ghsamlstack.localhost.key.pem \
  -out ./secrets/idp/idp-browser.p12 \
  -passout pass:password
```

Aki, verificar se está siendo servido nuestro cert y lo podemos validar. Desde el browser no ser puede pq enseña el del proxy.

#### Comprobación certificado

% docker exec -it idp-shibboleth /bin/bash
[root@b74d8a247c79 /]# curl -kv https://idp.shibboleth.ghsamlstack.localhost:4443/
* About to connect() to idp.shibboleth.ghsamlstack.localhost port 4443 (#0)
*   Trying 172.18.0.9...
* Connected to idp.shibboleth.ghsamlstack.localhost (172.18.0.9) port 4443 (#0)
* Initializing NSS with certpath: sql:/etc/pki/nssdb
* skipping SSL peer certificate verification
* SSL connection using TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA
* Server certificate:
* 	subject: CN=idp.ccc.local
* 	start date: Nov 20 02:16:24 2015 GMT
* 	expire date: Apr 06 02:16:24 2044 GMT
* 	common name: idp.ccc.local
* 	issuer: CN=idp.ccc.local


================================
