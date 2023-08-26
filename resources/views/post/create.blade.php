@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <form id="createPost" action="{{route('post.create_put')}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="row mb-3 ">
            <div class="col">
                <h4 class="card-title">Create Post</h4>
            </div>
            <div class="col text-end">
                <input class="btn btn-primary" type="submit" value="Create">
                <a class="btn btn-secondary" href="{{$backurl}}">Cancel</a>
            </div>
        </div>
  
        <div class="form-group mb-3 text-middle">
            <label for="image">Featured Image</label>
            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;">
            <input class="form-control form-control-lg" id="image" type="file" name="image" accept="image/png, image/gif, image/jpeg" onchange="previewImage(event)">
        </div>
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <input type="hidden" id="hiddenContent" name="content" />
            <textarea class="form-control witheditor" id="content" rows="4"></textarea>
        </div>

    </form>
</div>

 
<script type="text/javascript">   


    document.addEventListener("DOMContentLoaded", function () {

        const editor = SUNEDITOR.create((document.getElementById("content") || 'sample'+countEditor),{
            // All of the plugins are loaded in the "window.SUNEDITOR" object in dist/suneditor.min.js file
            // Insert options
            // Language global object (default: en)
            lang: SUNEDITOR_LANG['end'],
            buttonList: [
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['align', 'font', 'formatBlock', 'fontSize'],
                ['fontColor', 'hiliteColor'],
                ['outdent', 'indent', 'list', 'table'],
                ['link',],
                ['fullScreen', 'showBlocks', 'codeView'],
                ['preview', 'print'],
            ],
        });
        
        const hiddenContentField = document.getElementById('hiddenContent');
        editor.onChange = (contents) => {
            hiddenContentField.value = contents;
        };
    
    });

    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const input = event.target;
        const file = input.files[0];
    
        if (file) {
            imagePreview.style.display = 'block';
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
            imagePreview.src = '#';
        }
    }
</script>

@endsection