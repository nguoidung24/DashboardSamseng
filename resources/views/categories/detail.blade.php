@include('layouts.header')
<!-- tap on top starts-->
<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Chi tiết danh mục</h3>
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
                    <li class="breadcrumb-item active">Chi tiết</li>
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
                    <input required class="form-control" value="<?= $category->category_name ?>" name="category_name" type="text" placeholder="Tên danh mục">
                </div>
                <div class="col mt-3">
                    <label for="">Thuộc Menu <span class="text-danger">(*)</span></label>
                    <select required name="menu_id" class="form-select">
                        <option selected disabled value="">-- Chọn --</option>
                        @foreach ($menu as $item)
                            <option <?= $item['menu_id']==$category['menu_id']?'selected':''  ?> value="<?= $item['menu_id'] ?>"><?= $item['display_name'] ?>
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col mt-3">
                    <label for="">Thumbnail <span class="text-danger">(*)</span></label>
                    <div>
                        <label id="selectImage" role="button" for="categoryThumbnail">
                            <img style="width: 150px" src="/<?= $category->thumbnail?>" alt="">
                        </label>
                        <label role="button" for="categoryThumbnail">
                            <img style="width: 150px" id="showImage" src="" alt="">
                        </label>
                        <input id="categoryThumbnail" name="thumbnail" style="scale: 0; width: 0; height: 0; opacity: 0;" class="form-control" type="file"
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
                Lưu
            </button>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="category_id" value="<?= $category->category_id ?>">
            <a href="" class="ms-3">Hủy</a>
        </div>
    </form>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
