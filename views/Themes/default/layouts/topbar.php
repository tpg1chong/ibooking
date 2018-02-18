<?php

$has_home = $this->getPage('has_home'); 
?>
<header id="header-primary">
	
	<div class="page-header-top"><div class="container clearfix">
		<h1 id="page-logo"><img src="<?=IMAGES?>logo-white.svg"></h1>

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
		<h3 class="">Wellcom</h3>
		<h1 class="">ค้นหาสถานที่ถูกใจ ง่าย เร็ว ฟรี - ในราคาที่ดีที่สุด</h1>
		<h2 class="">สัมมนา | ประชุม | ปาร์ตี้ | แต่งงาน | แถลงข่าว | เปิดตัวสินค้า</h2>
	</div>
	<?php }?>
	
	<div id="site-search-content" class="page-header-middle">
		<div class="container clearfix">
			
			<form>
				<?php if( !empty($has_home) ){ ?>
				<ul class="page-search-tab">
					<li class="active"><a><i class="icon-bed"></i><span class="mls">ห้องพัก</span></a></li>
					<li><a><i class="icon-building-o"></i><span class="mls">สถานที่จัดงาน</span></a></li>
				</ul>
				<?php }?>

				<div class="page-search-wrap">

					<div class="page-search clearfix">
						<div class="filter-search">
							<i class="icon-search"></i>
							<input class="input" type="" name="" placeholder="Where do you want to go?" maxlength="128" autocomplete="off">
						</div>
						<div class="filter-dates">
							<div class="input"></div>
						</div>
						<div class="filter-guest"><select class="input" type="" name="">
							<option>Test 1</option>
							<option>Test 2</option>
						</select></div>
						<div class="filter-action"><button class="input btn btn-yellow btn-submit">Search</button></div>
						
					</div>
				</div>
				
				<?php if( !empty($has_home) ){ ?>
				<div class="page-search-refine">
					
				</div>
				
				
				<footer class="page-search-footer tac"><button type="button" class="btn-toggle-refine"><span class="mrs">ค้นหาอย่างละเอียด</span><i class="icon-angle-down"></i></button></footer>
				<?php }?>

			</form>
		</div>
	</div>
	

	<?php if( !empty($has_home) ){ ?>
	<div class="lazyload-container">
		<img class="" src="<?=IMAGES?>demo/9.jpg">
	</div>
	<?php }?>
</header>

