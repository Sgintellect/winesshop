<?php
session_start();
include("include/config.php");
include("include/functions.php"); 
include("include/simpleimage.php");
 validate_admin();
    

  if($_REQUEST['submitForm']=='yes'){
  
  $name = $obj->escapestring($_POST['name']);
    $moblie = $obj->escapestring($_POST['moblie']);
	  $email = $obj->escapestring($_POST['email']);
	   $address = $obj->escapestring($_POST['address']);
  

if($_FILES['photo']['size']>0 && $_FILES['photo']['error']==''){


    $Image=new SimpleImage();
    $img=time().$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/products/".$img);
    copy("uploads/products/".$img,"uploads/products/thumb/".$img);
    $Image->load("uploads/products/thumb/".$img);
    $Image->resize(160,50);
    $Image->save("uploads/products/thumb/".$img);
    
    
    copy("uploads/products/".$img,"uploads/products/tiny/".$img);
    $Image->load("uploads/products/tiny/".$img);
    $Image->resize(100,100);
    $Image->save("uploads/products/tiny/".$img);
    
    copy("uploads/products/".$img,"uploads/products/big/".$img);
    $Image->load("uploads/products/big/".$img);
    $Image->resize(825,440);
    $Image->save("uploads/products/big/".$img);
  }
   

    if($_REQUEST['id']==''){
$obj->query("INSERT INTO `table_profile`(`name`, `photo`, `mobile_no`, `email`, `address`) VALUES ('$name','$img','$moblie','$email','$address')
"); //die;

      $_SESSION['sess_msg']='Services  added successfully';  
      
    }else{  
   
       $sql= " update $product_new set product_name='$name',`category`='$category',`Service`='$Service'";
       if($img){
        $imageArr=$obj->query("select photo from $product_new where pid=".$_REQUEST['id'],-1);
        $resultImage=$obj->fetchNextObject($imageArr);
        @unlink("uploads/products/".$resultImage->photo);
        @unlink("uploads/products/thumb/".$resultImage->photo);
        $sql.=" , photo='$img' ";
      }
       $sql.=" where pid='".$_REQUEST['id']."'";

      $obj->query($sql,-1);
      $_SESSION['sess_msg']='Services updated sucessfully';   
    }
     header("location:wineshop_list.php");
     exit();
  }      
     
     
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $product_new where pid=".$_REQUEST['id']);
$result=$obj->fetchNextObject($sql);
}
  
?>

<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("header.php"); ?>
   <?php include("menu.php"); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if($_REQUEST['id']==''){?><?php }else{?> Update <?php }?></h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="school_details_list.php">View Services List</a></li>
      </ol>
	  
	  
    </section>
    <section class="content">
      <div class="box box-primary">
		<form name="frm" id="servicefrm" method="POST" enctype="multipart/form-data" action="">
		<input type="hidden" name="submitForm" value="yes" />
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
        <div class="box-body">

       </div>
	   <div class="box-body">
	      <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
				   <input type="text" name="name" class="form-control mmm">

              </div>
            </div>

            <div class="col-md-4">
          <div class="form-group">
            <label>Mobile No. </label>
<input type="text" name="moblie" class="form-control mmm"size="1">

          </div>
        </div>
		  <div class="col-md-4">
          <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class='form-control' /><br/>
          
             
          </div>
        </div>
		 <div class="col-md-4">
          <div class="form-group">
            <label>Email Id</label>
            <input type="email" name="email" class='form-control' /><br/>
          
             
          </div>
        </div>
		 <div class="col-md-4">
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class='form-control' /><br/>
          
             
          </div>
        </div>
		
		
		
          </div>
		<div class="box-footer">
		<input type="submit" name="submit" value="Submit"  class="button" border="0"/>&nbsp;&nbsp;
		<input name="Reset" type="reset" id="Reset" value="Reset" class="button" border="0" />
		</div>
		</form>
      </div>
    </section>
  </div>
  <?php include("footer.php"); ?>
  
  <script>
Dermat: ["Age Lift Procedure","Botox","Derma Roller","Face & Body Peals","Fillers","Gold Micro Botox","Mesobotox","Vampire Facial","Hifu"],
Hair: ["Derma Roller-Scalp","Hair Style","Hair Transplant","Meso Theraphy"],
Laser: ["Full Body Laser","Laser Hair Reduction","Underarm Laser"],
Slimming: ["Ayurveda Services","Body Shaping","Figure Correction","Instant Body Sculpting","Pain Management","Weight Management"],

}
function makeSubmenu(value) {
if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
else {
var citiesOptions = "";
for(cityId in citiesByState[value]) {
citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
}
document.getElementById("citySelect").innerHTML = citiesOptions;
}
}
function displaySelected() { var country = document.getElementById("countrySelect").value;
var city = document.getElementById("citySelect").value;
alert(country+"\n"+city);
}
function resetSelection() {
document.getElementById("countrySelect").selectedIndex = 0;
document.getElementById("citySelect").selectedIndex = 0;
}
</script>


  <div class="control-sidebar-bg"></div>
</div>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.min.js"></script>
<script src="js/demo.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
    $("#servicefrm").validate();
})
</script>
</body>
</html>
