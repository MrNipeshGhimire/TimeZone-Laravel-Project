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
                        <h1 class="m-0 fw-bold">Manage Brands</h1>
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add Brand</button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                           
                            <!-- category display -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Brand</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <th>{{$loop->index + 1}}</th>
                                                <td>{{ $item->name }}</td>
                                                {{-- <td>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('category.activeinactive', $item->id) }}"><span
                                                                class="badge badge-success">Active</span></a>
                                                    @else
                                                        <a href="{{ route('category.activeinactive', $item->id) }}"><span
                                                                class="badge badge-danger">Inactive</span></a>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $item->created_at }}</td>
                                                <td>  
                                                    <a href="{{ route('brand.edit', $item->id) }}"><button
                                                            class="btn btn-primary btn-sm">Edit</button></a>
                                                            
                                                    <a href="{{ route('brand.delete', $item->id) }}"><button
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('brandStore')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category">Brand Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Brand Name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
