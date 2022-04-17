<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function public() {
        return view('partials.public-notes')->render();
    }

    public function index() {

    }
    public function show($id) {
        $file = \App\Models\File::where("owner_type", "anonymous")->where("parent_id", $id)->first();
        if(!isset($file)) {
            abort(404, "Note not found.");
        }
        $fileArray = $file->toArray();
        $fileArray["content"] = $file->content;
        return view("pages.notes.show")
            ->with("fileArray", $fileArray);
    }
    public function show_raw($id) {
        $file = \App\Models\File::where("owner_type", "anonymous")->where("parent_id", $id)->first();
        if(!isset($file)) {
            abort(404, "Note not found.");
        }
        return $file->content;
    }
    public function store() {
        request()->validate([
            'owner_type' => 'required|string',
            'name' => 'required|string',
            'content' => 'required|string'
        ]);
        $model = new \App\Models\File();
        $model->owner_type = request()->get("owner_type");
        if(request()->get("owner_type") == "anonymous") {
            $model->parent_id = uniqid();
        } else {
            $model->parent_id = \Auth::user()->id;
        }
        $model->show_public = request()->get("show_public") === 'true'? true : false;
        $model->name = request()->get("name");
        $model->type = "txt";
        $model->upload(request()->get("content"));
        return $model->toArray();
    }
    public function update() {

    }
    public function destroy() {

    }
}
