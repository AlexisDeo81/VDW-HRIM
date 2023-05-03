@extends('layouts.master')
@section('menu')
@extends('sidebar.employeemanagement')
@endsection
@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Client List</h3>
                    <p class="text-subtitle text-muted">For admin to check the list of clients</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Client Management</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Client Data Table
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <!-- <th></th> -->
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Email Address</th>
                                <th>Skype</th>
                                <th>Company</th>
                                <!-- <th>Job Description</th> -->
                                <th>Job Status</th>
                                <th>Start Date</th>
                                <!-- <th>End Date</th> -->
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                
                                    <!-- <td class="id">{{ ++$key }}</td> -->
                                    <td class="name">{{ $item->lname }}</td>
                                    <td class="name">{{ $item->fname }}</td>
                                    <!-- <td class="name">{{ $item->email_address }}</td> -->
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 200px;">{{ $item->email_address}}</span></td>
                                    <td class="name">{{ $item->skype}}</td>
                                    <td class="name">{{ $item->company_name}}</td>
                                    <!-- <td class=""><span class="d-inline-block text-truncate" style="max-width: 50px;">{{$item->job_description}}</span></td> -->
                                    <td class="name">{{ $item->status}}</td>
                                    <td class="name">{{ $item->start_date }}</td>
                                    <!-- <td class="name">{{ $item->end_date }}</td> -->
                                    
                                

                                    <td class="text-center">
                                        <a href="{{ url('client/add/new') }}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a>
                                       
                                        <a href="{{ url('view/clientDetail/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        <!-- <a href="" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

</div>
@endsection
