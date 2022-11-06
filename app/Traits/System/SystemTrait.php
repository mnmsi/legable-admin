<?php

namespace App\Traits\System;

use App\Models\System\Country;

trait SystemTrait
{
    public static $countyAttr = ['id', 'name', 'flag'];

    public function countries()
    {
        return Country::all();
    }

    public function manipulatedCountry()
    {
        return manipulate_sig_data($this->countries(), self::$countyAttr);
    }
}
