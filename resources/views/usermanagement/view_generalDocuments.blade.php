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
                    <h3>Edit General Documents</h3>
                    <p class="text-subtitle text-muted">For admin to change the details of existing general document</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit General Documents</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General Document Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        
                    <form class="form form-horizontal" action="{{ route('updateDocument') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            
                            <div class="form-body">
                                <div class="row">

                               
                                @foreach ($data as $key => $item)

@if($item->extension =='pdf')
<div class="col-md-4">
        <label>File Type</label>
    </div>
    <div class="col-md-8">
        <div class="form-group has-icon-left">
            <div class="position-relative">
            <div class="avatar avatar-xl">
                <img src="{{url('/extension/pdf.png')}}">
            </div>
                <div class="form-control-icon">
                    <i class=""></i>
                </div>
            </div>
        </div>
    </div>
@endif
@if($item->extension =='xlsx')
<div class="col-md-4">
        <label>File Type</label>
    </div>
    <div class="col-md-8">
        <div class="form-group has-icon-left">
            <div class="position-relative">
            <div class="avatar avatar-xl">
                <img src="{{url('/extension/xlsx.png')}}">
            </div>
                <div class="form-control-icon">
                    <i class=""></i>
                </div>
            </div>
        </div>
    </div>
@endif

@endforeach

                                    <div class="col-md-4">
                                        <label>File</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <input class="form-control @error('path') is-invalid @enderror" name="path" type="file" id="path" multiple="">
                                                <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div>
                                                @error('path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>File Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" placeholder="Enter File Name" value="{{ $data[0]->name }}">
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
                                        <label>Display on Dashboard or Not</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="show_to_employees" id="show_to_employees" {{ ($data[0]->show_to_employees=="0")? "checked" : "" }}/>
                                            <label class="form-check-label" for="flexRadioDefault1"> Display on Dashboard </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="show_to_employees" id="show_to_employees" {{ ($data[0]->show_to_employees=="1")? "checked" : "" }}/>
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


                                    <div class="col-md-4">
                                        <label>Display For Traning or Not</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="type" id="type" {{ ($data[0]->type=="1")? "checked" : "" }}/>
                                            <label class="form-check-label" for="flexRadioDefault1"> For Training </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="type" id="type" {{ ($data[0]->type=="0")? "checked" : "" }} />
                                            <label class="form-check-label" for="flexRadioDefault2"> Not for training </label>
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

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input class="form-control @error('uploaded_by') is-invalid @enderror" name="uploaded_by" value="1" type="hidden" id="uploaded_by" placeholder="Enter File Name">
                                        @error('uploaded_by')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" id="my-button"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('generalDocuments') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection