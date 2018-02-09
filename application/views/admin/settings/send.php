 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send SMS
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
              <h3 class="box-title">List of user</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="send-sms" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Name</th>
                  <th>Number</th>
                  <th>role</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($users)){

                }else{
                    foreach($users as $item){
                        echo '<tr>';
                        echo '';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="user-id" id="user-id" value="'.$item["account_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="user-name" id="user-name" value="'.$item["name"].'">
                                  '.$item["name"].'</td>';
                        echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="user-number" id="user-number" value="'.$item["mobile_no"].'">
                                        '.$item["mobile_no"].'
                                    </td>';
                        echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="user-role" id="user-role" value="'.$item["type"].'">
                                        '.$item["type"].'
                                    </td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary user-edit" name="user-edit" id="user-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
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
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php

                        if(empty($this->session->flashdata('sms')))
                        {

                        }
                        else
                        {
                            echo $this->session->flashdata('sms');
                        }
                    ?>
                    <?php echo form_open('view/sms_send'); ?>
                    <?php
                        if(empty($this->session->flashdata('msg')))
                        {

                        }
                        else
                        {
                            echo $this->session->flashdata('msg');
                        }
                    ?>
                    
                    <div class="form-group">
                    <label>Type:<?php echo form_error('type', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="type" id="types" class="form-control" placeholder="ex. Emergency" style="color: gray; ">
                        <option value="" disabled selected>Choose template</option>
                        <?php
                            if(empty($type)){

                            }else{
                                foreach ($type as $value) {
                                    echo '<option value="'.$value['message'].'">'.$value['title'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Send to: <?php echo form_error('send-to', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                        <select class="form-control" id="send-to" name="send-to">
                            <option disabled="true" selected>-----------</option>
                            <option value="Specific">Specific</option>
                            <option value="Students">Students</option>
                            <option value="Teachers">Teachers</option>
                            <option value="Parents">Parents</option>
                            <option value="All">All</option>
                        </select>
                    </div>

                    <div class="form-group" id="numbers" style="display: none;">
                    <label>Number:<?php echo form_error('number', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <input type="text" class="form-control" name="number" id="number" placeholder="ex. 09299887561" value="<?php echo set_value('number');?>" size="50" >
                    </div>

                    <div class="form-group">
                    <label>Message:<?php echo form_error('message', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    <textarea class="form-control" style="resize:none;height:20vh" name="message" id="message" placeholder="ex. hello...."  size="50"><?php echo set_value('message');?></textarea>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="user-clear" id="user-clear">clear</button>
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
