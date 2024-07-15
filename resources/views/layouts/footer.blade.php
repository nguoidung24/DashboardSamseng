</div>
<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 p-0 footer-left">
                <p class="mb-0">
                    Samseng.shop
                </p>
            </div>
            <div class="col-md-6 p-0 footer-right">
                <p class="mb-0">
                    🤣😄😀🤣😂
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<style>
    .notification-box #link-notification-box span {
        background: rgb(211, 12, 12) !important;
    }

    #link-notification-dropdown a:hover {
        color: green !important;
    }
</style>
<script>
    function confirmToDelete(e, mess = 'Bạn có muốn xóa không?', ) {
        const link = e.attributes?.to?.value;
        Swal.fire({
            title: `${mess}`,
            text: "Sẽ không thể khôi phục!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Vâng, đúng rồi!"
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = link;
            }
        });

    }
</script>
<script>
    function handleClickTR(self) {
        if (self?.dataset?.href) {
            return location.href = self.dataset.href;
        }
    }
</script>
<script>
    function temp(value) {
        return `<span style="width:30px" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success"> ${value}  <span class="visually-hidden">unread messages</span>  </span>`;
    }

    setInterval(() => {
        fetchData();
    }, 5000);

    function fetchData() {
        let mess = 0;
        fetch(`<?= route('api-dashboard', ['action' => 'getOrderCounter']) ?>`)
            .then(response => response.json())
            .then(data => {
                // Đơn hàng chờ duyệt
                if (Number(data?.orderAwait) > 0)
                    document.getElementById('link-order-wait').innerHTML = temp(Number(data?.orderAwait));
                if (Number(data?.orderAwait) > 99)
                    document.getElementById('link-order-wait').innerHTML = temp('99+');
                // Đơn hàng đang giao
                if (Number(data?.orderDelivering) > 0)
                    document.getElementById('link-order-delivering').innerHTML = temp(Number(data
                        ?.orderDelivering));
                if (Number(data?.orderDelivering) > 99)
                    document.getElementById('link-order-delivering').innerHTML = temp('99+');
                // Thông báo
                document.getElementById('link-notification-dropdown').innerHTML =
                    ` <li>  <h6 class="f-18 mb-0">🔔 Thông báo</h6> </li>`
                // Nội dung thông báo
                if (Number(data?.orderAwait) > 0) {
                    document.getElementById('link-notification-box').innerHTML = temp(mess += 1);

                    document.getElementById('link-notification-dropdown').innerHTML += `
                 <li>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"  style="width:40px; height:40px; display:flex; align-items:center; justify-content:center">
                            <span>📦</span>
                        </div>
                        <div class="flex-grow-1">
                            <p>
                                <a href="{{ route('order-wait') }}">Có đơn hàng chờ duyệt </a>  <span class="pull-right">${Number(data?.orderAwait)}</span>
                            </p>
                        </div>
                    </div>
                </li>
                `;
                }

                if (false) {
                    document.getElementById('link-notification-box').innerHTML = temp(mess += 1);

                    document.getElementById('link-notification-dropdown').innerHTML += `
                 <li>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0"  style="width:40px; height:40px; display:flex; align-items:center; justify-content:center">
                            <span>🧑</span>
                        </div>
                        <div class="flex-grow-1">
                            <p>
                                <a href="{{ route('order-wait') }}">Có khách hàng liên hệ </a>  <span class="pull-right">1</span>
                            </p>
                        </div>
                    </div>
                </li>
                `;
                }

                document.getElementById('link-notification-dropdown').innerHTML += `
                <li>
                    <p class=" text-xs text-secondary">samseng 📧</p>
                </li>`
            });
    }
    fetchData();
</script>
<!-- latest jquery-->
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap js-->
<script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="../assets/js/scrollbar/simplebar.js"></script>
<script src="../assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="../assets/js/config.js"></script>
<script src="../assets/js/sidebar-menu.js"></script>
<script src="../assets/js/tooltip-init.js"></script>
<!-- Template js-->
<script src="../assets/js/script.js"></script>
<script src="../assets/js/theme-customizer/customizer.js"></script>
<!-- login js-->
{{-- table --}}
<script src="../assets/js/select2/select2-custom.js"></script>
<script src="../assets/js/select2/select2.full.min.js"></script>
<script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/datatable/datatables/datatable.custom.js"></script>


</body>
@include('message')

</html>
