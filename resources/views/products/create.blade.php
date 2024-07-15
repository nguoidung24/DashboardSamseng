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
                <h3>Thêm mới sản phẩm</h3>
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
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-md-12 box-col-12">
                <form method="POST">
                    @csrf
                    {{-- <div class="card-header pb-0">
                    <button class="btn">Create</button>
                </div> --}}
                    <div class="card-body pb-0">
                        <div class="row row-cols-1 row-cols-sm-2">

                            <div class="col mt-3">
                                <label for="">ID <span class="text-danger">(*)</span></label>
                                <input required name="product_id" value="{{ $genID }}" readonly
                                    class="form-control" type="text">
                            </div>

                            <div class="col mt-3">
                                <label for="">Danh Mục <span class="text-danger">(*)</span></label>
                                <select required name="category_id" class="form-select">
                                    <option selected disabled value="">-- Chọn --</option>
                                    @foreach ($list['categories'] as $item)
                                        <option value="<?= $item['category_id'] ?>"><?= $item['category_name'] ?>
                                        </option>
                                    @endforeach
                                </select>

                                {{-- <input required class="form-control" type="text" placeholder="Danh Mục" > --}}
                            </div>

                            <div class="col mt-3">
                                <label for="">Màu <span class="text-danger">(*)</span></label>
                                <div class="select-color">
                                    <p class="boxColor"></p>
                                    <select required name="color_id" class="form-select">
                                        <option selected disabled value="">-- Chọn --</option>
                                        @foreach ($list['colors'] as $item)
                                            <option value="<?= $item['color_id'] . '|' . $item['code'] ?>">
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
                                {{-- <input required class="form-control" type="text" placeholder="Màu" > --}}
                            </div>

                            <div class="col mt-3">
                                <label for="">Là biến thể của </label>
                                <select required name="group_id" class="form-select">
                                    <option value="<?= $genID ?>">Không phải biến thể</option>
                                    @foreach ($list['products'] as $item)
                                        <option value="<?= $item['product_id'] ?>">
                                            <?= $item['product_name'] ?></option>
                                    @endforeach
                                </select>
                                {{-- <input required class="form-control" type="text" placeholder="Là biến thể" > --}}
                            </div>

                            <div class="col mt-3">
                                <label for="">Tên sản phẩm <span class="text-danger">(*)</span></label>
                                <input required name="product_name" class="form-control" type="text"
                                    placeholder="Tên sản phẩm">
                            </div>

                            <div class="col mt-3">
                                <label for="">Giá <span class="text-danger">(*)</span></label>
                                <input required name="price" class="form-control" type="number" placeholder="Giá">
                            </div>

                            <div class="col mt-3">
                                <label for="">Đã bán </label>
                                <input required name="sold" value="0" class="form-control" type="number"
                                    placeholder="Đã bán">
                            </div>

                            <div class="col mt-3">
                                <label for="">Đánh giá </label>
                                <input required name="rating" class="form-control" value="0" type="number"
                                    placeholder="Đánh giá">
                            </div>

                            <div class="col mt-3">
                                <label for="">Số lượt đánh giá </label>
                                <input required name="total_rating" class="form-control" value="0" type="number"
                                    placeholder="Số lượt đánh giá">
                            </div>

                            <div class="col mt-3">
                                <label for="">Trạng thái </label>
                                <select required name="status" class="form-select">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>

                            <div class="col mt-3">
                                <label for="">Giảm giá</label>
                                <input required name="discount" class="form-control" value="0" type="number"
                                    placeholder="Giảm giá">
                            </div>

                            <div class="col mt-3">
                                <label for="">Số lượng <span class="text-danger">(*)</span></label>
                                <input required name="quantity" class="form-control" type="number"
                                    placeholder="Số lượng">
                            </div>

                            <div class="col mt-3">
                                <label for="">Mô tả</label>
                                <input name="description" class="form-control" type="text" placeholder="Mô tả">
                            </div>

                            <div class="col mt-3">
                                <label for="">Bài viết</label>
                                <select name="post_id" class="form-select">
                                    <option selected value="">Không sử dụng</option>
                                    @foreach ($list['posts'] as $item)
                                        <option value="<?= $item['post_id'] ?>"><?= $item['post_name'] ?></option>
                                    @endforeach
                                </select>
                                {{-- <input required class="form-control" type="text" placeholder="Bài viết" > --}}
                            </div>
                            <div class="col mt-3">
                                <label for="">Kiểu sản phẩm </label>
                                <div class="row d-flex">
                                    <div>
                                        <input name="product_type[]" type="checkbox" value="_$*HotSale*$_"
                                            class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Độc quyền </label>
                                    </div>
                                    <div>
                                        <input name="product_type[]" type="checkbox" value="_$*New*$_"
                                            class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Gợi ý </label>
                                    </div>
                                </div>
                                {{-- <input required class="form-control" type="text" placeholder="Kiểu sản phẩm"> --}}
                            </div>

                        </div>
                    </div>
                    <div class="" style="scale: 0%; opacity: 0;">
                        <button id="onSubmit" class="btn btn-success">Thêm</button>
                        <input required type="hidden" name="action" value="create">
                        <input type="hidden" id="xxxxxx" name="images" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="">Ảnh <span class="text-danger">(*)</span></label>
                    <form action="{{ route('upload') }}" class="dropzone" id="my-dropzone">
                    </form>
                    <br />
                    <p id="error"></p>
                    <div class="card-footer">
                        <button id="submit-all" class="btn btn-success">Thêm</button>
                        <input required type="hidden" name="action" value="create">
                        <a href="{{ route('products') }}" class="btn" style="color: gray">Hủy</a>
                    </div>


                    {{-- ================ SCRIPT ================ --}}
                    <script>
                        Dropzone.options.myDropzone = {
                            paramName: "file", // The name that will be used to transfer the file
                            maxFilesize: 20, // MB
                            acceptedFiles: 'image/*',
                            autoProcessQueue: false,

                            uploadMultiple: true,
                            parallelUploads: 100,

                            // uploadMultiple: false, 
                            // parallelUploads: 1, 
                            // maxFiles: 1, 

                            addRemoveLinks: true,
                            dictDefaultMessage: "<p style='scale:300%'>📥</p>",
                            dictRemoveFile: "Xóa Ảnh",
                            init: async function() {
                                var myDropzone = this; // Make sure that "this" is understood as the dropzone instance

                                // When the button is clicked, process the queue
                                document.querySelector("#submit-all").addEventListener("click", async function() {
                                    await myDropzone.processQueue(); // Bắt đầu upload các tệp trong hàng đợi
                                    document.querySelector("#error").innerHTML =
                                        `<span class="text-danger">(*)</span>: Là bắt buộc nhập`
                                });


                                myDropzone.on("success", async function(file, response) {
                                    let arr = [];
                                    await response.map(item => {
                                        arr.push(item.path)
                                    })
                                    document.querySelector("#xxxxxx").value = await arr.toString()
                                    document.querySelector("#onSubmit").click();

                                });
                            }
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
