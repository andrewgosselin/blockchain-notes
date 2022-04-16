<?php

namespace App\Models\Networks;

use Illuminate\Support\Facades\Http;

class Web3
{
    private $config = null;
    private $url = null;
    private $token = null;
    function __construct() {
        $this->config = config("network-config.networks.web3");
        $this->url = $this->config["api"]["url"];
        $this->token = $this->config["api"]["token"];
    }

    public function store($content) {
        $response = Http::withHeaders(
            [
                "Authorization" => "Bearer " . $this->token
            ]
        )
        ->post($this->url . "/upload", $content);
        
        return [
            "data" => $response->json(),
            "meta" => [
                "success" => $response->successful()
            ]
        ];
    }

    public function update($file) {
        
    }

    public function get($cid) {
        $response = Http::get($cid . ".ipfs.dweb.link");
        
        return [
            "data" => $response->json(),
            "meta" => [
                "success" => $response->successful()
            ]
        ];
    }
}
