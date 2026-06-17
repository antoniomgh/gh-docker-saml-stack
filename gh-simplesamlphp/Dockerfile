FROM gh/saml-simplesamlphp:latest

ARG ROLE_SIMPLESAML
ENV ROLE_SIMPLESAML_ENV=${ROLE_SIMPLESAML}

## BEGIN: Install CA's ##########################
RUN yum -y update \
    && yum -y install ca-certificates \
    && yum -y clean all

COPY ./ssl/ca-chain.cert.pem /etc/pki/ca-trust/source/anchors/ca-chain.cert.pem

RUN update-ca-trust extract
## END: Install CA's ##########################

## BEGIN: SSL Use ##########################
#
# uncomment if you need to install mod_ssl for https support.
# otherwise use port 80 behind a reverse proxy for http access to simplesamlphp
#
# RUN yum -y update \
#    && yum -y install mod_ssl \
#    && yum -y clean all
#
# sample server certificate
#
# COPY ssl/server.cert.pem /etc/pki/tls/certs/localhost.crt
# COPY ssl/server.key.pem /etc/pki/tls/private/localhost.key
#
## END: SSL Use ##########################

COPY role-${ROLE_SIMPLESAML}/etc-httpd /etc/httpd/
COPY role-${ROLE_SIMPLESAML}/var-simplesamlphp /var/simplesamlphp/
COPY role-${ROLE_SIMPLESAML}/var-www-html/ /var/www/html/

RUN chown apache:apache /var/simplesamlphp/log/ \
    && chown -R apache:apache /var/simplesamlphp/cert/

RUN sed -i 's|^LogLevel \+[^ $]\+|LogLevel info |g' /etc/httpd/conf/httpd.conf

RUN find /etc/httpd/ -name "*.conf" -exec sed -i \
    -e 's|ErrorLog ".*"|ErrorLog /dev/stderr|g' \
    -e 's|ErrorLog [^/].*|ErrorLog /dev/stderr|g' \
    -e 's|CustomLog ".*"|CustomLog /dev/stdout|g' \
    -e 's|CustomLog \+[^\ ]\+|CustomLog /dev/stdout |g' \
    -e 's|TransferLog ".*"|TransferLog /dev/stdout|g' \
    -e 's|TransferLog [^/].*|TransferLog /dev/stdout|g' \
    {} +