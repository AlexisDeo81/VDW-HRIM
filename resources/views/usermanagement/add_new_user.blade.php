
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
                    <h3>Add New Employee</h3>
                    <p class="text-subtitle text-muted">For admin to input the details for new employee</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                   <form class="form form-horizontal" action="{{ route('user/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            
                            <div class="form-body">
                                <div class="row">

                                <div class="col-md-4">
                                        <label>Photo</label>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-lefts">
                                            <div class="position-relative">
                                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                placeholder="Name" id="my-photo" name="image"/>
                                                <div class="form-control-icon avatar avatar.avatar-im">
                                                 
                                                </div>
                                                <input type="hidden" name="hidden_image">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                                    placeholder="First Name" id="my-input" name="first_name">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Middle Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('middle_name') is-invalid @enderror"
                                                    placeholder="MiddleName" id="my-input" name="middle_name">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                    placeholder="LastName" id="my-input" name="last_name">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-4">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email" id="my-input" name="email">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
                                                @foreach ($lineManager as $key => $value)
                                                <option value="{{ $value->name }}"> {{ $value->name}}</option>
                                                @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-exclude"></i>
                                                </div>
                                                @error('line_manager')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Card Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('maxicare_card_number') is-invalid @enderror"
                                                    placeholder="Card number" id="my-input" name="maxicare_card_number">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-credit-card-2-back-fill"></i>
                                                </div>
                                                @error('maxicare_card_number')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Policy/ID number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('maxicare_policy_number') is-invalid @enderror"
                                                    placeholder="Policy number" id="my-input" name="maxicare_policy_number">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-credit-card-2-front-fill"></i>
                                                </div>
                                                @error('maxicare_policy_number')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Job Title</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                                                    placeholder="Job Title" id="my-input" name="job_title">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('job_title')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
                                                @foreach ($jobStatus as $key => $value)
                                                <option value="{{ $value->name }}"> {{ $value->name}}</option>
                                                @endforeach 

                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi bi-person-check-fill"></i>
                                                </div>
                                                @error('job_status')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
                                                @foreach ($employStat as $key => $value)
                                                <option value="{{ $value->type_name }}"> {{ $value->type_name}}</option>
                                                @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
                                                @foreach ($userLevel as $key => $value)
                                                <option value="{{ $value->role_type }}"> {{ $value->role_type}}</option>
                                                @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-shield-shaded"></i>
                                                </div>
                                                @error('role_name')
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
                                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                                    placeholder="" id="my-input" name="start_date">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>
                                                @error('start_date')
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
                                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                                    placeholder="" id="my-input" name="end_date">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>
                                                @error('end_date')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="col-md-4">
                                        <label>Notes</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                
                                                <textarea class="form-control edit @error('notes') is-invalid @enderror" id="editor4"
                                                rows="2" name="notes"></textarea>
                                                <div class="form-control-icon">
                                                    <!-- <i class="bi bi-person-lines-fill"></i> -->
                                                </div>
                                                @error('notes')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="hidden" value="vdw1234" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Choose Password">
                                    <div class="form-control-icon">
                                    <!-- <i class="bi bi-shield-lock"></i> -->
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="hidden" class="form-control form-control-lg" value="vdw1234" name="password_confirmation" placeholder="Choose Confirm Password">
                                        <div class="form-control-icon">
                                            <!-- <i class="bi bi-shield-check"></i> -->
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" id="my-button"
                                            class="btn btn-primary me-1 mb-1">Add</button>
                                        <a  href="{{ route('userManagement') }}"
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor4' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
    $('#my-photo').on('change', function() {
        $('#my-button').prop('disabled', false);
    });
    </script>
@endsection