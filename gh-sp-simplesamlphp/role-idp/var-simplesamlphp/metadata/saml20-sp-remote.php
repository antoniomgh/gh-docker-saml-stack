<?php

$metadata['http://secaas-labs-poc-01.org/sp/simplesamlphp'] = [
    'entityid' => 'http://secaas-labs-poc-01.org/sp/simplesamlphp',
    'contacts' => [
        [
            'contactType' => 'technical',
            'company' => 'BBVA SecaaS',
            'givenName' => 'Tech',
            'surName' => 'Service Desk',
            'emailAddress' => [
                'servicedesk.ans.next.es@bbva.es',
            ],
            'telephoneNumber' => [
                '+34 666787909',
            ],
        ],
    ],
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
            'index' => 0,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
            'index' => 1,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
            'index' => 2,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
            'index' => 3,
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
        ],
    ],
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
    'keys' => [
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIDrTCCApSgAwIBAgIBADANBgkqhkiG9w0BAQ0FADBwMQswCQYDVQQGEwJlczEVMBMGA1UECAwMU2VjYWFTIFN0YXRlMRwwGgYDVQQKDBNTZWNhYVMgT3JnYW5pemF0aW9uMRYwFAYDVQQDDA1TZWNhYVMgRG9tYWluMRQwEgYDVQQLDAtTZWNhYVMgTGFiczAeFw0yNjA1MTkxOTQyNTlaFw0zMDA1MTgxOTQyNTlaMHAxCzAJBgNVBAYTAmVzMRUwEwYDVQQIDAxTZWNhYVMgU3RhdGUxHDAaBgNVBAoME1NlY2FhUyBPcmdhbml6YXRpb24xFjAUBgNVBAMMDVNlY2FhUyBEb21haW4xFDASBgNVBAsMC1NlY2FhUyBMYWJzMIIBIzANBgkqhkiG9w0BAQEFAAOCARAAMIIBCwKCAQIA2lRFtdxMbQZxOwo5QbqaQAZ1+848I/+R79xoUsel6bzXM6p2T4TVndrr0Vm2xq7SfMLFmVUq3jMQPgPplWnOILni2+/2bmxnbEVZyFIRL4y/t5zbdPhuW8Qq9EEdW9RkGslWFLS2lgWS+CfdkK0IgHFgsQyN6TvfpmlfbFkrYV4cFlyagIGPXU/4u+nCHOagjtZVMUEBY1fuaKecbuZEHHlfFM2ghVT44xoUKTSPyq/REgS6Gk1c/NuXAPQPBKlC/8L8WuiJgvq9J53osvWOC977fxKtVREFkHlewlN6LTC8M+BQKWON77DuzPELSZz1xtiCbhv7tQr6qZItnuOhydUCAwEAAaNQME4wHQYDVR0OBBYEFABCdjtIRGi0AF0Uti7p+FXPdfegMB8GA1UdIwQYMBaAFABCdjtIRGi0AF0Uti7p+FXPdfegMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQENBQADggECAAYbJbguzm9fHF1muKFy+bCMRP2dscl7GDO9hJdQILkgPNCBMA2JjimWAMYp2kbLVgR+OVRgYZXIe6N6xbpxI16ANf89U47JEnNJqQndF+N3WrOB9Tm7uOo6Ub8FB4aYGY/X69Ncp6vxLic8awBEGlvNHBwZ4Ks0MXEJeIKBYLHQQAvbBr5k6yRwmC3xFBNsYu+fl9lsg4+aHlUEKYXou+MzA8/QrpxWmC8UUVVUSc2AkHzZtSJuFfPcNFH9QTTo4/WAY3RvLPj0vUvhkcakps0Qz6Ar0ge2G63I+63U3Pev1tYJpw8Ye2ANGm0aYpi/EWPwpFq/oWDfj78sKHngRb6G',
        ],
        [
            'encryption' => true,
            'signing' => false,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIDrTCCApSgAwIBAgIBADANBgkqhkiG9w0BAQ0FADBwMQswCQYDVQQGEwJlczEVMBMGA1UECAwMU2VjYWFTIFN0YXRlMRwwGgYDVQQKDBNTZWNhYVMgT3JnYW5pemF0aW9uMRYwFAYDVQQDDA1TZWNhYVMgRG9tYWluMRQwEgYDVQQLDAtTZWNhYVMgTGFiczAeFw0yNjA1MTkxOTQyNTlaFw0zMDA1MTgxOTQyNTlaMHAxCzAJBgNVBAYTAmVzMRUwEwYDVQQIDAxTZWNhYVMgU3RhdGUxHDAaBgNVBAoME1NlY2FhUyBPcmdhbml6YXRpb24xFjAUBgNVBAMMDVNlY2FhUyBEb21haW4xFDASBgNVBAsMC1NlY2FhUyBMYWJzMIIBIzANBgkqhkiG9w0BAQEFAAOCARAAMIIBCwKCAQIA2lRFtdxMbQZxOwo5QbqaQAZ1+848I/+R79xoUsel6bzXM6p2T4TVndrr0Vm2xq7SfMLFmVUq3jMQPgPplWnOILni2+/2bmxnbEVZyFIRL4y/t5zbdPhuW8Qq9EEdW9RkGslWFLS2lgWS+CfdkK0IgHFgsQyN6TvfpmlfbFkrYV4cFlyagIGPXU/4u+nCHOagjtZVMUEBY1fuaKecbuZEHHlfFM2ghVT44xoUKTSPyq/REgS6Gk1c/NuXAPQPBKlC/8L8WuiJgvq9J53osvWOC977fxKtVREFkHlewlN6LTC8M+BQKWON77DuzPELSZz1xtiCbhv7tQr6qZItnuOhydUCAwEAAaNQME4wHQYDVR0OBBYEFABCdjtIRGi0AF0Uti7p+FXPdfegMB8GA1UdIwQYMBaAFABCdjtIRGi0AF0Uti7p+FXPdfegMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQENBQADggECAAYbJbguzm9fHF1muKFy+bCMRP2dscl7GDO9hJdQILkgPNCBMA2JjimWAMYp2kbLVgR+OVRgYZXIe6N6xbpxI16ANf89U47JEnNJqQndF+N3WrOB9Tm7uOo6Ub8FB4aYGY/X69Ncp6vxLic8awBEGlvNHBwZ4Ks0MXEJeIKBYLHQQAvbBr5k6yRwmC3xFBNsYu+fl9lsg4+aHlUEKYXou+MzA8/QrpxWmC8UUVVUSc2AkHzZtSJuFfPcNFH9QTTo4/WAY3RvLPj0vUvhkcakps0Qz6Ar0ge2G63I+63U3Pev1tYJpw8Ye2ANGm0aYpi/EWPwpFq/oWDfj78sKHngRb6G',
        ],
    ],
    'validate.authnrequest' => true,
    'saml20.sign.assertion' => true,
];

$metadata['http://secaas-labs-poc-01.org/sps2/simplesamlphp'] = [
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml2-logout.php/simple2-sp',
        ],
    ],
    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://sp.simplesamlphp.ghsamlstack.localhost/simplesaml/module.php/saml/sp/saml2-acs.php/simple2-sp',
            'index' => 0,
        ],
    ],
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
    'saml20.sign.assertion' => false,
];