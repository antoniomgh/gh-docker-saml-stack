<?php
// Forzamos la variable que mod_shib y Apache comprueban para validar el SSL
$_SERVER['HTTPS'] = 'on';
putenv("HTTPS=on");
?>
<html>
<body>
	<?php
        // Esto asegura que se muestren los errores de PHP en el navegador
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
	?>
	<?php
        header('Content-Type: text/plain');
        echo "--- CABECERAS RECIBIDAS POR PHP ---\n";
        foreach (getallheaders() as $name => $value) {
            echo "$name: $value\n";
        }
        echo "\n--- VARIABLES DE ENTORNO APACHE ---\n";
        echo "HTTPS: " . (isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : 'NOT SET') . "\n";
        echo "HTTP_X_FORWARDED_PROTO: " . (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'NOT SET') . "\n";
    ?>

	<p><a href="https://ghsamlstack.localhost/">Main Menu</a></p>
    <br/>
    <h1>IDP Shibboleth</h1>
    <h2>Variables de Servidor y Shibboleth</h2>
    <?php
        phpinfo(INFO_VARIABLES);
    ?>
</body>
</html>