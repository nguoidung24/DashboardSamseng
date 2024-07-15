@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Banner</h3> <a href="{{ route('banner-create') }}" class="btn btn-link">Thêm 📝</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Banner</li>
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
                                    <th>Type</th>
                                    <th>Mobie</th>
                                    <th>Desktop</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            {{ $item['type'] }}
                                        </td>
                                        <td>
                                            @if ($item['type'] == 'video')
                                                <video width="50px">
                                                    <source src="{{ explode('$tach_ra$', $item['image'])[1] }}"
                                                        type="video/mp4">
                                                </video>
                                            @else
                                                <img style="width: 50px"
                                                    src="<?= isset(explode('$tach_ra$', $item['image'])[1]) ?  explode('$tach_ra$', $item['image'])[1] : '' ?>" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item['type'] == 'video')
                                                <video width="50px">
                                                    <source src="{{ explode('$tach_ra$', $item['image'])[0] }}"
                                                        type="video/mp4">
                                                </video>
                                            @else
                                                <img style="width: 50px"
                                                    src="{{ explode('$tach_ra$', $item['image'])[0] }}" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item['title'] }}
                                        </td>
                                        <td>
                                            @if ($item['subtitle'])
                                                {{ $item['title'] }}
                                            @else
                                                - Không hiển thị -
                                            @endif

                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="delete">
                                                    <a role="button" onclick="confirmToDelete(this)"
                                                        to="{{ route('banner-delete', ['id' => $item->id, 'action' => 'delete']) }}">
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
