@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6">
                <h3>Đơn đang giao</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Đang giao</li>
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
                                    <th>Ngày đặt</th>
                                    <th>Địa chỉ</th>
                                    <th>SL</th>
                                    <th>Tổng tiền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            📅 {{ $item['order_date'] }}
                                        </td>
                                        <td>
                                            {{ $item['local'] }}
                                        </td>
                                        <td>
                                            {{ $item['total_quantity'] }}
                                        </td>
                                        <td>
                                            {{ number_format($item['total_price']) }}
                                            <sup>vnđ</sup>
                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a class="btn btn-xs text-success" style="font-size: 14px"  role="button" onclick="confirmToDelete(this,`Giao <strong style='color:green'> thành công</strong>!`)"
                                                        to="{{route('order-delivering-detail',['action' => 'success', 'order_date' => $item['order_date'], 'customer_id' => $item['customer_id']])}}" data-toggle="tooltip" data-placement="top"
                                                        title="Thành công">
                                                        ✔
                                                    </a>
                                                </li>
                                                <li class="delete">
                                                    <a class="btn btn-xs text-danger" style="font-size: 14px" role="button" onclick="confirmToDelete(this,`Giao <strong style='color:orange'> không thành công</strong>!`)"
                                                        to="{{route('order-delivering-detail',['action' => 'fail','order_date' => $item['order_date'], 'customer_id' => $item['customer_id']])}}" data-toggle="tooltip" data-placement="top"
                                                        title="Không thành công">
                                                        🚫
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
