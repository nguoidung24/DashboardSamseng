{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone File Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <style>
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
</head>

<body>
    <form action="{{ route('upload') }}" method="POST">
        <input type="text" style="width: 100vw" id="xxxxxx" value="" name="image">
        <button id="onSubmit">Submit</button>
    </form>
    <form action="{{ route('upload') }}" class="dropzone" id="my-dropzone">
        <input type="hidden" name="action" value="upload_image_samseng">
    </form>
    <br />
    <button id="submit-all">
        getImage
    </button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
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
            dictDefaultMessage: "<p style='scale:400%'>📥</p>",
            dictRemoveFile: "Xóa Ảnh",
            init: async function() {
                var myDropzone = this; // Make sure that "this" is understood as the dropzone instance

                // When the button is clicked, process the queue
                document.querySelector("#submit-all").addEventListener("click", function() {
                    myDropzone.processQueue(); // Bắt đầu upload các tệp trong hàng đợi
                });


                myDropzone.on("success", function(file, response) {
                    let arr = [];
                    response.map(item => {
                        arr.push(item.path)
                    })
                    document.querySelector("#xxxxxx").value = arr.toString()
                    // document.querySelector("#onSubmit").click();

                });
            }
        };
    </script>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyMCE Editor</title>
    <!-- Thêm TinyMCE từ CDN -->
    <script src="https://cdn.tiny.cloud/1/lmy2o3rr661is2d2hfjxe5lns2u5lreh7uq134g8duxb5dzw/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: 'tinymce-editor',
                height: 768,
                width: 1122,
                menubar: 'file edit view insert format tools table help',
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
                toolbar: 'undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | code | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl',
                content_style: '',
                setup: function(editor) {
                    editor.on('init', function() {
                        editor.setContent(`

                        <h3 style="text-align: center;"><span style="font-size: 18pt;"><strong>Cấu h&igrave;nh Điện thoại Iphone
                                    13</strong></span></h3>
                        <table style="border-collapse: collapse; margin: 0 auto; width: 666px; height: 154.734px; border-width: 0px; color:#1a1a1a"
                            border="1">
                            <colgroup>
                                <col style="width: 50%;">
                                <col style="width: 50%;">
                            </colgroup>
                            <tbody>
                                <tr style="height: 20.3906px;">
                                    <td style="padding:8px; height: 20.3906px; border-width: 0px;">M&agrave;n h&igrave;nh:</td>
                                    <td style="padding:8px; height: 20.3906px; border-width: 0px;"><span class="comma">IPS LCD</span><span
                                            class="comma">6.56"</span><span class="">HD+</span></td>
                                </tr>
                                <tr style="height: 22.3906px;">
                                    <td style="padding:8px; height: 22.3906px; background-color: rgb(206, 212, 217); border-width: 0px;">Hệ điều
                                        h&agrave;nh:</td>
                                    <td style="padding:8px; height: 22.3906px; background-color: rgb(206, 212, 217); border-width: 0px;">Android 13
                                        (Go Edition)</td>
                                </tr>
                                <tr style="height: 22.3906px;">
                                    <td style="padding:8px; height: 22.3906px; border-width: 0px;">Camera trước:</td>
                                    <td style="padding:8px; height: 22.3906px; border-width: 0px;">8 MP</td>
                                </tr>
                                <tr style="height: 22.3906px; background-color: rgb(206, 212, 217);">
                                    <td style="padding:8px; height: 22.3906px; border-width: 0px;">Chip:</td>
                                    <td style="padding:8px; height: 22.3906px; border-width: 0px;">Unisoc T606</td>
                                </tr>
                                <tr style="height: 22.3906px;">
                                    <td style="padding:8px; height: 22.3906px; border-width: 0px;">RAM:</td>
                                    <td style="padding:8px; height: 22.3906px; border-width: 0px;">3 GB</td>
                                </tr>
                                <tr style="background-color: rgb(206, 212, 217); height: 22.3906px;">
                                    <td style="padding:8px; border-width: 0px; height: 22.3906px;">Dung lượng lưu trữ:</td>
                                    <td style="padding:8px; border-width: 0px; height: 22.3906px;">64 GB</td>
                                </tr>
                                <tr style="height: 22.3906px;">
                                    <td style="padding:8px; border-width: 0px; height: 22.3906px;">Pin, Sạc:</td>
                                    <td style="padding:8px; border-width: 0px; height: 22.3906px;"><span class="comma">5000 mAh</span><span
                                            class="">10 W</span></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        `);
                    });
                }
            });
        });
    </script>
</head>

<body style="display: flex; justify-content: center">
    <form action="your-action-url" method="POST">
        <tinymce-editor id="myTextarea"  api-key="lmy2o3rr661is2d2hfjxe5lns2u5lreh7uq134g8duxb5dzw"></tinymce-editor>
        <button type="submit">Hoàn thành</button>
        <button type="button" onclick="handleClick()">Hoàn thành 2</button>
    </form>

    <script>
        function handleClick(){
            // var myContent = tinymce.get("myTextarea").getContent();
            // console.log(myContent);

            const editor = tinymce.get('myTextarea');
            const htmlContent = editor.getContent();
            const textContent = editor.getContent({ format: 'text' });

            console.log('HTML Content:', htmlContent);
            console.log('Text Content:', textContent);

        }
    </script>
</body>

</html>



{{-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html> --}}
