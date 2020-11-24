<?php 
session_start();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
<a href="http://localhost/wine/admin_ram" class="brand-link">
  <span class="logo-lg"><img src="images/footer-logo.png" class="img-circle" alt="Cinque Terre" style="width: 76px;
    height: 58px;
    margin-top: -62px;
    border-radius: 100%;
    margin-left: 62px;"></span><br><br>
      
         <!-- echo    =$row['name'];
          echo   $_SESSION['image']=$row['photo']; -->
      <span class="brand-text font-weight-light"></span>
      
    </a>
	
         <!-- echo    =$row['name'];
          echo   $_SESSION['image']=$row['photo']; -->
      <span class="brand-text font-weight-light uuu"><?= $_SESSION['aaaa']; ?></span>
      
    </a>
	
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
     
    <!-- Sidebar user panel -->
    <div class="user-panel">
  
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      
        
          <li class="treeview <?php echo  (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='contact-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Manage Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="add_student.php"><i class="fa fa-circle-o"></i>Add Student</a></li>     
                                   
          </ul>
		  
		  <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="student-list.php"><i class="fa fa-circle-o"></i>Student Manager</a></li>     
                                   
          </ul>
          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='' || basename($_SERVER['SCRIPT_NAME'])=='')?'active' :'' ?>">
        <a href="user_log.php"><i class="fa fa-circle-o"></i>User Log </a></li>     
                                   
          </ul>
		  
        </li>
        <li class="treeview <?php echo  (basename($_SERVER['SCRIPT_NAME'])=='user-list.php' || basename($_SERVER['SCRIPT_NAME'])=='user-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='user-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Teacher Manage </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='user-list.php' || basename($_SERVER['SCRIPT_NAME'])=='user-addf.php')?'active' :'' ?>">
                <a href="user-list.php"><i class="fa fa-circle-o"></i>Teacher Registration</a></li>     
                                   
          </ul>
		  
        </li>

        

        <li class="treeview <?php echo(basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='services-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Upload Video</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php')?'active' :'' ?>">
                <a href="services-list.php"><i class="fa fa-circle-o"></i>Manage Video</a></li>     
                                   
          </ul>
          
        </li>
		 <li class="treeview <?php echo(basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='services-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='school_details.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php')?'active' :'' ?>">
                <a href="school_details.php"><i class="fa fa-circle-o"></i>Add  School Details</a></li> 
<li>
                <a href="school_details_list.php"><i class="fa fa-circle-o"></i>School Details</a></li>				
                                   
          </ul>
		  
       <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='' || basename($_SERVER['SCRIPT_NAME'])=='class.php')?'active' :'' ?>">
                <a href="class_list.php"><i class="fa fa-circle-o"></i>Class</a></li>     
                                   
          </ul>
		  <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php')?'active' :'' ?>">
                <a href="subject_list.php"><i class="fa fa-circle-o"></i>Add Subject</a></li>     
                                   
          </ul>
        </li>
         

               
      
     
                      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
