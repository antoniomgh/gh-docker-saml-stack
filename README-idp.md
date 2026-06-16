Por aki, meterle un certificado nuestro....

# openssl version
OpenSSL 1.0.2k-fips  26 Jan 2017
[root@187a9160b4dd /]# 


Aki, probar desde dentro de imagen de idp...
# ls -l /run/secrets/idp_browser
-rw-r--r-- 1 root root 2470 Jun  8 18:34 /run/secrets/idp_browser
[root@187a9160b4dd /]# openssl
-bash: openssl: command not found
[root@187a9160b4dd /]# keytool
-bash: keytool: command not found
[root@187a9160b4dd /]# cat /etc/os-release 
NAME="CentOS Linux"
VERSION="7 (Core)"
ID="centos"
ID_LIKE="rhel fedora"
VERSION_ID="7"
PRETTY_NAME="CentOS Linux 7 (Core)"
ANSI_COLOR="0;31"
CPE_NAME="cpe:/o:centos:centos:7"
HOME_URL="https://www.centos.org/"
BUG_REPORT_URL="https://bugs.centos.org/"

CENTOS_MANTISBT_PROJECT="CentOS-7"
CENTOS_MANTISBT_PROJECT_VERSION="7"
REDHAT_SUPPORT_PRODUCT="centos"
REDHAT_SUPPORT_PRODUCT_VERSION="7"

[root@187a9160b4dd /]# 

CLAVE:
yum install -y openssl
openssl pkcs12 -in /run/secrets/idp_browser
[root@187a9160b4dd /]# openssl pkcs12 -in /run/secrets/idp_browser
Enter Import Password:
MAC verified OK
Bag Attributes
    friendlyName: myAlias
    localKeyID: BE 42 60 64 E2 5E 81 97 C7 64 3B 4D B1 8D 41 85 C7 86 FE 21 
subject=/CN=idp.ccc.local
issuer=/CN=idp.ccc.local
-----BEGIN CERTIFICATE-----
MIIDLDCCAhSgAwIBAgIJAKcq69n8R5D+MA0GCSqGSIb3DQEBBQUAMBgxFjAUBgNV
BAMTDWlkcC5jY2MubG9jYWwwHhcNMTUxMTIwMDIxNjI0WhcNNDQwNDA2MDIxNjI0
WjAYMRYwFAYDVQQDEw1pZHAuY2NjLmxvY2FsMIIBIjANBgkqhkiG9w0BAQEFAAOC
AQ8AMIIBCgKCAQEAvjIE5b0X/Tt7LG0nrsNxsRpviJzvH6g3/hvLSeZvSqHJZ1qp
kpRGiH5IVz0XSC5WZa3qYNDJLcQGHECC54sF8IJYDvC2juJRASPV0PPql1s//MCn
vqvL2izO0wMAhjsO/KLzRgg61pQrUO2TkzYKteXQ2RYTof7wLoM+roH5890Oqm0m
fLSLBqmCO5NVTGiqlBNoh3cKw9OmZv8VrDlqQSdh/CEYoeTEeRudMEgcYIRE37kI
wDrkFUqPtLKe4c33WduFUX0Whwixhmazgrq3Jbyt3LuI6qyovqlqEq0FUmCmBjFM
RmFVO7/Qr9GLvRFPMznDGFRkgh0E3Ote7ffonQIDAQABo3kwdzAdBgNVHQ4EFgQU
1gIuVTZdG/AGos8++wMUBzmrcKowSAYDVR0jBEEwP4AU1gIuVTZdG/AGos8++wMU
BzmrcKqhHKQaMBgxFjAUBgNVBAMTDWlkcC5jY2MubG9jYWyCCQCnKuvZ/EeQ/jAM
BgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4IBAQAKRUKXHPwBUG/Ve0ULdgbp
mH7ksCjLDVjaOf50BcemL9HA9JhksMDUpKLJrgPFmcIKsNjSQY8by+TVBV76YT9P
ZlUMKeRjL5yxGFbkItgcX4eH6fShWjzLksyiYtGtr8UaLOtpjgVN6Hn0RHFhb6Ob
iWx0M14ZNhGb0tlj7+tURbpPJ52iTrjV8gJHvo6RfqfVdyoBMN2qVm6DROyhAd03
gOhJkfLXxBafqiLTirbxMdEhWHIdV7jzrOSmhADyL3NaW79LBPSaKixef/I7eCo8
7vawjZs0YP5qGifhos34g2GKW81m6sjoxpstLMK7pNQRy/pR/kv/jiXEn8xHRE6s
-----END CERTIFICATE-----
Bag Attributes
    friendlyName: myAlias
    localKeyID: BE 42 60 64 E2 5E 81 97 C7 64 3B 4D B1 8D 41 85 C7 86 FE 21 
Key Attributes: <No Attributes>



%  openssl x509 -noout -text -in idp01.pem
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
                    00:be:32:04:e5:bd:17:fd:3b:7b:2c:6d:27:ae:c3:
                    71:b1:1a:6f:88:9c:ef:1f:a8:37:fe:1b:cb:49:e6:
                    6f:4a:a1:c9:67:5a:a9:92:94:46:88:7e:48:57:3d:
                    17:48:2e:56:65:ad:ea:60:d0:c9:2d:c4:06:1c:40:
                    82:e7:8b:05:f0:82:58:0e:f0:b6:8e:e2:51:01:23:
                    d5:d0:f3:ea:97:5b:3f:fc:c0:a7:be:ab:cb:da:2c:
                    ce:d3:03:00:86:3b:0e:fc:a2:f3:46:08:3a:d6:94:
                    2b:50:ed:93:93:36:0a:b5:e5:d0:d9:16:13:a1:fe:
                    f0:2e:83:3e:ae:81:f9:f3:dd:0e:aa:6d:26:7c:b4:
                    8b:06:a9:82:3b:93:55:4c:68:aa:94:13:68:87:77:
                    0a:c3:d3:a6:66:ff:15:ac:39:6a:41:27:61:fc:21:
                    18:a1:e4:c4:79:1b:9d:30:48:1c:60:84:44:df:b9:
                    08:c0:3a:e4:15:4a:8f:b4:b2:9e:e1:cd:f7:59:db:
                    85:51:7d:16:87:08:b1:86:66:b3:82:ba:b7:25:bc:
                    ad:dc:bb:88:ea:ac:a8:be:a9:6a:12:ad:05:52:60:
                    a6:06:31:4c:46:61:55:3b:bf:d0:af:d1:8b:bd:11:
                    4f:33:39:c3:18:54:64:82:1d:04:dc:eb:5e:ed:f7:
                    e8:9d
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
        0a:45:42:97:1c:fc:01:50:6f:d5:7b:45:0b:76:06:e9:98:7e:
        e4:b0:28:cb:0d:58:da:39:fe:74:05:c7:a6:2f:d1:c0:f4:98:
        64:b0:c0:d4:a4:a2:c9:ae:03:c5:99:c2:0a:b0:d8:d2:41:8f:
        1b:cb:e4:d5:05:5e:fa:61:3f:4f:66:55:0c:29:e4:63:2f:9c:
        b1:18:56:e4:22:d8:1c:5f:87:87:e9:f4:a1:5a:3c:cb:92:cc:
        a2:62:d1:ad:af:c5:1a:2c:eb:69:8e:05:4d:e8:79:f4:44:71:
        61:6f:a3:9b:89:6c:74:33:5e:19:36:11:9b:d2:d9:63:ef:eb:
        54:45:ba:4f:27:9d:a2:4e:b8:d5:f2:02:47:be:8e:91:7e:a7:
        d5:77:2a:01:30:dd:aa:56:6e:83:44:ec:a1:01:dd:37:80:e8:
        49:91:f2:d7:c4:16:9f:aa:22:d3:8a:b6:f1:31:d1:21:58:72:
        1d:57:b8:f3:ac:e4:a6:84:00:f2:2f:73:5a:5b:bf:4b:04:f4:
        9a:2a:2c:5e:7f:f2:3b:78:2a:3c:ee:f6:b0:8d:9b:34:60:fe:
        6a:1a:27:e1:a2:cd:f8:83:61:8a:5b:cd:66:ea:c8:e8:c6:9b:
        2d:2c:c2:bb:a4:d4:11:cb:fa:51:fe:4b:ff:8e:25:c4:9f:cc:
        47:44:4e:ac
tmp [main●●●] % 


Certificado Idp:
https://github.com/Unicon/shibboleth-idp-dockerized/blob/master/opt/shib-jetty-base/etc/jetty-ssl-context.xml
https://github.com/Unicon/shibboleth-idp-dockerized/issues/23
https://github.com/iay/shibboleth-idp-docker/blob/main/switch-certificates
/Users/agomez/root/agomez/saml/gh-docker-saml-stack/secrets/idp/idp-browser.p12
openssl pkcs12 -in secrets/idp/idp-browser.p12 -nokeys
      - JETTY_BROWSER_SSL_KEYSTORE_PASSWORD=password
openssl pkcs12 -in  secrets/idp/idp-browser.p12
Enter Import Password:
Error outputting keys and certificates
00FAD74DF87F0000:error:0308010C:digital envelope routines:inner_evp_generic_fetch:unsupported:crypto/evp/evp_fetch.c:376:Global default library context, Algorithm (RC2-40-CBC : 0), Properties ()


openssl pkcs12 -in ./secrets/idp/idp-browser.p12 -passin pass:password \
   -clcerts -nokeys -nomacver -out $CERT_CUR

## Idp shibboleth
En la imagen de Docker de **`unicon/shibboleth-idp`**, cambiar el certificado depende de qué quieras proteger exactamente. Como esta imagen no usa Apache internamente, sino que levanta un servidor **Jetty Java**, los certificados se gestionan de forma diferente a lo habitual.

Tienes dos tipos de certificados en esta imagen, y aquí tienes el procedimiento exacto para cambiar cualquiera de ellos:

---

### CASO 1: Cambiar el Certificado Web/Browser (TLS de Jetty)

Este es el certificado que presenta el contenedor cuando un cliente conecta por HTTPS en el canal trasero (como cuando `phpCAS` o tu proxy intentan hablar con él). Su ausencia o desconfianza genera los errores de handshake.

Jetty no lee archivos `.crt` o `.key` sueltos; requiere obligatoriamente un almacén en formato **PKCS12** llamado **`idp-browser.p12`**.

#### Paso 1: Generar el archivo `.p12` en tu Mac

Coge la clave privada y el certificado de servidor que ya tengas firmados por tu CA propia y empaquétalos ejecutando esto en tu terminal:

```bash
openssl pkcs12 -export \
  -inkey mi-servidor.key.pem \
  -in mi-servidor.cert.pem \
  -out idp-browser.p12 \
  -name logback \
  -passout pass:itsasecret

```

> ⚠️ **Regla estricta de Unicon:** El alias interno del certificado debe llamarse obligatoriamente **`logback`** y la contraseña por defecto de la imagen es **`itsasecret`**.

#### Paso 2: Montarlo en tu `docker-compose.yml`

Sustituye el archivo de fábrica mapeando el tuyo mediante un volumen directo a la carpeta de credenciales de Shibboleth, y pasa la contraseña como variable de entorno:

```yaml
services:
  shibboleth-idp:
    image: unicon/shibboleth-idp:3.4.6
    container_name: shibboleth-idp-container
    environment:
      # Asegura que Jetty use la contraseña del almacén
      - JETTY_BROWSER_SSL_KEYSTORE_PASSWORD=itsasecret
    volumes:
      # 🛠️ Inyectamos el .p12 sobre el archivo nativo del contenedor
      - ./idp-browser.p12:/opt/shibboleth-idp/credentials/idp-browser.p12:ro

```

---





# Official

## Yaml

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
  -out idp-browser.p12 \
  -passout pass:password
```

Aki, verificar se está siendo servido nuestro cert y lo podemos validar. Desde el browser no ser puede pq enseña el del proxy.

## Comprobación certificado

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