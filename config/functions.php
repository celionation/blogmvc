<?php

function asset($url)
{
    $file_path = $url;
    $file_path = str_replace("\\", "/", $file_path);
    return str_replace("//", "/", $file_path);
}

/**
 * Die And Dump Function
 * For Debugging Code
 *
 * @param array $data
 * @param boolean $die
 * @return void
 */
function dnd(array $data = [], bool $die = true)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    if ($die) {
        die;
    }
}