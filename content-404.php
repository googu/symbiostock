<?php
/**
 * @package symbiostock
 * @since symbiostock 1.0
 */
?>
    <div id="primary" class="content-area row">
        <div id="content" class="site-content col-md-12" role="main">
            <article id="post-0" class="post error404 not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'symbiostock' ); ?></h1>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'symbiostock' ); ?></p>
                 
                    <?php 
                    ss_list_pretty_categories();
                    ?>
                    <?php
                    /* translators: %1$s: smilie */
                    $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'symbiostock' ), convert_smilies( ':)' ) ) . '</p>';
                    the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                    ?>
                    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-0 .post .error404 .not-found -->
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->