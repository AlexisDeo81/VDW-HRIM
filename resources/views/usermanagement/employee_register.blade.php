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
                    <h3>Employee Management</h3>
                    <p class="text-subtitle text-muted">Input employee information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Mangement View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new employee</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form method="POST" action="{{ route('user/add/save') }}" class="md-float-material" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-body">
                                <div class="row">
                                <div class="col-md-4">
                                        <label>Photo</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-lefts">
                                            <div class="position-relative">
                                                <input type="file" class="form-control"
                                                placeholder="Name" id="first-name-icon" name="image"/>
                                                <div class="form-control-icon avatar avatar.avatar-im">
                                                </div>
                                                <input type="hidden" name="hidden_image" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"
                                                    placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Middle Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-lg @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}"
                                                    placeholder="Middle Name" name="middle_name" value="{{ old('first_name') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                                    placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-4">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    placeholder="Email"  name="email" value="{{ old('email') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="col-md-4">
                                        <label>Line Manager</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select @error('line_manager') is-invalid @enderror" name="line_manager" id="line_manager">
                                                    <option selected disabled>Select Line Manager</option>
                                                    <option value="Joel Rey Bueno">Joel Rey Bueno</option>
                                                    <option value="Leo Angelo Lisondra">Leo Angelo Lisondra</option>
                                                    <option value="Evelyn Obenza">Evelyn Obenza</option>
                                                    <option value="John Paul Gazmin">John Paul Gazmin</option>
                                                    <option value="Chau Lim">Chau Lim</option>
                                                    <option value="Rob O'Byrne">Rob O'Byrne</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Card Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-lg @error('maxicare_card_number') is-invalid @enderror"
                                                    placeholder="Card number" name="maxicare_card_number" value="{{ old('maxicare_card_number') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Policy/ID number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-lg @error('maxicare_policy_number') is-invalid @enderror"
                                                    placeholder="Policy number" name="maxicare_policy_number" value="{{ old('maxicare_policy_number') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Job Title</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control form-control-lg @error('job_title') is-invalid @enderror"
                                                    placeholder="Job Title" name="job_title" value="{{ old('job_title') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-4">
                                        <label>Job Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select @error('job_status') is-invalid @enderror" name="job_status" id="job_status">
                                                    <option selected disabled>Job Status</option>
                                                    <option value="Probationary">Probationary</option>
                                                    <option value="Regular">Regular</option>
    
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Employment Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                                    <option selected disabled>Employment Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                    
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>User Level</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                                    <option selected disabled>Select User Level</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="HR">HR</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Team Leader">Team Leader</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Trainor">Trainor</option>
                                                    <option value="Normal User">Normal User</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="date" class="form-control form-control-lg @error('start_date') is-invalid @enderror"
                                                    placeholder="" name="start_date" value="{{ old('start_date') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    <div class="col-md-4">
                                        <label>End Date</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="date" class="form-control form-control-lg @error('end_date') is-invalid @enderror"
                                                    placeholder="" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="hidden" value="vdw1234" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Choose Password">
                                        <div class="form-control-icon">
                                        <!-- <i class="bi bi-shield-lock"></i> -->
                                        </div>
                                    </div>

                               <!-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="hidden" class="form-control form-control-lg" value="vdw1234" name="password_confirmation" placeholder="Choose Confirm Password">
                                        <div class="form-control-icon">
                                        <i class="bi bi-shield-check"></i>
                                        </div>
                                    </div> -->

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Create</button>
                                        <a  href="{{ route('userManagement') }}"
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