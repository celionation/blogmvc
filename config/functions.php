<?php


function asset($url)
{
    $file_path = $url;
    $file_path = str_replace("\\", "/", $file_path);
    return str_replace("//", "/", $file_path);
}