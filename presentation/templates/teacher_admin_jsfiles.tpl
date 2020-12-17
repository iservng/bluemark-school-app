 <!-- jQuery -->
    <script src="{$obj->mSiteUrl}vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{$obj->mSiteUrl}dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{$obj->mSiteUrl}vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="{$obj->mSiteUrl}vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>



</body>

</html>