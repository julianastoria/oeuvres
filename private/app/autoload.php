<?php
function autoload($directory, $fileRegEx)
{
    $directoryContent = scandir($directory);
    // var_dump($directoryContent);

    foreach ($directoryContent as $file) {
        if ( preg_match($fileRegEx, $file) ) {
            include_once $directory.$file;
        }
    }
}