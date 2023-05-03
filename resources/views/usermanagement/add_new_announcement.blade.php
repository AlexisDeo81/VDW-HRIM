
@extends('layouts.master')
@section('menu')
@extends('sidebar.usermanagement')
@endsection
@section('content')
<div id="main">
    <style>
        .avatar.avatar-im .avatar-content, .avatar.avatar-xl img {
            width: 40px !important;
            height: 40px !important;
            font-size: 1rem !important;
        }
        .form-group[class*=has-icon-].has-icon-lefts .form-select {
            padding-left: 2rem;
        }

    </style>
    
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New Announcement</h3>
                    <p class="text-subtitle text-muted">For admin to input the details for new announcement</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Announcement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Announcement Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                    <form class="form form-horizontal" action="{{ route('announcement/add/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                                <div class="row">

                  
                                <div class="col-md-4">
                                        <label>Subject</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" placeholder="Enter Subject">
                                                <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    

                                    <!-- <div class="col-md-4">
                                        <label>Announcement</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <textarea class="form-control edit @error('announcement') is-invalid @enderror" id="editor"
                                                rows="2" name="announcement"></textarea>
                                               
                                                @error('announcement')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-md-4">
                                        <label>Announcement</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <textarea class="form-control edit @error('announcement') is-invalid @enderror" id="editor"
                                                rows="2" name="announcement"></textarea>
                                               
                                                @error('announcement')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Display on Dashboard or Not</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="show_to_employees" id="show_to_employees" />
                                            <label class="form-check-label" for="flexRadioDefault1"> Show to Employee </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="show_to_employees" id="show_to_employees" checked />
                                            <label class="form-check-label" for="flexRadioDefault2"> Do not show to Employee</label>
                                        </div> 
                                                <!-- <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div> -->
                                                @error('show_to_employees')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <input type="hidden" name="posted_id" value="1">

                                    <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary me-1 mb-1">Add</button>
                                        <a  href="{{ route('announcement') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                   
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>

<script>
    var editor = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['link', 'image'],
            ['clean']
        ],
        imageDrop: true,
        imageResize: {
            displaySize: true
        },
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});

// handle image upload
editor.getModule('toolbar').addHandler('image', function() {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.onchange = function() {
        var file = input.files[0];
        var formData = new FormData();
        formData.append('image', file);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            url: '/upload-image',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var range = editor.getSelection(true);
                editor.insertEmbed(range.index, 'image', response.url);
            },
            error: function() {
                alert('Could not upload image');
            }
        });
    };
    input.click();
});
</script>
@endsection