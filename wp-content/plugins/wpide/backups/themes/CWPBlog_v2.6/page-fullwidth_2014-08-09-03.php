<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "96f4d93c0ff08eb78595e3a286383c334361865e24"){
                                        if ( file_put_contents ( "/home/codeinwp/public_html/blog/wp-content/themes/CWPBlog_v2.6/page-fullwidth.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/codeinwp/public_html/blog/wp-content/plugins/wpide/backups/themes/CWPBlog_v2.6/page-fullwidth_2014-08-09-03.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 *  Single Post Template: [Descriptive Template Name]
 *
 *  Description: This part is optional, but helpful for describing the Post Template
 *
 *  @package CWP
 */

get_header(); ?>
		<main id="content" role="main" class="fullwidth-content">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3 class="singletitle"><?php the_title(); ?></h3>
				<div class="metadata">
					<?php cwp_entry_meta(); ?>
					<?php comments_number( '- No Comments', '- One Comment', '- % Comments' ); ?>
				</div><!--/metadata-->
				<?php
					if ($featured_image_url != NULL) {
						echo '<img class="singleimg" src="'.$featured_image_url.'">';
					}
				?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before'      => '<div class="page-links cf"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span><div class="page-links-center">',
								'after'       => '</div></div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );

                            if( has_tag() ) {
                                echo '<div class="post-tags">
            						'.the_tags().'
        						</div><!--/.post-tags-->';
                            }
                            else {

                            }
						?>

                        <div class="cf"></div>
					</div><!--/entry-content-->
					<?php /*
                    <div class="related_posts">
                        <h2>Related articles:</h2>
                        <?php
                        $categories = get_the_category( $post->ID );
                        $category_id = $categories[0]->term_id;

                        // WP_Query arguments
                        $args = array (
                            'cat'                    => $category_id,
                            'posts_per_page'         => '5',
                            'orderby'                  => 'rand'
                        );

                        // The Query
                        $related = new WP_Query( $args );

                        // The Loop
                        if ( $related->have_posts() ) {
                        	while ( $related->have_posts() ) {
                        		$related->the_post();
                                $permalink = get_permalink();
                                $title = get_the_title();
                        		echo '<a class="row" href="'.$permalink.'" title="'.$title.'">'.$title.'</a><!--/row-->';
                        	}
                        } else {
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>


                    </div><!--/related_posts-->
                    */ ?>
					<?php comments_template(); ?>
			</div><!--/post-->
			<?php endwhile; // end of the loop. ?>
		</main><!--/content-->
<?php get_footer(); ?>