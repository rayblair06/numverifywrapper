<?php

namespace Rayblair\NumverifyWrapper;

use GuzzleHttp\Client;

class BaseService {
    public $url = "http://apilayer.net/api/validate";
    public $api_key = "";
    public $query;
    public $number;
    public $country_code;

    public function __construct($data = [""])
    {
        $this->url = $data["url"] ?? $this->url;
        $this->api_key = $data["api_key"] ?? "";
    }

    public function get()
    {
        try {
            $client = new Client();
            $res = $client->get($this->url, $this->buildQuery());
        } catch (\Exception $e) {
            $response = $e->getMessage();

            return $response;
        }

        return json_decode($res->getBody());
    }

    public function buildQuery()
    {
        $this->query = [
            "query" => [
                "access_key" => $this->api_key,
            ]
        ];

        $this->query["query"]["number"] = $this->number ?? "";
        $this->query["query"]["country_code"] = $this->country_code ?? "";

        return $this->query;
    }

    public function clearQuery()
    {
        $this->query = "";
    }
}
