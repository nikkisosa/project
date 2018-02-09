  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>view/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li class="active">Subject</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subject</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="subject-section" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Section</th>
                  <th>Subject</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($subject_section)){

                }else{
                    foreach($subject_section as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="sub-id" id="sub-id" value="'.$item["sub_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="sub-section" id="sub-section" value="'.$item["section_id"].'">
                                  '.$item["section"].'('.$item["year"].')</td>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="sub-subject" id="sub-subject" value="'.$item["subject_id"].'">
                                  '.$item["subject"].'</td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary sub-edit" name="sub-edit" id="sub-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger sub-remove" name="sub-remove" id="sub-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
                                  </td>';
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
                    <h3 class="box-title">Save Assign Subject</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/assign'); ?>
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
                    <label>Section:<?php echo form_error('section-sub', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="section-sub" id="section-sub" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose Section</option>
                        <?php
                            if(empty($section)){

                            }else{
                                foreach ($section as $value) {
                                    echo '<option value="'.$value['section_id'].'">'.$value['section'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Subject:<?php echo form_error('subject-sub', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="subject-sub" id="subject-sub" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose Subject</option>
                        <?php
                            if(empty($subject)){

                            }else{
                                foreach ($subject as $value) {
                                    echo '<option value="'.$value['subject_id'].'">'.$value['subject'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="sub-clear" id="sub-clear">clear</button>
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

