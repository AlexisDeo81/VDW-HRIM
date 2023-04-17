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
                    <h3>General Document List</h3>
                    <p class="text-subtitle text-muted">For admin to check the list of general documents</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">General Documents Management</li>
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
                    General Documents Data Table
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Employee</th>
                                <th>Type</th>
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
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
                                    

                                    @if($item->show_to_employees =='0')
                                    <td class="status"><span class="bi bi-check-circle green-color"></span></td>
                                    @endif
                                    @if($item->show_to_employees =='1')
                                    <td class=""><span class="bi bi-x-circle red-color"></span></td>
                                    @endif
                                    
                                    @if($item->type =='1')
                                    <td class=""><span class="bi bi-check-circle green-color"></span></td>
                                    @endif
                                    @if($item->type =='0')
                                    <td class=""><span class="bi bi-x-circle red-color"></span></td>
                                    @endif

                                    <td class="name">{{ $item->created_at}}</td>
                                

                                    <td class="text-center">
                                        <a href="{{ url('gDocument/download',$item->path) }}">
                                            <span class="badge bg-secondary"><i class="bi bi-cloud-arrow-up-fill"></i></span>
                                        </a>
                                        <a href="{{ url('generalDocuments/add') }}">
                                            <span class="badge bg-success"><i class="bi bi-file-earmark-plus-fill"></i></span>
                                        </a>
                                        <a href="{{ url('view/generalDocumentDetail/'.$item->id) }}">
                                            <span class="badge bg-info"><i class="bi bi-pencil-square"></i></span>
                                        </a>
                                        <a href="{{ url('delete_document/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
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
