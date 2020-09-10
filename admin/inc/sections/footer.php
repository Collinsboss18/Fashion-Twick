        <footer class="footer text-center">
            All Rights Reserved by Fashion Twick. Designed and Developed by <a href="#">Collins Charles</a>.
        </footer>
    </div>
</div>

<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./assets/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="./assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="./assets/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="./assets/js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="./assets/libs/chartist/dist/chartist.min.js"></script>
<script src="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="./assets/js/pages/dashboards/dashboard1.js"></script>
<script src="./assets/js/dataTables.js"></script>
<script src="./assets/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
</script>
</body>

</html>