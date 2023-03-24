<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <h4 class="d-flex align-items-center">Danh sách sản phẩm</h4>
                <a href="{{ url('admin/product/create') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Thương hiệu</th>
                                <th>SL</th>
                                <th>Giá(VND)</th>
                                <th>Ảnh</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                    <th>{{ $product->id }}</th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->category->title }}</th>
                                    <th>{{ $product->brand->name }}</th>
                                    <th>{{ $product->quantity }}</th>
                                    <th>{{ number_format($product->price) }}</th>
                                    <th>
                                        <img src="{{ asset($product->image->image)}}"
                                            alt="" style="width:150px">
                                    </th>
                                    <th>
                                        @if ($product->status == 1)
                                            {{ 'Hoạt động' }}
                                        @else
                                            {{ 'Ngừng kinh doanh' }}
                                        @endif
                                    </th>

                                    <th>
                                        <a href="{{ url('admin/product/' . $product->id . '/edit') }}"
                                            class="btn btn-info">Sửa</a>
                                        <a href="{{ url('admin/product/' . $product->id . '/delete') }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Bạn có muốn xóa {{ $product->title }}?')">Xóa</a>
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
