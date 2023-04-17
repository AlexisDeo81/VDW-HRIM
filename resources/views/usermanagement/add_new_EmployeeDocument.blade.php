
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
                    <h3>Add New Employee Document</h3>
                    <p class="text-subtitle text-muted">For admin to input the details for new employee document</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Employee Document</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee Document Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                    <form class="form form-horizontal" action="{{ route('employeeDocument/add/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                                <div class="row">

                               
                                    
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
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" placeholder="Enter File Name">
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
                                        <label>Employee</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <select class="form-select @error('user_name') is-invalid @enderror" name="user_name" id="user_id">
                                                <option selected disabled>Select Employee Name</option>
                                                @foreach ($employee as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->first_name .' '. $value->last_name}}</option>
                                                @endforeach  
                                    
                                                </select>
                                                <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div>
                                                @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Document Type</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
                                                    <option selected disabled>Document Type</option>
                                                    <option value="Evaluation">Evaluation</option>
                                                    <option value="Memo">Memo</option>
                                                    <option value="Onboarding">Onboarding</option>
                                    
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-check-fill"></i>
                                                </div>
                                                @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </fieldset>
                                                <!-- <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    



                                    <div class="col-md-4">
                                        <label>Show to Employee or Not</label>
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

                                  
                                    
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input class="form-control @error('uploaded_by') is-invalid @enderror" name="uploaded_by" value="1" type="hidden" id="uploaded_by" placeholder="Enter File Name">
                                        @error('uploaded_by')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                     </div>
                                    

                                    <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary me-1 mb-1">Add</button>
                                        <a  href="{{ route('employeeDocuments') }}"
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
