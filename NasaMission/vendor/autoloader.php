<?php

spl_autoload_register(function ($className) {
    $className = str_replace(['app\\', "\\"], ['', DIRECTORY_SEPARATOR], $className);

	require_once("{$className}.php");
});