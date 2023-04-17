
@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form method="POST" action="{{ route('register') }}" class="md-float-material">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" placeholder="Enter Middle Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('line_manager')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('maxicare_card_number') is-invalid @enderror" name="maxicare_card_number" value="{{ old('maxicare_card_number') }}" placeholder="Enter Card Number">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('maxicare_card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('maxicare_policy_number') is-invalid @enderror" name="maxicare_policy_number" value="{{ old('maxicare_policy_number') }}" placeholder="Enter Policy Number">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('maxicare_card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" placeholder="Enter Job Title">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('job_status') is-invalid @enderror" name="job_status" id="job_status">
                                    <option selected disabled>Job Status</option>
                                    <option value="Probationary">Probationary</option>
                                    <option value="Regular">Regular</option>
    
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('job_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                    <option selected disabled>Employment Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                    
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        {{-- insert defaults --}}
                        <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
                        <input type="hidden" class="form-control form-control-lg" name="password" value="vdw1234">


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
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="date" class="form-control form-control-lg @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" placeholder="Start Date">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="date" class="form-control form-control-lg @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" placeholder="End Date">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                        
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}"
                        class="font-bold">Login</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
@endsection

