<?php

namespace AguPessoas\Backend\Helper;

use DateTime;
class DataHelper
{
    public static function converterData($dataString)
    {
        $formato = 'd/m/Y';
        $data = DateTime::createFromFormat($formato, $dataString);

        if ($data === false) {
            throw new \Exception('Formato de data inválido');
        }

        return $data;
    }
}