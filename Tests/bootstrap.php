<?php
/**
 * @Author: Michał Kurzeja, Accesto
 * User: michal
 * Date: 05.10.13
 * Time: 19:50
 */

if (!is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
    throw new \LogicException('Could not find autoload.php in vendor/. Did you run "composer install --dev"?');
}

require $autoloadFile;
