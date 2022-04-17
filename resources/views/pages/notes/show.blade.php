@extends("layouts.app")

@section("content")
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<div class="container h-100">
    <div class="row mt-4" style="height: 100%;">
        <div class="col" style="position: relative;">
            <h3>{{$fileArray["name"]}}</h3>
            <a type="button" class="btn btn-sm btn-info" style="position: absolute; top: 5px; right: 20px;" onclick="copyUrl()">Copy URL</a>
            <a type="button" class="btn btn-sm btn-primary" style="position: absolute; top: 5px; right: 115px;" href="/notes/{{$fileArray['parent_id']}}/raw" target="_blank">Raw</a>
            <textarea id="noteEditor" style="height: 75%;">
                {{$fileArray["content"]}}
            </textarea>
        </div>
        <div class="col-sm-2 ml-2" id="publicNotes">
            @include("partials.public-notes")
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea#noteEditor',
        readonly: true,
        menubar: false,
        toolbar: false
    });

    function copyUrl() {
        copyStringToClipboard(window.location.href);
        toastr.info("Copied URL to clipboard!");
    }

    function saveNote() {
        $.ajax({
           type:'POST',
           url:"{{ route('notes.store') }}",
           data: {
               "owner_type": "anonymous",
               "name": $("#nameInput").val(),
               "content": tinymce.get("noteEditor").getContent(),
               "show_public": $("#showPublicCheckbox").is(":checked")
           },
           success:function(data){
              window.location.reload();
           }
        });
    }
    function refreshPublic() {
        $.ajax({
           type:'GET',
           url:"{{ route('notes.public') }}",
           success:function(data){
              $("#publicNotes").html(data);
           }
        });
    }

    function copyStringToClipboard (str) {
        // Create new element
        var el = document.createElement('textarea');
        // Set value (string to be copied)
        el.value = str;
        // Set non-editable to avoid focus and move outside of view
        el.setAttribute('readonly', '');
        el.style = {position: 'absolute', left: '-9999px'};
        document.body.appendChild(el);
        // Select text inside element
        el.select();
        // Copy text to clipboard
        document.execCommand('copy');
        // Remove temporary element
        document.body.removeChild(el);
    }
</script>
@endsection