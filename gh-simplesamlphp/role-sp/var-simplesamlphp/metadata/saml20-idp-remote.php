<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$metadata['https://secaas-labs-poc-01.org/idp/simplesamlphp'] = array(
	'name' => array(
		'en' => 'SimpleSAMLphp IdP',
	),
	'description'          => 'Test SimpleSAMLphp IdP.',
	'SingleSignOnService'  => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://idp.simplesamlphp.ghsamlstack.localhost/simplesaml/saml2/idp/SSOService.php',
        ],
        // Endpoint ECP:
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://idp.simplesamlphp.ghsamlstack.localhost/simplesaml/saml2/idp/SSOService.php',
        ],
    ],
	'SingleLogoutService'  => 'https://idp.simplesamlphp.ghsamlstack.localhost/simplesaml/saml2/idp/SingleLogoutService.php',
    'certificate' => '/run/secrets/sp_simple_cert',
);

$metadata['https://secaas-labs-poc-01.org/idp/shibboleth'] = array(
	'name' => array(
		'en' => 'Shibboleth IdP',
	),
	'description'  => 'Test Shibboleth IdP.',
    'metadata-set' => 'saml20-idp-remote',
    'SingleSignOnService' => [
        [
            'Binding' => 'urn:mace:shibboleth:1.0:profiles:AuthnRequest',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost/idp/profile/Shibboleth/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost/idp/profile/SAML2/POST/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost/idp/profile/SAML2/POST-SimpleSign/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost/idp/profile/SAML2/Redirect/SSO',
        ],
        # Endpoint para SOAP ECP:
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost/idp/profile/SAML2/SOAP/ECP'
        ],
    ],
    'SingleLogoutService' => [],
    'ArtifactResolutionService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:bindings:SOAP-binding',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost:8443/idp/profile/SAML1/SOAP/ArtifactResolution',
            'index' => 1,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://idp.shibboleth.ghsamlstack.localhost:8443/idp/profile/SAML2/SOAP/ArtifactResolution',
            'index' => 2,
        ],
    ],
    'NameIDFormats' => [
        'urn:mace:shibboleth:1.0:nameIdentifier',
        'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
    ],
    'keys' => [
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIDEzCCAfugAwIBAgIUS9SuTXwsFVVG+LjOEAbLqqT/el0wDQYJKoZIhvcNAQELBQAwFTETMBEGA1UEAwwKaWRwdGVzdGJlZDAeFw0xNTEyMTEwMjIwMjZaFw0zNTEyMTEwMjIwMjZaMBUxEzARBgNVBAMMCmlkcHRlc3RiZWQwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCMAoDHx8xCIfv/6QKqt9mcHYmEJ8y2dKprUbpdcOjHYvNPIl/lHPsUyrb+Nc+q2CDeiWjVk1mWYq0UpIwpBMuw1H6+oOqr4VQRi65pin0MSfE0MWIaFo5FPvpvoptkHD4gvREbm4swyXGMczcMRfqgalFXhUD2wz8W3XAM5Cq203XeJbj6TwjvKatG5XPdeUe2FBGuOO2q54L1hcIGnLMCQrg7D31lR13PJbjnJ0No5C3k8TPuny6vJsBC03GNLNKfmrKVTdzr3VKp1uay1G3DL9314fgmbl8HA5iRQmy+XInUU6/8NXZSF59p3ITAOvZQeZsbJjg5gGDip5OZo9YlAgMBAAGjWzBZMB0GA1UdDgQWBBRPlM4VkKZ0U4ec9GrIhFQl0hNbLDA4BgNVHREEMTAvggppZHB0ZXN0YmVkhiFodHRwczovL2lkcHRlc3RiZWQvaWRwL3NoaWJib2xldGgwDQYJKoZIhvcNAQELBQADggEBAIZ0a1ov3my3ljJG588I/PHx+TxAWONWmpKbO9c/qI3Drxk4oRIffiacANxdvtabgIzrlk5gMMisD7oyqHJiWgKv5Bgctd8w3IS3lLl7wHX65mTKQRXniG98NIjkvfrhe2eeJxecOqnDI8GOhIGCIqZUn8ShdM/yHjhQ2Mh0Hj3U0LlKvnmfGSQlj0viGwbFCaNaIP3zc5UmCrdE5h8sWL3Fu7ILKM9RyFa2ILHrJScV9t623IcHffHPIeaY/WtuapsrqRFxuQL9QFWN0FsRIdLmjTq+00+B/XnnKRKFBuWfjhHLF/uu8f+Et6Lf23Kb8yD6ZR7dihMZAGHnYQ/hlhM=',
        ],
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIDWTCCAkGgAwIBAgIUXen0Y2HrnER7r+rAr6NPkwsJUHIwDQYJKoZIhvcNAQELBQAwGDEWMBQGA1UEAwwNZ2gtaWRwdGVzdGJlZDAeFw0yNjA1MjYyMzMwNTJaFw0zNjAyMjMyMzMwNTJaMBgxFjAUBgNVBAMMDWdoLWlkcHRlc3RiZWQwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCuKkUylKKNizi2kBmWGjUZ3vcaHXKq5XTsbSIAFLOgqVPncyBIm3IE19w77FRIRMu0+DTiO2dLXec3rzxyyH7svm11u9CpzV78D3ITmUAVYM4G++hoDv1QJf1eNHmpRN3I8GgLLKJzQSykVgwN2cnpqJST5txojNtaXCSnOqWkNa3c5gfcCIeCoIU6HI2ZUVvDAhRyYILcIJ+Z5yZxZe1nSmymnRfAadpQHZcmbtjxjl7WAfQDpYBgXgFhQ65vVQbaj75iStq0LoQBmXpCnbAee5ihARbN5nTlqXgXoPL+GfbyKPJ96ZyqNZ4cRUKWXGQxbRN5xZpANyaNZUTxe/XNAgMBAAGjgZowgZcwdgYDVR0RBG8wbYINZ2gtaWRwdGVzdGJlZIYtaHR0cHM6Ly9zZWNhYXMtbGFicy1wb2MtMDEub3JnL2lkcC9zaGliYm9sZXRoghMqLmdoLWlkcHRlc3RiZWQuY29thhhlbWFpbDJAZ2gtaWRwdGVzdGJlZC5jb20wHQYDVR0OBBYEFJ6wQLCeE6YoC9teGZnlhv0QH+ptMA0GCSqGSIb3DQEBCwUAA4IBAQA8j/Gm2MitzXY5I+x5iF0e/svTmF84+EH4zQFvivUWD3FMfNbYZSBarFb5GbfxXJEU63GaKIWk0MOY3lip+1MGzww64qSXAZVehuRnDJqk6VSOzRkLBM4hNDV8FD7OAWv7pCwStkwikETiF5NI11GS9VA1mEAsX87ZsAxRV3ew6RZtQZ97xcbrUSPv5eXDMOcx/7i7MQHd3DazWyBh3GdkVdHoOxykhHLfBFXE3nMJHLpK92rkWAPx2gh/NrkuBhD0LBOMaskGVErIj6nZA6iTSU5WaBIE0o3F8RPJ0Gw7Cuk6SRF0I9jpGgkJp1/1mMqg7+WDdlZbXfBTHi898Cyw',
        ],
        [
            'encryption' => true,
            'signing' => false,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIDWTCCAkGgAwIBAgIUFqFxpFy8Yo188JXqvYQtCGmMh5kwDQYJKoZIhvcNAQELBQAwGDEWMBQGA1UEAwwNZ2gtaWRwdGVzdGJlZDAeFw0yNjA1MjYyMzA1NDVaFw0zNjAyMjMyMzA1NDVaMBgxFjAUBgNVBAMMDWdoLWlkcHRlc3RiZWQwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCj7Y75S5PjcAup8Xfv6eac0syDW5L+dZynjdZVTjOgekqwG45NSC2cDMJbgx6tbF6+rDpBoi+CS2g44sh4T7h3ZVzc5z4kAJ3nVwnD74sQGpBEjdWs6QHXZf+eXZQAw1bUSPuxvrKFL9o4yXT2a4y68u6vYtXyAFSBdHX/yJJrLRk8Hq5rcYi1BTE3AJkcKVMWN0U0abZIZ3XBtB//BLZhD3d5aUk5u+1mPAH9/ik7RtjZ/k6cEkzkVeZ38VErJFjt8Quv3SEiX73BH+PfO7zncpFvzXUTFL1TSYPiOLGp3euJIq+ysvBeJYlC+gPaBlxj9L2ovInoh58qA9EH0/2XAgMBAAGjgZowgZcwdgYDVR0RBG8wbYINZ2gtaWRwdGVzdGJlZIYtaHR0cHM6Ly9zZWNhYXMtbGFicy1wb2MtMDEub3JnL2lkcC9zaGliYm9sZXRoghMqLmdoLWlkcHRlc3RiZWQuY29thhhlbWFpbDJAZ2gtaWRwdGVzdGJlZC5jb20wHQYDVR0OBBYEFC1WZdaM6QaqslvYTui1nWaDXYImMA0GCSqGSIb3DQEBCwUAA4IBAQBco9N618SrgmaNUMig5Tkcq3WejplnPY+Rbp444BxwgH7v6UuO/RAEaWKwvUeEMIoV2gYMkm5T5IDQJtRL0fKIr1LIOApRX7QGWkxKm4GgL0HOi7mSoYAwEAPV3z2rn/cvuvQzeJ0lionAAzQxmfUvpmqUBGhoxGE8xdPNZS7eHUbtlxTNyTd2e9TuaTvWC7P+UWOcsPxxz7Z2QxmwmqS9/hMM9Glr9ZqcVoW9kQtYjZ8OUeRBPRgiaer+h4bCUEkbChf951LK3U+AvyrrvOpZAacOMoZ6Uk4zBtdgSrGgF5OZKHahG+6hI0qWBCVb/XIZOIEgaUPqvZ1sKjiTNbfC',
        ],
    ],
    'scope' => [
        'example.org',
    ],
);

$metadata['https://preidp.work.global.platform.bbva.com/idp/metadata'] = [
	'name' => array(
		'en' => 'Nauthilus PreIDP',
	),
    'entityid' => 'https://preidp.work.global.platform.bbva.com/idp/metadata',
    'contacts' => [],
    'metadata-set' => 'saml20-idp-remote',
    'SingleSignOnService' => [
        [
            'Binding' => 'urn:mace:shibboleth:1.0:profiles:AuthnRequest',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/Shibboleth/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/POST/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/POST-SimpleSign/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/Redirect/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/SOAP/ECP',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/Redirect/SLO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/POST/SLO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/POST-SimpleSign/SLO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/SOAP/SLO',
        ],
    ],
    'ArtifactResolutionService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:bindings:SOAP-binding',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML1/SOAP/ArtifactResolution',
            'index' => 1,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://preidp.work.global.platform.bbva.com:443/idp/profile/SAML2/SOAP/ArtifactResolution',
            'index' => 2,
        ],
    ],
    'NameIDFormats' => [
        'urn:mace:shibboleth:1.0:nameIdentifier',
        'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
        'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
    ],
    'keys' => [
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => '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',
        ],
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => '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',
        ],
        [
            'encryption' => true,
            'signing' => false,
            'type' => 'X509Certificate',
            'X509Certificate' => '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',
        ],
    ],
];