@include('layouts.header')
@php

    if (!function_exists('formatCurrency')) {
        function formatCurrency($amount)
        {
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
        }
    }

@endphp
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Sản phẩm</h3> <a href="{{ route('product-create') }}" class="btn btn-link">Thêm 📝</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            🏠
                        </a>
                    </li>
                    <li class="breadcrumb-item">Sản phẩm</li>
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
                    <button class="btn">Create</button>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr class="text-center">
                                    <th>Sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Đã bán</th>
                                    {{-- <th>Số lượng</th> --}}
                                    <th>Đánh giá</th>
                                    <th>Show</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr style="text-align: center">
                                        <td>
                                            <figure class="text-center">
                                                <img style="width:40px" src="{{ $item->thumbnail }}" alt="">
                                            </figure>
                                            <div>
                                                <p class="text-center">
                                                    {{ $item->product_name }}
                                                </p>
                                                <p class="text-center text-uppercase " style="color: gray">
                                                    {{ $item->category->category_name }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <style>
                                                .showColor {
                                                    width: 15px;
                                                    height: 15px;
                                                    border-radius: 100%;
                                                    background-color: black;
                                                    display: inline-block;
                                                    border: 1px solid black;
                                                    outline: 1px solid gray;
                                                }
                                            </style>
                                            <span style="background-color: <?= $item->color->code ?>" class="showColor">

                                            </span>
                                        </td>
                                        <td>
                                            {{ formatCurrency($item->price * 1) }} <sup>vnđ</sup>
                                        </td>
                                        <td>
                                            {{ $item->discount . '%' }}
                                        </td>
                                        <td class="fw-bold">
                                            <span
                                                class="
                                                @if ($item->sold >= $item->quantity) text-danger
                                                @else
                                                text-success @endif
                                            ">
                                                {{ $item->sold }}
                                            </span>
                                            /
                                            <span>
                                                {{ $item->quantity }}
                                            </span>
                                        </td>
                                        {{-- <td>
                                            {{ $item->quantity }}
                                        </td> --}}
                                        <td class="text-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $item->rating * 1)
                                                    <i style="color: #d3d317" class="fa fa-star"></i>
                                                @else
                                                    <i style="color: #63636336" class="fa fa-star"></i>
                                                @endif
                                            @endfor
                                            <p>
                                                ({{ $item->total_rating }})
                                            </p>
                                        </td>
                                        <td class="text-center">

                                            @if ($item->status . '_' == '1' . '_')
                                                <i class="icon icon-check text-success"></i>
                                            @else
                                                <span class="text-danger">x</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a
                                                        href="{{ route('product-detail', ['product_id' => $item->product_id]) }}">
                                                        👁️
                                                    </a>
                                                </li>
                                                <li class="delete">
                                                    <a role="button" onclick="confirmToDelete(this)"
                                                        to="{{ route('product-delete', ['product_id' => $item->product_id, 'action' => 'delete']) }}">
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
