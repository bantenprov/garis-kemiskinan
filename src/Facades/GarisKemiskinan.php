<?php

namespace Bantenprov\GarisKemiskinan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The GarisKemiskinan facade.
 *
 * @package Bantenprov\GarisKemiskinan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class GarisKemiskinanFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'garis-kemiskinan';
    }
}
