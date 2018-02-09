 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Posted Question
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>forum"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Post Question</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-lg-7">
                <div class="info-box" style="height:70vh;padding:2%;">
                    <table id="timeline" class="table table-bordered table-striped display"> 
                    <thead>
                        <tr>
                            <td>
                                Title
                            </td>
                            <td>
                                Category
                            </td>
                            <td>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            if(!empty($threads)){
                                foreach ($threads as $value) {
                                    echo '<tr>';
                                    echo '<td>
                                    <input type="hidden" id="timeline-content" value="'.$value['content'].'">
                                    <input type="hidden" id="timeline-id" value="'.$value['thread_id'].'">
                                    <input type="hidden" id="timeline-title" value="'.$value['title'].'">'.$value['title'].'</td>';
                                    echo '<td><input type="hidden" id="timeline-category" value="'.$value['category_id'].'">'.$value['category'].'</td>';
                                    echo '<td>
                                                <a href="#"  class="btn btn-primary timeline-edit" name="timeline-edit" id="timeline-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="#"  class="btn btn-danger timeline-remove" name="timeline-remove" id="timeline-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                <a href="content?category_id='.$value['category_id'].'&thread_id='.$value['thread_id'].'"  class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                         </td>';
                                }
                            }else{
                                
                            }

                        ?>
                    </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-box" style="height:60vh;">
                    <div class="box-body">
                        <?php echo form_open('forum/post'); ?>
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
                        <label>Choose Category Name:<?php echo form_error('categoryname', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                        <?php echo form_error('categoryname', '<div class="error" style="color:red;font-size:10px;">', '</div>'); ?>

                        <select class="form-control" name="categoryname" id="categoryname" value="<?php echo set_value('categoryname');?>">
                            <option value="" disabled selected>Choose category of post</option>
                            <?php
                                foreach ($category as $value) {
                                    echo '<option value="'.$value['category_id'].'">'.$value['category'].'</option>';
                                }
                            ?>
                            
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Title:<?php echo form_error('post-title', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                                <input type="text" name="post-title" id="post-title" class="form-control">
                        </div>

                        <div class="form-group">
                        <label>Content:<?php echo form_error('post-content', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                                <textarea type="text" name="post-content" id="post-content" style="resize:none;height:20vh;" class="form-control"><?php echo set_value('post-content');?></textarea>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right" name="post-save">Save</button>
                            <button type="submit" class="btn btn-default pull-right" name="post-clear" id="post-clear">clear</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
      </div>
      <div class="row" >

      </div>
</div>
