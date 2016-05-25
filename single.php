<?php get_header(); ?>
    <div class="container page-setup">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="row page-top" >
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="row">
    			<?php unite_posted_on(); ?>
    		</div><!-- .entry-meta -->
        <div class="row">
            <?php the_content(); ?>
        </div>
        <div class="entry-meta row">
      		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
      			<?php
      				/* translators: used between list items, there is a space after the comma */
      				$categories_list = get_the_category_list( __( ', ', 'unite' ) );
      				if ( $categories_list && unite_categorized_blog() ) :
      			?>
      			<span class="cat-links"><i class="fa fa-folder-open-o"></i>
      				<?php printf( __( ' %1$s', 'unite' ), $categories_list ); ?>
      			</span>
      			<?php endif; // End if categories ?>

      			<?php
      				/* translators: used between list items, there is a space after the comma */
      				$tags_list = get_the_tag_list( '', __( ', ', 'unite' ) );
      				if ( $tags_list ) :
      			?>
      			<span class="tags-links"><i class="fa fa-tags"></i>
      				<?php printf( __( ' %1$s', 'unite' ), $tags_list ); ?>
      			</span>
      			<?php endif; // End if $tags_list ?>
      		<?php endif; // End if 'post' == get_post_type() ?>

      		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
      		<span class="comments-link"><i class="fa fa-comment-o"></i><?php comments_popup_link( __( 'Leave a comment', 'unite' ), __( '1 Comment', 'unite' ), __( '% Comments', 'unite' ) ); ?></span>
      		<?php endif; ?>

      		<?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
      	</div><!-- .entry-meta -->
        <?php endwhile; endif; ?>
    </div>
<?php get_footer(); ?>
