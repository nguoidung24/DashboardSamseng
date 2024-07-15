@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Bài viết</h3> <a href="{{ route('posts-create') }}" class="btn btn-link">Thêm 📝</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Bài viết</li>
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
                                    <th>Tên</th>
                                    <th>Nội dung</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            {{ $item->post_name }}
                                        </td>
                                        <td>
                                            <div style="width: 350px; height: 300px; overflow: hidden">
                                                {!! $item->content !!}
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a
                                                        href="{{ route('posts-detail', ['id' => $item->post_id]) }}">
                                                        👁️
                                                    </a>
                                                </li>
                                                <li class="delete">
                                                    <a role="button" onclick="confirmToDelete(this)"
                                                        to="{{ route('posts-delete', ['id' => $item->post_id, 'action' => 'delete']) }}">
                                                        <i class="icon-trash"></i>
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
