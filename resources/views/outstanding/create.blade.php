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
                <h3>Thêm slide mới</h3>
                <a href="{{ route('outstanding') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Outstanding</li>
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
                <div class="col mt-3">
                    <label for="">Tên<span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="name" type="text" placeholder="Tên">
                </div>
                <div class="col mt-3">
                    <label for="">Tên nút<span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="button" type="text" placeholder="Tên nút">
                </div>


                @foreach ([1, 2, 3, 4, 5] as $key => $value)
                    <div class="col mt-3">
                        <label for="">Link-{{ $key + 1 }} <span class="text-danger">(*)</span></label>
                        <select name="button_link_<?= $key + 1 ?>" required class="js-example-basic-single">
                            <option selected disabled value="">-- chọn --</option>
                            <optgroup label="Bài viết">
                                @foreach ($posts as $item)
                                    <option value="/post?id=<?= $item['post_id'] ?>"><?= $item['post_name'] ?></option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Sản phẩm">
                                @foreach ($products as $item)
                                    <option value="/product?id=<?= $item['group_id'] ?>"><?= $item['product_name'] ?>
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="col mt-3">
                        <label for="">Text-{{ $key + 1 }} khoảng 60 ký tự <span
                                class="text-danger">(*)</span></label>
                        <input oninput="text_change(this)" required class="form-control name-text_"
                            name="text_<?= $key + 1 ?>" type="text" placeholder="Text <?= $key + 1 ?>">
                    </div>
                @endforeach
                <div style="scale: 0; width: 0; height: 0; opacity: 0;">
                    <button id="onSubmit" type="button" class="btn btn-success"></button>
                    <input type="hidden" name="action" value="create">
                    <input type="hidden" id="xxxxxx" name="image" value="">
                </div>
            </div>
        </form>
        <div class="card-body">
            <p id="error"></p>
            <div class="row">
                <div class="col">
                    <label for="">Ảnh, chọn lần lượt 1 - 5 <span class="text-danger">(*)</span></label>
                    <div class="row">
                        <div class="col">
                            <div style="width: 350px; margin:0 auto;" class='text-center'>
                                <img style="width: 300px" src="/demoOutstandingDesktop.png" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <form action="{{ route('upload') }}" class="dropzone" id="my-dropzone">
                            </form>

                        </div>
                    </div>

                    <br />
                    <p id="error"></p>
                    <div class="card-footer">
                        <button id="submit-all" class="btn btn-success">
                            Thêm
                        </button>
                        <a href="{{ route('outstanding') }}" class="ms-3">Hủy</a>
                    </div>

                    {{-- ================ SCRIPT ================ --}}
                    <script>
                        async function addItems(arr, lastItems) {
                            if (arr.length >= 5) {
                                return arr;
                            }
                            await arr.push(arr[lastItems])
                            return await addItems(arr, lastItems);
                        }
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
                                    if (arr.length < 5) {
                                        arr = await addItems(arr, arr.length - 1);
                                        document.querySelector("#xxxxxx").value = await arr.toString()
                                        document.querySelector("#onSubmit").type = "submit";


                                    } else {
                                        document.querySelector("#xxxxxx").value = await arr.toString()
                                        document.querySelector("#onSubmit").type = "submit";

                                    }

                                });
                            }
                        };
                    </script>

                    <script>
                        function text_change(self) {
                            if (self.value == '') {
                                self.style.borderColor = '#eee';
                            } else if (self.value.length <= 65) {
                                self.style.borderColor = 'green';
                            } else {
                                self.style.borderColor = 'orange';
                            }
                        }
                    </script>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
