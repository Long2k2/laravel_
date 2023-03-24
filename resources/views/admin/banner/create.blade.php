@extends('layouts.admin');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <h4 class="d-flex align-items-center">Danh sách Banner</h4>
                    <a href="{{ url('admin/banner/') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Quay lại</a>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('admin/banner/') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên banner</label>
                            <input type="text" class="form-control" placeholder="Tên banner" name="title">
                            <label>Ảnh</label>
                            <input type="file" class="form-control file-upload-info" placeholder="Ảnh" name="image">
                            <label>Miêu tả</label>
                            <input type="text" class="form-control" placeholder="Miêu tả banner" name="description">
                        </div>
                        <button type="submit" class="btn btn-primary text-light">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
