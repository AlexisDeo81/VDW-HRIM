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


        ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
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
                    <h3>Edit Employee</h3>
                    <p class="text-subtitle text-muted">For admin to change the details of existing employee</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
            <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h5 class="card-title">Horizontal Navs</h5>
                                </div> -->
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="basicinfo-tab" data-bs-toggle="tab" href="#basicinfo"
                                                role="tab" aria-controls="home" aria-selected="false">Basic Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <!-- <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Clients</a> -->
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="profile-tab"  href="{{ route('employeeManagement') }}"
                                                >Clientsss</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="contact-tab" data-bs-toggle="tab" href="#contact"
                                                role="tab" aria-controls="contact" aria-selected="true">Documents</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#employeenotes"
                                                role="tab" aria-controls="employeenotes" aria-selected="false">Employee Notes</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#password"
                                                role="tab" aria-controls="contact" aria-selected="false">Password</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="basicinfo" role="tabpanel"
                                            aria-labelledby="basicinfo">
                                            
                                           <br>

                                                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            
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
                                                    <img src="{{ URL::to('/images/'. $data[0]->avatar) }}">
                                                </div>
                                                <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="First Name" id="first-name-icon" name="first_name" value="{{ $data[0]->first_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="MiddleName" id="first-name-icon" name="middle_name" value="{{ $data[0]->middle_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="LastName" id="" name="last_name" value="{{ $data[0]->last_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <input type="email" class="form-control"
                                                    placeholder="Email" id="" name="email" value="{{ $data[0]->email }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope-fill"></i>
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
                                                <select class="form-select" name="line_manager" id="line_manager">
                                                    <option value="{{ $data[0]->line_manager }}" {{ ( $data[0]->line_manager == $data[0]->line_manager) ? 'selected' : ''}}> 
                                                        {{ $data[0]->line_manager }}
                                                    </option>
                                                    @foreach ($lineManager as $key => $value)
                                                    <option value="{{ $value->name }}"> {{ $value->name}}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-exclude"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="Card number" id="" name="maxicare_card_number" value="{{ $data[0]->maxicare_card_number }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-credit-card-2-back-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="Policy number" id="" name="maxicare_policy_number" value="{{ $data[0]->maxicare_policy_number }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-credit-card-2-front-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="Job Title" id="" name="job_title" value="{{ $data[0]->job_title }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <select class="form-select" name="job_status" id="job_status">
                                                    <option value="{{ $data[0]->job_status }}" {{ ( $data[0]->job_status == $data[0]->job_status) ? 'selected' : ''}}> 
                                                        {{ $data[0]->job_status }}
                                                    </option>
                                                    @foreach ($jobStatus as $key => $value)
                                                    <option value="{{ $value->name }}"> {{ $value->name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi bi-person-check-fill"></i>
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
                                                <select class="form-select" name="status" id="status">
                                                    <option value="{{ $data[0]->status }}" {{ ( $data[0]->status == $data[0]->status) ? 'selected' : ''}}> 
                                                        {{ $data[0]->status }}
                                                    </option>
                                                    @foreach ($userStatus as $key => $value)
                                                    <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
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
                                                <select class="form-select" name="role_name" id="role_name">
                                                    <option value="{{ $data[0]->role_name }}" {{ ( $data[0]->role_name == $data[0]->role_name) ? 'selected' : ''}}> 
                                                        {{ $data[0]->role_name }}
                                                    </option>
                                                    @foreach ($roleName as $key => $value)
                                                    <option value="{{ $value->role_type }}"> {{ $value->role_type }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-shield-shaded"></i>
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
                                                <input type="date" class="form-control"
                                                    placeholder="" id="start_date" name="start_date" value="{{ $data[0]->start_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
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
                                                <input type="date" class="form-control"
                                                    placeholder="" id="end_date" name="end_date" value="{{ $data[0]->end_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
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
                                                <input type="date" class="form-control"
                                                    placeholder="" id="end_date" name="end_date" value="{{ $data[0]->end_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Notes</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <!-- <input type="text" class="form-control"
                                                    placeholder="First Name" id="" name="notes" value="{{ $data[0]->notes }}"> -->
                                                    <textarea class="form-control" id="editor"
                                            rows="2" name="notes">{{ $data[0]->notes }}</textarea>
                                                <div class="form-control-icon">
                                                    <!-- <i class="bi bi-person-lines-fill"></i> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('userManagement') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                      </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <br>


                                            <div class="divider divider-left-center">
                                        <div class="divider-text">Skillset</div>

                                        <div class="row" id="table-striped">
                        <div class="col-12">
                            <div class="card">
                               
                                <div class="card-content">
                    
                                    <!-- table striped -->
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Link</th>
                                                    <th>Last Modified</th>
                                                    <th>Modified By</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                

                                                @if($data[0]->link_to_skills =='')
                                                <td>No Link</td>
                                                <td></td>
                                                <td></td>
                                                @else
                                                <td>
                                                <a href="{{ url($data[0]->link_to_skills)}}" target="_blank">
                                                <div class="card" style="width: 3em; height: 1.5em;">
                                                <img src="{{url('/extension/word.png')}}" >
                                                </div>
                                                </a>
                                                </td>
                                                <td>{{ $data[0]->skills_last_modified_date}}</td>
                                                <td>Admin</td>
                                                @endif

                                              
                                                   
                                                    <td><a href="{{ url('viewSkillset/detail/'.$data[0]->id) }}">
                                                <span class="badge bg-info"><i class="bi bi-pencil-square"></i></span>
                                                </a> </td>
                                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="divider divider-left-center">
                    <div class="divider-text">Current Client</div>

                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                    
                                <div class="card-content">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <!-- <th>ACTION</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                
                                <tr>
                                
                            

                                    <td class=""> {{ $client[0]->fname }} {{ $client[0]->lname }}</td>

                                    <td class="name">{{ $data[0]->start_date }}</td>
     

                                    @if($data[0]->end_date =='')
                                    <td class=""><span  class="badge bg-success">Ongoing</span></td>
                                    @else
                                    <td class="name">{{ $data[0]->end_date }}</td>
                                    @endif

                                    <td class="">
                                    <!-- <a href="">
                                            <span class="badge bg-secondary"><i class="bi bi-cloud-arrow-up-fill"></i></span>
                                        </a> -->
                                        <!-- <a href="{{ url('employeeDocuments/add') }}">
                                            <span class="badge bg-success"><i class="bi bi-file-earmark-plus-fill"></i></span>
                                        </a> -->
                                        <!-- <a href="">
                                            <span class="badge bg-info"><i class="bi bi-pencil-square"></i></span>
                                        </a>   -->
                                        <!-- <a href="" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> -->
                                        <!-- <a href="#" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> -->
                                    </td>
                                </tr>
            
                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="divider divider-left-center">
                    <div class="divider-text">Past Client</div>

                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                    
                                <div class="card-content">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>ACTION</th>
                                                    <th>ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($pastClient as $key => $item)
                                             <tr>
                                             <td class="name">{{ $item->fname }} {{ $item->lname}}</td>
                                             <td class="name">{{ $item->client_start_date }}</td>
                                             <td class="name">{{ $item->client_end_date }}</td>
                                             <td class="name">{{ $item->id }}</td>
                                             <td>
                                                
                                             <a href="{{ url('clientEmployeeDelete/'.$item->client_employ_id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                             </td>
                                             </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

    

              <!-- Client Tab -->
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('clientEmployee/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                <input type="hidden" name="employee" value="{{ $data[0]->id }}">
                                                    <div class="col-md-4 col-12">

                                                    <div class="form-group">
                                                        <label for="first-name-column">Full Name</label>
                                                        <select class="form-select form-control-lg @error('client') is-invalid @enderror" name="client" id="client">
                                                        <option selected disabled>Select Client</option>
                                                   
                                                @foreach ($client_list as $key => $value)
                                                    <option value="{{ $value->id }}"> {{ $value->fname}} {{ $value->lname}}</option>
                                                    @endforeach
                                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Start Date</label>
                                                        <input type="date" class="form-control form-control-lg @error('start_date') is-invalid @enderror" name="startDate" value="{{ old('start_date') }}">
                                                @error('startDate')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                    </div>
                                                </div>

                                               
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">End Date</label>
                                                        <input type="date" class="form-control @error('endDate') is-invalid @enderror"
                                                    placeholder="" id="endDate" name="endDate" value="{{ old('start_date') }}">
                                                <!-- <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>   -->
                                                @error('endDate')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                    </div>
                                                </div>
                                                
                                    
                                    <div class="col-md-8">
                        
                                    </div>
                                    <!-- <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
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
                                    <input type="hidden" name="end_date" value="{{ $data[0]->end_date }}"> -->
                                    

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Add</button>
                                        <a  href="{{ route('userManagement') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                      </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <br>
                                            <section class="section">
            <div class="card">
                <div class="card-header">
                    Employee Documents List
                </div>
                <div class="card-body">


                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Link</th>
                                                    <th>Last Modified</th>
                                                    <th>Modified By</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            @foreach ($employee_document as $key => $item)
                                <tr>
                                
                                    <!-- <td class="id">{{ ++$key }}</td> -->
                            
                                    @if($item->extension =='pdf')
                                    <td class="name">
                                        <div class="card" style="width: 3.5em; height: 2.5em;">
                                            <img src="{{url('/extension/pdf.png')}}" >
                                        </div>
                                    </td>
                                    @endif
                                    @if($item->extension =='xlsx')
                                    <td class="name">
                                        <div class="card" style="width: 3.5em; height: 2.5em;">
                                            <img src="{{url('/extension/xlsx.png')}}">
                                        </div>
                                    </td>
                                    @endif

                                    <td class="name">{{ $item->name }}</td>

                                    <td class="name">{{ $item->first_name }} {{$item->last_name}}</td>
                                    

                                   

                                    
                                    <td class="name">{{ $item->type}}</td>
                                

                                    <td class="text-center">
                                    <a href="{{ url('employeeDocument/download',$item->path) }}">
                                            <span class="badge bg-secondary"><i class="bi bi-cloud-arrow-up-fill"></i></span>
                                        </a>
                                        <!-- <a href="{{ url('employeeDocuments/add') }}">
                                            <span class="badge bg-success"><i class="bi bi-file-earmark-plus-fill"></i></span>
                                        </a> -->
                                        <a href="{{ url('viewDocument/detail/'.$item->id) }}">
                                            <span class="badge bg-info"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        <!-- <a href="#" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                                        </table>
                                    </div>
                </div>
            </div>
        </section>
                                            <div class="card-content">
                    <!-- <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('updateDocument') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
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
                                            <input class="form-control @error('file') is-invalid @enderror" name="path" type="file" id="path" multiple="" value="{{ $employee_document[0]->path }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi bi-person-check-fill"></i>
                                                </div>
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
                                                <input type="text" class="form-control"
                                                    placeholder="File Name" id="" name="name" value="{{ $employee_document[0]->name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                   
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <label for="formFile" class="form-label"><b>Display on Dashboard or Not</b></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="show_to_employee" id="show_to_employee" {{ ($employee_document[0]->show_to_employee=="0")? "checked" : "" }}/>
                                        <label class="form-check-label" for="flexRadioDefault1"> Display on Dashboard </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" name="show_to_employee" id="show_to_employee" {{ ($employee_document[0]->show_to_employee=="1")? "checked" : "" }}/>
                                        <label class="form-check-label" for="flexRadioDefault2"> Don't Display on Dashboard </label>
                                    </div>
                                    @error('show_to_employee')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    </div><br>
                                    

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a href="{{ route('employeeDocuments') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div> -->
                </div>
                                        </div>
                                        <div class="tab-pane fade" id="employeenotes" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <br>
                                        
                                    <div class="container mt-5 mb-5">
                                        <div class="row">
                                        <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($timeLine as $key => $item)
                                                <tr>
                                                <td>
                                                    <div class="">
                                                    <!-- <div class="col-md-9 offset-md-2"> -->
                                    <!-- <h4>Latest News</h4> -->
                                    <ul class="timeline">
                                        <li>
                                            <!-- <a target="_blank" href="https://www.totoprayogo.com/#"></a> -->
                                            <a href="#" class="float-right">{{ $item->created_at }}</a>
                                            <p>{!! $item->notes !!}</p>
                                            <div class="col-md-4 col-12">
                                            <div>
                                        </li>
                                        <!-- <li>
                                            <a href="#">Awesome Employers</a>
                                            <a href="#" class="float-right">1 April, 2014</a>
                                            <p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                                        </li> -->
                                    </ul>
                                </div>
                                </td>
                                <td><a href="{{ url('viewEmployeeNotes/detail/'.$item->id) }}">
                                    <span class="badge bg-info"><i class="bi bi-pencil-square"></i></span>
                                    </a>
                                    <a href="{{ url('employeeNotesDelete/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                </td>        
                                                </tr>
                                              @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Of Table !-->
                                    <form class="form form-horizontal" action="{{ route('employeeNotes/add/save') }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                    <div class="form-body">
                                        <div class="row">

                                <!-- <input type="hidden" name="employee" value="{{ $data[0]->id }}"> -->
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Example
                                            </label>
                                        <textarea class="form-control" id="editor"
                                            rows="3" name="notes"></textarea>
                                    </div>
                                </div>
                                                  

                            <!-- <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Start Date</label>
                                    <input type="date" class="form-control form-control-lg @error('start_date') is-invalid @enderror" name="startDate" value="{{ old('start_date') }}">
                            @error('startDate')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                                </div>
                            </div> -->

                                              
                       
                                
                                       
                                    
                                    <div class="col-md-8">
                        
                                    </div>
                             
                                    

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Add</button>
                                        <a  href="{{ route('userManagement') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                                        </div>
                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <br>
                                        
                                            <form method="POST" action="{{ route('change/password/db') }}" class="md-float-material">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('current_password') is-invalid @enderror" 
                            name="current_password" value="{{ old('current_password') }}" placeholder="Enter Old Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('new_password') is-invalid @enderror" 
                            name="new_password" placeholder="Enter Current Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg" name="new_confirm_password" placeholder="Choose Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Change Password</button>
                    </form>
                                        </div>
                                    </div>
                                </div>


                    

                <!-- <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            
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
                                                    <img src="{{ URL::to('/images/'. $data[0]->avatar) }}">
                                                </div>
                                                <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="First Name" id="first-name-icon" name="first_name" value="{{ $data[0]->first_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="MiddleName" id="first-name-icon" name="middle_name" value="{{ $data[0]->middle_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="LastName" id="" name="last_name" value="{{ $data[0]->last_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <input type="email" class="form-control"
                                                    placeholder="Email" id="" name="email" value="{{ $data[0]->email }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope-fill"></i>
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
                                                <select class="form-select" name="line_manager" id="line_manager">
                                                    <option value="{{ $data[0]->line_manager }}" {{ ( $data[0]->line_manager == $data[0]->line_manager) ? 'selected' : ''}}> 
                                                        {{ $data[0]->line_manager }}
                                                    </option>
                                                    @foreach ($lineManager as $key => $value)
                                                    <option value="{{ $value->name }}"> {{ $value->name}}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-exclude"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="Card number" id="" name="maxicare_card_number" value="{{ $data[0]->maxicare_card_number }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-credit-card-2-back-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="Policy number" id="" name="maxicare_policy_number" value="{{ $data[0]->maxicare_policy_number }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-credit-card-2-front-fill"></i>
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
                                                <input type="text" class="form-control"
                                                    placeholder="Job Title" id="" name="job_title" value="{{ $data[0]->job_title }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill"></i>
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
                                                <select class="form-select" name="job_status" id="job_status">
                                                    <option value="{{ $data[0]->job_status }}" {{ ( $data[0]->job_status == $data[0]->job_status) ? 'selected' : ''}}> 
                                                        {{ $data[0]->job_status }}
                                                    </option>
                                                    @foreach ($jobStatus as $key => $value)
                                                    <option value="{{ $value->name }}"> {{ $value->name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi bi-person-check-fill"></i>
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
                                                <select class="form-select" name="status" id="status">
                                                    <option value="{{ $data[0]->status }}" {{ ( $data[0]->status == $data[0]->status) ? 'selected' : ''}}> 
                                                        {{ $data[0]->status }}
                                                    </option>
                                                    @foreach ($userStatus as $key => $value)
                                                    <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
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
                                                <select class="form-select" name="role_name" id="role_name">
                                                    <option value="{{ $data[0]->role_name }}" {{ ( $data[0]->role_name == $data[0]->role_name) ? 'selected' : ''}}> 
                                                        {{ $data[0]->role_name }}
                                                    </option>
                                                    @foreach ($roleName as $key => $value)
                                                    <option value="{{ $value->role_type }}"> {{ $value->role_type }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-shield-shaded"></i>
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
                                                <input type="date" class="form-control"
                                                    placeholder="" id="start_date" name="start_date" value="{{ $data[0]->start_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
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
                                                <input type="date" class="form-control"
                                                    placeholder="" id="end_date" name="end_date" value="{{ $data[0]->end_date }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('userManagement') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection