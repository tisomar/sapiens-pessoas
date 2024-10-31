<?php

declare(strict_types=1);
/**
 * /src/Utils/CryptoService.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Utils;

use Exception;
use RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class CryptoService.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @deprecated
 */
class CryptoService implements CryptoServiceInterface
{
    private $cipher;
    private $algo;
    private $key;
    private $sha2len;

    /**
     * CryptoService constructor.
     *
     * @param ParameterBagInterface $params
     */
    public function __construct(ParameterBagInterface $params)
    {
        $this->cipher = $params->get('supp_core.administrativo_backend.crypto_cipher');
        $this->algo = $params->get('supp_core.administrativo_backend.crypto_algo');
        $this->key = $params->get('supp_core.administrativo_backend.crypto_key');
        $this->sha2len = $params->get('supp_core.administrativo_backend.crypto_sha2len');
    }

    /**
     * @param string $plaintext
     *
     * @return string
     *
     * @throws Exception
     */
    public function encrypt(string $plaintext): string
    {
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = random_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $this->cipher, $this->key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac($this->algo, $ciphertext_raw, $this->key, $as_binary = true);

        return base64_encode($iv.$hmac.$ciphertext_raw);
    }

    /**
     * @param string $ciphertext
     *
     * @return string
     */
    public function decrypt(string $ciphertext): string
    {
        $c = base64_decode($ciphertext);
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $this->sha2len);
        $ciphertext_raw = substr($c, $ivlen + $this->sha2len);
        $original_plaintext = openssl_decrypt(
            $ciphertext_raw,
            $this->cipher,
            $this->key,
            $options = OPENSSL_RAW_DATA,
            $iv
        );
        $calcmac = hash_hmac($this->algo, $ciphertext_raw, $this->key, $as_binary = true);
        if (!hash_equals($hmac, $calcmac)) {
            throw new RuntimeException('bad crypto');
        }

        return $original_plaintext;
    }
}
