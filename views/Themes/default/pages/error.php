<nav class="bread-crumps container">
	<ul>
		<li><a href="<?=URL?>"><i class="icon-home"></i><span></span></a></li>
		<li>Error 404</li>
	</ul>
</nav>


<section id="error" class="error module container">

	<div class="row">
		<div class="span8">
			<div class="error-content clearfix">
				<span class="error-icon"></span>
				<div class="error-text-content">
					<div class="error-text-title">ขออภัย</div>
					<div class="error-text-subtitle">ไม่พบหน้าดังกล่าว!</div>
				</div> 
			</div>
			
			<div class="error-h3">
				<p>ไม่สามารถหาหน้าเว็บที่คุณร้องขอได้! ลิงก์ที่คุณเคยติดตามอาจเสียหาย, อาจได้มีการลบเพจนี้ออกแล้ว หรือเพราะคุณพิมพ์ที่อยู่เว็บไม่ถูกต้อง</p>
			</div>
			
			<p class="error-p"> คุณสามารถเข้าหน้าเว็บโดยใช้ลิงก์ด้านล่าง หรือ<a href="<?=URL?>">กลับไปหน้าหลัก</a></p>

			<ul class="error-ul"><?php

			foreach ($this->system['navigation'] as $val) {
				if( empty($val['has_topbar']) ) continue;
				if( $val['id']=='index' ) continue;
				if( !empty($val['url']) ){
					echo '<li><a title="'.$val['name'].'" href="'.$val['url'].'">'.$val['name'].'</a></li>';
				}
			}


			?>
			</ul>

		</div>

		<div class="span4">
			<div class="home-side">

			<!-- blog popular -->
			<?php

			if( !empty($this->lastNewsList) ){

			
$lastNewsList = array();
foreach ($this->lastNewsList as $key => $value) {
	if( $key==6 ) break;
	$lastNewsList[] = $value;
}

echo '<section id="blog-latest" class="blog-latest">';

	echo '<header class="page-title"><h2>ข่าวอัพเดท</h2></header>';


	echo $this->fn->q('blog')->item( $lastNewsList, array(
		'addClass' => 'clearfix blog-vertical carousel-animation',
		'attr' => array(
			'data-limit' => 3,
			'data-direction' => 'up'
		)
	) );


echo '</section>';
?>
			<?php }?>
			
			</div>
			
		</div>
	</div>
</section>


