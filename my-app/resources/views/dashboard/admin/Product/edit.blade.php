@extends('dashboard.adminLayout.main')

<style>
    .alert {
        color: red;
    }

    .thumb-image {
        float: left;
        width: 100px;
        position: relative;
        padding: 5px;
        height: 100px;
    }
</style>
@push('title')
    <title>users</title>
@endpush
@section('main-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Product</h1>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$products->title}}"
                                        placeholder="Enter Title">
                                        @error('title')
                                        <div class="alert">{{ $message }}</div>
                                    @enderror 
                                </div>
                                
                                <div class="col-6 form-group">
                                    <label for="category">Brand</label>
                                    <select class="custom-select form-control-border border-width-2" name="brand_id">
                                        <option selected disabled >Select Brand name </option>
                                        @foreach ($brands as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                    {{-- @if ($errors->has('category'))
                                    <span class="text-danger">{{$errors->first('category')}}</span>
                                    @endif --}}
                                </div>
                                <div class="col-6 form-group">
                                    <label for="category">Category</label>
                                    <select class="custom-select form-control-border border-width-2" name="category_id">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categorys as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                    @foreach ($categorys as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                                </div>
                              
                               
                              
                                <div class="col-6 form-group">
                                    <label for="name">Set a Price</label>
                                    <input type="text" name="price" class="form-control" value="{{$products->price}}"
                                        placeholder="Enter price"> 
                                        @error('price')
                                        <div class="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                                <div class="col-12 form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" placeholder="description">{{$products->description}} </textarea>
                                    @error('description')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                                </div>
                                {{-- <input type="hidden" value="admin" name="addedBy"> --}}
                              
                              
                                <div class="col-12 form-group">
                                    <label for="image">Image </label>
                                    <input type="file" class="form-control" name="image" value="" placeholder="">
                                    {{-- @error('image')
                                    <div class="alert">{{ $message }}</div>
                                @enderror --}}
                                </div>
                              
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
