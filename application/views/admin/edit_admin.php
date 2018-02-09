
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>view/admin_list">List of Admin</a></li>
        <li class="active">Edit Admin</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-xs-12">
            <form role="form" id = "formUser" action = '<?php echo base_url(); ?>admin_controller/edit_admin' enctype="multipart/form-data" name="Form_register">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Information</h3>
            </div>
            
            
            <div class="box-body">
              <div class = "col-xs-3"></div>
              <div class = "col-md-6">
                  <div id = "errorModal" class="alert alert-danger">
                  </div>
                  <div id = "successModal" class="alert alert-success">
                  </div>

                  <center>
                    <?php 
                      $myprofile = base_url().'profile/default.png';
                      if($users[0]['img'] != '') {
                        $myprofile = base_url().$users[0]['img'];
                      }
                    ?>
                      <div class="form-group">
                      <label>Photo </label>
                      <div class="thumbnail" style = "height:206px; width: 200px;">
                        <img src="<?php echo $myprofile; ?>" alt="No Image" style="width:100%; height:89%;" name="profile_reg" id="profile_reg">
                        <input type="file" accept="image/*" onchange="readURL_reg(this);" name="name_pic_profile" id="name_pic_profile"/>
                        <input type = "hidden" name='dispName' id = 'dispName' size=20 >
                        </div>
                      </div>
                  </center>
                  <input type = "hidden" id = 'base_url' value="<?php echo base_url(); ?>">
                  <!-- text input -->
                  <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id = "txtFname" class="form-control" placeholder="First Name*" value = "<?php echo $users[0]['fname']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id = "txtMname" class="form-control" placeholder="Middle Name" value = "<?php echo $users[0]['mname']; ?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id = "txtLname" class="form-control" placeholder="Last Name*" value = "<?php echo $users[0]['lname']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile-phone" style = "font-size:20px; width: 14px;"></i></span>
                    <input type="text" id = "txtMno" class="form-control" placeholder="Mobile No.*" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value = "<?php echo $users[0]['mobile_no']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" id = "txtEmail" class="form-control" placeholder="Email" value = "<?php echo $users[0]['email']; ?>" >
                    </div>
                  </div>
              </div>
            </div>
            
            <div class="box-footer">
            <div class = "col-xs-3"></div>
            <div class = "col-md-6">
                <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                <button type="submit" id = "btnSave" class="btn btn-primary pull-right">Save</button>
            </div>
            </div>

            <!-- /.box-body -->
            </div>
            </form>
          </div>
      </div>
    </section>

  </div>
<footer class="main-footer">
    <!--<div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.-->
</footer>
<script src="<?php echo base_url();?>common/admin_js/browse.js"></script>
<script src="<?php echo base_url();?>common/admin_js/edit_user.js"></script>