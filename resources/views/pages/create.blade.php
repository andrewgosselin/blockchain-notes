<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<div class="container h-100">
    <div class="row mt-4" style="height: 100%;">
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nameInput">
                <label for="nameInput">Name</label>
            </div>
            <textarea id="noteEditor" style="height: 60%;"></textarea>
            <div style="height: 5%; padding-top: 15px;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="showPublicCheckbox" checked>
                    <label class="form-check-label" for="showPublicCheckbox">
                        Show publicly (shows in the "public notes" section)
                    </label>
                </div>
            </div>
            <div style="height: 15%; padding-top: 15px;">
                <button type="button" class="btn btn-success" onclick="saveNote()">Create</button>
            </div>
        </div>
        <div class="col-sm-2 ml-2" id="publicNotes">
            @include("partials.public-notes")
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea#noteEditor'
    });

    function saveNote() {
        let data = {
            "owner_type": "anonymous",
            "name": $("#nameInput").val(),
            "content": tinymce.get("noteEditor").getContent(),
            "show_public": $("#showPublicCheckbox").is(":checked")
        };
        if(data.name == "") {
            toastr.error("Missing the name field.", "You must fill in all fields.");
            return;
        }
        if(data.content == "") {
            toastr.error("Missing the content field.", "You must fill in all fields.");
            return;
        }
        toastr.info("Saving note...");
        $.ajax({
           type:'POST',
           url:"{{ route('notes.store') }}",
           data: data,
           success:function(data){
               toastr.success("Note saved!");
              window.location.href = "/notes/" + data.parent_id
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
</script>