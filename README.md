
# Creando certificado para IDP

idptest.cnf 
[req]
default_bits=2048
prompt=no
default_md=sha256
x509_extensions=v3_req
distinguished_name=dn

[dn]
CN=gh-idptestbed

[v3_req]
subjectAltName=@alt_names

[alt_names]
DNS.0=gh-idptestbed
URI.0=https://secaas-labs-poc-01.org/idp/shibboleth
DNS.1=*.gh-idptestbed.com
URI.1=email2@gh-idptestbed.com


% openssl req -new -x509 -newkey rsa:2048 -sha256 -nodes -keyout idp-encryption-key.pem -days 3560 -out idp-encryption-cert.pem -config idptest.cnf
% openssl x509 -noout -text -in idp-encryption-cert.pem

igual para signing

% openssl req -new -x509 -newkey rsa:2048 -sha256 -nodes -keyout idp-signing-key.pem -days 3560 -out idp-signing-cert.pem -config idptest.cnf
% openssl x509 -noout -text -in idp-signing-cert.pem

----

openssl x509 -noout -text -in idp.pem
Version: 3 (0x2)
        Serial Number:
            1b:a3:67:d6:b9:44:45:2d:6f:b2:2f:3c:b5:c7:73:49:85:f4:a2:a0
        Signature Algorithm: sha256WithRSAEncryption
        Issuer: CN=idptestbed
        Validity
            Not Before: Dec 11 02:20:14 2015 GMT
            Not After : Dec 11 02:20:14 2035 GMT
        Subject: CN=idptestbed
        Subject Public Key Info:
            Public Key Algorithm: rsaEncryption
                Public-Key: (2048 bit)
                Modulus:
                    00:81:5e:fd:28:dd:f9:93:f2:29:6e:c8:b8:c9:e2:
                    50:40:54:25:be:65:15:72:11:73:d8:42:e4:62:ee:
                    f7:c3:70:ee:1a:e9:dd:64:c6:22:4b:b1:a2:b4:5b:
                    cf:15:37:18:c5:41:1a:fc:3e:00:e4:5a:bd:bc:bf:
                    0a:07:d6:b8:24:e2:92:ec:b3:32:c3:e3:c0:c1:cc:
                    3f:78:da:97:89:97:f4:ba:16:7b:08:26:39:9a:1d:
                    c0:61:e2:96:cd:85:4e:32:a3:0b:ba:de:22:a4:be:
                    db:6b:71:90:04:6e:91:2b:a3:a6:7c:0b:38:96:13:
                    1f:2c:cb:0a:1a:60:44:06:89:f3:e4:af:d3:91:57:
                    a0:a7:de:dc:6a:fb:d8:0c:05:e3:c6:e3:51:ab:b5:
                    9a:d4:18:8b:be:c6:b9:dd:2f:44:a1:87:83:ea:d1:
                    ea:bf:f4:c0:2c:56:52:08:5c:46:bc:f5:67:c7:f0:
                    9d:a4:15:c4:ce:7e:85:ad:21:ce:f4:6f:b4:cb:65:
                    0b:31:e1:89:cd:72:7a:c6:2d:25:04:72:cb:45:c8:
                    f2:d7:f9:7b:6f:e5:23:59:17:cf:4e:38:8c:57:54:
                    d8:cd:be:01:39:0d:b2:5b:f6:13:0c:e1:40:05:a8:
                    8f:b5:6e:8f:50:aa:dc:70:4e:18:dc:fe:c3:af:23:
                    1c:cd
                Exponent: 65537 (0x10001)
        X509v3 extensions:
            X509v3 Subject Key Identifier: 
                AD:4F:2A:20:44:FB:80:54:6E:AA:EF:23:F2:6A:FD:6E:BC:4F:BB:A5
            X509v3 Subject Alternative Name: 
                DNS:idptestbed, URI:https://idptestbed/idp/shibboleth
    Signature Algorithm: sha256WithRSAEncryption
    Signature Value:
        53:1f:a0:eb:fe:a0:84:86:8e:f6:a6:ab:bf:98:e0:6e:de:a7:
        9b:f1:94:03:de:2b:74:40:4d:83:d8:bc:09:b2:1f:de:3a:a9:
        95:e1:f7:c9:e2:41:7c:ae:a9:95:b9:3f:97:84:b7:ce:ad:a1:
        8e:39:23:00:d4:e6:bd:3d:48:ac:07:ba:08:44:7b:df:62:88:
        49:31:87:49:9b:da:aa:3c:e2:a5:fd:fe:a7:20:fa:4c:8d:8d:
        e2:dd:fc:e4:b2:a2:5a:54:08:41:4d:c0:e1:5c:a2:0e:e9:8f:
        b1:1e:af:ee:80:1d:bc:13:9f:53:23:6f:94:c1:b0:ac:2d:0c:
        c2:6c:6b:13:ef:76:3d:2e:ec:ce:6b:c4:bf:f0:1e:41:61:9f:
        5a:c2:a3:64:22:a2:3c:e3:4a:55:77:c8:b4:e1:e3:d8:93:ca:
        11:37:70:6f:91:c5:a3:4a:0c:2c:61:a7:48:d2:48:b5:f5:05:
        6f:d9:a0:f0:3c:f8:f3:09:10:0f:90:d1:06:f2:44:3f:1a:24:
        e1:cd:e4:ef:23:1b:10:9a:fd:9c:dc:3a:76:15:2f:a0:2c:11:
        7a:03:89:8d:ef:01:46:21:d4:55:28:9c:e5:b0:d2:6f:47:a7:
        eb:46:51:b1:92:da:5f:3b:dc:9e:4f:ae:c6:e9:78:a1:15:47:
        f2:08:a0:aa


https://www.congruityservice.com/blog/create%20and%20install%20self%20signed%20certificate%20with%20subject%20alternative%20name

@echo off

REM IN YOUR SSL FOLDER, SAVE THIS FILE AS: makeCERT.bat
REM AT COMMAND LINE IN YOUR SSL FOLDER, RUN: makecert
REM IT WILL CREATE THESE FILES: example.cnf, example.crt, example.key
REM IMPORT THE .crt FILE INTO CHROME Trusted Root Certification Authorities
REM REMEMBER TO RESTART APACHE OR NGINX AFTER YOU CONFIGURE FOR THESE FILES

REM PLEASE UPDATE THE FOLLOWING VARIABLES FOR YOUR NEEDS.
SET HOSTNAME=example
SET DOT=com
SET COUNTRY=US
SET STATE=KS
SET CITY=Olathe
SET ORGANIZATION=IT
SET ORGANIZATION_UNIT=IT Department
SET EMAIL=webmaster@%HOSTNAME%.%DOT%

(
echo [req]
echo default_bits = 2048
echo prompt = no
echo default_md = sha256
echo x509_extensions = v3_req
echo distinguished_name = dn
echo:
echo [dn]
echo C = %COUNTRY%
echo ST = %STATE%
echo L = %CITY%
echo O = %ORGANIZATION%
echo OU = %ORGANIZATION_UNIT%
echo emailAddress = %EMAIL%
echo CN = %HOSTNAME%.%DOT%
echo:
echo [v3_req]
echo subjectAltName = @alt_names
echo:
echo [alt_names]
echo DNS.1 = *.%HOSTNAME%.%DOT%
echo DNS.2 = %HOSTNAME%.%DOT%
)>%HOSTNAME%.cnf

openssl req -new -x509 -newkey rsa:2048 -sha256 -nodes -keyout %HOSTNAME%.key -days 3560 -out %HOSTNAME%.crt -config %HOSTNAME%.cnf
-----------
openssl req -new -x509 -newkey rsa:2048 -sha256 -nodes -keyout idptest.key -days 3560 -out idptest.crt -config idptest.cnf
----


Modificar idp de saml para que devuelva los mismos atributos --> https://simplesamlphp.org/docs/contrib_modules/ldap/ldap.html
crear atributos de giam.
Incluir mas nameid formats, depurar la response en simplesamlphp que se ha metido otro ÇNameID...
https://simplesamlphp.org/docs/contrib_modules/ldap/ldap.html


Version:        <!-- para que no nos encripte los datos y los podamos ver en el log de SAMLTracer -->
        <bean parent="RelyingPartyByName" c:relyingPartyIds="other-http://secaas-labs-poc-01.org/sp/simplesamlphp">
            <property name="profileConfigurations">
                <list>
                    <bean parent="SAML2.SSO" p:encryptAssertions="false" />

https://github.com/uchicago/shibboleth-oidc/blob/master/idp-webapp-overlay/src/main/webapp/idp/conf/attribute-resolver.xml

https://medium.com/@rishabhsvats/quick-start-openldap-with-podman-a50042cd6e65
( 2.16.840.1.113730.3.2.2
    NAME 'inetOrgPerson'
    SUP organizationalPerson
    STRUCTURAL
    MAY (
        audio $ businessCategory $ carLicense $ departmentNumber $
        displayName $ employeeNumber $ employeeType $ givenName $
        homePhone $ homePostalAddress $ initials $ jpegPhoto $
        labeledURI $ mail $ manager $ mobile $ o $ pager $
        photo $ roomNumber $ secretary $ uid $ userCertificate $
        x500uniqueIdentifier $ preferredLanguage $
        userSMIMECertificate $ userPKCS12
    )
)
2026-05-21 22:12:54,749 -  - INFO [net.shibboleth.idp.log.LogbackLoggingService:240] - Shibboleth IdP Version 3.4.3
2026-05-21 22:12:54,753 -  - INFO [net.shibboleth.idp.log.LogbackLoggingService:241] - Java version='1.8.0_212' vendor='Azul Systems, Inc.'
https://shibboleth.atlassian.net/wiki/spaces/IDP30/pages/2494726159/AttributeResolverConfiguration

# Acceso

https://idptestbed.localhost

# Docker, dive tool

Muy útil inspección de imagenes y capas de docker, ademas de comparar dos imagenes y ver que capas son iguales o diferentes.

https://github.com/wagoodman/dive

https://dev.to/klip_klop/dive-into-docker-part-4-inspecting-docker-image-568o

# Docker commands

https://gist.github.com/codewithleader/4fb24e08d623858e329c625932900947

Down:
docker compose -f docker-compose.r1.yml down -v

Up:
docker compose --progress plain -f docker-compose.r1.yml up --detach --build --force-recreate

Logs:
docker logs -f ldap

# Web Admin

http://localhost:8081/

cn=admin,dc=idptestbed,dc=localhost
password

# ladpsearch

## Inside the container

docker exec -it ldap /bin/bash

ldapsearch -x -b "ou=people,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(uid=student1)" "*"
ldapsearch -x -b "ou=people,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(uid=student1)" "*" memberOf
ldapsearch -x -b "ou=people,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(uid=student1)" "*" "+"

ok: Query using admin all objects
% ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "objectclass=*"

ok: Query using admin a specific user
% ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(uid=student1)"

ok: Query using admin a organizational unit
% ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(ou=people)"

ok: Query using admin a specific user without attributes
% ldapsearch -x -b "ou=People,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s one "(uid=student1)" 1.1

--> 32 No such object
% ldapsearch -x -b "ou=People,dc=idptestbed,dc=localhost" -D "uid=student1,ou=People,dc=idptestbed,dc=localhost" -w password

ok: memberOf
% ldapsearch -x -b "ou=People,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s one "(uid=student1)" memberOf

## Outside the container (docker exec)

ok: Query using admin all objects
% docker exec ldap ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "objectclass=*"

ok: Query using admin a specific user
% docker exec ldap ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(uid=student1)"

ok: Query using admin a organizational unit
% docker exec ldap ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(ou=people)"

ok: Query using admin a specific user without attributes
% docker exec ldap ldapsearch -x -b "ou=People,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s one "(uid=student1)" 1.1

docker exec ldap ldapsearch -x -H ldap://ldap:389 -b "ou=people,dc=idptestbed,dc=localhost" -s one "(uid=student1)" 1.1
docker exec ldap ldapsearch -x -b "ou=people,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s one "(uid=student1)" 1.1
## Outside the container

ok: Query using admin all objects
% ldapsearch -x -H ldap://ldap:389 -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "objectclass=*"

ok: Query using admin a specific user
% ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(uid=student1)"

ok: Query using admin a organizational unit
% ldapsearch -x -b dc=idptestbed -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s sub "(ou=people)"

ok: Query using admin a specific user without attributes
% ldapsearch -x -H ldap://ldap:389 -b "ou=People,dc=idptestbed,dc=localhost" -D "cn=admin,dc=idptestbed,dc=localhost" -w password -s one "(uid=student1)" 1.1


# dockerized-idp-testbed

Used to validate the following Unicon docker images:

- shibboleth-idp: [https://hub.docker.com/r/unicon/shibboleth-idp](https://github.com/Unicon/shibboleth-idp-dockerized).
- shibboleth-sp: [https://hub.docker.com/r/unicon/shibboleth-sp](https://github.com/Unicon/shibboleth-sp-dockerized).
- simplesamlphp: [https://hub.docker.com/r/unicon/simplesamlphp](https://github.com/Unicon/simplesamlphp-dockerized).

More documentation is forthcoming, but it's a full working IDP, SP, and LDAP server that runs under `docker-compose`. 

1. Update the `idp/Dockerfile` with the version of the base image you want to test.
2. Call `docker-compose build` and then `docker-compose up` (or `docker-compose up -d` to run as a daemon).
3. Browse to `https://idptestbed/` (after setting up an `etc/hosts` file entry pointing to your Docker Host IP), and you can login with `staff1` and `password`.  
4. `ctrl+c` then `docker-compose rm` cleans everything up to try again.

## Prepping for the Test

If testing the Shibboleth IdP build process locally, you'll want to make sure to `docker pull centos:centos7` to ensure that you have the latest before building the IdP. This will ensure that your version will match what Docker Hub will use when it builds. 

Build the IdP with `docker build --tag="unicon/shibboleth-idp:<version>" .`. Make sure the `FROM` entry in testbed's `idp/Dockerfile` matches the tag used in the idp build  or Docker Compose will pull the wrong version when running the Testbed (see step #1).

If testing the SimpleSAMLphp build process locally, you'll want to make sure to `docker pull centos:centos7` to ensure that you have the latest before building the image. This will ensure that your version will match what Docker Hub will use when it builds. 

Build the application with `docker build --tag="unicon/simplesamlphp:<version>" .`. Make sure the `FROM` entry in testbed's `simplesamlphp/Dockerfile` matches the tag used in the ssp build or Docker Compose will pull the wrong version when running the Testbed (see step #1).

## HTTP/2 support for Shibboleth IdP

HTTP/2 support can be added to Jetty by doing the following:

1. Adding the following to the `idp-http2/Dockerfile`:
 
```bash
RUN cd /opt/shib-jetty-base \
    && /opt/jre-home/bin/java -jar ../jetty-home/start.jar --add-to-startd=http2 -Dorg.eclipse.jetty.start.ack.licenses=true
ADD shib-jetty-base/alpn.ini /opt/shib-jetty-base/start.d/
```

> This will automatically accept the GPLv2 license used by the ALPN library utilized by Jetty.

2. Create and populate `idp-http2/shib-jetty-base/alpn.ini`:

```apache
# ---------------------------------------
# Module: alpn
--module=alpn

## Overrides the order protocols are chosen by the server.
## The default order is that specified by the order of the
## modules declared in start.ini.
# jetty.alpn.protocols=h2-16,http/1.1

## Specifies what protocol to use when negotiation fails.
jetty.alpn.defaultProtocol=http/1.1

## ALPN debug logging on System.err
# jetty.alpn.debug=false
```

3. Run the container(s): `docker-compose -f docker-compose-http2.yml build && docker-compose -f docker-compose-http2.yml up`.

4. Test:

- Open the browser network analyzer tools. 
- Ensure that the `protocol` type is shown. 1.
- Browse to `https://idptestbed/idp/`. Chrome, firefox, and safari should show a protocol of "h2".
- Try `curl -k -v https://idptestbed/idp/`. "HTTP/1.1" will likely be shown as curl (at least on OS X) does not have http/2 support.
