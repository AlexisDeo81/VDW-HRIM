@extends('layouts.master')
@section('menu')
@extends('sidebar.employeemanagement')
@endsection
@section('content')
<style>
.node-text {
  display: inline-block;
  width: 10em;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
</style>
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
                    <h3>Announcement List</h3>
                    <p class="text-subtitle text-muted">For admin to check the list of Announcement</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Announcement Management</li>
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
                                <th>Subject</th>
                                <th>Posted By</th>
                                <th>Announcement</th>
                                <th>Posted at</th>
                                <th>Show</th>
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $item)
                                <tr>
                                
                                    <!-- <td class="id">{{ ++$key }}</td> -->
                            
                                  

                                    <td class="name">{{ $item->subject }}</td>
                                    
                                    
                                    <td class="name">Admin</td>
                                    <td class="node-text"><span class="" style="max-width: 120px;">
                                    {!! $item->announcement !!}
</span></td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                    @if($item->show =='0')
                                    <td class="status"><span class="bi bi-check-circle green-color"></span></td>
                                    @endif
                                    @if($item->show =='1')
                                    <td class=""><span class="bi bi-x-circle red-color"></span></td>
                                    @endif
                                    
                                    <td class="text-center">
                                        <a href="{{ url('announcement/add') }}">
                                            <span class="badge bg-success"><i class="bi bi-file-earmark-plus-fill"></i></span>
                                        </a>
                                        <a href="{{ url('viewAnnouncement/detail/'.$item->id) }}">
                                            <span class="badge bg-info"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        <a href="{{ url('deleteAnnouncement/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
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
