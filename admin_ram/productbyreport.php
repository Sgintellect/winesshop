<?php
	  session_start();
	  if(!$_SESSION["sess_admin_id"])
	  {
		 header("location:index.php?notlogedin=You are not Log in !"); 
	  }
	  
	 include("include/config.php");
    include("include/functions.php");
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Deepanjali Saloon</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/font-awesome-min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
 <!--    <link href="theme.css" rel="stylesheet"> -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
     <nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
      <div class="navbar-brand" style="text-align:left; height=2px; width=5px;"><?php echo " @! : " .$_SESSION["sess_admin_id"]."</p>" ?></div> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    
  </div><!-- /.container-fluid -->
 </nav>
 <div class="container">
 <div class="panel panel-default">
  <div class="panel-heading">
	 <i class="glyphicon glyphicon-check"></i>&nbsp;List Of Product 
	 <span style="margin-left:850px;">							 
       <!--<button id="myBtn" class="btn btn-success btn-sm" onclick="download();"><i class="fa fa-download" aria-hidden="true"></i> &nbsp;Download Excel</button>-->
         </span>
		</div>
		   </div>
 </div>
 <div class="container">
   <div class="panel panel-default">
     <div class="panel-body">
	   <div class="row">
            <div class="col-md-6">
			<div class="form-group">
 		  <select class="form-control" id="product">
			<option value="">Select Product</option>
			<?php 
       $sql= $obj->query("SELECT * from product_new where 1=1");
			 //$result=mysqli_query($conn,$sql);
			while($row=$obj->fetchNextObject($sql)){
		   ?>
			<option value="<?php echo $row->pid; ?>"><?php echo $row->product_name;?></option>
			<?php	}?>
		  </select>
		</div>
		 </div>
		 <div class="col-md-6">
		 <input type="hidden" id="iframeID" name="iframeID">
		   <button id="myBtn" class="btn btn-success btn" onclick="searchProduct();"><i class="fa fa-search" aria-hidden="true"></i> &nbsp;Search</button>
		  <button id="myBtn" class="btn btn-success btn-sm" onclick="download();"><i class="fa fa-download" aria-hidden="true"></i> &nbsp;Download Excel</button>
		 </div>
		</div>
	  </div>
   </div>
 </div>
 <div class="container theme-showcase" role="main">
	<div   class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div id="profile" style="font-size: 18px;font-weight: bold;color: #337ab7;"></div>
                <div class="clearfix"></div>
                <div class="table-responsive">
                   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
            <tr>
                <th>SNO</th>
                <th>PRODUCT NAME</th>
                <th>RATE</th>
                 <th>DATE</th>
                <!-- <th>QUANTITY</th>
                <th>AMOUNT</th>
                <th>CLIENT NAME</th>
                <th>DATE</th> -->
           </tr>
        </thead>
		
		
       <tfoot>
            <!-- <tr>
                 <th>SNO</th>
                <th>PRODUCT NAME</th>
                <th>RATE</th>
                <th>QUANTITY</th>
                <th>AMOUNT</th>
                <th>CLIENT NAME</th>
                <th>DATE</th>
            </tr> -->
        </tfoot> 
        <tbody id="bdata">
		 </tbody>
  </table>
	</div>
		</div>
			</div>
			 </div>
			 </div>
			 
				</div> <!-- /container -->
 
 	<!-- <script type="text/javascript">
	function confirmationDelete(anchor)
    {
		   var conf = confirm('Are you sure want to delete this record?');
		   if(conf)
			  window.location=anchor.attr("href");
    }
  </script>
<script type="text/javascript">
$(document).ready(function()
{
	$('#delete').click(function()
	{
		if(confirm("Are You Soure To Delete Records"))
		{
			var id=[];
			$(':checkbox:checked').each(function(i)
			{
				id[i]=$(this).val();
				
			});
			if(id.length===0)
			{
				alert("Plase Select The CheckBox");
			}
			else
			{
				$.ajax({
					url:"deleteBrand.php",
					method:"POST",
					data : {id,id},
					success :function()
					{
						for(var i=0;i<id.length;i++)
						{
						$('tr#'+id[i]+'').css('background-color','#ccc');
						$('tr#'+id[i]+'').fadeOut('slow');
						}
						location.reload();
					}
					
				});
			}
		}
		
	});
	
});


</script> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script src="js/jquery.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script> -->
  <!--   <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.js"></script>
     -->
    <script src="js/jquery.dataTables.min.js"></script> -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
     <!--  <script src="js/datatable.js"></script> -->
	<script type="text/javascript">
	$(document).ready(function() {
		
    $('#example').DataTable();
	} );
	/*function download()
	{	
	    var product_id = $("#product").val();
	    var page='downloadproductbyreport.php';
	    window.location.href = "downloadproductbyreport.php?product_id=" + product_id; 

	}*/
    function searchProduct(){
	var product_id = $("#product").val();
  //alert(product_id);
	$.ajax({
      type: "POST",
			url : "fetchPrdocutList.php",		
			data :{product_id : product_id},
			dataType:"text",
			success : function(data)
			{
			 //alert(data);
			 $('#bdata').html(data);
			 
			}

		});
	}
	</script>
    
  </body>
</html>
