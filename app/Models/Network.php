<?php

namespace App\Models;

class Network
{
    public static function client($network = null) {
        if($network == null) {
            $network = config("network-config.selected_network");
        }
        $networks = config("network-config.networks");
        if(array_key_exists($network, $networks)) {
            return new $networks[$network]["class"]();
        } else {
            abort(404, "Network not supported.");
        }
    }
}
