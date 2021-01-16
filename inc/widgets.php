<?php
/**
* Widget class for Custom widget
*
* extends WP_Widget WordPress class and overrides necessary functions
* for necessary functionality of the widget
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package DsignFly
*/

class Dsign_fly_Portfolio_Widget extends WP_Widget {

    // setup the widget name, description, etc...
    public function __construct() {

        $widget_ops = array(
            'classname'   => 'Dsign_fly_portfolio_widget', // html class name
            'description' => esc_html__( 'Custom DesignFly Portfolio Widget', 'designfly' )
        );

        parent::__construct( 'designfly_portfolio', 'Designfly Portfolio', $widget_ops );
    }

    // handles the back-end of the widget(rendering)
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = 'Portfolio';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label> 
            <input class="widget_portfolio_title" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    // handles the front-end of the widget
    public function widget( $args, $instance ) {
        echo $args[ 'before_widget' ];

        /**
         * render out portfolio items
         */
        $query = new WP_Query( array( 
            'post_type' => 'df-portfolio',
            'posts_per_page' => 8, 
            )
        );

        if ( $query -> have_posts() ):
            ?>
            <h2 class="widget-title">
                <?php
                    if ( isset( $instance[ 'title' ] ) ) {
                        $title = $instance[ 'title' ];
                    } else {
                        $title = 'Portfolio';
                    }
                    echo $title;
                ?>
            </h2>
            <div id="portfolio-widget-wrapper" class="portfolio-widget-wrapper">
            
            <?php
            while ( $query -> have_posts() ):
                $query -> the_post();
                // get_template_part( 'template-parts/content', 'df-portfolio' );  
                ?>
                <div>
                <a href=" <?php echo get_post_permalink(); ?>" >  <?php the_post_thumbnail();?> </a>
                </div>
                <?php
            endwhile;
            ?>
            
            </div>
        
            <?php
        else:
            ?>
            <p>
                <?php _e( 'Sorry, no portfolio items found.', 'textdomain' ); ?>
            </p>
            <?php
        endif;

        // done rendering

        echo $args[ 'after_widget' ];
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Dsign_fly_Portfolio_Widget' );
} );