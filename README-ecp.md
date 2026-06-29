Example script for testing OpenStack Keystone SAML 2.0 ECP authentication with Python libraries
https://gist.github.com/01000101/f73b7eb8a1a25c9a50c0dd9a411d5b06

saml_ecp_demo is a Python3 implementation of ECP designed both to educate implementors about ECP and perform a complete ECP authentication flow with the ability to dump all protocol interactions for the purpose of education and/or diagnosing ECP transactions.
https://github.com/jdennis/saml_ecp_demo/blob/master/saml_ecp_demo/saml_ecp_demo.py

This is a demo, based on dockerized-idp-testbed, demonstrating how to configure a Moonshot IDP (FreeRADIUS) to use SAML ECP to authenticate users and get a SAML Assertion.
https://github.com/alejandro-perez/moonshot_ecp_test/tree/master



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