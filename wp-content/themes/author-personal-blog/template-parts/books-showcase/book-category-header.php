<?php
/**
 * Books Category Page Header
 */
$all_books = get_queried_object();
$current_author_id = get_queried_object_id();
$get_books_category = get_term($current_author_id);
?>
<div class="books-category-archive-header">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-7 col-lg-6 col-xl-6 align-self-center text-center text-sm-left text-md-left">
				<div class="books-category-archive-title">
					<h1 class="text-center text-md-left"><?php echo esc_html($get_books_category->name);?></h1>
				</div>
				<div class="books-category-archive-books-count">
					<h4>
					<?php
					echo sprintf(__( 'we found tatal %1$s books in %2$s category', 'author-personal-blog' ), $all_books->count, $get_books_category->name);
					?>
					</h4>
				</div>
				<div class="books-category-archive-desciprtion">
					<p><?php echo esc_html($get_books_category->description);?></p>
				</div>
			</div>
		</div>
	</div>
</div>