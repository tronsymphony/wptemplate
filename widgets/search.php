<div id="search-overlay">
	<div class="container-fluid">

	<div id="searchrel">
			<div class="row justify-content-end">
				<a id="close-search" style="background:none;border:none;outline:0;">
					<svg aria-hidden="true" style="width: 15px;" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="svg-inline--fa fa-times fa-w-11 fa-5x"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" class=""></path></svg>
				</a>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	          			<h2 class="text-center white">Search</h2>
						<div class="input-group">
					      <input type="text" class="form-control" placeholder="Search" value="<?php the_search_query(); ?>" name="s" id="s">
					      <span class="input-group-btn">
					        <button id="searchsubmit" class="btn btn-white outline white" type="submit"><svg aria-hidden="true" focusable="false" style="width:15px;" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-7x"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path></svg></button>
					      </span>
					    </div>
					</form>
	        		<em class="white">We're happy to answer any questions you may have, feel free to call us at<br>
	        			<a href="tel:804.775.4559" class="searchcall">(804) 775-4559</a>
	        		</em>
				</div>
			</div>
	</div>
	
	</div>
	<script>
		jQuery(document).ready(function($) {
			$('#open-search').click(function() {
				$('#search-overlay').fadeIn();
			});
			$('#close-search').click(function() {
				$('#search-overlay').fadeOut();
			});
		});
	</script>
</div>
