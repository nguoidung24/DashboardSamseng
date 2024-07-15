@php
    $mess = '';
    $type = '';
    $alert = '';
    if (Session::has('error')) {
        $mess = Session::get('error');
        Session::forget('error');
        $type = 'error';
    }
    if (Session::has('success')) {
        $mess = Session::get('success');
        Session::forget('success');
        $type = 'success';
    }
    if (Session::has('alert')) {
        $alert = Session::get('alert');
        Session::forget('alert');
    }
@endphp
<script>
    $(document).ready(function() {
        setTimeout(() => {
            if ('<?= $mess ?>' != '') {
                Swal.fire({
                    position: "top-end",
                    icon: '<?= $type ?>',
                    title: '<?= $mess ?>',
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        }, 200);
    });


    $(document).ready(function() {
        setTimeout(() => {
            if ('<?= $alert ?>' != '') {
                Swal.fire({
                    title: "Thông Báo",
                    text: "<?= $alert ?>",
                });
            }
        }, 200);
    });
</script>
