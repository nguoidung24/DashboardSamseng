@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Sản phẩm nổi bật</h3> <a href="{{ route('outstanding-create') }}" class="btn btn-link">Thêm 📝</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Sản phẩm nổi bật</li>
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
                                    <th>Image</th>
                                    <th>Text</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <figure style="font-weight: bold;position: relative; margin-bottom: 5px">
                                                <img style="width: 215px;"
                                                    src="{{ $item->big_image }}" alt="">
                                                <span style="position: absolute;background: white; top: 0; left: 0">
                                                    (1)
                                                </span>
                                            </figure>
                                            <div style="display: flex; gap: 5px; font-size: 10px">
                                                @foreach (explode('$tach_ra$', $item->small_image) as $key =>  $img)
                                                    <figure style="font-weight: bold;position: relative; margin: 0px">

                                                        <img style="width: 50px" src="{{ $img }}"
                                                            alt="">
                                                        <span style="position: absolute; top: 0; left: 0; background: white">
                                                            ({{ $key + 2 }})
                                                        </span>
                                                    </figure>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <p>
                                                Tên: <span class='fw-bold'>{{ $item->name }}</span>
                                            </p>
                                            <p>
                                                (1): {{ $item->big_text }}
                                            </p>
                                            <div>
                                                @foreach (explode('$tach_ra$', $item->smaill_text) as $key => $text)
                                                    <p>
                                                        ({{ $key + 2 }})
                                                        :
                                                        {{ $text }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="delete">
                                                    <a role="button" onclick="confirmToDelete(this)"
                                                        to="{{ route('outstanding-delete', ['id' => $item->id, 'action' => 'delete']) }}">
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
