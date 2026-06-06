FROM gh/saml-sp-simplesamlphp:latest

ARG ROLE_SIMPLESAML
ENV ROLE_SIMPLESAML_ENV=${ROLE_SIMPLESAML}

RUN yum -y update \
    && yum -y install mod_ssl \
    && yum -y clean all

COPY role-${ROLE_SIMPLESAML}/etc-httpd /etc/httpd/
COPY role-${ROLE_SIMPLESAML}/var-simplesamlphp /var/simplesamlphp/
COPY role-${ROLE_SIMPLESAML}/var-www-html/ /var/www/html/

COPY role-${ROLE_SIMPLESAML}/etc-httpd/ssl/ghsamlstack.localhost.cert.pem /etc/pki/tls/certs/localhost.crt
COPY role-${ROLE_SIMPLESAML}/etc-httpd/ssl/ghsamlstack.localhost.key.pem /etc/pki/tls/private/localhost.key

RUN chown apache:apache /var/simplesamlphp/log/ \
    && chown -R apache:apache /var/simplesamlphp/cert/

RUN sed -i 's|^LogLevel \+[^ $]\+|LogLevel dumpio:trace7 |g' /etc/httpd/conf/httpd.conf
RUN sed -i 's|^LogLevel \+[^ $]\+|LogLevel dumpio:trace7 |g' /etc/httpd/conf.d/ssl.conf
RUN find /etc/httpd/ -name "*.conf" -exec sed -i \
    -e 's|ErrorLog ".*"|ErrorLog /dev/stderr|g' \
    -e 's|ErrorLog [^/].*|ErrorLog /dev/stderr|g' \
    -e 's|CustomLog ".*"|CustomLog /dev/stdout|g' \
    -e 's|CustomLog \+[^\ ]\+|CustomLog /dev/stdout |g' \
    -e 's|TransferLog ".*"|TransferLog /dev/stdout|g' \
    -e 's|TransferLog [^/].*|TransferLog /dev/stdout|g' \
    {} +