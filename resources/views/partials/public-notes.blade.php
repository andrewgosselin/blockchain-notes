<style>
.ellipsis {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>
<div class="card" style="width: 18rem; height: 80%;">
    <div class="card-body">
        <h5 class="card-title">Public Notes</h5>
        <button type="button" class="btn btn-sm btn-primary" style="position: absolute; top: 10px; right: 10px;" onclick="refreshPublic()">Refresh</button>
        <h6 class="card-subtitle mt-1 mb-2 text-muted">Updated {{date("Y-m-d H:i:s")}}</h6>
        <ul>
            @foreach(\App\Models\File::where("show_public", true)->get() as $file)
                <li style="list-style: none;">
                    <a href="/notes/{{$file->parent_id}}" class="ellipsis">{{$file->name}}</a>
                </li>
            @endforeach
        </ul>
        {{-- <button type="button" class="btn btn-sm btn-primary" href="/notes/all">Show All</button> --}}
    </div>
</div>