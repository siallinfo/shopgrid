@extends('admin.master')

@section('body')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Courier Module</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Courier Form</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-6 mx-auto">

                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-4">Edit Courier Form</h5>
                            </div>
                            <form action="{{route('courier.update', ['id' => $courier->id])}}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Courier Name</label>
                                    <input type="text" class="form-control" value="{{$courier->name}}" name="name" id="input1" placeholder="Courier Name">
                                </div>
                                <div class="col-md-12">
                                    <label for="input2" class="form-label">Courier Description</label>
                                    <textarea name="description" class="form-control" placeholder="Courier Description" id="" cols="30" rows="5">{{$courier->description}}</textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="input3" class="form-label">Courier Logo</label>
                                    <input type="file" name="image" class="form-control" id="input3" placeholder="Image">
                                    <img src="{{asset($courier->image)}}" alt="" height="50">
                                </div>
                                <div class="row mb-2">
                                    <label for="input3" class="col-md-3">Publication Status</label>
                                    <div class="form-group col-md-9">
                                        <label for=""><input type="radio" name="status" {{$courier->status == 1 ? 'checked' : ' '}} value="1"> Published</label>
                                        <label for=""><input type="radio" name="status" {{$courier->status == 0 ? 'checked' : ' '}} value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Update Courier Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div>
    </div>
    <!--end page wrapper -->
@endsection
