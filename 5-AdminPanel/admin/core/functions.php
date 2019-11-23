<?php
function getExtension($filename){
    $parts = explode('.', $filename);
    return $parts[count($parts) - 1];
}
