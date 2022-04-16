<?php

return [
    "selected_network" => "web3",
    "networks" => [
        "web3" => [
            "class" => \App\Models\Networks\Web3::class,
            "api" => [
                "url" => "https://api.web3.storage",
                "token" => env("WEB3_API_TOKEN", null)
            ]
        ]
    ]
];