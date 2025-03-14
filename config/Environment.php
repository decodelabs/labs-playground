<?php

use DecodeLabs\Dovetail;
use DecodeLabs\Playground;

return [
    'mode' => Dovetail::envString('ENV_MODE', 'production'),
    'name' => Dovetail::envString('ENV_NAME'),
    'appNamespace' => Playground::class, // @phpstan-ignore-line
    'appName' => 'DecodeLabs Playground',
    'localDataPath' => 'data/local',
    'sharedDataPath' => 'data/shared'
];
