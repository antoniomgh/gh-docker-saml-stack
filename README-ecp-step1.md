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

Parece que no existe:
docker-compose exec moonshot_idp moonshot_tester

https://github.com/alejandro-perez/moonshot_ecp_test/tree/master

Es