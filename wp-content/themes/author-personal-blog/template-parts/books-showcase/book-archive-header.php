<?php
/**
 * Books Category Page Header
 */
?>
<div class="books-category-archive-header">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-7 col-lg-6 col-xl-6 align-self-center text-center text-sm-left text-md-left">
				<div class="books-category-archive-title">
					<h1 class="text-center text-md-left"><?php post_type_archive_title();?></h1>
				</div>
				<div class="books-category-archive-desciprtion">
					<?php the_archive_description();?>
				</div>
			</div>
		</div>
	</div>
</div>