<section id="Popular" class="module container clearfix">
	
	<header class="page-title">
		<h2>Popular Packages</h2>

		<div class="space"></div>

		<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin.</p>
	</header>
	
	<div class="items col-3 show-picture"><?php for ($i=0; $i < 6; $i++) { 
		?><div class="item"><div class="item-outer">
			<div class="pic"><img src="<?=IMAGES?>demo/<?=$i?>.jpg"></div>
		</div></div><?php } ?>
	</div>

</section>


<section id="topDestinations" class="module container clearfix">
	
	<header class="page-title">
		<h2>Top Destinations</h2>
 
		<div class="space"></div>

		<p>Driven by our passion for travel, the Agoda team works hard to bring you the cheapest prices on hotels, resorts, unique homes, vacation rentals, and more. Our huge selection of accommodations will let you plan the perfect trip. From adventure travel and backpacking to honeymoons and family vacations, we've got you covered.</p>
	</header>

	<div class="items col-6 square-picture"><?php for ($i=0; $i < 6; $i++) { 
		?><div class="item"><div class="item-outer">
			<div class="pic"><img src="<?=IMAGES?>demo/<?=$i?>.jpg"></div>
		</div></div><?php } ?>
	</div>

</section>

<section id="topDestinations" class="module container clearfix">
	
	<header class="page-title">
		<h2>Top Venue</h2>
 
		<div class="space"></div>
		<p>Let us help you find the perfect place. Ideal destinations for a weekend</p>
	</header>
	

	<div class="items col-2 show-picture clearfix"><div class="item col-2"><div class="item-outer">
			<div class="pic"><img src="<?=IMAGES?>demo/<?=$i?>.jpg"></div>
		</div></div><?php for ($i=0; $i < 4; $i++) { 
		?><div class="item"><div class="item-outer">
			<div class="pic"><img src="<?=IMAGES?>demo/<?=$i?>.jpg"></div>
		</div></div><?php } ?>
	</div>

</section>