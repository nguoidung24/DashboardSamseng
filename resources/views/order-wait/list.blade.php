@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6">
                <h3>Đơn chờ duyệt</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Chờ duyệt</li>
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
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr onclick="handleClickTR(this)" style="cursor: pointer" data-href="{{route('order-wait-detail', ['customer_id' => $item['customer_id'], 'order_date' => $item['order_date']])}}">
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
                                            @if ($item['pay_method'] == 'Thanh Toán Online')
                                                <span style="color: darkblue"> Online 🌐</span>
                                            @else
                                                <span style="color:darkred"> Offline 🤼‍♂️ </span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{route('order-wait-detail', ['customer_id' => $item['customer_id'], 'order_date' => $item['order_date']])}}">
                                                        👁️
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
