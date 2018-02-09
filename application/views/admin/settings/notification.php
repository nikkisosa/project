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
        <li class="active"><a href="#">Sms Notification</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">SMS Template</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="sms-notification" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($sms)){

                }else{
                    foreach($sms as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="notif-id" id="notif-id" value="'.$item["notif_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="notif-title" id="notif-title" value="'.$item["title"].'">
                                  '.$item["title"].'</td>';
                        echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="notif-message" id="notif-message" value="'.$item["message"].'">
                                        <input type="hidden" class="btn btn-primary" name="notif-type-id" id="notif-type-id" value="'.$item["type_id"].'">
                                        '.$item["type"].'
                                    </td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary notif-edit" name="notif-edit" id="notif-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger notif-remove" name="notif-remove" id="notif-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <a href="#"  class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';
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
                    <h3 class="box-title">Save template</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/sms_notification'); ?>
                    <?php
                        if(empty($this->session->flashdata('msg')))
                        {

                        }
                        else
                        {
                            echo $this->session->flashdata('msg');
                        }
                    ?>
                    <div class="form-group" style="display:none;">
                    <label>id</label>
                    <input type="text" class="form-control" name="priority" id="priority" value="<?php echo set_value('priority');?>">
                    </div>

                    
                    <div class="form-group">
                    <label>Type:<?php echo form_error('type', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="type" id="type" class="form-control" placeholder="ex. Emergency" style="color: gray; ">
                        <option value="" disabled selected>Choose type of sms</option>
                        <?php
                            if(empty($type)){

                            }else{
                                foreach ($type as $value) {
                                    echo '<option value="'.$value['type_id'].'">'.$value['type'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>


                    <div class="form-group">
                    <label>Title:<?php echo form_error('title', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <input type="text" class="form-control" name="title" id="title" placeholder="ex. Emergency template" value="<?php echo set_value('title');?>" size="50">
                    </div>

                    <div class="form-group">
                    <label>Message:<?php echo form_error('message', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    <textarea class="form-control" style="resize:none;height:20vh" name="message" id="message" placeholder="ex. hello...."  size="50"><?php echo set_value('message');?></textarea>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="sms-clear" id="sms-clear">clear</button>
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
