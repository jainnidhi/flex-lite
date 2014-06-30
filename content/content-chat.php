<?php
/**
 * The template for displaying posts in the Chat post format
 *
 * @package Flex
 * @since Flex 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
                <?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }
			else { ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'flex' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php } // is_single() ?>
		<?php flex_posted_on(); ?>
	</header> <!-- /.entry-header -->
	<div class="entry-content">
		<?php the_content( wp_kses( _e( 'Continue reading <span class="meta-nav">&rarr;</span>', 'flex' ), array( 
			'span' => array( 
				'class' => array() ) 
			) ) ); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html_e( 'Pages:', 'flex' ),
			'after' => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after' => '</span>'
		) ); ?>
	</div> <!-- /.entry-content -->

	<footer class="entry-meta">
		<?php if ( is_singular() ) {
			// Only show the tags on the Single Post page
			flex_entry_meta();
		} ?>
		<?php edit_post_link( esc_html_e( 'Edit', 'flex' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
	</footer> <!-- /.entry-meta -->
</article> <!-- /#post -->
