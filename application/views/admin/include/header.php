<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FSA | <?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>common/component/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>common/component/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>common/component/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>common/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>common/dist/css/skins/_all-skins.min.css">
  <!-- custom style -->
  <link rel="stylesheet" href="<?php echo base_url();?>common/custom/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>common/component/datatables.net-bs/css/dataTables.bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>common/component/jquery/dist/jquery.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>view/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>SA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style = "font-size:18px">Fr. Simpliciano Academy</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().$this->session->userdata('img');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().$this->session->userdata('img');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('name').' - '.$this->session->userdata('role');?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>view/admin" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().$this->session->userdata('img');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $this->session->userdata('name');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url();?>view/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>view/admin"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="<?php echo base_url();?>view/register"><i class="fa fa-circle-o"></i> Create New user</a></li>
          </ul>
        </li>-->

        <!--USER MAINTENANCE-->

         <li>
          <a href="<?php echo base_url();?>forum/">
            <i class="fa fa-keyboard-o"></i> <span>Forum</span>
          </a>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>User Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>view/admin_list"><i class="fa fa-circle-o"></i> Admin</a></li>
            <li><a href="<?php echo base_url(); ?>view/teacher_list"><i class="fa fa-circle-o"></i> Teacher</a></li>
            <li><a href="<?php echo base_url(); ?>view/student_list"><i class="fa fa-circle-o"></i> Student</a></li>
            <li><a href="<?php echo base_url(); ?>view/parent_list"><i class="fa fa-circle-o"></i> Parents</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i style = "font-size: 17px;  " class="fa fa-calendar"></i> <span>Schedule</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>view/exam_sched/"><i class="fa fa-circle-o"></i>  Exam</a></li>
            <li><a href="<?php echo base_url();?>view/class_sched/"><i class="fa fa-circle-o"></i> Class</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i style = "font-size: 17px;  " class="fa fa-edit fa-fw"></i> <span>Announcement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>view/announcement/"><i class="fa fa-circle-o"></i>  Announcements</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Archived</a></li>
          </ul>
        </li>


        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>SMS Notification</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url();?>view/sms_send">
                <i class="fa fa-circle-o"></i> <span>Send sms</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url();?>view/sms_notification">
                <i class="fa fa-circle-o"></i> <span>Template</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url();?>view/sms_type">
                <i class="fa fa-circle-o"></i> <span>Type</span>
              </a>
            </li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url();?>view/upload_files">
            <i class="fa fa-download"></i> <span>Download</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-hourglass-end"></i> <span>Class</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>view/session"><i class="fa fa-circle-o"></i> Session</a></li>
            <li><a href="<?php echo base_url();?>view/year"><i class="fa fa-circle-o"></i> Year level</a></li>
            <li><a href="<?php echo base_url();?>view/section"><i class="fa fa-circle-o"></i> Section</a></li>
            <li><a href="<?php echo base_url();?>view/subject"><i class="fa fa-circle-o"></i> Subject</a></li>
            <li><a href="<?php echo base_url();?>view/assign"><i class="fa fa-circle-o"></i> Assign Subject</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>view/sms"><i class="fa fa-circle-o"></i> Sms</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>