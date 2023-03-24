@extends('layouts.admin');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <h4 class="d-flex align-items-center">Thêm thương hiệu</h4>
                    <a href="{{ url('admin/brand/') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Quay lại</a>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('admin/brand/') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <input type="text" class="form-control" placeholder="Tên thương hiệu" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary text-light">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
