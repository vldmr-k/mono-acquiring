<?php

namespace spec\VldmrK\MonoAcquiring;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\WebHookVerifier;

class WebHookVerifierSpec extends ObjectBehavior
{
    // example pubkey, you should receive one at https://api.monobank.ua/api/merchant/pubkey
    private $pubKeyBase64 = "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUZrd0V3WUhLb1pJemowQ0FRWUlLb1pJemowREFRY0RRZ0FFQUc1LzZ3NnZubGJZb0ZmRHlYWE4vS29CbVVjTgo3NWJSUWg4MFBhaEdldnJoanFCQnI3OXNSS0JSbnpHODFUZVQ5OEFOakU1c0R3RmZ5Znhub0ZJcmZBPT0KLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg==";

    // value from X-Sign header in webhook request
    private $xSignBase64 = "MEUCIQC/mVKhi8FKoayul2Mim3E2oaIOCNJk5dEXxTqbkeJSOQIgOM0hsW0qcP2H8iXy1aQYpmY0SJWEaWur7nQXlKDCFxA=";


    private $message = '{
            "invoiceId": "p2_9ZgpZVsl3",
            "status": "created",
            "failureReason": "string",
            "amount": 4200,
            "ccy": 980,
            "finalAmount": 4200,
            "createdDate": "2019-08-24T14:15:22Z",
            "modifiedDate": "2019-08-24T14:15:22Z",
            "reference": "84d0070ee4e44667b31371d8f8813947",
            "cancelList": [
              {
                "status": "processing",
                "amount": 4200,
                "ccy": 980,
                "createdDate": "2019-08-24T14:15:22Z",
                "modifiedDate": "2019-08-24T14:15:22Z",
                "approvalCode": "662476",
                "rrn": "060189181768",
                "extRef": "635ace02599849e981b2cd7a65f417fe"
              }
            ]
          }';

    function it_is_initializable()
    {
        $this->shouldHaveType(WebHookVerifier::class);
    }

    function it_verify() {

        $this->verify($this->message, $this->xSignBase64, $this->pubKeyBase64);
    }
}
