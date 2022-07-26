<?php

/**
 * Fairy Post Slider Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Across_Featured_Posts')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Across_Featured_Posts extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'title'    => esc_html__('Fairy Featured Posts', 'across'),
                'cat'     => 0,
                'post-number' => 5,
                'post-date' => 1,
                'show-category' => 1
            );
            return $defaults;
        }

        public function __construct()
        {
            $opts = array(
                'classname' => 'across-featured-posts',
                'description' => esc_html__('Display post in Slider Form. Suitable on Sidebars.', 'across'),
            );

            parent::__construct('across-featured-posts', esc_html__('Fairy Featured Posts', 'across'), $opts);
        }


        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array) $instance, $this->defaults());
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];

            $cat_id = !empty($instance['cat']) ? $instance['cat'] : '';
            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';
            $post_date = !empty($instance['post-date']) ? $instance['post-date'] : '';
            $show_category = !empty($instance['show-category']) ? $instance['show-category'] : '';
            if (!empty($title)) {
                $cat_class = 'cat-' . $cat_id;
?>
                <div class="title-wrapper <?php echo $cat_class; ?>">
                    <?php
                    echo $args['before_title'];
                    if (!empty($cat_id)) {
                    ?>
                        <a href="<?php echo esc_url(get_category_link($cat_id)); ?>"> <?php echo esc_html($title); ?> </a>
                    <?php
                    } else {
                        echo esc_html($title);
                    }
                    echo $args['after_title'];
                    ?>
                </div>
            <?php
            }

            $query_args = array(
                'post_type' => 'post',
                'cat' => absint($cat_id),
                'posts_per_page' => absint($post_number),
                'ignore_sticky_posts' => true
            );

            $query = new WP_Query($query_args);

            if ($query->have_posts()) :
            ?>
                <section class="hero hero-slider-section">
                    <div class="container">
                        <!-- slick slider component start -->
                        <div class="fairy-featured-post-list">
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();

                            ?>
                                <div class="card card-bg-image">
                                    <?php
                                    if (has_post_thumbnail()) {
                                    ?>
                                        <div class="post-thumb">
                                            <figure class="card_media">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    global $fairy_theme_options;
                                                    $cropped_image = !empty($fairy_theme_options['fairy-image-size-slider']) ? $fairy_theme_options['fairy-image-size-slider'] : '';
                                                    if ($cropped_image == 'cropped-image') {
                                                        the_post_thumbnail('fairy-large');
                                                    } else {
                                                        the_post_thumbnail();
                                                    }
                                                    ?>
                                                </a>
                                            </figure>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">

                                                <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/custom/img/fairy-default.jpg' ?>" </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <article class="card_body">
                                        <?php
                                        if ($show_category) {
                                            fairy_list_category();
                                        }
                                        ?>

                                        <h3 class="card_title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="entry-meta">
                                            <?php
                                            if ($post_date) {
                                                fairy_posted_on();
                                            }
                                            ?>
                                        </div>
                                    </article>

                                </div>
                            <?php
                                $i++;

                            endwhile;
                            ?>
                        </div>
                    </div>
                </section><!-- .hero -->
            <?php
            endif;
            wp_reset_postdata();
            echo $args['after_widget'];
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['cat'] = absint($new_instance['cat']);
            $instance['post-number'] = absint($new_instance['post-number']);
            $instance['post-date'] = absint($new_instance['post-date']);
            $instance['show-category'] = absint($new_instance['show-category']);
            return $instance;
        }

        public function form($instance)
        {
            $instance  = wp_parse_args((array)$instance, $this->defaults());

            $title    = esc_attr($instance['title']);
            $post_number    = absint($instance['post-number']);
            $post_date = absint($instance['post-date']);
            $show_category = absint($instance['show-category']);

            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'across'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p class="custom-dropdown-posts">
                <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                    <strong><?php esc_html_e('Select Category: ', 'across'); ?></strong>
                </label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 0,
                    'id' => $this->get_field_id('cat'),
                    'name' => $this->get_field_name('cat'),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'selected' => absint($instance['cat']),
                    'show_option_all' => esc_html__('Show Recent Posts', 'across')
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'across'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>" name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post-date')); ?>"><?php esc_html_e('Show Date:', 'across'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('post-date')); ?>" name="<?php echo esc_attr($this->get_field_name('post-date')); ?>" type="checkbox" value="<?php echo $post_date; ?>" <?php checked(($instance['post-date'] == 1) ? $instance['post-date'] : 0); ?> />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('show-category')); ?>"><?php esc_html_e('Show Category:', 'across'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-category')); ?>" name="<?php echo esc_attr($this->get_field_name('show-category')); ?>" type="checkbox" value="<?php echo $show_category; ?>" <?php checked(($instance['show-category'] == 1) ? $instance['show-category'] : 0); ?> />
            </p>

<?php
        }
    }
endif;
