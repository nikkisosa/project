<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Create new user
      </h1>
    </section>
  <div class="register-box-body">

    <?php echo form_open('view/register'); ?>
     <?php
          if(empty($this->session->flashdata('msg')))
          {

          }
          else
          {
            echo $this->session->flashdata('msg');
          }
    ?>
    <?php echo form_error('fname', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="First name" name="fname" value="<?php echo set_value('fname'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    <?php echo form_error('mname', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Middle name" name="mname" value="<?php echo set_value('mname'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    <?php echo form_error('lname', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="last name" name="lname" value="<?php echo set_value('lname'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    <?php echo form_error('fullname', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <select name="section" placeholder="select" class="form-control" style="appearance: none;">
          <option read-only>Choose Section</option>
          <option value="BSIT211">BASIT211</option>
        </select>
        <span class="glyphicon glyphicon-list form-control-feedback"></span>
      </div>
    <?php echo form_error('username', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('password'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    <?php echo form_error('retype-password', '<div class="error">', '</div>'); ?>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="retype-password" value="<?php echo set_value('retype-password'); ?>">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 col-lg-12 col-md-12 col-sm-12">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    </div>
<!-- /.register-box -->
</div>
