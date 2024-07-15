@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Chi tiết đơn hàng</h3>
                <a href="{{ route('order-wait') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Chờ duyệt</li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                    <div class="row mb-3">
                        <div style="font-size: 16px" class="col fw-bold text-center">{{ $data[0]['pay_method'] }}</div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-3 text-center">
                        <div class="col">
                            <p>Số điện thoại:</p>
                            <p class="fw-bold">
                                📞
                                {{ explode(',', $data[0]['local'])[5] }}
                            </p>
                        </div>
                        <div class="col">
                            <p>Người nhận:</p>
                            <p class="fw-bold">
                                🧑
                                {{ explode(',', $data[0]['local'])[4] }}
                            </p>
                        </div>
                        <div class="col">
                            <p>Tổng tiền:</p>
                            <p class="fw-bold">
                                💵
                                {{ number_format($totalAmount) }}
                                <sup>vnđ</sup>
                            </p>
                        </div>
                        <div class="col">
                            <p>Ngày đặt:</p>
                            <p class="fw-bold">
                                📅
                                {{ $data[0]['order_date'] }}
                            </p>
                        </div>
                        <div class="col">
                            <p>Địa chỉ giao hàng:</p>
                            <p class="fw-bold">
                                📍
                                {{ explode(',', $data[0]['local'])[3] }}
                                -
                                {{ explode(',', $data[0]['local'])[2] }}
                                -
                                {{ explode(',', $data[0]['local'])[1] }}
                                -
                                {{ explode(',', $data[0]['local'])[0] }}
                            </p>
                        </div>
                        <div class="col">
                            <p>Tổng SL:</p>
                            <p class="fw-bold">
                                📱
                                {{ number_format($totalQuantity) }} chiếc
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <form action="{{ route('order-wait-detail') }}" class="col text-center">
                            <input type="hidden" name="action" value="agree">
                            @foreach ($data as $item)
                                <input type="hidden" name="listId[]" value="{{ $item['order_id'] }}">
                            @endforeach
                            <button type="submit" class="btn btn-success">
                                ✔ Xác nhận
                            </button>
                            <button type="button" onclick="handleCancelOrder()" class="btn ms-2 btn-warning">
                                ✖ Hủy đơn
                            </button>
                            <script>
                                let listId = [];
                                @foreach ($data as $item)
                                    listId.push({{ $item['order_id'] }})
                                @endforeach
                                async function handleCancelOrder() {
                                    Swal.fire({
                                        title: "Lý do hủy 📑",
                                        input: "text",
                                        inputLabel: "Lý do hủy đơn này",
                                        inputPlaceholder: "Nhập lý do hủy",
                                        showCancelButton: true,
                                        confirmButtonColor: "#d33",
                                        cancelButtonColor: "#3085d6",
                                        confirmButtonText: "Xác nhận hủy đơn",
                                        cancelButtonText: "Bỏ",
                                        inputAttributes: {
                                            autocapitalize: "off"
                                        },
                                        preConfirm: async (reason) => {
                                            if (reason) {
                                                location.href =
                                                    `<?= route('order-wait-detail', ['action' => 'notAgree']) ?>&note=${reason}&listId=${listId.toString()}`;
                                            } else {
                                                Swal.fire("Bạn chưa nhập lý do!")
                                            }
                                        },
                                    })
                                }
                            </script>
                        </form>
                    </div>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div style="display:flex; ">
                                                <img style="width:100px; margin:0 auto;"
                                                    src="/<?= $item['product']['thumbnail'] ?>" />
                                            </div>
                                            <div class="mt-3">
                                                <p class='text-center'> {{ $item['product']['product_name'] }} </p>
                                            </div>
                                            <div class='text-center'>
                                                Số lượng: {{ $item['product']['quantity'] }}
                                                {{-- <br>  {{$item['product_id']}} --}}
                                            </div>
                                        </td>
                                        <td>
                                            {{ number_format($item['price']) }}
                                        </td>
                                        <td>
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td>
                                            {{ number_format($item['price'] * $item['quantity']) }}
                                            <sup>vnđ</sup>
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
