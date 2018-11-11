<?php

namespace Guru\Store\Facades;

use Illuminate\Support\Facades\Facade;

class Store extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'store';
    }
}
