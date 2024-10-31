<?php

declare(strict_types=1);
/**
 * /src/Utils/HTMLPurifier.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Utils;

use Exception;
use Throwable;

/**
 * Class HTMLPurifier.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class HTMLPurifier
{
    /**
     * @param $data
     *
     * @return string
     * @throws Exception
     */
    public function sanitize(string $data): ?string
    {
        try {
            if ($data) {
                $detectCharset = mb_detect_encoding($data, 'ASCII, UTF-8, ISO-8859-1');
                if (('UTF-8' !== $detectCharset)) {
                    $data = utf8_encode($data);
                }

                // Fix &entity\n;
                $data = str_replace(['&amp;', '&lt;', '&gt;'], ['&amp;amp;', '&amp;lt;', '&amp;gt;'], $data);
                $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
                $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
                $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

                // Remove any attribute starting with "on" or xmlns
                $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

                // Remove javascript: and vbscript: protocols
                $data = preg_replace(
                    '#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu',
                    '$1=$2nojavascript...',
                    $data
                );
                $data = preg_replace(
                    '#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu',
                    '$1=$2novbscript...',
                    $data
                );
                $data = preg_replace(
                    '#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u',
                    '$1=$2nomozbinding...',
                    $data
                );

                // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
                $data = preg_replace(
                    '#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i',
                    '$1>',
                    $data
                );
                $data = preg_replace(
                    '#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i',
                    '$1>',
                    $data
                );
                $data = preg_replace(
                    '#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu',
                    '$1>',
                    $data
                );

                $data = preg_replace(
                    '/<script.*>(\r|\n|.)*<\/script>/m',
                    '',
                    $data
                );

                // Remove namespaced elements (we do not need them)
                $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

                do {
                    // Remove really unwanted tags
                    $old_data = $data;
                    $data = preg_replace(
                        '#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|script|title|xml|\?xml)[^>]*+>#i',
                        '',
                        $data
                    );
                } while ($old_data !== $data);
            }
        } catch (Throwable) {
            throw new Exception('O arquivo é inseguro. Não é possível visualizá-lo.');
        }

        // we are done...
        return $data;
    }
}
