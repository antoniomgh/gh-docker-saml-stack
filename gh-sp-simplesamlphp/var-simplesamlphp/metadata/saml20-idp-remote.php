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
	'SingleSignOnService'  => 'https://idptestbed.localhost/simplesaml/saml2/idp/SSOService.php',
	'SingleLogoutService'  => 'https://idptestbed.localhost/simplesaml/saml2/idp/SingleLogoutService.php',
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
            'Location' => 'https://idptestbed.localhost/idp/profile/Shibboleth/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://idptestbed.localhost/idp/profile/SAML2/POST/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
            'Location' => 'https://idptestbed.localhost/idp/profile/SAML2/POST-SimpleSign/SSO',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://idptestbed.localhost/idp/profile/SAML2/Redirect/SSO',
        ],
    ],
    'SingleLogoutService' => [],
    'ArtifactResolutionService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:bindings:SOAP-binding',
            'Location' => 'https://idptestbed.localhost:8443/idp/profile/SAML1/SOAP/ArtifactResolution',
            'index' => 1,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://idptestbed.localhost:8443/idp/profile/SAML2/SOAP/ArtifactResolution',
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