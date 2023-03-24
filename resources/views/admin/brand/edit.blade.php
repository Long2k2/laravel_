@extends('layouts.admin');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <h4 class="d-flex align-items-center">Loại sản phẩm</h4>
                    <a href="{{ url('admin/brand') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Quay lại</a>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('admin/brand/' . $brand->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Cập nhật thương hiệu</label>
                            <input type="text" class="form-control" placeholder="Tên thương hiệu" name="name"
                                value="{{ $brand->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary text-light">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
