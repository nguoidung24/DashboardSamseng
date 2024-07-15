@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Màu sản phẩm</h3> <a href="{{route('color-create')}}" class="btn btn-link">Thêm 📝</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Color</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
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
                                    <th>Màu</th>
                                    <th>Tên</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <p class="text-center">
                                                <svg style="border: 1px solid black;" class="bd-placeholder-img flex-shrink-0 me-2 rounded"
                                                    width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                                                    role="img" aria-label="Placeholder: 32x32"
                                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                                    <title>Placeholder</title>
                                                    <rect width="50px" height="50px" fill="<?= $item['code'] ?>">
                                                    </rect>
                                                </svg>
                                            </p>

                                        </td>
                                        <td>
                                            {{ $item['value'] }}
                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{route('color-detail',['id' => $item['color_id']])}}">
                                                        👁️
                                                    </a>
                                                </li>
                                                <li class="edit">
                                                    <a href="">
                                                <li class="delete">
                                                    <a role="button" onclick="confirmToDelete(this)" to="{{route('color-detail',['id' => $item['color_id'],'action' => 'delete'])}}">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                </li>
                                                </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
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
