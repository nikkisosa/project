<!-- jQuery 3 -->
<script src="<?php echo base_url();?>common/component/jquery/dist/jquery.min.js"></script>
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
    })
</script>
