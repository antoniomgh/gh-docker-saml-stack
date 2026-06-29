#!/usr/bin/env bash

# Detener el script si ocurre cualquier error intermedio

set -e

echo "[gh] Starts"

### Simple SOAP ECP Test

TEMPLATE=template.xml
NOW=$(date -u '+%FT%H:%M:%SZ')
ID=$(echo "${NOW}-$$" | shasum | cut -d ' ' -f 1)
ENTITYID=${ENTITYID:-urn:federation:MicrosoftOnline}
ENDPOINT=${ENDPOINT:-https://login.microsoftonline.com/login.srf}
URL=${URL:-http://localhost/}

CRED=${CRED:-anonymous:anonymous}

ENDPOINT_ESCAPED="$(echo $ENDPOINT | sed -e 's/[\/&]/\\&/g')"

ENTITYID_ESCAPED="$(echo $ENTITYID | sed -e 's/[\/&]/\\&/g')"


echo "[gh] NOW: [$NOW]"
echo "[gh] ID: [$ID]"
echo "[gh] ENTITYID: [$ENTITYID]"
echo "[gh] ENDPOINT_ESCAPED: [$ENDPOINT_ESCAPED]"

REQUEST=$(cat $TEMPLATE |
	sed "s/__NOW__/$NOW/" |
	sed "s/__RANDOM_STRING__/$ID/" |
	sed "s/__REMOTE_ENTITYID__/$ENTITYID_ESCAPED/" |
	sed "s/__AssertionConsumerServiceURL__/$ENDPOINT_ESCAPED/")

echo $REQUEST | xmllint --pretty 1 -

echo $REQUEST |
	curl -k \
		-d @- \
		-H "Content-Type: ${CONTENT_TYPE:-text/xml}" \
		--basic -u $CRED \
		$URL 
