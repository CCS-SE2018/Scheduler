<footer class="footer text-right">
    2018 © TS
</footer>

</div> <!--END CONTENT PAGE-->
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
    <script src="public/back-end/js/jquery.app.js"></script>
    <script src="public/assets/magnific-popup/magnific-popup.js"></script>
    <script src="public/assets/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="public/assets/datatables/dataTables.bootstrap.js"></script>
    <script src="public/assets/jquery-datatables-editable/datatables.editable.init.js"></script>
    <script src="public/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="public/assets/select2/select2.min.js" type="text/javascript"></script>
    <script src="public/back-end/js/imagething.js"></script>
    <script>
      $(document).ready(function() {
          var v;
          var count = 0;
          $('#roomTable tbody').on( 'click', '.edit', function () {
            var room = $("#roomTable").DataTable();
            var data = room.row($(this).parents('tr')).data();
            var split = data[0].split(',');
            $('#RoomField-room_location').val(data[0]);
            $(".editMode").val("edit");
            $(".ed").val(data[1].substring(26,27));
          });

          $('#roomTable tbody').on( 'click', '.delete', function () {
              var room = $("#roomTable").DataTable();
              var data = room.row($(this).parents('tr')).data();
              var split = data[0].split(',');
              $('#RoomField-room_location').val(data[0]);
              $(".editMode").val("delete");
              $(".del").val(data[1].substring(26,27));
            });

            $('#teacherTable tbody').on( 'click', '.edit', function () {
              var teacher = $("#teacherTable").DataTable();
              var data = teacher.row($(this).parents('tr'));
              $('#TeacherField-FName').val(data[1]);
              $('#TeacherField-MName').val(data[2]);
              $('#TeacherField-LName').val(data[3]);
              $(".editMode").val("edit");
              var url = "url("+"public/images/uploads/"+data[0].substring(32,46)+")";
              $('#imagePreview')[0]['style']['backgroundImage'] = url;
              //Getting data-rel value from the row data
              $(".ed").val(data[4].substring(26,27));
            });

            $('#teacherTable tbody').on( 'click', '.delete', function () {
                var teacher = $("#teacherTable").DataTable();
                var data = teacher.row($(this).parents('tr'));
                var split = data[0].split(',');
                $('#TeacherField-profile_picture').val(data[0]);
                $('#TeacherField-FName').val(data[1]);
                $('#TeacherField-MName').val(data[2]);
                $('#TeacherField-LName').val(data[3]);
                $(".editMode").val("delete");
                $(".del").val(data[4].substring(26,27));
              });



           function initTables(teachID){
             $("#teacherSched"+teachID).DataTable({
               paging: false,
               searching: false,
               info: false
             });

             $("#click"+v).click(function(){
               count = 0;
               $("#addSchedule").find("input[type=text], input[type=number]").val("");
             });
           }

           function subjectManipulation(){
            $('table.schedule tbody').on( 'click', '.edit', function () {
                count = 0;
                var table = $(this).attr('data-rel').split('|')[1];
                v = table;
                var subject = $(this).attr('data-rel').split('|')[0];
                var teacher = $("#teacherSched"+table).DataTable();
                var data = teacher.row($(this).parents('tr')).data();
                $('#subject_code'+subject).val(data[0]);
                $('#subject_name'+subject).val(data[1]);
                $('#subject_type'+subject).val(data[3]);
                $('#section'+subject).val(data[2]);
                $('#units'+subject).val(data[4]);
                $('#day'+subject).val(data[5]);
                $('#time'+subject).val(data[6]);
                $('#room'+subject).val(data[7]);
                $("#mode"+subject).val("edit");
                $("#ID"+subject).val(subject);
              });

              $('table.schedule tbody').on( 'click', '.delete', function () {
                  count = 0;
                  var table = $(this).attr('data-rel').split('|')[1];
                  v = table;
                  var subject = $(this).attr('data-rel').split('|')[0];
                  $("#delMode"+subject).val("delete");
                  $("#delID"+subject).val(subject);
                });

              $("#subjectModals").load('<?php echo url('/loadSubjectModals');?>',function(){
                  subjectCRUD();
              });

              document.getElementById("btnPrint_printSched"+v).onclick = function () {
                  $printPP = document.getElementById("print"+v);
                  printElement($printPP);
              }
          }

            //Schedule Load Subjects Script
            $("a.subSched").on('click',function(){
              var instructorID = $(this).attr("href").split("#sched")[1];
              v = instructorID;
              $.ajax({
                url: "{{url('loadSched')}}",
                type: 'get',
                data: {
                  "teacher": instructorID,
                },
                success:function(data){
                  $("#initSched"+instructorID).load('<?php echo url('/loadSubjects');?>',function(){
                      initTables(instructorID);
                      subjectManipulation();
                  });
                },
                async:true
              });
            });

            function subjectCRUD(){
                //Schedule CRUD Script
                $("button.subject").on('click',function(){
                  if(count == 0){
                    var values = [];
                    var subject = "";
                    var teach = v;
                    if($(this).attr('data-rel') == ""){
                      for(var i = 0; i < (($("#scheduleForm").find("input").length) - 1);i++){
                        values[i] = $("#scheduleForm").find("input")[i]['value'];
                      }
                      var room = $("#scheduleForm").find('select')[0]['value'];
                    }else{
                      subject = $("div").find("div.schedModal.in").find("button.subject")[0]['id'].split('subjectSubmit')[1];
                      for(var i = 0; i < (($("#scheduleForm"+subject).find("input").length) - 2);i++){
                        values[i] = $("#scheduleForm"+subject).find("input")[i]['value'];
                      }
                      var room = $("#scheduleForm"+subject).find('select')[0]['value'];
                    }
                    $.ajax({
                      url: "{{url('subject')}}",
                      type: 'post',
                      postType: 'json',
                      data: {
                        "_token": "{{csrf_token()}}",
                        "teacher": teach,
                        "values": values,
                        "room": room,
                        "init": $("#addMode").val(),
                        "mode": $("#mode"+subject).val(),
                        "subject": $("#ID"+subject).val(),
                        "delMode": $("#delMode"+subject).val(),
                        "delSubject": $("#delID"+subject).val(),
                      },
                      success:function(data){
                          $("#initSched"+teach).load('<?php echo url('/loadSubjects');?>',function(){
                              initTables(teach);
                              subjectManipulation();
                          });
                      },
                      fail:function(data){
                        console.log("FALSE!");
                        return false;
                      },
                      async:true
                    });
                    count++;
                  }
                });
            }

            function printElement(elem) {
                var domClone = elem.cloneNode(true);

                var $printSection = document.getElementById("printSection");

                if (!$printSection) {
                    var $printSection = document.createElement("div");
                    $printSection.id = "printSection";
                    document.body.appendChild($printSection);
                }

                $printSection.innerHTML = "";
                $printSection.appendChild(domClone);
                window.print();
            }
      });
    </script>

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
