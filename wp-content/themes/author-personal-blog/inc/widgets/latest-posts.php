<?php
// Adds widget: Widget
class Author_Personal_Blog_Latest_Posts_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'author_personal_blog_latest_posts',
			esc_html__( '[Author Personal Blog] Latest Posts', 'author-personal-blog' )
		);
	}
	private $widget_fields = array(
		array(
			'label' => 'Posts Per Page',
			'id' => 'postsperpage',
			'default' => '4',
			'type' => 'text',
		),
		array(
			'label' => 'Show Post Date',
			'id' => 'showpostdate',
			'default' => 'yes',
			'type' => 'checkbox',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		?>
			<ul class="recent-post-widget">
				<?php
				$resent_post    = new WP_Query(
					array(
						'post_type' => array( 'post' ),
						'posts_per_page'    => intval($instance['postsperpage']),
						'ignore_sticky_posts' => true,
					)
				);

				while ( $resent_post->have_posts() ) :
					$resent_post->the_post();
					$post_classes = 'author-personal-blog-recent-post';
					if (!has_post_thumbnail()) {
						$post_classes = 'author-personal-blog-recent-post no-post-thumbnail ';
					}
					?>
				<li <?php post_class($post_classes); ?>>
					<?php if(has_post_thumbnail()) : ?>
					<div class="recent-post-thumb">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'author-personal-blog-recent-post' ); ?></a>
					</div>
					<?php endif; ?>
					<div class="recent-widget-content">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><h2 class="rct-news-title"><?php the_title(); ?></h2></a>
						<?php if('1' == $instance['showpostdate']) : ?>
						<div class="recent-post-date">
							<?php author_personal_blog_posted_on(); ?>
						</div>
						<?php endif; ?>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		<?php
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : '';
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					?>
					<p>
						<input type="checkbox" class="checkbox" <?php echo esc_attr(checked( $widget_value, true, false ));?> id="<?php echo esc_attr( $this->get_field_id( $widget_field['id'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $widget_field['id'] ) ) ?>" value="1">
						<label for="<?php echo esc_attr( $this->get_field_id( $widget_field['id'] ) ); ?>"><?php echo esc_html( $widget_field['label']); ?></label>
					</p>
					<?php
					break;
				default:
					?>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( $widget_field['id'] ) ); ?>"><?php echo esc_html($widget_field['label']); ?></label>
						<input class="widefat" id="<?php echo esc_attr($this->get_field_id( $widget_field['id']));?>" name="<?php echo esc_attr( $this->get_field_name( $widget_field['id'] ) ); ?>" value="<?php echo esc_attr( $widget_value );?>" type="<?php echo esc_attr($widget_field['type']);?>">
					</p>
					<?php
			}
		}
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'author-personal-blog' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function author_personal_blog_latest_posts_wr() {
	register_widget( 'Author_Personal_Blog_Latest_Posts_Widget' );
}
add_action( 'widgets_init', 'author_personal_blog_latest_posts_wr' );