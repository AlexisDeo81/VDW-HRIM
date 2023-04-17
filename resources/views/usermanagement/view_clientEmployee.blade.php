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
                    <h3>Add New Client Employee</h3>
                    <p class="text-subtitle text-muted">For admin to input the details for Client Employee </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Client Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Client Employee Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('updateClientEmployee') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                <div class="col-md-4">
                                        <!-- <label>Photo</label> -->
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <!-- <div class="form-group has-icon-lefts">
                                            <div class="position-relative">
                                                <input type="file" class="form-control"
                                                placeholder="Name" id="first-name-icon" name="image"/>
                                                <div class="form-control-icon avatar avatar.avatar-im">
                                                    
                                                </div>
                                                <input type="hidden" name="hidden_image">
                                            </div>
                                        </div> -->
                                    </div>


                                    <div class="col-md-4">
                                        <label>Client</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select form-control-lg @error('client') is-invalid @enderror" name="client" id="client">
                                                    <option value="{{ $data[0]->client_id }}" {{ ( $data[0]->client_id == $data[0]->client_id) ? 'selected' : ''}}> 
                                                        {{ $data[0]->fname }} {{ $data[0]->lname }}
                                                    </option>
                                                    @foreach ($ClientEmployee as $key => $value)
                                                    <option value="{{ $value->id }}"> {{ $value->fname}} {{ $value->lname}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-shield-shaded"></i>
                                                </div>
                                                @error('client')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Employee</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select form-control-lg @error('employee') is-invalid @enderror" name="employee" id="employee">
                                                    <option value="{{ $data[0]->user_id }}" {{ ( $data[0]->user_id == $data[0]->user_id) ? 'selected' : ''}}> 
                                                        {{ $data[0]->first_name }} {{ $data[0]->last_name }}
                                                    </option>
                                                    @foreach ($employee as $key => $value)
                                                    <option value="{{ $value->id }}"> {{ $value->first_name}} {{ $value->last_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-shield-shaded"></i>
                                                </div>
                                                @error('client')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="date" class="form-control @error('startDate') is-invalid @enderror"
                                                    placeholder="" id="startDate" name="startDate" value="{{ $data[0]->start_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>
                                                @error('startDate')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>End Date</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="date" class="form-control @error('endDate') is-invalid @enderror"
                                                    placeholder="" id="endDate" name="endDate" value="{{ $data[0]->end_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>  
                                                @error('endDate')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('clientEmployee') }}"
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