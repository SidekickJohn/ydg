<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
	<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
		<div class="widget tabbed">
				<div class="tabs-wrapper">
						<ul class="nav nav-tabs">
									<li class="active"><a href="#blogCategories" data-toggle="tab">Kategorien</a></li>
									<li><a href="#popular-posts" data-toggle="tab"><?php _e('Popular', 'unite') ?></a></li>
									<li><a href="#recent" data-toggle="tab"><?php _e('Recent', 'unite') ?></a></li>
						</ul>

				<div class="tab-content">
						<ul id="blogCategories" class="tab-pane active">
							<li><i class="fa fa-chevron-right"></i><a href="http://localhost/yourdailygreen/category/fundgrube/">Fundgrube</a></li>
							<li><i class="fa fa-chevron-right"></i><a href="http://localhost/yourdailygreen/category/fundgrube/blogbeitraege">Blogbeiträge</a></li>
							<li><i class="fa fa-chevron-right"></i><a href="http://localhost/yourdailygreen/category/fundgrube/rezepte">Rezepte</a></li>
						</ul>
						<ul id="popular-posts" class="tab-pane">

								<?php
										$recent_posts = new WP_Query(array('showposts' => $number, 'ignore_sticky_posts' => 1, 'post_status' => 'publish', 'order'=> 'DESC', 'showposts' => $number, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value'));
								?>

								<?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
										<li>
												<?php if ( has_post_thumbnail() ) : ?>
												<a href="<?php echo get_permalink() ?>" class="tab-thumb thumbnail" rel="bookmark" title="<?php the_title(); ?>">
														<?php the_post_thumbnail('tab-small'); ?>
												</a>
												<?php endif; ?>
												<div class="content">
														<a class="tab-entry" href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
														<i>
																<?php the_time('M j, Y') ?>
														</i>
												</div>
										</li>
								<?php endwhile; ?>

						</ul>
						<?php wp_reset_query(); ?>

						<ul id="recent" class="tab-pane">

								<?php
								$recent_posts = new WP_Query(array('showposts' => $number,'post_status' => 'publish', 'ignore_sticky_posts' => 1 ));
								?>

								<?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
										<li>
												<?php if ( has_post_thumbnail() ) : ?>
												<a href="<?php echo get_permalink() ?>" class="tab-thumb thumbnail" rel="bookmark" title="<?php the_title(); ?>">
														<?php the_post_thumbnail('tab-small'); ?>
												</a>
												<?php endif; ?>
												<div class="content">
														<a class="tab-entry" href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
														<i>
																<?php the_time('M j, Y') ?>
														</i>
												</div>
										</li>
								<?php endwhile; ?>
						</ul>

						</div>
				</div>
		</div>


		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'side-1' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
