<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <h4 class="d-flex align-items-center">Loại sản phẩm</h4>
                <a href="{{ url('admin/category/create') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Danh mục cha</th>
                                <th>Tên loại sản phẩm</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th>{{ $category->id }}</th>
                                    <th>
                                        {{ \App\Http\Controllers\CategoryController::getParentsTree($category, $category->title) }}
                                    </th>
                                    <th>{{ $category->title }}</th>
                                    <th>
                                        @if ($category->status == 1)
                                            {{ 'Hoạt động' }}
                                        @else
                                            {{ 'Ẩn' }}
                                        @endif
                                    </th>
                                    <th>
                                        <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                            class="btn btn-info">Sửa</a>
                                            <a
                                            href="{{ url('admin/category/' . $category->id . '/delete') }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Bạn có muốn xóa {{$category->title}}?')"
                                            >Xóa</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
