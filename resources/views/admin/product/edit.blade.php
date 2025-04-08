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
                            <li class="breadcrumb-item active" aria-current="page">Edit Product Form</li>
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
                                <h5 class="mb-4">Edit Product Form</h5>
                            </div>
                            <h5 class="text-center text-success">{{session('message')}}</h5>
                            <form action="{{route('product.update', ['id' => $product->id])}}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="input7" class="form-label">Category Name</label>
                                    <select name="category_id" id="category" class="form-select" onchange="getSubCategoryByCategory(this.value)">
                                        <option value="">Choose...</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @selected($category->id == $product->category_id)>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="input7" class="form-label">Sub-Category Name</label>
                                    <select name="sub_category_id" id="subCategory" class="form-select">
                                        <option value="">Choose...</option>
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}" @selected($sub_category->id == $product->sub_category_id)>{{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="input7" class="form-label">Brand Name</label>
                                    <select id="input7" name="brand_id" class="form-select">
                                        <option value="">Choose...</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @selected($brand->id == $product->brand_id)>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="input7" class="form-label">Unit Name</label>
                                    <select id="input7" name="unit_id" class="form-select">
                                        <option value="">Choose...</option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" @selected($unit->id == $product->unit_id)>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" value="{{$product->name}}" name="name" id="input1" placeholder="Product Name">
                                </div>
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Product Code</label>
                                    <input type="text" class="form-control" value="{{$product->code}}" name="code" id="input1" placeholder="Product Code">
                                </div>
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Product Price</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{$product->regular_price}}" name="regular_price" placeholder="Regular Price">
                                            <input type="text" class="form-control" value="{{$product->selling_price}}" name="selling_price" placeholder="Selling Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Stock Amount</label>
                                    <input type="text" class="form-control" value="{{$product->stock}}" name="stock" id="input1" placeholder="Stock Amount">
                                </div>
                                <div class="col-md-12">
                                    <label for="input2" class="form-label">Short Description</label>
                                    <textarea name="short_description" class="form-control" placeholder="Product Short Description" id="" cols="30" rows="3">{{$product->short_description}}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="input2" class="form-label">Long Description</label>
                                    <textarea name="long_description" class="form-control" id="editor" cols="30" rows="5">{{$product->long_description}}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="input2" class="form-label">Meta Title</label>
                                    <textarea name="meta_title" class="form-control" placeholder="Product Short Description" id="" cols="30" rows="3">{{$product->meta_title}}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="input2" class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="editor" cols="30" rows="5">{{$product->meta_description}}</textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="input3" class="form-label">Product Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{asset($product->image)}}" alt="" height="50">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="input3" class="form-label">Product Other Image</label>
                                    <input type="file" multiple name="other_image[]" class="form-control">
                                    @foreach($product->otherImage as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" height="50">
                                    @endforeach
                                </div>
                                <div class="row mb-2">
                                    <label for="input3" class="col-md-3">Publication Status</label>
                                    <div class="form-group col-md-9">
                                        <label for=""><input type="radio" name="status" {{$product->status == 1 ? 'checked' : ' '}} value="1"> Published</label>
                                        <label for=""><input type="radio" name="status" {{$product->status == 0 ? 'checked' : ' '}} value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Update Product Info</button>
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
