<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <h4 class="d-flex align-items-center">Danh sách Banner</h4>
                <a href="{{ url('admin/banner/create') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên banner</th>
                                <th>Ảnh</th>
                                <th>Miêu tả</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <th>{{ $banner->id }}</th>
                                    <th>{{ $banner->title }}</th>
                                    <th><img src="{{ asset("$banner->image ") }}" alt="{{ $banner->title }}"
                                            style="width: 250px;"></th>
                                    <th>
                                        {{ $banner->description }}
                                    </th>
                                    <th>
                                        @if ($banner->status == 1)
                                            {{ 'Hoạt động' }}
                                        @else
                                            {{ 'Ẩn' }}
                                        @endif
                                    </th>
                                    <th>
                                        <a href="{{ url('admin/banner/' . $banner->id . '/edit') }}"
                                            class="btn btn-info">Sửa</a>
                                        <a href="{{ url('admin/banner/' . $banner->id . '/delete') }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Bạn có muốn xóa {{$banner->title}}?')">Xóa</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $banners->links() }}
            </div>
        </div>
    </div>
</div>
