
<!-- header -->
<!-- 		<header style="position: absolute;top: 0px; left: 0px; right: 0px;z-index: 999">
			<a href="appoin.html"><button class="butt">BOOK NOW</button></a>
			<div class="container-fluid">
				<div class="header d-md-flex justify-content-between align-items-center py-2 px-xl-3 px-2 mx-xl-5 mx-lg-3 mx-3"> -->
					<!-- nav -->
				<!-- 	<div class="nav_w3ls">
						<nav>
							<label for="drop" class="toggle">Menu</label>
							<input type="checkbox" id="drop" />
							<ul class="menu">
								<li><a href="index.html" class="active">Home</a></li>
								<li><a href="#about">About Us</a></li>
								<li> -->
									<!-- First Tier Drop Down -->
								<!-- <label for="drop-2" class="toggle toogle-2">Services<span class="fa fa-angle-down" aria-hidden="true"></span>
									</label>
									<a href="#">Services <span class="fa fa-angle-down" aria-hidden="true"></span></a>
									<input type="checkbox" id="drop-2"/>
									<ul>
										<li><a href="#latest" class="drop-text">Beauty & Grooming</a>
										</li>
										<li><a href="#price" class="drop-text">Slimming</a></li>
										<li><a href="#services" class="drop-text">Lazer</a></li>
										<li><a href="#blog" class="drop-text">Spa</a></li>
										<li><a href="#testi" class="drop-text">Salon</a></li>
										<li><a href="#what" class="drop-text">What We do?</a></li>
									</ul>
								</li>
								<li><a href="#services" class="drop-text">Services</a></li>
								<li><a href="#gallery">Gallery</a></li>
								<li><a href="#contact">Contact Us</a></li>
							</ul>

						</nav>
					</div> -->
					<!-- //nav -->
					<!-- logo -->
					<!-- <div id="logo" style="height: 70px; width: 200px;">
						<h1><a href="index.html"></a><img src="images/new-logo2.png" alt="img"></h1>
					</div> -->
					<!-- //logo -->
	<!-- 			</div>
			</div>
		</header> -->


<style type="text/css">
.social-nav {
	float: right;
}
.social-nav ul{
		list-style: none;
		padding: 0px;
		margin-top: 0px;
		margin-bottom: 0px;
		
	}
	.social-nav ul li{
		display: inline-block;
		padding:0px 5px; 

	}
	.social-nav ul li a{
		font-size: 10px;
		border-radius: 0px;

	}

	.nava{    
		background-color: #212121;
	    position: sticky;
	    top: 0px;
	    z-index: 999;
	    width: 100%;
	    font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
}
	.headerBox .fixed {
    display: none;
    }
	.nava ul{
		list-style: none;
		padding: 0px;
		margin-top: 14px;
		
	}
	.nava ul li {
		display: inline-block;
		padding: 10px;
		font-size: 14px;
		font-weight: bolder;
	}
	.nava ul li a{
		color: yellow;
	}
	.nava ul li a:hover {
		color: white;
	}
	@media only screen and (max-width: 600px) {

		#logo{
			margin: auto;
		}
		.social-nav{
			width: 40%;
			margin: auto;
			float: none;
			clear:both;
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
	.nava .col-sm-6{
		display: block;
		width: 100%;
	}

</style>
<div class="container-fluid">
	<div class="social-nav">
		<ul >
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="appoin.php" class="btn btn-info">Make Appointment</a></li>
		</ul>
	 </div>
</div>
	
<div class="nava">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div id="logo" style="width: 200px;">
						<a href="index.php"></a><img src="images/new-logo2.png" alt="img" style=" vertical-align: unset;">
					</div>
				</div>
			<div class="col-sm-6">
				<ul>
					<li><a href="index.php" class="active">Home</a></li>
					<li><a href="#about">About Us</a></li>
					<li><a href="service.php">Services</a></li>
					<li><a href="#gallery">Gallery</a></li>
					<li><a href="#contact">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	


$(window).scroll(function () {
	var sc = $(window).scrollTop()
	if (sc > 150) {
		$("#main-navbar").addClass("navbar-scroll")
	} 
	else {
		$("#main-navbar").removeClass("navbar-scroll")
	}
});
</script>