

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

    $('#sms-config').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true
    })

    $('#downloads').DataTable({
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
        })


        $('#sms-config').on('click','.smsedit',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="smsmodem_id"]').val();
            var email = $(this).closest("tr").find('input[id*="smsusername"]').val();
            var password = $(this).closest("tr").find('input[id*="smspassword"]').val();
            var deviceid = $(this).closest("tr").find('input[id*="smsdevice_id"]').val();
            $('#sms_id').val(id);
            $('#email').val(email);
            $('#password').val(password);
            $('#deviceid').val(deviceid);
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

        $('#announcement-archive').click(function(e){
          e.preventDefault();
          var id = $('#announcement-delete-id').val();

          $.get('<?php echo base_url();?>view/annoucement_archived?id='+id,function(data){
              location.reload();
            });
        })

        $('#announcement').on('click','.announcement-remove',function(e){
          e.preventDefault();
          var announcement_id = $(this).closest("tr").find('input[id="announcement-id"]').val();
          
          $('#announcement-delete-id').val(announcement_id);
          $('#myModalArchive').modal('show');
        })
    })
</script>
