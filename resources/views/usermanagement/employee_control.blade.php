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
                    <h3>Employee List</h3>
                    <p class="text-subtitle text-muted">For admin to check the list of Employees</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Management</li>
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
                    Employee Data Table
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th></th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th>Job Title</th>
                                <th>Line Manager</th>
                                <th>User Level</th>
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                <td class="name">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->avatar) }}" alt="{{ $item->avatar }}">
                                        </div>
                                    </td>
                                    <!-- <td class="id">{{ ++$key }}</td> -->
                                    <td class="name">{{ $item->last_name }}</td>
                                    <td class="name">{{ $item->first_name }}</td>
                                    <td class="name">{{ $item->email }}</td>
                                    <td class="name">{{ $item->start_date }}</td>
                                    <td class="name">{{ $item->job_title }}</td>
                                    <td class="name">{{ $item->line_manager }}</td>
                                    @if($item->role_name =='Admin' || $item->role_name =='Hr' || $item->role_name =='Manager' || $item->role_name =='Team Leader' || $item->role_name =='Trainor')
                                    <td class="role_name"><span  class="badge bg-success">{{ $item->role_name }}</span></td>
                                    @endif
                                    @if($item->role_name =='Employee')
                                    <td class="role_name"><span  class=" badge bg-warning">{{ $item->role_name }}</span></td>
                                    @endif
                                    
                                    <!-- @if($item->status =='Active')
                                    <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status ==null)
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif -->
                                    

                                    <td class="text-center">
                                        <a href="{{ url('user/add/new') }}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a>
                                        <a href="{{ url('view/detail/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        <a href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
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
