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
                <h3>Thêm mới danh mục</h3>
                <a href="{{ route('categories') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Danh mục</li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <form method="POST" enctype="multipart/form-data" class="card">
        @csrf
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col mt-3">
                    <label for="">Tên danh mục <span class="text-danger">(*)</span></label>
                    <input required class="form-control" name="category_name" type="text" placeholder="Tên danh mục">
                </div>
                <div class="col mt-3">
                    <label for="">Thuộc Menu <span class="text-danger">(*)</span></label>
                    <select required name="menu_id" class="form-select">
                        <option selected disabled value="">-- Chọn --</option>
                        @foreach ($menu as $item)
                            <option value="<?= $item['menu_id'] ?>"><?= $item['display_name'] ?>
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col mt-3">
                    <label for="">Thumbnail <span class="text-danger">(*)</span></label>
                    <div>
                        <label id="selectImage" role="button" for="categoryThumbnail">
                            <i class="fa fa-picture-o" style="font-size: 60px" aria-hidden="true"></i>
                        </label>
                        <label role="button" for="categoryThumbnail">
                            <img style="width: 150px" id="showImage" src="" alt="">
                        </label>

                        <input required id="categoryThumbnail" name="thumbnail" style="scale: 0; width: 0; height: 0; opacity: 0;" class="form-control" type="file"
                            placeholder="Danh mục con của">
                    </div>
                </div>

                <script>
                    const categoryThumbnail = document.getElementById("categoryThumbnail");
                    categoryThumbnail.addEventListener("change", (e) => {
                        const files = e.target.files[0];
                        if (files) {
                            const link = URL.createObjectURL(files);
                            document.getElementById("showImage").src = link;
                            document.getElementById("selectImage").style.display = 'none';
                        }else{
                            document.getElementById("showImage").src = "";
                            document.getElementById("selectImage").style.display = 'block';
                        }
                    });
                </script>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">
                Thêm
            </button>
            <input type="hidden" name="action" value="create">
            <a href="{{ route('categories') }}" class="ms-3">Hủy</a>
        </div>
    </form>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
