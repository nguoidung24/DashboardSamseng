@include('layouts.header')

<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Thêm mới màu sản phẩm</h3>
                <a href="{{ route('color') }}" class="btn btn-link">
                    <i class="fa fa-hand-o-left" aria-hidden="true"></i> Quay lại
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Color</li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <form method="POST" class="card">
        @csrf
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col mt-3">
                    <label class="form-label">Màu<span class="text-danger">(*)</span></label>
                    <input type="color" name="code" class="form-control form-control-color" value="#563d7c" title="Chọn màu">
                </div>
                <div class="col mt-3">
                    <label for="">Tên màu<span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="value" type="text" placeholder="Tên danh mục">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">
                Thêm
            </button>
            <input type="hidden" name="action" value="create">
            <a href="{{ route('color') }}" class="ms-3">Hủy</a>
        </div>
    </form>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
