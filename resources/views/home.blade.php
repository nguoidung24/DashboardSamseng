@include('layouts.header')
<!-- tap on top starts-->
@php
    if (!function_exists('formatCurrency')) {
        function formatCurrency($amount)
        {
            if ($amount >= 0) {
                if ($amount >= 1000000) {
                    // Định dạng triệu
                    $formatted = rtrim(rtrim(number_format($amount / 1000000, 2), '0'), '.') . 'M';
                } elseif ($amount >= 1000) {
                    // Định dạng ngàn
                    $formatted = rtrim(rtrim(number_format($amount / 1000, 2), '0'), '.') . 'K';
                } else {
                    // Định dạng cho số nhỏ hơn 1000
                    $formatted = number_format($amount);
                }
                return $formatted;
            } else {
                $amount = $amount * -1;
                if ($amount >= 1000000) {
                    // Định dạng triệu
                    $formatted = rtrim(rtrim(number_format($amount / 1000000, 2), '0'), '.') . 'M';
                } elseif ($amount >= 1000) {
                    // Định dạng ngàn
                    $formatted = rtrim(rtrim(number_format($amount / 1000, 2), '0'), '.') . 'K';
                } else {
                    // Định dạng cho số nhỏ hơn 1000
                    $formatted = number_format($amount);
                }
                return '-' . $formatted;
            }
        }
    }

@endphp
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6">
                <h3>Trang chủ</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Trang chủ</li>
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
                    <h4 class="">Bar Chart</h4>
                </div> --}}
                <div class="card-body">
                    <div class="row dashboard-2">
                        <div class="col">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 box-col-4">
                                    <div class="card profit-card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="square-after f-w-600 header-text-primary">
                                                        Tổng tiền thu về
                                                        <i class="fa fa-circle">

                                                        </i>
                                                    </p>
                                                    <h4 style="display: inline-block"> 💶
                                                        {{ formatCurrency($totalAmount) }}<sup
                                                            style="text-transform: none">đ</sup></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <div class="profit-wrapper header-text-primary icon-bg-primary">
                                                        @if ($compareTotalAmount >= 0)
                                                            <i class="fa fa-arrow-up">
                                                            </i>
                                                        @else
                                                            <i class="fa fa-arrow-down">
                                                            </i>
                                                        @endif
                                                    </div>
                                                    <h6 class="header-text-primary">
                                                        {{ formatCurrency($compareTotalAmount) }}</h6>
                                                    <p class="mb-0 f-w-600 f-s-italic">
                                                        @if ($compareTotalAmount > 0)
                                                            Tăng
                                                        @elseif ($compareTotalAmount < 0)
                                                            Giảm
                                                        @else
                                                            Không
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right-side icon-right-primary">
                                                <i class="fa fa-usd">

                                                </i>
                                                <div class="shap-block">
                                                    <div class="rounded-shap animate-bg-primary">
                                                        <i>
                                                        </i>
                                                        <i>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 box-col-4">
                                    <div class="card visitor-card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="square-after f-w-600 header-text-info">
                                                        Sản phẩm bán được
                                                        <i class="fa fa-circle">
                                                        </i>
                                                    </p>
                                                    <h4>📦 {{ $totalQuantity }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <div class="profit-wrapper header-text-info icon-bg-info">
                                                        @if ($compareTotalQuantity >= 0)
                                                            <i class="fa fa-arrow-up">
                                                            </i>
                                                        @else
                                                            <i class="fa fa-arrow-down">
                                                            </i>
                                                        @endif
                                                    </div>
                                                    <h6 class="header-text-info">{{ $compareTotalQuantity }}</h6>
                                                    <p class="mb-0 f-w-600 f-s-italic">
                                                        @if ($compareTotalQuantity > 0)
                                                            Tăng
                                                        @elseif ($compareTotalQuantity < 0)
                                                            Giảm
                                                        @else
                                                            Không
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right-side icon-right-info">
                                                
                                                <i class="fa fa-shopping-basket">
                                                </i>
                                                <div class="shap-block">
                                                    <div class="rounded-shap animate-bg-primary">
                                                        <i>
                                                        </i>
                                                        <i>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 box-col-4">
                                    <div class="card sell-card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="square-after f-w-600 header-text-success">
                                                        Tổng số khách mua
                                                        <i class="fa fa-circle">
                                                        </i>
                                                    </p>
                                                    <h4>🧑 {{ $totalCustomers }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <div class="profit-wrapper header-text-success icon-bg-success">
                                                        @if ($compareTotalCustomers >= 0)
                                                            <i class="fa fa-arrow-up">
                                                            </i>
                                                        @else
                                                            <i class="fa fa-arrow-down">
                                                            </i>
                                                        @endif
                                                    </div>
                                                    <h6 class="header-text-success">{{ $compareTotalCustomers }}</h6>
                                                    <p class="mb-0 f-w-600 f-s-italic">
                                                        @if ($compareTotalCustomers > 0)
                                                            Tăng
                                                        @elseif ($compareTotalCustomers < 0)
                                                            Giảm
                                                        @else
                                                            Không
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right-side icon-right-success">
                                                <i class="fa fa-user">
                                                </i>
                                                <div class="shap-block">
                                                    <div class="rounded-shap animate-bg-secondary">
                                                        <i>
                                                        </i>
                                                        <i>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div style="width: 100%; height: 500px;">
                                <canvas id="myChartHaHa"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('myChartHaHa').getContext('2d');
    async function getChart() {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                    'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                ],
                datasets: [{
                        data: `<?= $chartData['totalOrders'] ?>`.split(','),
                        label: 'Số sản phẩm',
                        borderColor: 'green',
                        backgroundColor: 'green',
                        borderWidth: 1
                    },
                    {
                        data: `<?= $chartData['totalAmount'] ?>`.split(','),
                        type: 'bar',
                        label: 'Doanh thu',
                        borderColor: '#d1a317d6',
                        backgroundColor: '#d1a317d6',
                        borderWidth: 1,
                        yAxisID: "right",
                    }
                ]
            },
            options: {
                // animations: {
                //     tension: {
                //         duration: 1000,
                //         easing: 'linear',
                //         from: 1,
                //         to: 2,
                //         loop: true
                //     }
                // },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Đơn hàng",
                            color: "#636363"
                        },
                        ticks: {
                            color: "#000",
                            stepSize: 1,
                            padding: 10,

                        },
                        grid: {
                            color: '#63636363',
                            borderColor: '#63636363',
                            tickColor: '#63636363'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Biểu Đồ: Thống Kê Đơn Hàng, Doanh Thu Năm 2024'
                        },
                    },
                    right: {
                        type: "linear",
                        position: "right",
                        deginAtZero: true,
                        title: {
                            display: true,
                            text: "Doanh Thu",
                            color: "#636363"

                        },
                        ticks: {
                            color: "#000",
                            callback: function(value, index, values) {
                                return value == value.toFixed(0) ? (Number(value) / 1000000)
                                    .toLocaleString() + 'M' : '';
                            }

                        }
                    }
                },
            }
        });
    }
    getChart();
</script>
<!-- Container-fluid Ends-->
@include('layouts.footer')
