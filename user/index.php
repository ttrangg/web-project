<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homepage</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="image/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--============slick is for changing banner======================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--=====those are for base css which is locate and deco=================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<?php
	require 'header.php';
	?>

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
                            
				<div class="item-slick1 bg-overlay1" style="background-image: url(image/slide-07.jpg);" data-thumb="image/thumb-03.jpg" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Men Collection 2019
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									NEW SEASON
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1 bg-overlay1" style="background-image: url(image/slide-05.jpg);" data-thumb="image/thumb-01.jpg" data-caption="Women’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Women Collection 2019
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url(image/slide-06.jpg);" data-thumb="image/thumb-02.jpg" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Men New-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Jackets & Coats
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>

		
		</div>
	</section>
        <!--2 additional banners for homepage-->
    <div style="background-color: lightsteelblue">
        
        <div style="padding-left: 10%;padding-right: 17%;padding-top:20px;padding-bottom:20px;width: 100%;
            position: relative">
            <img src= image/BANNER.jpg>
        </div>    
    </div>
        <div style="background-color: lightcyan">
        <div style="padding-right: 17%;padding-left: 17%;padding-top:25px;padding-bottom:20px;width: 1023px;height:500px">
            <img src= image/Enni_banner.jpg>
        </div>
    </div>
        
        <?php
	require 'footer.php';
	?>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
        <script src="js/main.js"></script>

</body>
</html>