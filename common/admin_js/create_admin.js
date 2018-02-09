
  $(document).ready(function() {
    $('.alert').hide();
    function errorModal(msg) {
      window.scrollTo(0,0);
      var str = '<strong>Error!</strong> '+msg;
      $('#errorModal').html(str);
      $('#errorModal').fadeIn();
          //$('#errorModal').delay(3000).fadeOut();
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
      $('#profile_reg').attr('src', "");
      $('#name_pic_profile').val('');
      $('#dispName').val('');
    }
    $('#formUser').submit(function(e) {
      e.preventDefault();
      var me = $(this);
      var txtFname = $('#txtFname').val();
      var txtMname = $('#txtMname').val();
      var txtLname = $('#txtLname').val();
      var txtMobile = $('#txtMno').val();
      var txtEmail = $('#txtEmail').val();
      var txtUsername = $('#txtUsername').val();
      var txtPassword = $('#txtPassword').val();
      var txtCPassword = $('#txtCPassword').val();
      var image = $('#dispName').val();
      var baseUrl = $('#base_url').val();
      var formData = new FormData(this);

      if(image == '' || image == ' ' || image == null) {
        image = 'nothing';
      }

      if(txtMobile.trim().length != 11) {
        errorModal('Invalid Mobile number.');
      }
      else if(txtUsername.trim().length < 6) {
        errorModal('Username must be 7 to 15 characters.');
      }
      else if(txtPassword.trim().length < 6) {
        errorModal('Password must be 7 to 15 characters.');
      }
      else if(txtPassword.trim() != txtCPassword.trim()) {
        errorModal("Password didn't matched.");
      }
      else {
        $.post(me.attr('action'),{fname:txtFname,mname:txtMname,lname:txtLname,mobile:txtMobile,email:txtEmail,username:txtUsername,password:txtPassword,image:image},function(data) {
            if(data=='success') {
                $.ajax({
                  url:baseUrl+'Admin_controller/upload_user_profile',
                  method:'POST',
                  data: formData,
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(data) {
                    console.log(data);
                  }
                });
                successModal('Account created successfully.');
                clearText();
            }
            else {
                errorModal(data);
            }
        });
      }
    });
  });