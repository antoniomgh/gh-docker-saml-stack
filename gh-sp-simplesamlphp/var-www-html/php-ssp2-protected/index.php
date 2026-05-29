<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL ^ E_NOTICE);
  require_once('/var/simplesamlphp/lib/_autoload.php');
  $as = new SimpleSAML_Auth_Simple('simple2-sp');

  $as->requireAuth();
?>
<html>
<body>
	<p><a href="/">Main Menu</a></p>
    <br/>
    <h1>SAML Auth Info Simple2</h1>
    <pre>
    <?php
        echo '<h2>Auth Data: Attributes</h2>';
        print_r($as->getAttributes());

        echo '<h2>Auth Data: NameID</h2>';
        print_r($as->getAuthData('saml:sp:NameID'));

        echo '<h2>Auth Data: IdP</h2>';
        print_r($as->getAuthData('saml:sp:IdP'));

        echo '<h2>Auth Data: SessionIndex</h2>';
        print_r($as->getAuthData('saml:sp:SessionIndex'));
    ?>
    </pre>

</body>
</html>