<?php

namespace MBLSolutions\SimfoniRetailLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getName()
 * @method static string getEmail()
 * @method static string getRole()
 *
 * @see SimfoniRetailAuthentication
 */
class SimfoniRetailAuthFacade extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return SimfoniRetailAuthentication::class;
    }
}