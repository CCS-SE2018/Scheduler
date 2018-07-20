<footer class="footer text-right">
    2018 © TS
</footer>

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<!-- MODAL -->
<div id="dialog" class="modal-block mfp-hide">
<section class="panel panel-info panel-color">
    <header class="panel-heading">
        <h2 class="panel-title">Are you sure?</h2>
    </header>
    <div class="panel-body">
        <div class="modal-wrapper">
            <div class="modal-text">
                <p>Are you sure that you want to delete this row?</p>
            </div>
        </div>

        <div class="row m-t-20">
            <div class="col-md-12 text-right">
                <button id="dialogConfirm" class="btn btn-primary">Confirm</button>
                <button id="dialogCancel" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </div>

</section>
</div>



</div>
<!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="public/back-end/js/jquery.min.js"></script>
    <script src="public/back-end/js/bootstrap.min.js"></script>
    <script src="public/back-end/js/waves.js"></script>
    <script src="public/back-end/js/wow.min.js"></script>
    <script src="public/back-end/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="public/back-end/js/jquery.scrollTo.min.js"></script>
    <script src="public/assets/jquery-detectmobile/detect.js"></script>
    <script src="public/assets/fastclick/fastclick.js"></script>
    <script src="public/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="public/assets/jquery-blockui/jquery.blockUI.js"></script>

    <!-- CUSTOM JS -->
    <script src="public/back-end/js/jquery.app.js"></script>


    <!-- Examples -->
    <script src="public/assets/magnific-popup/magnific-popup.js"></script>
    <script src="public/assets/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="public/assets/datatables/dataTables.bootstrap.js"></script>
    <script src="public/assets/jquery-datatables-editable/datatables.editable.init.js"></script>

    <script src="public/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="public/assets/select2/select2.min.js" type="text/javascript"></script>

    <?php

    $url = $_SERVER['REQUEST_URI'];
    $arr = explode("/",$url);
    $page = $arr[count($arr)-1];

    if($page == 'schedules'){
?>
    <!-- BEGIN PAGE SCRIPTS -->
    <script src='public/assets/fullcalendar/moment.min.js'></script>
    <script src='public/assets/fullcalendar/fullcalendar.min.js'></script>
    <script src="public/assets/fullcalendar/fullcalendar.js"></script>
<?php
    }
?>
</body>
</html>
