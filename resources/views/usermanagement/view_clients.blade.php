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
                    <h3>Edit Client</h3>
                    <p class="text-subtitle text-muted">For admin to change the details of existing client</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Client Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('updateClient') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            
                            <div class="form-body">
                                <div class="row">
                              
                                  

                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                                    placeholder="First Name" id="fname" name="fname" value="{{ $data[0]->fname }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('fname')
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
                                                <input type="text" class="form-control @error('lname') is-invalid @enderror"
                                                    placeholder="Last Name" id="" name="lname" value="{{ $data[0]->lname }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('lname')
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
                                                <input type="email" class="form-control @error('email_address') is-invalid @enderror"
                                                    placeholder="Email" id="" name="email_address" value="{{ $data[0]->email_address }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                                @error('email_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Skype</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('skype') is-invalid @enderror"
                                                    placeholder="Skype" id="" name="skype" value="{{ $data[0]->skype }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-square"></i>
                                                </div>
                                                @error('skype')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>Company Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                                    placeholder="Company Name" id="" name="company_name" value="{{ $data[0]->company_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                                @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Job Description</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('job_description') is-invalid @enderror"
                                                    placeholder="Job Description" id="" name="job_description" value="{{ $data[0]->job_description }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-briefcase-fill"></i>
                                                </div>
                                                @error('job_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Client Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                                    <option value="{{ $data[0]->status }}" {{ ( $data[0]->status == $data[0]->status) ? 'selected' : ''}}> 
                                                        {{ $data[0]->status }}
                                                    </option>
                                                    @foreach ($userStatus as $key => $value)
                                                    <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-check-fill"></i>
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
                                        <label>Start Date</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                                    placeholder="Start Date" id="start_date" name="start_date" value="{{ $data[0]->start_date }}">
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
                                                    placeholder="" id="end_date" name="end_date" value="{{ $data[0]->end_date }}">
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

                                    <!-- <div class="col-md-4">
                                        <label>Notes</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Skype" id="" name="notes" value="{{ $data[0]->notes }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-inboxes-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-md-4">
                                        <label>Notes</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                
                                                <textarea class="form-control edit @error('notes') is-invalid @enderror" id="editor5"
                                                rows="2" name="notes">{{$data[0]->notes}}</textarea>
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

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('clientManagement') }}"
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

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor5' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection