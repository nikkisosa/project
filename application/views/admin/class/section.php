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
        <li class="active">Section</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Section</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="section-table" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Section</th>
                  <th>Session</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($section)){

                }else{
                    foreach($section as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="section-id" id="section-id" value="'.$item["section_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="section-title" id="section-title" value="'.$item["section"].'">
                                  '.$item["section"].'('.$item["year"].')</td>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="section-year" id="section-year" value="'.$item["year_id"].'">
                                  '.$item["session"].'</td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary section-edit" name="section-edit" id="section-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger section-remove" name="section-remove" id="section-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                    <h3 class="box-title">Save Section</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/section'); ?>
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
                    <label>Section:<?php echo form_error('section', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <input type="text" class="form-control" name="section" id="section" placeholder="ex. Sampaguita" value="<?php echo set_value('section');?>" size="50">
                    </div>

                   <div class="form-group">
                    <label>Year Level:<?php echo form_error('year-level', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="year-level" id="year-level" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose year level</option>
                        <?php
                            if(empty($year)){

                            }else{
                                foreach ($year as $value) {
                                    echo '<option value="'.$value['year_id'].'">'.$value['year'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="section-clear" id="section-clear">clear</button>
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

