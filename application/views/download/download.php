
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Downloads
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List of uploaded files</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
          
          <?php

          if($this->session->userdata('role') == 'admin'){
            ?>
               <div class="col-lg-7">
                  <div class="info-box"  style="padding:2%;">
                    <table id="downloads" class="table table-bordered table-striped">
                      <thead >
                      <tr>
                        
                        <td>
                          File name
                        </td>
                        <td>
                          Allowed
                        </td>
                        <td>
                          
                        </td>
                      </tr>
                      </thead>
                       <tbody >
                      <?php

                      if(!empty($files)){
                        foreach ($files as $file) {
                          echo '<tr>';
                          echo '<td>
                                <input type="hidden" value="'.$file['files_id'].'" id="file_id">
                                <input type="hidden" value="'.$file['name'].'" id="file_name">'.$file['name'].
                                '</td>';
                          echo '<td><input type="hidden" value="'.$file['allowed_user'].'" id="allowed_user_id">'.$file['allowed_user'].'</td>';
                          echo ' <td>
                                <button class="btn btn-warning download-edit" id="download-edit"><i class="fa fa-pencil-square-o"></i></button>
                                <button class="btn btn-danger download-remove" id="download-remove"><i class="fa fa-times"></i></button>
                                <a href="'.base_url().'/'.$file['filepath'].'" download class="btn btn-primary download-view" id="download-view"><i class="fa fa-eye"></i></a>
                                 </td>';
                          echo '</tr>';
                        }
                      }else{

                      }

                      ?>
                       </tbody >
                    </table>
                  </div>
                </div>


                <div class="col-lg-5">
                  <div class="info-box"  style="padding:2%;">
                    <?php echo form_open_multipart('view/upload_files'); ?>
                    <?php
                        if(empty($this->session->flashdata('msg')))
                        {

                        }
                        else
                        {
                            echo $this->session->flashdata('msg');
                        }
                    ?>
                    <div class="form-group" style="display: none">
                          <label>id</label>
                           <input type="hidden" class="form-control" name="priority" id="download_id" value="default">
                    </div>
                    <div class="form-group">
                          <label>File name:</label>
                          <?php echo form_error('filename', '<div class="error">', '</div>'); ?>
                           <input type="text" class="form-control" name="filename" id="filename" value="<?php echo set_value('filename');?>">
                    </div>
                    <div class="form-group">
                          <label>File:</label>
                          <?php echo form_error('filepath', '<div class="error">', '</div>'); ?>
                           <input type="file" class="form-control" name="filepath" id="filepath" value="<?php echo set_value('filepath');?>">
                    </div>

                    <div class="form-group">
                          <label>Allowed User:</label>
                          <?php echo form_error('allowed_user', '<div class="error">', '</div>'); ?>
                           <select name="allowed_user" id="allowed_user" class="form-control" value="<?php echo set_value('allowed_user');?>">
                            <option disabled="true">------</option>
                             <option value="Student">Student</option>
                             <option value="Teacher">Teacher</option>
                             <option value="All">All</option>
                           </select>
                    </div>

                    <div class="box-footer">
                        <button class="btn btn-default pull-right" name="btn-save-download" id="btn-save-download">Save</button>
                        <button  class="btn btn-default pull-right" name="btn-clear-download" id="btn-clear-download">clear</button>
                    </div>
                  </div>
                </div>
            </div>
            <?php
          }else{

            ?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="info-box"  style="padding:2%;">
              <table id="downloads" class="table table-bordered table-striped">
                <thead >
                <tr>
                  
                  <td>
                    File name
                  </td>
                  <td>
                    Allowed
                  </td>
                  <td>
                    action
                  </td>
                </tr>
                </thead>
                 <tbody >
                <?php

                if(!empty($files)){
                  foreach ($files as $file) {
                    echo '<tr>';
                    echo '<td>
                          <input type="hidden" value="'.$file['files_id'].'" id="file_id">
                          <input type="hidden" value="'.$file['name'].'" id="file_name">'.$file['name'].
                          '</td>';
                    echo '<td><input type="hidden" value="'.$file['allowed_user'].'" id="allowed_user_id">'.$file['allowed_user'].'</td>';
                    echo ' <td>
                          <a href="'.base_url().'/'.$file['filepath'].'" download class="btn btn-warning download-view" id="download-view"><i class="fa fa-download"></i></a>
                           </td>';
                    echo '</tr>';
                  }
                }else{

                }

                ?>
                 </tbody >
              </table>
            </div>
          </div>
            <?php
          }

          ?>
          
    </section>

  </div>
<footer class="main-footer">
    <!--<div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.-->
</footer>
