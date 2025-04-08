@extends('admin.master')

@section('body')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product Module</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
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
                        <div class="card-header border-bottom d-flex justify-content-between">
                            <h5 class="card-title">Product Detail Information</h5>
                            <div>
                                <a href="{{route('product.index')}}" class="btn btn-sm btn-primary" title="Back"><i class='bx bx-arrow-back'></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Product Id</th>
                                    <td>{{$product->id}}</td>
                                </tr>
                                <tr>
                                    <th>Product Category</th>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Sub Category</th>
                                    <td>{{isset($product->subCategory->name) ? $product->subCategory->name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Product Brand</th>
                                    <td>{{$product->brand->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Unit</th>
                                    <td>{{$product->unit->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Code</th>
                                    <td>{{$product->code}}</td>
                                </tr>
                                <tr>
                                    <th>Product Stock Amount</th>
                                    <td>{{$product->stock}} {{$product->unit->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Regular Price</th>
                                    <td>৳ {{number_format($product->regular_price, 2)}}</td>
                                </tr>
                                <tr>
                                    <th>Product Selling Price</th>
                                    <td>৳ {{number_format($product->selling_price, 2)}}</td>
                                </tr>
                                <tr>
                                    <th>Product Short Description</th>
                                    <td>{{$product->short_description}}</td>
                                </tr>
                                <tr>
                                    <th>Product Long Description</th>
                                    <td>{!! $product->long_description !!}</td>
                                </tr>
                                <tr>
                                    <th>Product Image</th>
                                    <td><img src="{{asset($product->image)}}" alt="" height="100"/></td>
                                </tr>
                                <tr>
                                    <th>Product Hit Count</th>
                                    <td>{{$product->hit_count}}</td>
                                </tr>
                                <tr>
                                    <th>Product Sales Count</th>
                                    <td>{{$product->sales_count}}</td>
                                </tr>
                                <tr>
                                    <th>Product Feature Status</th>
                                    <td>{{$product->feature_status}}</td>
                                </tr>
                                <tr>
                                    <th>Product Publication Status</th>
                                    <td>{{$product->status}}</td>
                                </tr>
                                <tr>
                                    <th>Product Other Image</th>
                                    <td>
                                        @foreach($product->otherImage as $otherImage)
                                            <img src="{{asset($otherImage->image)}}" alt="" height="50"/>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
