<?php
/*
Template Name: HOME Page Generated
*/
/**
 * The template for displaying home as generated by the Home Page Generator feature
 *
 * @package symbiostock
 * @since symbiostock 1.0
 */

$hp = new ss_home_page( get_the_id() );

get_header(); ?>
        <div class="home">
            <div class="row">
                <div class="col-md-12 ss-home-slideshow">
                <?php echo do_shortcode( $hp->ss_slideshow_short_code ) ?>
                </div>
            </div>
            
            <div id="primary" class="content-area ss-home-main  row">     
            
                <div id="content" class="site-content home-content col-md-6" role="main">    
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="panel">
                            <div class="panel-heading"><h1 class="panel-title"><?php echo the_title() ?></h1></div>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('panel-body'); ?>>                            
                                <?php the_content(); ?>
                                <?php edit_post_link( __( 'Edit', 'symbiostock' ), '<span class="edit-link">', '</span>' ); ?>                            
                            </article><!-- #post-<?php the_ID(); ?> -->  
                        </div> 
                    <?php endwhile; // end of the loop. ?>    
                </div><!-- #content .site-content -->            

                <div class="col-md-6">
                    <?php symbiostock_csv_symbiocard_box('', false) ?>
                </div>
            </div>    
            
            <!-- Calls To Action -->
            <div class="row cta-cells">

                <div class="col-md-4">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <i class="<?php echo trim($hp->ss_cta_one_icon) ?>"> </i> 
                            <?php echo $hp->ss_cta_one_title ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $hp->ss_cta_one ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <i class="<?php echo trim($hp->ss_cta_two_icon) ?>"> </i> 
                            <?php echo $hp->ss_cta_two_title ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $hp->ss_cta_two ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <i class="<?php echo trim($hp->ss_cta_three_icon) ?>"> </i> 
                            <?php echo $hp->ss_cta_three_title ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $hp->ss_cta_three ?>
                        </div>
                    </div>
                </div>
            
            </div>
            <!-- /Call To Actions -->
            
            <!-- Image Listings -->
            
            <div class="row">
                <div class="col-md-12">
            
            <!-- Featured Images -->
            <?php 
            
            $featured_images_id = get_option('symbiostock_featured_images', '');
            
            if(!empty($featured_images_id)){
                
             $args = array(
            
            'post_type' => 'image',       
            'posts_per_page' => 144,
            'tax_query' => array(
                array(
                        'taxonomy' => 'image-type',
                        'field' => 'id',
                        'terms' => $featured_images_id,
                        )
                    )                
            );
        
            } else {
                            
                echo '<p>Featured Images category does not exist. Has it been deleted? Please re-activate theme and place featured images into "Symbiostock Featured Images" category.</p>';
                
                }
            $featured_home = new WP_Query($args);        
            ?>
            <div class="row ss-home-featured">
            <h3 class="col-md-12"><i class="icon-star"> </i>Featured Images</h3>
            <?php                 
                while ( $featured_home->have_posts() ) : 
                    $featured_home->the_post();                                         
            ?>

            <div class="col-md-2 ss-home-minipic"> 
                <a class="thumbnail" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(  ); } ?>
                </a> 
            </div>                    

            <?php
                endwhile; 
            ?>
            </div>
            <!-- /Featured Images -->    
            

            <!-- New Images -->
            <?php     
            $args = array(        
                'post_type' => 'image',       
                'showposts' => 6,        
            );    
            
            $home_latest = new WP_Query($args);
            
            ?>
            <div class="row">
            <h3 class="col-md-12"><i class="icon-eye-open"> </i>Latest Images</h3>
                <?php         
                while ( $home_latest->have_posts() ) : 
                    $home_latest->the_post();                                 
                    ?>
                    <div class="col-md-2 ss-home-minipic"> 
                        <div class="">
                        <a class="thumbnail" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(  ); } ?>
                        </a> 
                        </div>
                    </div>
                    <?php
                endwhile;
                ?>                     
            </div>
            <!-- /New Images -->              
            
                </div>
            </div> 
              
            <!-- /Image Listings -->
          
            </div><!-- #primary .content-area -->
        </div>        
        <hr />
        
<?php get_footer(); ?>
