<style>
            .modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}


</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Teachers
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List of Teachers</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <a href="<?php echo base_url(); ?>view/create_teacher" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span></a>
          <div class="box" style = "margin-top: 5px;">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Teacher Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="adminTable" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile No</th>
                  <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>
                      <?php 
                    try {
                      $hid = 1;
                      foreach ($users as $user) { ?>
                        <!--<input type = "hidden" id = "userInfo<?php echo $hid; ?>" value = '{"fname":"<?php echo $user['fname']; ?>","lname":"<?php echo $user['lname']; ?>","img":"<?php echo $user['img']; ?>","mobile_no":"<?php echo $user['mobile_no']; ?>","email":"<?php echo $user['email']; ?>","type":"Teacher","img":"<?php echo $user['img']; ?>"}' />-->
                        <tr>
                          <td><?php echo $user['account_id']; ?></td>
                          <td><?php 
                              echo $user['fname'].' '.$user['lname']; ?>
                          </td>
                          <td><?php echo $user['mobile_no']; ?></td>
                          <td style = "width:200px;">
                              <input type = "hidden" id = "baseUrl" value = "<?php echo base_url(); ?>"></div>
                              <center>
                                  <div class="btn-group">
                                      <a href="<?php echo base_url(); ?>view/edit_teacher/<?php echo $user['account_id']; ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-edit"></span></a>
                                      <button id = '{"link":"<?php echo base_url().'admin_controller/delete_user'; ?>","id":"<?php echo $user['account_id']; ?>"}' type="button" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#deleteModal" >
                                          <i class="glyphicon glyphicon-remove"></i>
                                       </button>
                                       <button type="button" class="btn btn-warning btnShowInfo" data-toggle="modal" data-target="#infoModal" id = '{"fname":"<?php echo $user['fname']; ?>","lname":"<?php echo $user['lname']; ?>","img":"<?php echo $user['img']; ?>","mobile_no":"<?php echo $user['mobile_no']; ?>","email":"<?php echo $user['email']; ?>","type":"Teacher","img":"<?php echo $user['img']; ?>"}' >
                                          <i class="fa fa-eye"></i>
                                      </button>     
                                  </div>
                              </center>
                              
                          </td>
                        </tr>
                        <?php $hid = $hid + 1; ?>
                <?php  }
                    }
                    catch(Exception $e) { }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>


        <!--DELETE USER MODAL-->
        <div class="modal fade" id="deleteModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Message</h4>
              </div>
              <div class="modal-body">
                <p>Do you want to delete the selected user?<!--&hellip;--></p>
              </div>
              <div class="modal-footer">
                <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id = "deleteModalYes">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        
        <div class="modal fade" id="infoModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">User Information</h4>
              </div>
              <div class="modal-body" style = "background-color: rgb(248,250,250);">
                <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img id = "modalPicture" style = "width:150px;height:150px;" class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'profile/default.png'; ?>" alt="User profile picture">

                      <h3 class="profile-username text-center" id = "fullName">Sample Name</h3>

                      <p class="text-muted text-center" id = "userType">Administrator</p>
                      <div class = "col-xs-1"></div>
                      <div class = "col-xs-10">
                      <ul id = "modalInfos" class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Mobile No. </b><p id = "mobileNo" class = "pull-right">09152774521</p>
                        </li>
                        <li class="list-group-item">
                          <b>Email</b><p id = "email" class = "pull-right">example@yahoo.com</p>
                        </li>
                      </ul>
                      </div>

                    </div>
                    <!-- /.box-body -->
                  </div>
                <!--<div class = "row">
                  <div class = "col-lg-5">
                      <div class="form-group">
                          <div class="thumbnail"  style="width:200px; height: 200px;">
                              <img style ="width:100%; height:100%" src="" alt="No Image" id="image" >
                          </div>
                      </div>
                  </div>
                </div>-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<footer class="main-footer">
    <!--<div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.-->
</footer>

<script src="<?php echo base_url();?>common/admin_js/list_of_users.js"></script>