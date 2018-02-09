 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SMS Configuration
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>view/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li class="active">SMS</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">SMS api account</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="sms-config" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Modem Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Device ID</th>
                  <th>Active modem</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($sms)){

                }else{
                    foreach($sms as $item){
                        echo '<tr>';
                         echo '    <td><input type="hidden" class="btn btn-primary" name="modem_name" id="modem_name" value="'.$item["modem_name"].'">'.$item["modem_name"].'</td>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="modem_id" id="smsmodem_id" value="'.$item["modem_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="smsusername" id="smsusername" value="'.$item["username"].'">
                                  '.$item["username"].'</td>';
                        echo '    <td><input type="hidden" class="btn btn-primary" name="smspassword" id="smspassword" value="'.$item["password"].'">'.$item["password"].'</td>';
                        echo '    <td><input type="hidden" class="btn btn-primary" name="smsdevice_id" id="smsdevice_id" value="'.$item["device_id"].'">'.$item["device_id"].'</td>';
                        echo '    <td>'.$item["active"].'</td>';
                        echo '    <td><input type="button" class="btn btn-primary smsedit" name="edit" id="smsedit" value="edit"></td>';
                        echo '    <td><input type="button" class="btn btn-danger smsremove" name="remove" id="smsremove" value="remove"></td>';
                        echo '    <td><a href="set_active_sms_modem?id='.$item["modem_id"].'" class="btn btn-warning smsset" name="smsset" id="smsset">set active</td>';
                        echo '</tr>';
                    }
                }

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

      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Save sms api</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/sms'); ?>
                    <?php
                        if(empty($this->session->flashdata('msg')))
                        {

                        }
                        else
                        {
                            echo $this->session->flashdata('msg');
                        }
                    ?>
                    <div class="form-group" style="display:none">
                    <label>id</label>
                    <input type="hidden" class="form-control" name="priority" id="sms_id" value="default">
                    </div>

                    <div class="form-group">
                    <label>Modem Name</label>
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control" name="name" id="name" placeholder="ex. asus" value="<?php echo set_value('name');?>" size="50">
                    </div>

                    <div class="form-group">
                    <label>Email</label>
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control" name="email" id="email" placeholder="ex. sample@mgail.com" value="<?php echo set_value('email');?>" size="50">
                    </div>

                    <div class="form-group">
                    <label>Password</label>
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control" name="password" id="password" placeholder="*****" value="<?php echo set_value('password');?>" size="30">
                    </div>

                    <div class="form-group">
                    <label>Device ID</label>
                    <?php echo form_error('deviceid', '<div class="error">', '</div>'); ?>
                    <input type="number" style="outline: none;" class="form-control" name="deviceid" id="deviceid" placeholder="ex. 55441" value="<?php echo set_value('deviceid');?>" size="10">
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="clear" id="clear">clear</button>
                    </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

