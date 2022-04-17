<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Network;

class File extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if(!isset($model->network)) {
                $model->network = config("network-config.selected_network");
            }
        });

        self::deleting(function($model) {
            $model->remove();
            abort(500);
        });
    }

    protected $fillable = [
        "owner_type", "parent_id", "cid", "name", "type", "network"
    ];

    public function getContentAttribute() {
        $client = Network::client();
        return $client->get($this->cid)["data"];
    }

    public function revise($content) {
        $client = Network::client();
        $response = $client->update($this->cid, $content);
        $this->cid = $response["data"]["cid"];
        $this->save();
        return $content;
    }

    public function upload($content) {
        $client = Network::client();
        $response = $client->store($content);
        $this->cid = $response["data"]["cid"];
        $this->save();
    }

    public function remove() {
        $client = Network::client();
        $response = $client->destroy($this->cid);
    }
}
