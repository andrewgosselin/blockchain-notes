<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index() {

    }
    public function show($id) {
        $file = \App\Models\File::findOrFail($id);
        $fileArray = $file->toArray();
        $fileArray["content"] = $file->content;
        return $fileArray;
    }
    public function store() {
        $model = new \App\Models\File();
        $model->user_id = \Auth::user()->id;
        $model->name = request()->get("name");
        $model->type = request()->get("type");
        $model->upload(request()->get("content"));
    }
    public function update() {

    }
    public function destroy() {

    }
}
