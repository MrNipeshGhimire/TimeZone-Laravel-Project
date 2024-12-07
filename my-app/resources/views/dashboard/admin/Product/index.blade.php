@extends('dashboard.adminLayout.main')
@push('title')
    <title>donerList</title>
@endpush
@section('main-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 fw-bold">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="d-flex justify-content-end m-2">
                    <a href="{{route('admin.products.create')}}"><button class="btn btn-primary">Add new Watch</button></a>
                </div>
                <div class="d-flex justify-content-end m-2">
                    {{-- <a href="{{ route('event.create') }}"><button class="btn btn-primary">Add Vehicle</button></a> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card pt-1">
                            {{-- <div class="card-header bg-primary mb-2">
                                <h3 class="card-title">Vehicles</h3>
                            </div> --}}
                            <!-- category display -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                           <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                @if ($item->brand_id != null)
                                    <td>{{ $item->brand_id }}
                                    </td>
                                @else
                                    <td>No Brand
                                    </td>
                                @endif
                               
                                @if ($item->category_id != null)
                                    <td>{{ $item->category_id }}
                                    </td>
                                @else
                                    <td>No Category
                                    </td>
                                @endif

                                <td>{{ $item->price }}
                                </td>
                                <td>{{ $item->description }}
                                </td>
                                
                                <td><img src="{{ asset($item->image) }}" alt="" height="100" width="100">
                                </td>


                                {{-- <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M120 256c0 30.9-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56zm160 0c0 30.9-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56zm104 56c-30.9 0-56-25.1-56-56s25.1-56 56-56s56 25.1 56 56s-25.1 56-56 56z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu mr-5" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.products.edit', $item->id) }}">Edit
                                            </a>

                                            <a class="dropdown-item"
                                                href="{{ route('admin.products.delete', $item->id) }}">Delete
                                            </a>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>  
                                                
                                                    
                                    <a href="{{ route('admin.products.edit', $item->id) }}"><button
                                            class="btn btn-primary btn-sm">View/Edit</button></a>
                                            
                                    <a href="{{ route('admin.products.delete', $item->id) }}"><button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure want to delete this Brand?')">Delete</button></a>
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
    </div>
@endsection
