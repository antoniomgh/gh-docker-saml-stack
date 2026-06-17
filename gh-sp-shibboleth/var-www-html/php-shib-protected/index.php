<html>
<body>
	<?php
        // Esto asegura que se muestren los errores de PHP en el navegador
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
	?>
	<p><a href="https://ghsamlstack.localhost/">Main Menu</a></p>
    <br/>
    <h1>IDP Default</h1>
    <h2>Variables de Servidor y Shibboleth</h2>
    <?php
        phpinfo(INFO_VARIABLES);
    ?>
</body>
</html>