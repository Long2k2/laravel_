@extends('layouts.admin');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <h4 class="d-flex align-items-center">Thêm sản phẩm</h4>
                    <a href="{{ url('admin/product/') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Quay lại</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-info">
                            @foreach ($errors->all() as $error )
                                <div class=" mt-2">{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Thông tinh chính</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Ảnh Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab"
                                    aria-controls="messages" aria-selected="false">Giá & Ưu đãi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" id="settings-tab" data-toggle="tab" href="#settings"
                                    role="tab" aria-controls="settings" aria-selected="false">SEO</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mt-3">
                                    <label>Loại sản phẩm</label>
                                    <select name="category_id" class="form-control-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label>Thương hiệu</label>
                                    <select name="brand_id" class="form-control-sm">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name">
                                </div>
                                <div class="mt-3">
                                    <label>Mô tả sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Mô tả sản phẩm"
                                        name="description">
                                </div>
                                <div class="mt-3">
                                    <label>Mô tả ngắn</label>
                                    <input type="text" class="form-control" placeholder="Mô tả ngắn"
                                        name="small_description">
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-3">
                                    <label for="">Ảnh sản phẩm</label>
                                    <input type="file" name="image[]" multiple class="form-control ">
                                </div>

                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">Số lượng</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Giá</label>
                                        <input type="number" class="form-control" name="price" >
                                    </div>
                                    <div class="col-4">
                                        <label for="">Giá ưu đãi</label>
                                        <input type="number" class="form-control" name="selling_price" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="form-check-label">Xu hướng</label>
                                        <input type="checkbox" class="form-check-input" name="trending">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                SEO
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success mt-5">Thêm sản phẩm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        $('#myTab a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
        $('#myTab a[href="#profile"]').tab('show') // Select tab by name
        $('#myTab li:first-child a').tab('show') // Select first tab
        $('#myTab li:last-child a').tab('show') // Select last tab
        $('#myTab li:nth-child(3) a').tab('show') // Select third tab
    </script>
@endsection
