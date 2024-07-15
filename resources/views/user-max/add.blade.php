@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Thêm mới tài khoản</h3>
                <a href="{{ route('user-max') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Tài khoản quản trị</li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <form action="{{ route('user-max') }}" method="POST" class="card">
        @csrf
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col mt-3">
                    <label for="">Tên tài khoản<span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="phone" type="text" placeholder="Tên tài khoản">
                </div>
                <div class="col mt-3">
                    <label for="">Mật khẩu<span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="password" type="text" placeholder="Mật khẩu">
                </div>
                <div class="col mt-3">
                    <label for="">Quyền<span class="text-danger">(*)</span></label>
                    <select required name="role" class="form-select">
                        @foreach ($roles as $key => $value)
                            <option value="<?= $key ?>"><?= $value ?></option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">
                Thêm
            </button>
            <input type="hidden" name="action" value="create">
            <a href="{{ route('user-max') }}" class="ms-3">Hủy</a>
        </div>
    </form>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
