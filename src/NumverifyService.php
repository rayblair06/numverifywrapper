<?php

namespace Rayblair\NumverifyWrapper;

class NumverifyService extends BaseService {
    public function __construct($data = [""])
    {
        parent::__construct($data);
    }

    public function verify($number = null, $country_code = null)
    {
        $this->number = $number ?? $this->number;
        $this->country_code = $country_code ?? $this->country_code;

        $response = $this->get();
        $this->clearQuery();

        return $response;
    }

    public function isValid()
    {
        $response = $this->get();
        $this->clearQuery();

        if (property_exists($response, "success")) {
            if (!$response->success) {
                return $response;
            }
        }

        return $response->valid;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
        return $this;
    }
}
