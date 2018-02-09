

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>common/component/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>common/component/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>common/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>common/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>common/component/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>common/component/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>common/plugins/toastr/toastr.min.js"></script>
</body>
</html>

<script>
  $(function () {

    setTimeout(function() {
      $('#sms-flash').css({'display':'none'});
    }, 5000);

    $('#sms-config').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#announcement').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })


    $('#downloads').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#sms-notification').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#send-sms').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#sms-type').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#session').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#yearlevel').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#section-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#subject-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#subject-section').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#class-schedule').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })
    
  })

  function toast(msg,types="success"){
      Command: toastr[types](msg)
                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
  }

  $(document).ready(()=>{
        $('#clear').click((e)=>{
            e.preventDefault();
            $('#sms_id').val('default');
            $('#email').val('');
            $('#password').val('');
            $('#deviceid').val('');
            $('#name').val('');
        })


        $('#sms-config').on('click','.smsedit',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="smsmodem_id"]').val();
            var email = $(this).closest("tr").find('input[id*="smsusername"]').val();
            var password = $(this).closest("tr").find('input[id*="smspassword"]').val();
            var deviceid = $(this).closest("tr").find('input[id*="smsdevice_id"]').val();
            var modem_name = $(this).closest("tr").find('input[id="modem_name"]').val();
            $('#sms_id').val(id);
            $('#email').val(email);
            $('#password').val(password);
            $('#deviceid').val(deviceid);
            $('#name').val(modem_name);
        })
        $('#sms-config').on('click','.smsremove',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="smsmodem_id"]').val();
            var row = $(this).closest("tr");
            console.log(id);
            $.post('sms_delete',{id:id},function(data){
                row.remove();
                var table = $('#example').DataTable();
                table.ajax.reload();
            });
        })

        $('#send').click(function(e){
            e.preventDefault();
            var modem = $("select[id='modem']").val();
            var number = $('#number').val();
            var message = $('#message').val();

            $.post('send',{modem:modem,number:number,message:message},function(data){
                if(data == 200){
                    toast('message sent');
                }else{
                    toast('sending failed','error')
                }
            })
        })


        ////////////////////////DOWNLOADS///////////////////////

        $('#downloads').on('click','.download-edit',function(e){
          e.preventDefault();
          var file_id = $(this).closest("tr").find('input[id="file_id"]').val();
          var file_name = $(this).closest("tr").find('input[id="file_name"]').val();
          var allowed = $(this).closest("tr").find('input[id="allowed_user_id"]').val();

          $('#filename').val(file_name);
          $('#allowed_user').val(allowed).change();
          $('#download_id').val(file_id);

        })

        $('#downloads').on('click','.download-remove',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="file_id"]').val();
            var row = $(this).closest("tr");
            $.post('file_remover',{id:id},function(data){
                row.remove();
                console.log(data);
                //var table = $('#downloads').DataTable();
                //table.ajax.reload();
            });
        })

        $('#btn-clear-download').click((e)=>{
            e.preventDefault();
            $('#download_id').val('default');
            $('#allowed_user').val('');
            $('#filename').val('');
        })


        ////////////////////////SMS///////////////////////

         $('#sms-notification').on('click','.notif-edit',function(e){
          e.preventDefault();
          var notif_id = $(this).closest("tr").find('input[id="notif-id"]').val();
          var title = $(this).closest("tr").find('input[id="notif-title"]').val();
          var notif_message = $(this).closest("tr").find('input[id="notif-message"]').val();
          var notif_type_id = $(this).closest("tr").find('input[id="notif-type-id"]').val();

          $('#priority').val(notif_id);
          $('#title').val(title);
          $('#message').val(notif_message);
          $('#type').val(notif_type_id);
        })

         $('#sms-notification').on('click','.notif-remove',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="notif-id"]').val();
            var row = $(this).closest("tr");
            $.post('delete_sms_template',{id:id},function(data){
              console.log(id);
                row.remove();
                //var table = $('#downloads').DataTable();
                //table.ajax.reload();
            });
        })

        $('#sms-clear').click((e)=>{
            e.preventDefault();
            $('#priority').val('');
            $('#title').val('');
            $('#message').val('');
        })

         $('#sms-type').on('click','.type-edit',function(e){
          e.preventDefault();
          var type_id = $(this).closest("tr").find('input[id="type-id"]').val();
          var title = $(this).closest("tr").find('input[id="type-title"]').val();

          $('#priority').val(type_id);
          $('#title').val(title);
        })

        $('#type-clear').click((e)=>{
            e.preventDefault();
            $('#priority').val('');
            $('#title').val('');
        })

        $('#sms-type').on('click','.type-remove',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="type-id"]').val();
            var row = $(this).closest("tr");
            $.post('sms_type_archive',{id:id},function(data){
              console.log(id);
                row.remove();
                //var table = $('#downloads').DataTable();
                //table.ajax.reload();
            });
        })

        $('#types').change(function(){
          $('#message').val($('#types option:selected').val());
        })

        $('#send-to').change(function(){
          var selected = $('#send-to option:selected').val();
          if(selected == 'Specific'){
            $("#numbers").css({'display' : ''});
          }else{
            $("#numbers").css({'display' : 'none'});
          }
        })

        $('#send-sms').on('click','.user-edit',function(e){
          e.preventDefault();
          var number = $(this).closest("tr").find('input[id="user-number"]').val();
          var numbers = $('#number').val();
          if(numbers == ''){
            $('#number').val(number);
          }else{
            $('#number').val($('#number').val()+' '+number);
          }
          
        })

        $('#user-clear').click(function(e){
          e.preventDefault();
          $('#number').val('');
          $('#message').val('');
        })

        /**
        * announcement
        *
        */

        $('#announcement').on('click','.announcement-edit',function(e){
          e.preventDefault();
          var announcement_id = $(this).closest("tr").find('input[id="announcement-id"]').val();
          var announcement_title = $(this).closest("tr").find('input[id="announcement-title"]').val();
          var announcement_content = $(this).closest("tr").find('input[id="announcement-content"]').val();
          var announcement_date = $(this).closest("tr").find('input[id="announcement-date"]').val();
          // var announcement_priority = $(this).closest("tr").find('input[id="announcement-priority"]').val();
          console.log(announcement_date);
          $('#priority').val(announcement_id);
          $('#title').val(announcement_title);
          $('#content').val(announcement_content);
          $('#date').val(announcement_date);
        })

        $('#announcement').on('click','.announcement-view',function(e){
          e.preventDefault();
          var announcement_title = $(this).closest("tr").find('input[id="announcement-title"]').val();
          var announcement_content = $(this).closest("tr").find('input[id="announcement-content"]').val();
          $('#modalHeader').text(announcement_title);
          $('#modalContent').text(announcement_content);
          $('#myModal').modal('show');
        })

        $('#announcement').on('click','.announcement-like',function(e){
          e.preventDefault();
          var announcement_id = $(this).closest("tr").find('input[id="announcement-id"]').val();
          
          $('#announcement-approve-id').val(announcement_id);
          $('#myModalApproval').modal('show');
        })

        $('#announcement').on('click','.announcement-remove',function(e){
          e.preventDefault();
          var announcement_id = $(this).closest("tr").find('input[id="announcement-id"]').val();
          
          $('#announcement-delete-id').val(announcement_id);
          $('#myModalArchive').modal('show');
        })

        $('#announcement-yes').click(function(e){
          var id = $('#announcement-approve-id').val();

          $.post('<?php echo base_url();?>view/announcement_approval',{id:id,approval:'yes'},function(data){
            location.reload();
          });
        })

        $('#announcement-no').click(function(e){
          var id = $('#announcement-approve-id').val();

          $.post('<?php echo base_url();?>view/announcement_approval',{id:id,approval:'no'},function(data){
            location.reload();
          });
        })

        $('#announcement-archive').click(function(e){
          e.preventDefault();
          var id = $('#announcement-delete-id').val();

          $.get('<?php echo base_url();?>view/annoucement_archived?id='+id,function(data){
              location.reload();
            });
        })

        $('#session').on('click','.session-edit',function(e){
          e.preventDefault();
          var session_id = $(this).closest("tr").find('input[id="session-id"]').val();
          
          $.post('<?php echo base_url();?>view/session',{save:'save',id:session_id},function(data){
              location.reload();
            });
        })

        /**
        *
        * Year Level
        *
        */
        $('#yearlevel').on('click','.year-edit',function(e){
          e.preventDefault();
          var priority_id = $(this).closest("tr").find('input[id="year-id"]').val();
          var title = $(this).closest("tr").find('input[id="year-title"]').val();
          var session_id = $(this).closest("tr").find('input[id="year-session"]').val();
          $('#priority').val(priority_id);
          $('#title').val(title);
          $('#sessions').val(session_id);
        })


        $('#yearlevel').on('click','.year-remove',function(e){
          e.preventDefault();
          var session_id = $(this).closest("tr").find('input[id="year-id"]').val();
          
          $.post('<?php echo base_url();?>view/archive_year',{id:session_id},function(data){
              location.reload();
            });
        })

        $('#year-clear').click(function(e){
          e.preventDefault();
          $('#priority').val('');
          $('#title').val('');
        })

        /**
        *
        * Section
        */
        $('#section-table').on('click','.section-edit',function(e){
          e.preventDefault();
          var priority_id = $(this).closest("tr").find('input[id="section-id"]').val();
          var section = $(this).closest("tr").find('input[id="section-title"]').val();
          var year_id = $(this).closest("tr").find('input[id="section-year"]').val();
          $('#priority').val(priority_id);
          $('#section').val(section);
          $('#year-level').val(year_id);
        })


        $('#section-table').on('click','.section-remove',function(e){
          e.preventDefault();
          var section_id = $(this).closest("tr").find('input[id="section-id"]').val();
          
          $.post('<?php echo base_url();?>view/archive_section',{id:section_id},function(data){
              location.reload();
            });
        })

        $('#section-clear').click(function(e){
          e.preventDefault();
          $('#priority').val('');
          $('#title').val('');
        })

        /**
        *
        * subject
        */
        $('#subject-table').on('click','.subject-edit',function(e){
          e.preventDefault();
          var priority_id = $(this).closest("tr").find('input[id="subject-id"]').val();
          var subject = $(this).closest("tr").find('input[id="subject-title"]').val();
          $('#priority').val(priority_id);
          $('#subject').val(subject);
        })


        $('#subject-table').on('click','.subject-remove',function(e){
          e.preventDefault();
          var section_id = $(this).closest("tr").find('input[id="subject-id"]').val();
          
          $.post('<?php echo base_url();?>view/archive_subject',{id:section_id},function(data){
              location.reload();
            });
        })

        $('#subject-clear').click(function(e){
          e.preventDefault();
          $('#priority').val('');
          $('#subject').val('');
        })

        /**
        *
        * assign subject to section
        */
        $('#subject-section').on('click','.sub-edit',function(e){
          e.preventDefault();
          var priority_id = $(this).closest("tr").find('input[id="sub-id"]').val();
          var section_id = $(this).closest("tr").find('input[id="sub-section"]').val();
          var subject_id = $(this).closest("tr").find('input[id="sub-subject"]').val();
          $('#priority').val(priority_id);
          $('#section-sub').val(section_id);
          $('#subject-sub').val(subject_id);
        })


        $('#subject-section').on('click','.sub-remove',function(e){
          e.preventDefault();
          var section_id = $(this).closest("tr").find('input[id="sub-id"]').val();
          
          $.post('<?php echo base_url();?>view/deleted_assign_subject',{id:section_id},function(data){
              location.reload();
            });
        })

        $('#subject-clear').click(function(e){
          e.preventDefault();
          $('#priority').val('');
          $('#subject').val('');
        })


        /**
        *
        * assign class schedule
        */
        $('#class-schedule').on('click','.class-edit',function(e){
          e.preventDefault();
          var priority_id = $(this).closest("tr").find('input[id="class-id"]').val();
          var year_id = $(this).closest("tr").find('input[id="class-year"]').val();
          var time_id = $(this).closest("tr").find('input[id="class-time"]').val();
          var class_subject = $(this).closest("tr").find('input[id="class-subject"]').val();
          $.post('<?php echo base_url();?>view/get_subject',{year_id:year_id},function(data){
              var json = JSON.parse(data);
              $('#subject-sub').children('option:not(:first)').remove();
              if(data){
                json.map((item, i) =>{
                  $("#subject-sub").append('<option value="'+item.subject+'">'+item.subject+'</option>');
                });
              }
            });

          $.post('<?php echo base_url();?>view/get_time',{time_id:time_id},function(data){
              var json = JSON.parse(data);
              if(data){
                json.map((item, i) =>{
                  $('#time-sub').val(item.time).change();
                });
              }
            });

          $('#priority').val(priority_id);
          $('#year-sub').val(year_id);
        })

        $('#year-sub').change(function(e){
          e.preventDefault();
          var year_id = $('#year-sub option:selected').val();
          $.post('<?php echo base_url();?>view/get_subject',{year_id:year_id},function(data){
              var json = JSON.parse(data);
              $('#subject-sub').children('option:not(:first)').remove();
              if(data){
                json.map((item, i) =>{
                  $("#subject-sub").append('<option value="'+item.subject+'">'+item.subject+'</option>');
                });
              }
            });
        })


        $('#class-schedule').on('click','.class-remove',function(e){
          e.preventDefault();
          var class_id = $(this).closest("tr").find('input[id="class-id"]').val();
          
          $.post('<?php echo base_url();?>view/deleted_class_sched',{id:class_id},function(data){
              location.reload();
            });
        })

        $('#subject-clear').click(function(e){
          e.preventDefault();
          $('#priority').val('');
          $('#subject').val('');
        })
    })
</script>
