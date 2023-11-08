<?php

namespace Nckrtl\DeBanensite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nckrtl\DeBanensite\DeBanensite
 */
class DeBanensite extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Nckrtl\DeBanensite\DeBanensite::class;
    }
}
