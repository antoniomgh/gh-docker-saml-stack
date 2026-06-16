Esta pensado inicialmente para funcionar por el puerto 80, detrás de un proxy inverso.

## Como ver las CA's en Rocky Linux

    # trust list --filter=ca-anchors | grep "GH Devel" -A 3 -B 1
    type: certificate
    label: GH Development Intermediate CA
    trust: anchor
    category: authority

    --
    type: certificate
    label: GH Development Root CA
    trust: anchor
    category: authority
    #


### Método 1: Listar solo tus CA personalizadas (El más útil)

Si lo único que quieres es comprobar si Rocky Linux ha asimilado correctamente el archivo `.crt` de tu CA propia que inyectaste antes en la carpeta de anclajes, basta con listar de forma nativa ese directorio:

```bash
ls -la /etc/pki/ca-trust/source/anchors/

```

Si tu archivo `mi-ca-local.crt` aparece ahí, significa que la base está en su sitio.

---

### Método 2: Usar el comando de p11-kit (El método oficial y limpio)

Rocky Linux gestiona los almacenes compartidos mediante la herramienta `p11-kit`. Si quieres ver el listado real de lo que el sistema considera de confianza en este momento (filtrando por tus anclajes), ejecuta:

```bash
trust list --filter=ca-anchors

```

Si el listado es masivo porque saca también las CAs globales de Mozilla y solo quieres buscar la tuya por su nombre para confirmar que está operativa, pásale un filtro con `grep`:

```bash
trust list --filter=ca-anchors | grep "GH Devel" -A 3 -B 1

```

---

### Método 3: Leer el archivo bundle unificado de OpenSSL

Cuando ejecutas `update-ca-trust extract`, Rocky Linux coge todas las CAs del sistema y las tuyas propias y las empaqueta en un único archivo plano gigante en `/etc/pki/tls/certs/ca-bundle.crt`.

Para ver los nombres (*Subjects*) de todos los certificados que habitan ahí dentro de una forma legible sin tragarte miles de líneas de hashes asimétricos, puedes usar este pipeline de OpenSSL y `awk`:

```bash
awk -v cmd='openssl x509 -noout -subject 2>/dev/null' '/BEGIN CERTIFICATE/{pipe=1} pipe{print | cmd} /END CERTIFICATE/{close(cmd); pipe=0}' /etc/pki/tls/certs/ca-bundle.crt

```

Verás una salida limpia línea a línea parecida a esta:

```text
subject=O = Digital Signature Trust Co., CN = DST Root CA X3
subject=C = US, O = Internet Security Research Group, CN = ISRG Root X1
subject=CN = Tu CA Propia de Desarrollo Local, O = Mi Entorno SAML Stack

```

Si localizas la línea correspondiente al campo `CN` (Common Name) de la CA de tu Mac en ese listado, tu contenedor estará 100% blindado y listo para negociar cualquier handshake SSL con tus proxies.