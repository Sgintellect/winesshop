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
            <i class="fa fa-cogs"></i> <span>Manage State Work</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="india_list.php"><i class="fa fa-circle-o"></i>Wineshop List</a></li>            
            <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="add_state.php"><i class="fa fa-circle-o"></i>Add State</a></li>

                
                <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="satate_list.php"><i class="fa fa-circle-o"></i>Work Place</a></li>

                
                <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="add_city.php"><i class="fa fa-circle-o"></i>Add District</a></li>

                
                <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="city_list.php"><i class="fa fa-circle-o"></i>District_list</a></li>
				<li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="authenticate_Shop.php"><i class="fa fa-circle-o"></i>Authenticate Shop</a></li>

                                
          </ul>
		 </li>
		 
		     <li class="treeview <?php echo(basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='services-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Manage Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="add_category.php"><i class="fa fa-circle-o"></i>Add Category</a></li>
  <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='company_list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="category_list.php"><i class="fa fa-circle-o"></i>Delete Category</a></li></ul></li>
				
		     <li class="treeview <?php echo(basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='services-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Manage Shop</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">            
<li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="shop_model.php"><i class="fa fa-circle-o"></i>Add MyShop</a></li>
  <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='company_list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="shop_list.php"><i class="fa fa-circle-o"></i>Shop List</a></li></ul></li>			
				
				
				
    <li class="treeview <?php echo(basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='services-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Company Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='appointment-list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="company.php"><i class="fa fa-circle-o"></i>company</a></li>
  <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='company_list.php' || basename($_SERVER['SCRIPT_NAME'])=='appointment-addf.php')?'active' :'' ?>">
                <a href="company_list.php"><i class="fa fa-circle-o"></i>company_list</a></li></ul></li>
				
				
				
		 <li class="treeview <?php echo(basename($_SERVER['SCRIPT_NAME'])=='services-list.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php'||basename($_SERVER['SCRIPT_NAME'])=='services-list.php')?'active' :'' ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-cogs"></i> <span>Admin Profile Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">            
              <li class="<?php echo (basename($_SERVER['SCRIPT_NAME'])=='profile_details.php' || basename($_SERVER['SCRIPT_NAME'])=='services-addf.php')?'active' :'' ?>">
                <a href="profile_details.php"><i class="fa fa-circle-o"></i>Add  Profile Details</a></li> <li>
                <a href="wineshop_list.php"><i class="fa fa-circle-o"></i>Wineshop  Details</a></li>		</ul></li></ul>

  </section>
  <!-- /.sidebar -->
</aside>
