@include('layouts.header')
<!-- tap on top starts-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: 'tinymce-editor',
            height: 768,
            autosave_ask_before_unload: false, 
            width: '100%',
            menubar: 'file edit view insert format tools table help',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
            toolbar: 'undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | code | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl',
            content_style: '',
            setup: function(editor) {
                editor.on('init', function() {
                    editor.setContent(`<?= $postDefault ?>`);
                });
            }
        });
    });
</script>


<div class="container-fluid">
    <div class="page-title" style="background-color: white">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <h3>Thêm mới bài viết</h3>
                <a href="{{ route('posts') }}" class="btn btn-link">
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
                    <li class="breadcrumb-item">Bài viết</li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div style="width: 100% ;display: flex; justify-content: center">
                        <div>
                            <tinymce-editor id="myTextarea"
                                api-key="lmy2o3rr661is2d2hfjxe5lns2u5lreh7uq134g8duxb5dzw"></tinymce-editor>
                            {{-- <button class="btn btn-success my-3" type="submit">Thêm bài viết</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 px-3">
                <div class="col">
                    <form class="" action="{{ route('posts-create') }}" method="POST">
                        @csrf
                        <div class="">
                            <label for="">Tên bài viết<span class="text-danger">(*)</span></label>
                            <input required class="form-control" name="post_name" type="text" placeholder="Title">
                        </div>
                        <input type="hidden" name="content">
                        <input type="hidden" name="text_content">
                        <input type="hidden" name="action" value="create">
                        <button style="scale: 0; height: 0px; width: 0px; opacity: 0%;" id="onSubmit"></button>
                    </form>
                    <button class="btn btn-success" class="btn" type="button" onclick="handleClick()">Thêm
                        bài viết
                    </button>
                </div>
            </div>
        </div>
        <script>
            async function handleClick() {
                // var myContent = tinymce.get("myTextarea").getContent();
                // console.log(myContent);

                const editor = await tinymce.get('myTextarea');
                const htmlContent = await editor.getContent();
                const textContent = await editor.getContent({
                    format: 'text'
                });

                const content = await document.querySelector('input[name="content"]')
                const text_content = await document.querySelector('input[name="text_content"]')

                content.value = await htmlContent;
                text_content.value = await textContent

                document.querySelector('#onSubmit').click();
            }
        </script>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('layouts.footer')
