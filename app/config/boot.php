<?php

Yii::setAlias('@public', dirname(__DIR__, 2).'/public_html');

/**
 * @param mixed $value
 * @param bool $return
 * @return string
 */
function dump($value, $return=true)
{
    ob_start();
    var_dump($value);
    $html = '<pre>' . ob_get_clean() . '</pre>';
    if ($return) {
        return $html;
    }
    echo $html;
}
