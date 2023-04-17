
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
                    <h3>Edit Announcement</h3>
                    <p class="text-subtitle text-muted">For admin to change the data of existing announcement</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Announcement</li>
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

                    <form class="form form-horizontal" action="{{ route('updateAnnouncement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                    <div class="form-body">
                                <div class="row">

                               
                                    
                                <div class="col-md-4">
                                        <label>Subject</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data[0]->subject }}" type="text" id="name" placeholder="Enter Subject">
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


                                    

                                    <div class="col-md-4">
                                        <label>Announcement</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <textarea class="form-control edit @error('announcement') is-invalid @enderror" id="editor"
                                                rows="2" name="announcement">{!! $data[0]->announcement !!}</textarea>
                                               
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
                                            <input class="form-check-input" type="radio" value="0" name="show_to_employees" id="show_to_employees" {{ ($data[0]->show=="0")? "checked" : "" }}/>
                                            <label class="form-check-label" for="flexRadioDefault1"> Display on Dashboard </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="show_to_employees" id="show_to_employees" {{ ($data[0]->show=="1")? "checked" : "" }}/>
                                            <label class="form-check-label" for="flexRadioDefault2"> Don't Display on Dashboard </label>
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
                                    <button class="btn btn-primary me-1 mb-1">Update</button>
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
@endsection