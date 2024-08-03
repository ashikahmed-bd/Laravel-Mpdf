<?php

namespace Ashik\Pdf\Facades;

use Illuminate\Support\Facades\Facade;

class Pdf extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     * @see \Ashik\Pdf\Pdf
     */
    protected static function getFacadeAccessor(): string
    {
        return 'mpdf';
    }

}
