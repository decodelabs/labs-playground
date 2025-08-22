<?php

use DecodeLabs\Dovetail\Env;
use DecodeLabs\Playground;

return [
    'mode' => Env::asString('ENV_MODE', 'production'),
    'name' => Env::asString('ENV_NAME', 'production'),
    'appNamespace' => Playground::class, // @phpstan-ignore-line
    'localDataPath' => 'data/local',
    'sharedDataPath' => 'data/shared'
];
