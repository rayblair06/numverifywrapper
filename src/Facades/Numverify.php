<?php
namespace Rayblair\NumverifyWrapper\Facades;

use \Illuminate\Support\Facades\Facade;

class Numverify extends Facade {

    protected static function getFacadeAccessor() {
        return 'Numverify';
    }
}
