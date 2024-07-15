@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Tài khoản quản trị</h3> <a href="{{ route('user-max', ['action' => 'toCreate']) }}"
                    class="btn btn-link">Thêm 📝</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Thêm tài khoản</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <style>
        .my-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%2392ac97' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
            animation: moveBackground 10s linear infinite;
            /* Gọi animation với tên moveBackground, thời gian 10s, kiểu linear, lặp vô hạn */
        }

        @keyframes moveBackground {
            0% {
                background-size: 50%;
                background-position: 0px 0px;
                background-color: #dfe5db;

                /* Vị trí bắt đầu */
            }

            50% {
                background-position: -100px -100px;
                background-size: 70%;
                background-color: #40612a;

                /* Vị trí kết thúc */
            }

            100% {
                background-size: 50%;
                background-position: 0px 0px;
                background-color: #dfe5db;

                /* Vị trí kết thúc */
            }
        }
    </style>
    <div class="row">
        <div class="col-xl-6 col-md-12 box-col-12">
            <div class="card">
                {{-- <div class="card-header pb-0">
                    <h4>...</h4>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Tên tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Quyền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @if ($item['role'] != '0')
                                        <tr>
                                            <td>
                                                {{ $item['phone'] }}
                                            </td>
                                            <td>
                                                {{ $item['password'] }}
                                            </td>
                                            <td>
                                                {{ $roles[$item['role']] }}
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a role="button"
                                                            href="{{ route('user-max', ['action' => 'toDetail', 'id' => $item['id']]) }}">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <a role="button" onclick="confirmToDelete(this)"
                                                            to="{{ route('user-max', ['action' => 'delete', 'id' => $item['id']]) }}">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
