<?php

namespace VldmrK\MonoAcquiring;

use EllipticCurve\Ecdsa;
use EllipticCurve\PublicKey;
use EllipticCurve\Signature;

class WebHookVerifier
{
    /**
     * @param string $message
     *
     * value from X-Sign header in webhook request
     * @param string $xSign
     *
     * example pubkey, you should receive one at https://api.monobank.ua/api/merchant/pubkey
     * or call $api->call(\VldmrK\MonoAcquiring\Query());
     * @param string $pubKey
     * @return bool
     */
    public function verify(string $message, string $xSign, string $pubKey): bool
    {
        $publicKey = PublicKey::fromPem(base64_decode($pubKey));
        $signature = Signature::fromBase64($xSign);

        return Ecdsa::verify($message, $signature, $publicKey);
    }
}
