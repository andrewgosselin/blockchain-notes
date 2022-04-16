<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Network;

class FileBlob extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if(!isset($model->network)) {
                $model->network = config("network-config.selected_network");
            }
        });
    }

    protected $fillable = [
        "user_id", "cid", "name", "type", "network"
    ];

    public function getContentAttribute() {
        $client = Network::client();
        return $client->get($this->cid)["data"];
    }

    public function updateFile($content) {
        $client = Network::client();
        $response = $client->update($this->cid, $content);
        return $content;
    }

    public function upload($content) {
        $client = Network::client();
        $response = $client->store($content);
        $this->cid = $response["data"]["cid"];
        $this->save();
    }
}
