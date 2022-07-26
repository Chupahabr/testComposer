<?php

namespace Onpeak;

class Logger
{
    public static function LogFileCustom(
        $path,
        $value = false,
        $module = false
    ) {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/local/logs/' . $path;
        $arText = [
            'Host: ' . $_SERVER['SERVER_NAME'],
            'Date: ' . ConvertTimeStamp(false, "FULL"),
            'Module: ' . $module,
            print_r($value, true),
            'File: ' . $_SERVER['SCRIPT_FILENAME'],
            '----------',
            ''
        ];
        $text = implode("\n", $arText);
        $fOpen = fopen($file, 'a'); //Открываем файл или создаём если его нет
        fwrite($fOpen, $text); //Записываем
        fclose($fOpen);
    }

    public static function pr($str)
    {
        echo "<pre style='background: #eee;border: 1px solid #ccc; padding: 5px;'>" . print_r($str, 1) . "</pre>";
    }
}