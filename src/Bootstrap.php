<?php

require_once dirname(__DIR__) . '/vendor/decodelabs/genesis/src/Bootstrap/Seamless.php';

use DecodeLabs\Genesis\Bootstrap\Seamless;
use DecodeLabs\Fabric\Genesis\Hub;

new Seamless(
    hubClass: Hub::class
)->run();
