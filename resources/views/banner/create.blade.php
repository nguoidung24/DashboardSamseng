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
                <h3>Thêm mới banner</h3>
                <a href="{{ route('banner') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Banner</li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <form method="POST" enctype="multipart/form-data" class="card-body">
            @csrf
            <div class="row row-cols-1 row-cols-sm-2">
                @php
                    $types = [
                        [
                            'text' => 'Banner chữ phía trên',
                            'value' => 'text-top',
                        ],
                        [
                            'text' => 'Banner chữ bên phải',
                            'value' => 'text-left',
                        ],
                        [
                            'text' => 'Dạng slide lớn',
                            'value' => 'big-slider',
                        ],
                    ];
                @endphp
                <div class="col mt-3">
                    <label for="">Type<span class="text-danger">(*)</span></label>
                    <select required name="type" class="form-select">
                        @foreach ($types as $item)
                            <option value="<?= $item['value'] ?>"><?= $item['text'] ?></option>
                        @endforeach
                    </select>
                </div>
                <div class="col mt-3">
                    <label for="">Title<span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="title" type="text" placeholder="Title">
                </div>
                <div class="col mt-3">
                    <label for="">Text<span class="text-danger">(*)</span></label>
                    <textarea required class="form-control" name="text" type="text"></textarea>
                </div>
                <div class="col mt-3">
                    <label for="">Subtitle - Ẩn với kiểu chữ bên phải <span
                            class="text-danger">(*)</span></label>
                    <textarea required class="form-control" name="subtitle" type="text"></textarea>
                </div>
                <div class="col mt-3">
                    <label for="">Tên button<span class="text-danger">(*)</span></label>
                    <input required class="form-control" value="Xem ngay" name="button" type="text"
                        placeholder="Tên button">
                </div>
                <div class="col mt-3">
                    <label for="">Link<span class="text-danger">(*)</span></label>
                    <select name="button_link" required class="js-example-basic-single">
                        <option selected disabled value="">-- chọn --</option>
                        <optgroup label="Bài viết">
                            @foreach ($posts as $item)
                                <option value="/post?id=<?= $item['post_id'] ?>"><?= $item['post_name'] ?></option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Sản phẩm">
                            @foreach ($products as $item)
                                <option value="/product?id=<?= $item['group_id'] ?>"><?= $item['product_name'] ?></option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div style="scale: 0; width: 0; height: 0; opacity: 0;">
                    <button id="onSubmit" class="btn btn-success"></button>
                    <input type="hidden" name="action" value="create">
                    <input type="hidden" id="xxxxxx" name="image" value="">
                </div>
            </div>
        </form>
        <div class="card-body">
            <p id="error"></p>
            <div class="row">
                <div class="col">
                    <label for="">Ảnh - chọn ảnh <strong>desktop</strong> trước sau đó là <strong>mobile</strong> <span class="text-danger">(*)</span></label>
                    <form action="{{ route('upload') }}" class="dropzone" id="my-dropzone">
                    </form>
                    <br />
                    <p id="error"></p>
                    <div class="card-footer">
                        <button id="submit-all" class="btn btn-success">
                            Thêm
                        </button>
                        <a href="{{ route('banner') }}" class="ms-3">Hủy</a>
                    </div>

                    {{-- ================ SCRIPT ================ --}}
                    <script>
                        Dropzone.options.myDropzone = {
                            paramName: "file", // The name that will be used to transfer the file
                            maxFilesize: 20, // MB
                            acceptedFiles: 'image/*',
                            autoProcessQueue: false,
                            uploadMultiple: true,
                            parallelUploads: 2,
                            addRemoveLinks: true,
                            dictRemoveFile: "Xóa Ảnh",
                            dictDefaultMessage: "<p style='scale:300%'>📥</p>",
                            init: async function() {
                                var myDropzone = this; // Make sure that "this" is understood as the dropzone instance

                                // When the button is clicked, process the queue
                                document.querySelector("#submit-all").addEventListener("click", async function() {
                                    await myDropzone.processQueue(); // Bắt đầu upload các tệp trong hàng đợi
                                   
                                    setTimeout(() => {
                                        document.querySelector("#onSubmit").click();
                                    }, 1000);

                                     document.querySelector("#error").innerHTML =
                                        `<span class="text-danger">(*)</span>: Là bắt buộc nhập`

                                });


                                myDropzone.on("success", async function(file, response) {
                                    let arr = [];
                                    await response.map(item => {
                                        arr.push(item.path)
                                    })
                                    document.querySelector("#xxxxxx").value = await arr.toString()
                                    // document.querySelector("#onSubmit").click();

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
