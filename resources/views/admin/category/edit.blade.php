@extends('layouts.admin');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <h4 class="d-flex align-items-center">Loại sản phẩm</h4>
                    <a href="{{ url('admin/category') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Quay lại</a>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('admin/category/' . $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tên loại sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Loại sản phẩm" name="title"
                                value="{{ $category->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục phụ</label>
                            <select class="form-group" name="parent_id">
                                <option value="0">Không danh mục phụ</option>
                                @foreach ($s_categories as $s_category)
                                    <option value="{{ $s_category->id }}">{{ $s_category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary text-light">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
