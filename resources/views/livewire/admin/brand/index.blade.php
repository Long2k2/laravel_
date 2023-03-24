<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <h4 class="d-flex align-items-center">Danh sách Banner</h4>
                <a href="{{ url('admin/brand/create') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên thương hiệu</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($brands as $brand )
                            <tr>
                                <th>{{$brand->name}}</th>
                                <th>
                                    @if ($brand->status == 1)
                                        {{ 'Hoạt động' }}
                                    @else
                                        {{ 'Ẩn' }}
                                    @endif
                                </th>
                                <th>
                                    <a href="{{ url('admin/brand/' . $brand->id . '/edit') }}"
                                        class="btn btn-info">Sửa</a>
                                        <a
                                        href="{{ url('admin/brand/' . $brand->id . '/delete') }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Bạn có muốn xóa thương hiệu {{$brand->name}}?')"
                                        >Xóa</a>
                                </th>
                            </tr>

                        @endforeach
                       </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
