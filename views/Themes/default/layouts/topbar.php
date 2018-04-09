<?php

$has_home = $this->getPage('has_home'); 
?>
<header id="header-primary">
	
	<div class="page-header-top"><div class="container clearfix">
		<h1 id="page-logo">
			<?php include_once 'topbar/logo.php'; ?>
			<!-- <img src="<?=IMAGES?>logo-white.svg"> -->
		</h1>

		<div class="rfloat nav-extras">
			<ul class="nav clearfix">
				<li class="language"><a title="ภาษา"><i class="flag-thai"></i><span>ภาษาไทย</span> <i class="icon-angle-down"></i></a></li>
				<li class="currency"><a title="สกุลเงิน"><span>THB</span> <i class="icon-angle-down"></i></a></li>
				<li class="signin"><a><span>เข้าสู่ระบบ</span></a></li>
				<li class="signup"><a><span>สร้างบัญชีผู้ใช้</span></a></li>
			</ul>
		</div>
	</div></div>
	
	<?php if( !empty($has_home) ){ ?>
	<div id="site-alert" class="container clearfix">
		<h3 class="">Wellcom to NEXT</h3>
		<h1 class="">ค้นหาสถานที่ถูกใจ ง่าย เร็ว ฟรี - ในราคาที่ดีที่สุด</h1>
		<h2 class="">สัมมนา | ประชุม | ปาร์ตี้ | แต่งงาน | แถลงข่าว | เปิดตัวสินค้า</h2>
	</div>
	<?php }?>
	
	<div id="site-search-content" class="page-header-middle">
		<div class="container clearfix">
			
			<form _date-plugins="pageSearch">
				<?php if( !empty($has_home) ){ ?>
				<ul class="page-search-tab">
					<li><a><i class="icon-suitcase"></i><span class="mls">ท่องเที่ยว</span></a></li>
					<li class="active"><a><i class="icon-bed"></i><span class="mls">ห้องพัก</span></a></li>
					<li><a><i class="icon-glass"></i><span class="mls">สถานที่จัดงาน</span></a></li>
					<li><a><i class="icon-music"></i><span class="mls">เทศกาลและประเพณี</span></a></li>
				</ul>
				<?php }?>

				<div class="page-search-wrap">

					<div class="page-search clearfix">
						<div class="filter-search">
							<div class="filter-search-icon"><i class="icon-search"></i></div>
							<input class="input" type="" name="where" placeholder="Where do you want to go?" maxlength="128" autocomplete="off">
						</div>
						<div class="stitial"></div>
						<div class="filter-dates checkin">
							<div class="input">
								
								<div class="filter-search-icon"><i class=" icon-calendar-o"></i></div>
								<div class="filter-dates-text">
									<strong class="date">2 เม.ษ. 2018</strong>
									<span class="day">วันจันทร์</span>
								</div>
								<input type="hidden" name="checkin" autocomplete="off">
							</div>
						</div>
						<div class="stitial"></div>
						<div class="filter-dates checkout">
							<div class="dates-los">
								<span class="dates-los-nights mrs">2</span><i class="icon-moon"></i>
							</div>
							<div class="input">
								
								<div class="filter-search-icon"><i class=" icon-calendar-o"></i></div>
								<div class="filter-dates-text">
									<strong class="date">2 เม.ษ. 2018</strong>
									<span class="day">วันจันทร์</span>
								</div>
								<input type="hidden" name="checkout" autocomplete="off">
							</div>
						</div>
						<div class="stitial"></div>
						<div class="filter-guest"><select class="input" name="guest">
							<option>Test 1</option>
							<option>Test 2</option>
						</select></div>
						<div class="stitial"></div>
						<div class="filter-action"><button class="input btn btn-yellow btn-submit">Search</button></div>
					</div>
				</div>
				
				<?php if( !empty($has_home) || 1==1 ){ ?>
				<div class="page-search-refine">
					
				</div>
				
				
				<footer class="page-search-footer tac"><button type="button" class="btn-toggle-refine"><span class="mrs">ค้นหาอย่างละเอียด</span><i class="icon-angle-down"></i></button></footer>
				<?php }?>

			</form>
		</div>
	</div>
	
	<?php if( !empty($has_home) ){ ?>

	<div class="lazyload-container elementor">

		<!-- <div class="lazyload-background-video-container">
			<video class="elementor-background-video-hosted elementor-html5-video" autoplay="" loop="" muted="" src="<?=IMAGES?>demo/City-hongkong.mp4"></video>
		</div> -->

		<div class="lazyload-background-image-container">
			<!-- <div class="" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%; background-size: auto 100%;background-position:center center; background-size: cover; background-repeat: no-repeat; background-image: url('<?=IMAGES?>demo/golden-gate-bridge.f623cbb.jpg')"></div> -->
			<div class="" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%; background-size: auto 100%;background-position:center center; background-size: cover; background-repeat: no-repeat; background-image: url('<?=IMAGES?>demo/Bangkok-city-01.jpg')"></div>

			<!-- <img class="" src="<?=IMAGES?>demo/golden-gate-bridge.f623cbb.jpg"> -->
		</div>

		<div class="lazyload-overlay"></div>
	<?php }?>
</header>

