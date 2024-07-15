@include('layouts.header')
<style>
    .select-color {
        position: relative;
    }

    .boxColor {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        background-color: transparent;
    }

    .dropzone {
        border: 2px dashed #5c61f2;
        border-radius: 5px;
        background: rgba(92, 97, 242, 0.1);
    }

    .dropzone * {
        background: transparent !important;
    }

    .dz-error-message {
        display: none;
    }

    .dz-remove {
        margin-top: 5px;
        cursor: pointer;
        color: red;
    }

    .dz-image {
        border: 1px solid #5c61f2;
    }

    .dz-image img {
        width: 100%
    }
</style>
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Chi tiết Sản phẩm</h3>
                <a href="{{ route('products') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Sản phẩm</li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="card">
    <div class="container-fluid">
        <div class="col">
            <div class="">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="image-edit-tab" data-bs-toggle="tab" href="#image-edit"
                                role="tab" aria-controls="image-edit" aria-selected="true">
                                <i class="fa fa-picture-o"></i>
                                Image
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="text-edit-tab" data-bs-toggle="tab" href="#text-edit" role="tab"
                                aria-controls="text-edit" aria-selected="false">

                                <i class="fa fa-text-width"></i>
                                Text
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="icon-tabContent">
                        <div class="tab-pane fade show active" id="image-edit" role="tabpanel"
                            aria-labelledby="image-edit-tab">
                            <div class="container-fluid mt-3">
                                <label class="mt-3" for="">Ảnh thu nhỏ:</label>
                                <div class="row">
                                    <div class="col-auto">
                                        <div style="width: fit-content" class="position-relative">
                                            <img style="width: 150px;" src="/<?= $product['thumbnail'] ?>"
                                                alt="">
                                            <label for="handleChangeThumbnail" style="top:0;left: 50%; transform: translateX(-50%)"
                                                class="btn btn-xs btn-warning position-absolute">
                                                Thay
                                            </label>
                                        </div>
                                        <form action="{{ route('product-images') }}" method="POST"
                                            enctype="multipart/form-data" style="scale: 0; opacity: 0;">
                                            @csrf
                                            <input name="file" id="handleChangeThumbnail" type="file">
                                            <input type="hidden" name="action" value="thumbnail">
                                            <input type="hidden" name="product_id"
                                                value="<?= $product['product_id'] ?>">
                                            <button id="imageThumbnail"></button>
                                        </form>
                                    </div>
                                    <script>
                                        const handleChangeThumbnail = document.getElementById('handleChangeThumbnail');
                                        handleChangeThumbnail.addEventListener('change', (e) => {

                                            const file = e.target.files[0]
                                            if (file) {
                                                document.querySelector('#imageThumbnail').click();
                                            }

                                        })
                                    </script>
                                </div>
                                <label class="mt-3" for="">Ảnh mô tả:</label>
                                <div class="row row-cols-1 row-cols-sm-3">
                                    @if ($product['images'])
                                        @foreach (explode(',', $product['images']) as $item)
                                            <div class="col mt-3">
                                                <div style=" text-align: center" class="position-relative">
                                                    <img style="width: 150px;" src="/<?= $item ?>" alt="">

                                                    <a href="{{ route('product-images', ['deleteUrl' => $item, 'product_id' => $product['product_id'], 'action' => 'deleteImage']) }}"
                                                        style="top:0;left: 50%; transform: translateX(-50%)"
                                                        class="btn btn-xs btn-danger position-absolute">
                                                        Xóa
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div  style="position: relative" class="col mt-3">
                                        <label role="button" style="width: 100%; text-align: center" for="submitWhileImageChange">
                                            <p class="btn btn-link text-center"  >
                                                + Thêm ảnh
                                            </p>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <form style="scale: 0; opacity: 0;" action="{{ route('product-images') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="action" value="addImage">
                                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                        <input id="submitWhileImageChange" type="file" name="file">
                                        <button id="onSubmitWhileImageChange">v</button>
                                    </form>
                                </div>
                                <script>
                                    const submitWhileImageChange = document.querySelector("#submitWhileImageChange");
                                    submitWhileImageChange.addEventListener('change', () => {
                                        document.querySelector("#onSubmitWhileImageChange").click();
                                    })
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="text-edit" role="tabpanel" aria-labelledby="text-edit-tab">
                            <div class="row">
                                <div class="col-xl-6 col-md-12 box-col-12">
                                    <form method="POST">
                                        @csrf

                                        <div class="card-body">
                                            <div class="row row-cols-1 row-cols-sm-2">

                                                <div class="col mt-3">
                                                    <label for="">ID <span
                                                            class="text-danger">(*)</span></label>
                                                    <input required name="product_id"
                                                        value="<?= $product['product_id'] ?>" readonly
                                                        class="form-control" type="text">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Danh Mục <span
                                                            class="text-danger">(*)</span></label>
                                                    <select required name="category_id" class="form-select">
                                                        <option selected disabled value="">-- Chọn --</option>
                                                        @foreach ($list['categories'] as $item)
                                                            <option
                                                                <?= $item['category_id'] == $product['category_id'] ? 'selected' : '' ?>
                                                                value="<?= $item['category_id'] ?>">
                                                                <?= $item['category_name'] ?>
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Màu <span
                                                            class="text-danger">(*)</span></label>
                                                    <div class="select-color">
                                                        <p class="boxColor"></p>
                                                        <select required name="color_id" class="form-select">
                                                            <option selected disabled value="">-- Chọn --
                                                            </option>
                                                            @foreach ($list['colors'] as $item)
                                                                <option
                                                                    <?= $item['color_id'] == $product['color_id'] ? 'selected' : '' ?>
                                                                    value="<?= $item['color_id'] . '|' . $item['code'] ?>">
                                                                    <?= $item['value'] ?></option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <script>
                                                        const color_id = document.getElementsByName('color_id');
                                                        color_id[0].addEventListener('change', (e) => {
                                                            const boxColor = document.querySelector('.boxColor');
                                                            boxColor.style.backgroundColor = e.target.value.split("|")[1];
                                                            boxColor.style.border = "1px solid black";
                                                        })
                                                    </script>

                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Là biến thể của </label>
                                                    <select required name="group_id" class="form-select">
                                                        <option
                                                            <?= $product['product_id'] != $product['group_id'] ? 'disabled' : '' ?>
                                                            value="<?= $product['group_id'] ?>">Không phải biến thể
                                                        </option>
                                                        @foreach ($list['products'] as $item)
                                                            @if ($item['product_id'] != $product['product_id'])
                                                                <option
                                                                    <?= $item['product_id'] == $product['group_id'] ? 'selected' : 'disabled' ?>
                                                                    value="<?= $item['product_id'] ?>">
                                                                    <?= $item['product_name'] ?></option>
                                                            @endif
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Tên sản phẩm <span
                                                            class="text-danger">(*)</span></label>
                                                    <input required name="product_name"
                                                        value="<?= $product['product_name'] ?>" class="form-control"
                                                        type="text" placeholder="Tên sản phẩm">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Giá <span
                                                            class="text-danger">(*)</span></label>
                                                    <input required name="price" value="<?= $product['price'] ?>"
                                                        class="form-control" type="number" placeholder="Giá">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Đã bán </label>
                                                    <input required name="sold" value="<?= $product['sold'] ?>"
                                                        class="form-control" type="number" placeholder="Đã bán">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Đánh giá </label>
                                                    <input required name="rating" class="form-control"
                                                        value="<?= $product['rating'] ?>" type="number"
                                                        placeholder="Đánh giá">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Số lượt đánh giá </label>
                                                    <input required name="total_rating" class="form-control"
                                                        value="<?= $product['total_rating'] ?>" type="number"
                                                        placeholder="Số lượt đánh giá">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Trạng thái </label>
                                                    <select
                                                        <?= $product['status'] . '_' == '1' . '_' ? 'style="border-color:green"' : 'style="border-color:red"' ?>
                                                        required name="status" class="form-select">
                                                        <option
                                                            <?= $product['status'] . '_' == '1' . '_' ? 'selected' : '' ?>
                                                            value="1">Hiển thị</option>
                                                        <option
                                                            <?= $product['status'] . '_' == '0' . '_' ? 'selected' : '' ?>
                                                            value="0">Ẩn</optionvalue=>
                                                    </select>
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Giảm giá</label>
                                                    <input required name="discount" class="form-control"
                                                        value="<?= $product['discount'] ?>" type="number"
                                                        placeholder="Giảm giá">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Số lượng <span
                                                            class="text-danger">(*)</span></label>
                                                    <input required name="quantity"
                                                        value="<?= $product['quantity'] ?>" class="form-control"
                                                        type="number" placeholder="Số lượng">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Mô tả</label>
                                                    <input name="description" value="<?= $product['description'] ?>"
                                                        class="form-control" type="text" placeholder="Mô tả">
                                                </div>

                                                <div class="col mt-3">
                                                    <label for="">Bài viết</label>
                                                    <select name="post_id" class="form-select">
                                                        <option selected value="">Không sử dụng</option>
                                                        @foreach ($list['posts'] as $item)
                                                            <option
                                                                <?= $item['post_id'] == $product['post_id'] ? 'selected' : '' ?>
                                                                value="<?= $item['post_id'] ?>">
                                                                <?= $item['post_name'] ?></option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col mt-3">
                                                    <label for="">Kiểu sản phẩm </label>
                                                    <div class="row d-flex">
                                                        <div>
                                                            <input
                                                                <?= str_contains($product['product_type'], '_$*HotSale*$_') ? 'checked' : '' ?>
                                                                name="product_type[]" type="checkbox"
                                                                value="_$*HotSale*$_" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Độc
                                                                quyền </label>
                                                        </div>
                                                        <div>
                                                            <input
                                                                <?= str_contains($product['product_type'], '_$*New*$_') ? 'checked' : '' ?>
                                                                name="product_type[]" type="checkbox"
                                                                value="_$*New*$_" class="form-check-input"
                                                                id="exampleCheck2">
                                                            <label class="form-check-label" for="exampleCheck2">Gợi ý
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-success">Lưu</button>
                                            <a href="{{ route('products') }}" class="btn"
                                                style="color: gray">Hủy</a>
                                            <input type="hidden" name="action" value="edit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
