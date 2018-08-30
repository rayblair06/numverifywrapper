<?php

if (!function_exists("numverify")) {
    function numverify($number = null, $country_code = null)
    {
        $numverify = resolve('Numverify');

        return $numverify
                    ->setNumber($number)
                    ->setCountryCode($country_code)
                    ->verify();
    }
}
