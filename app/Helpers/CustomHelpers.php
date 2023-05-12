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
        if (isset($valueLabelMap[strtolower($option)])) {
            return CustomHelpers::$valueLabelMap[$option];
        }
        return strtoupper($option);
    }

}
