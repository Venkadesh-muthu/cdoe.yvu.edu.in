 <!--! BEGIN: Vendors JS !-->
    <script src="<?= base_url() ?>admin-template/assets/vendors/js/vendors.min.js"></script>
    <!-- vendors.min.js {always must need to be top} -->
     <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url() ?>admin-template/assets/vendors/js/daterangepicker.min.js"></script>
    <script src="<?= base_url() ?>admin-template/assets/vendors/js/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>admin-template/assets/vendors/js/circle-progress.min.js"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="<?= base_url() ?>admin-template/assets/js/common-init.min.js"></script>
    <script src="<?= base_url() ?>admin-template/assets/js/dashboard-init.min.js"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="<?= base_url() ?>admin-template/assets/js/theme-customizer-init.min.js"></script>
    <!--! END: Theme Customizer !-->
    <script>
$(document).ready(function(){

var table = $('#studentsTable').DataTable({
    pageLength:10,
    lengthMenu:[10,25,50,100],
    ordering:true,
    scrollX:true
});

// Student Name filter
$('#studentNameFilter').on('change', function(){
    table.column(2).search($(this).val()).draw();
});

// Course Name filter
$('#courseFilter').on('change', function(){
    table.column(4).search($(this).val()).draw();
});

});
</script>
</body>

</html>