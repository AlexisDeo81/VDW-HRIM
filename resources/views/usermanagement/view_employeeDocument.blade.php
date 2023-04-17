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
                    <h3>Edit Employee Document</h3>
                    <p class="text-subtitle text-muted">For admin to change the details of existing employee document</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Employee Document</li>
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
                    <form class="form form-horizontal" action="{{ route('updateEmployeeDocument') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $employee_document[0]->id }}">
                            
                            <div class="form-body">
                                <div class="row">
                        
                    
                                @foreach ($employee_document as $key => $item)
                        
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
                                
                                <div class="col-md-4">
                                        <label>Select File</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                            <input class="form-control @error('path') is-invalid @enderror" name="path" type="file" id="path" multiple="" value="{{ $employee_document[0]->path }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi bi-person-check-fill"></i>
                                                </div>
                                                @error('path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>

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
                                        <label>File Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-select @error('name') is-invalid @enderror"
                                                    placeholder="File Name" id="" name="name" value="{{ $employee_document[0]->name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <select class="form-select @error('employee_name') is-invalid @enderror" name="user_name" id="user_id">
                                                <option selected disabled>Select Employee Name</option>
                                                @foreach ($employee as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->first_name .' '. $value->last_name}}</option>
                                                @endforeach  
                                    
                                                </select>
                                                <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div>
                                                @error('employee_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-md-4">
                                        <label>Type</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                            <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
                                            <option selected disabled>Document Type</option>
                                            <option value="Evaluation">Evaluation</option>
                                            <option value="Memo">Memo</option>
                                            <option value="Onboarding">Onboarding</option>
                                            </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('type')
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
                                            <input class="form-check-input" type="radio" value="0" name="show_to_employee" id="show_to_employee" {{ ($employee_document[0]->show_to_employee=="0")? "checked" : "" }}/>
                                            <label class="form-check-label" for="flexRadioDefault1"> Display on Dashboard </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="show_to_employee" id="show_to_employee" {{ ($employee_document[0]->show_to_employee=="1")? "checked" : "" }}/>
                                            <label class="form-check-label" for="flexRadioDefault2"> Don't Display on Dashboard </label>
                                        </div>
                                                <!-- <div class="form-control-icon">
                                                <i class="bi bi-person-square"></i>
                                                </div> -->
                                                @error('show_to_employee')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>
                        
                                  
                                    </div><br>
                                    <input class="form-control @error('uploaded_by') is-invalid @enderror" name="uploaded_by" value="{{ $employee_document[0]->uploaded_by }}" type="hidden" id="uploaded_by" placeholder="Enter File Name">
                                    <input class="form-control @error('uploaded_by') is-invalid @enderror" name="user_id" value="{{ $employee_document[0]->user_id }}" type="hidden" id="employee_id" placeholder="">


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a href="{{ route('employeeDocuments') }}"
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