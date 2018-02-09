
  $(document).ready(function() {
    $('.alert').hide();
    function errorModal(msg) {
      window.scrollTo(0,0);
      var str = '<strong>Error!</strong> '+msg;
      $('#errorModal').html(str);
      $('#errorModal').fadeIn();
      $('#errorModal').delay(3000).fadeOut();
    }
    function successModal(msg) {
      window.scrollTo(0,0);
      $('#errorModal').hide();
      var str = '<strong>Success!</strong> '+msg;
      $('#successModal').html(str);
      $('#successModal').fadeIn();
      $('#successModal').delay(3000).fadeOut();
    }
    function clearText() {
      $('#txtFname').val('');
      $('#txtMname').val('');
      $('#txtLname').val('');
      $('#txtMno').val('');
      $('#txtEmail').val('');
      $('#txtUsername').val('');
      $('#txtPassword').val('');
      $('#txtCPassword').val('');
    }
    $('#formUser').submit(function(e) {
      e.preventDefault();
      var me = $(this);
      var formData = new FormData(this);
      var txtFname = $('#txtFname').val();
      var txtMname = $('#txtMname').val();
      var txtLname = $('#txtLname').val();
      var txtMobile = $('#txtMno').val();
      var txtEmail = $('#txtEmail').val();
      var baseUrl = $('#base_url').val();
      var image = $('#dispName').val();
      if(image == '' || image == ' ' || image == null) {
        image = 'nothing';
      }

      let param = window.location.href;
      var arr = param.split('/');
      var id = arr[arr.length-1];

      $.post(me.attr('action'),{id:id,fname:txtFname,mname:txtMname,lname:txtLname,no:txtMobile,email:txtEmail,img:image},function(data) {
        if(data == 'success') {
          $.ajax({
                  url:baseUrl+'Admin_controller/upload_user_profile',
                  method:'POST',
                  data: formData,
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(data) {
                  }
          });
          successModal('Account updated successfully.');
        }
        else {
          errorModal(data);
        }
      });
    });
    
  });
  