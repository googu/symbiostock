<?php
/*
Template Name: Categories Page
*/
/**
 * The template for displaying home landing page.
 *
 * @package symbiostock
 * @since symbiostock 1.0
 */
get_header(); ?>
        <div class=row>
    
            <div id="primary" class="content-area col-md-12">
                <div id="content" class="site-content" role="main">
                <?php
                //add support for YOAST SEO
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<span class="text-info" id="breadcrumbs">','</span><hr />');
                } ?>                     
                    <div class="panel panel-info">
                        <div class="panel-heading"><h2 class="panel-title">Image Categories</h2></div>
                        <div class="panel-body">                     
                       <?php
                       
                       //list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)
                        $taxonomy     = 'image-type';
                        $orderby      = 'name'; 
                        $show_count   = 1;      // 1 for yes, 0 for no
                        $pad_counts   = 1;      // 1 for yes, 0 for no
                        $hierarchical = 1;      // 1 for yes, 0 for no
                        $title        = '';
                        
                        $args = array(
                          'taxonomy'     => $taxonomy,
                          'orderby'      => $orderby,
                          'show_count'   => $show_count,
                          'pad_counts'   => $pad_counts,
                          'hierarchical' => $hierarchical,
                          'title_li'     => $title,
                         
                        );
                        ?>
                        
                        <ul>
                        <?php wp_list_categories( $args ); ?>
                        </ul>
                        </div>                   
                    </div>               
                        
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                          
                        </header><!-- .entry-header -->
                    
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'symbiostock' ), 'after' => '</div>' ) ); ?>
                            <?php edit_post_link( __( 'Edit', 'symbiostock' ), '<span class="edit-link">', '</span>' ); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> --> 
                </div><!-- #content .site-content -->
            </div><!-- #primary .content-area -->
        
        </div>        
<?php get_footer(); ?>