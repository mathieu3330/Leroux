<?php

namespace App\Helpers;

class CustomHelpers
{
    public static $valueLabelMap = [
        'c' => 'Conforme',
        'nc' => 'Non conforme',
        'so' => 'Sans objet'
    ];    

    public static function mapToLabel($option)
    {
        if (array_key_exists($option, CustomHelpers::$valueLabelMap)) {
            return CustomHelpers::$valueLabelMap[strtolower($option)];
        }
        return strtoupper($option);
    }

}
