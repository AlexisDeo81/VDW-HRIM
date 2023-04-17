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
                        <form class="form form-horizontal" action="{{ route('updateSkillset') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-body">
                                <div class="row">
                        
                                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                   
                                    <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                    <input type="hidden" name="first_name" value="{{ $data[0]->first_name }}">
                                    <input type="hidden" name="middle_name" value="{{ $data[0]->middle_name }}">
                                    <input type="hidden" name="last_name" value="{{ $data[0]->last_name }}">
                                    <input type="hidden" name="email" value="{{ $data[0]->email }}">
                                    <input type="hidden" name="line_manager" value="{{ $data[0]->line_manager }}">
                                    <input type="hidden" name="maxicare_card_number" value="{{ $data[0]->maxicare_card_number }}">
                                    <input type="hidden" name="maxicare_policy_number" value="{{ $data[0]->maxicare_policy_number }}">
                                    <input type="hidden" name="job_title" value="{{ $data[0]->job_title }}">
                                    <input type="hidden" name="job_status" value="{{ $data[0]->job_status }}">
                                    <input type="hidden" name="status" value="{{ $data[0]->status }}">
                                    <input type="hidden" name="role_name" value="{{ $data[0]->role_name }}">
                                    <input type="hidden" name="start_date" value="{{ $data[0]->start_date }}">
                                    <input type="hidden" name="end_date" value="{{ $data[0]->end_date }}">
                               
                                <div class="col-md-4">
                                        <label>Link</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-select form-control-lg @error('link_to_skills') is-invalid @enderror"
                                                    placeholder="https://example.com/skills" id="" name="link_to_skills" value="{{ $data[0]->link_to_skills }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('link_to_skills')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Confirm</button>
                                        <a href="{{ url('view/detail/'.$data[0]->id) }}"
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