<?php

namespace NckRtl\DeBanensite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NckRtl\DeBanensite\DeBanensite
 */
class DeBanensite extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \NckRtl\DeBanensite\DeBanensite::class;
    }
}
