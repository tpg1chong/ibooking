<nav class="bread-crumps container">
	<ul>
		<li><a><i class="icon-home"></i></a></li>
		<li><a><strong>Hotel</strong><span>2,305,554</span></a></li>
		<li><a><strong>Bangkok</strong><span>30,554</span></a></li>
		<li><strong>Airport Bangkok</strong></li>
	</ul>
</nav>


<!-- profile -->
<div class="property-profile container module post">
	
	<!-- header -->
	<div class="card property-profile-header">
		<div class="row-fluid">
			<div class="span8">
				<div class="property-profile-image-cover featured-image stage">
					<div class="pic"><img src="<?=IMAGES?>/demo/1.jpg"></div>
				</div>
				<div class="property-profile-image-slider">
					<div class="slider over">
						<div class="slide-items" style="left: -140px;"><?php for ($i=0; $i < 10; $i++) { 

							?><div class="slide-item">
								<div class="slide-stage">
									<div class="pic"><img src="<?=IMAGES?>/demo/<?=$i?>.jpg"></div>
								</div>
							</div><?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="span4">

				<div class="property-profile-header-cotent">
					<h2 class="property-profile-title"><a class="keyword"><span>Apartment for rent in Phaholyothin Bangkok</span></a><i class="icon-caret-right mhm"></i><a href="#" class="name">Apartment Oceanview</a></h2>

					<h3 class="property-profile-code">
                        <span class="label">CODE :</span> <a href="#">HSPSU0024</a>
                        <div class="rating property-profile-rating ui-star"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><span class="fcg mls ratingVal"><span itemprop="ratingCount">15 Ratings</span></span></div>
                    </h3>

					<hr class="property-profile-hr">

					<div class="property-profile-blurb">
						It's been making magic since 1993 – taking Jurassic Park's dinosaurs to the big screen & putting professional effects in the hands of filmmakers everywhere. Celebrate 25 years of Adobe After Effects with us. 
					</div>

					<hr class="property-profile-hr">
					<div class="property-profile-facilities">
						
						<ul class="list-facilities list-filter list-horizontal col-2">
						<?php 
						$a = array();
						$a[] = array('id'=>'', 'name'=>'สระว่ายน้ำ', 'icon'=>'private-pool');
						$a[] = array('id'=>'', 'name'=>'อินเทอร์เน็ต', 'icon'=>'wifi');
						$a[] = array('id'=>'', 'name'=>'ที่จอดรถ', 'icon'=>'car-park-onsite');
						// $a[] = array('id'=>'', 'name'=>'บริการรถรับ-ส่งถึงสนามบิน', 'icon'=>'airport-transfer');
						$a[] = array('id'=>'', 'name'=>'ฟิตเนส', 'icon'=>'gym');
						// $a[] = array('id'=>'', 'name'=>'สิ่งอำนวยความสะดวกสำหรับครอบครัว/เด็ก', 'icon'=>'');
						$a[] = array('id'=>'', 'name'=>'ห้องปลอดบุหรี่', 'icon'=>'non-smoking-room');
						$a[] = array('id'=>'', 'name'=>'สปา/ซาวน่า', 'icon'=>'spa-sauna');
						$a[] = array('id'=>'', 'name'=>'ห้องอาหาร', 'icon'=>'restaurant');
						$a[] = array('id'=>'', 'name'=>'พื้นที่สูบบุหรี่', 'icon'=>'smoking-area');
						$a[] = array('id'=>'', 'name'=>'ไนท์คลับ', 'icon'=>'nightclub');
						$a[] = array('id'=>'', 'name'=>'นำสัตว์เลี้ยงเข้าพักได้', 'icon'=>'pets-allowed');
						// $a[] = array('id'=>'', 'name'=>'สิ่งอำนวยความสะดวกสำหรับผู้พิการ', 'icon'=>'facilities-for-disabled-guests');
						// $a[] = array('id'=>'', 'name'=>'สิ่งอำนวยความสะดวกสำหรับผู้พิการ', 'icon'=>'business-facilities');
						// $a[] = array('id'=>'', 'name'=>'สิ่งอำนวยความสะดวกสำหรับผู้พิการ', 'icon'=>'golf-course-on-site');

						foreach ($a as $key => $value) {
							

							echo '<li><i class="ficon-'.$value['icon'].'"></i><span class="mls">'.$value['name'].'</span></li>';
						}

						?>
						</ul>
					</div>
					<hr class="property-profile-hr">
                    <div class="property-profile-actions">
                    	

                    	<button class="action btn btn-large"><i class="icon-heart-o"></i><span class="mls">เพิ่มสถานที่โปรด</span></button>
                    	<button class="action btn btn-large btn-red"><i class="icon-check"></i><span class="mls">ขอใบเสนอราคา</span></button>
                    </div>
				</div>

			</div>
		</div>
	</div>
	<!-- end: header -->
	
	<!-- main -->
	<div class="row-fluid property-profile-main">
		<div class="span8">

			<!-- content -->
			<div class="card property-profile-content">

				<nav class="property-profile-taps">
					<a class="property-profile-tap"><i class="icon-info-circle"></i><span class="mls">Summary</span></a>
					<a class="property-profile-tap active"><i class="icon-building-o"></i><span class="mls">Room rates</span></a>
					<a class="property-profile-tap"><i class="icon-file-o"></i><span class="mls">Preferences</span></a>
					<a class="property-profile-tap"><i class="icon-map-o"></i><span class="mls">Map</span></a>
					<a class="property-profile-tap"><i class="icon-smile-o"></i><span class="mls">Reviews</span></a>
					<a class="property-profile-tap"><i class="icon-calendar-o"></i><span class="mls">Things to do</span></a>
				</nav>

				<div class="card-padding">
					
					<div class="">
						<p>It's been making magic since 1993 – taking Jurassic Park's dinosaurs to the big screen & putting professional effects in the hands of filmmakers everywhere. Celebrate 25 years of Adobe After Effects with us.</p>
					</div>
				</div>
			</div>
			<!-- end: content -->
		</div>
	
		<!-- section -->
		<div class="span4 property-profile-section">

			<div class="section card">
				<h3 class="section-header">
					<i class="icon-phone"></i><span class="mls">Need Assistance?</span>
				</h3>

				<div class="section-content inner">
					<p>It's been making magic since 1993 – taking Jurassic Park's dinosaurs to the big screen & putting professional effects in the hands of filmmakers everywhere. Celebrate 25 years of Adobe After Effects with us.</p>
				</div>
			</div>

			<div class="section card">

				<h3 class="section-header">
					<i class="icon-phone"></i><span class="mls">You may also like</span>
				</h3>

				<div class="section-content inner">
					<p>It's been making magic since 1993 – taking Jurassic Park's dinosaurs to the big screen & putting professional effects in the hands of filmmakers everywhere. Celebrate 25 years of Adobe After Effects with us.</p>
				</div>
				
			</div>
		</div>
		<!-- end: section -->
	</div>
	<!-- end: main -->

</div>
<!-- end: profile -->