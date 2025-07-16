<?php

require_once dirname(__DIR__) . '/vendor/decodelabs/genesis/src/Bootstrap/Seamless.php';

use DecodeLabs\Fabric\Genesis\Hub;
use DecodeLabs\Genesis\Bootstrap\Seamless;

new Seamless(
    hubClass: Hub::class
)->run();
