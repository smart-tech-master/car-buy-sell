<?php
/**
 * Book Layout Product
 */
$get_books_column = get_theme_mod('books_column', 'col-md-6 col-lg-4 col-xl-3');
$books_extra_classes = 'books-product-layout';
$books_extra_classes .= ' ' . $get_books_column;
?>
<article class="<?php echo esc_attr($books_extra_classes);?> books-content books-loop-item">
    <?php if (function_exists('rswpbs_get_book_image')) : ?>
    <div class="loop-book-image-wrapper">
        <a href="<?php echo esc_url(get_the_permalink()); ?>">
            <?php echo wp_kses_post(rswpbs_get_book_image(get_the_ID())); ?>
        </a>
        <a href="<?php echo esc_url(get_the_permalink());?>" class="view-book-details"><?php esc_html_e('View Book', 'author-personal-blog'); ?></a>
    </div>
    <?php endif; ?>
    <div class="loop-book-content-wrapper">
        <?php
        if (function_exists('rswpbs_get_book_name')) :
        ?>
        <div class="content-item">
            <h2 class="book-name">
                <a href="<?php the_permalink(); ?>"><?php echo wp_kses_post(rswpbs_get_book_name(get_the_ID())); ?></a>
            </h2>
        </div>
        <?php endif;
        if (function_exists('rswpbs_get_book_author')) :?>
            <div class="content-item">
                <h4 class="book-author">
                    <strong><?php esc_html_e( 'By ', 'author-personal-blog' );?></strong><?php echo wp_kses_post(rswpbs_get_book_author(get_the_ID())); ?>
                </h4>
            </div>
        <?php endif;
        if (function_exists('rswpbs_get_book_price')):
        ?>
            <div class="content-item">
                <h2 class="book-price d-flex justify-content-center">
                    <?php echo wp_kses_post(rswpbs_get_book_price(get_the_ID())); ?>
                </h2>
            </div>
        <?php endif; ?>
    </div>
</article>
<?php