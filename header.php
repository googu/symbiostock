<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package symbiostock
 * @since symbiostock 1.0
 */
 
$is_marketer_request = symbiostock_marketer();

if($is_marketer_request == true){    
    exit;    
    }


//set up conditions for main menu location    
$menu_location = get_theme_mod( 'menu_location' );
if( $menu_location != '' ) {
     
    if($menu_location == 0){
        $is_fixed = 'navbar-fixed-top';
        $main_nav_fixed = 'id="ss_fixed_nav"';
    } else {
        $is_fixed = '';
        $main_nav_fixed = '';
    }

} else {
    
    $is_fixed = '';
    $main_nav_fixed = '';
        
}

//set up conditions for search/account menu location
$search_account_menu_location = get_theme_mod( 'separate_search_menu' );
if( $search_account_menu_location != '' ) {
     
    if($search_account_menu_location == 1 || $search_account_menu_location == 2){
        $top = 1;
        
        if($search_account_menu_location == 1){        
           $search_account_nav_fixed = 'id="ss_fixed_nav"';
           $fixed_class = 'navbar-fixed-top';
        } else  {
           $search_account_nav_fixed = 'id="ss_anchored_nav"';
           $is_fixed = '';
           $fixed_class = 'col-md-12 ss-top-anchored';
        }
        
    } else {
        $top = 0;
        $search_account_nav_fixed = '';
    }
}  else {
    
    $top = 0;
    $search_account_nav_fixed = '';    
    
}

//set up conditions for menu style
$bootstrap_menu_inverse = get_theme_mod( 'invert_main_menu' );
if( $bootstrap_menu_inverse != '' ) {
     
    if($bootstrap_menu_inverse == 1){
        $inverted_main_menu = '';
    } else {
        $inverted_main_menu = 'navbar-inverse';        
    }
} else {
    
    $inverted_main_menu = '';
    
}



//set up conditions for search menu inversion
$bootstrap_search_menu_inverse = get_theme_mod( 'invert_search_menu' );
if( $bootstrap_search_menu_inverse != '' ) {
     
    if($bootstrap_search_menu_inverse == 1){
        $inverted_search_menu = '';
    } else {
        $inverted_search_menu = 'navbar-inverse';
    }
} else {
    
    $inverted_search_menu = '';
}

//set up conditions for search menu color/fill/type
$bootstrap_search_menu_type = get_theme_mod( 'invert_search_menu_type' );
if( $bootstrap_search_menu_type != '' ) {
     
    if($bootstrap_search_menu_type == 1){
        $search_menu_style = 'navbar navbar-default';
    } else {
        $search_menu_style = '';
    }
} else {
    
    $search_menu_style = 'navbar navbar-default';
    
}
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- google fonts -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo get_theme_mod('header_font'); ?>" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo get_theme_mod('body_font'); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php symbiostock_dublin_core(true); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
    <?php do_action( 'before' ); ?>
    <header id="masthead" class="site-header" role="banner"> 
        <?php         
        if($top == 1){
            ?>
            <div class="row">
            <div <?php echo $search_account_nav_fixed ?> role="navigation" class="<?php echo $search_menu_style ?> <?php echo $fixed_class ?> <?php echo $inverted_search_menu ?>"> <?php
            //get the search form
                        
            include_once('searchform_symbiostock.php');
        	
          
            if(has_nav_menu('above-header-menu')) {
            	symbiostock_above_header_nav( );
            }
            else
            {
            	?>
				<ul class="nav navbar-nav navbar-right" id="menu-test">
				   
				<?php 
				echo symbiostock_customer_nav_links();
				?>
				 
				</ul>
				<?php 		
            }
          
            
       
            ?>
            </div>
            </div>
            <?php
        }
            
        ?>            
        <div class="row symbiostock_branding">
            <div class="symbiostock_logo col-md-12">    
                <hgroup>                    
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img alt="<?php bloginfo( 'description' ); ?>" class="logo" src ="<?php echo get_option( 'symbiostock_logo_link', symbiostock_LOGO ); ?>" /></a>
                </hgroup> 
            </div>    
        </div>
        
        
        <div class="row" id="ss-navigation"> 
            
            <div id="ss-search-transform-mobile"></div>
                    
            <nav <?php echo $main_nav_fixed ?> role="navigation" class="<?php echo $is_fixed; ?>  navbar navbar-default <?php echo $inverted_main_menu ?>"> 
               
                <h1 class="assistive-text"><?php _e( 'Menu', 'symbiostock' ); ?></h1>
                
                <div class="assistive-text skip-link">
                    <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'symbiostock' ); ?>"><?php _e( 'Skip to content', 'symbiostock' ); ?></a>
                </div>
            	
            	<button class="navbar-toggle" data-target="#main-navigation" data-toggle="collapse" type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
            	
                <div id="main-navigation" class="col-md-12 collapse navbar-collapse"> 
                
               
                <?php     
		            if(has_nav_menu('above-header-menu')) {
		            	symbiostock_header_nav( );
		            }
		            else
		            {
		            	?>
						<ul class="nav navbar-nav" id="menu-test">
						   
						   <li class="menu-item menu-item-type-post_type" id=""><a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><i class="icon-home"></i></a></li>
						   
						   <li class="menu-item menu-item-type-post_type" id=""><a title="<?php _e('Images', 'symbiostock'); ?>" href="<?php echo get_post_type_archive_link( 'image' ); ?>"><i class="icon-picture"> </i> <?php _e('Images', 'symbiostock'); ?></a></li>
						   
						   <li class="menu-item menu-item-type-post_type" id=""><a title="<?php _e('Categories', 'symbiostock'); ?>" href="<?php echo get_permalink( get_option('symbiostock_categories_page', '#'))?>"><i class="icon-sitemap"> </i> <?php _e('Categories', 'symbiostock'); ?></a></li>
						   						   
						   <li class="menu-item menu-item-type-post_type" id="">
						      
						      <a class="dropdown-toggle" data-toggle="dropdown" href="#" title=""><i class="icon-bookmark"> </i> Symbiostock<span class="caret"></span></a>
						      
						      <ul class=" dropdown-menu" role="menu">
						      
						         <li class="menu-item menu-item-type-post_type" id=""><a href="http://www.symbiostock.info" title="<?php _e('Search Symbiostock', 'symbiostock'); ?>"><i class="icon-search"> </i> <?php _e('Search Symbiostock', 'symbiostock'); ?></a></li>
						      
						         <li class="menu-item menu-item-type-post_type" id=""><a href="http://www.symbiostock.org/community/" title="<?php _e('Symbiostock Community', 'symbiostock'); ?>"><i class="icon-smile"> </i> <?php _e('Community', 'symbiostock'); ?></a></li>
 								
 								 <li class="menu-item menu-item-type-post_type" id=""><a href="https://twitter.com/symbiostock" title="<?php _e('Symbiostock Twitter', 'symbiostock'); ?>"><i class="icon-twitter"> </i> <?php _e('Symbiostock Twitter', 'symbiostock'); ?></a></li>
						     						      
						         <li class="menu-item menu-item-type-post_type" id=""><a href="http://www.symbiostock.org/community/viewforum.php?f=56" title="<?php _e('Symbiostock Documentation', 'symbiostock'); ?>"><i class="icon-book"> </i> <?php _e('Documentation', 'symbiostock'); ?></a></li>
						      
						         <li class="menu-item menu-item-type-post_type" id=""><a href="http://www.symbiostock.com/" title="<?php _e('Download Symbiostock', 'symbiostock'); ?>"><i class="icon-download"> </i> <?php _e('Download Symbiostock', 'symbiostock'); ?></a></li>
						         
						        <li class="menu-item menu-item-type-post_type" id=""><a href="https://github.com/orangeman555/symbiostock" title="<?php _e('Symbiostock Github', 'symbiostock'); ?>"><i class="icon-github"> </i> <?php _e('Symbiostock Github', 'symbiostock'); ?></a></li>
						      
						      </ul>
						   </li>
						</ul>
		            	<?php		            	
		            }             
                ?> 
                
                <?php                
                if($top == 0){
                
                //get the search form
                include_once('searchform_symbiostock.php');
                ?>   
                
                <?php     
		            if(has_nav_menu('above-header-menu')) {
		            	symbiostock_above_header_nav( );
		            }
		            else
		            {
						?>
						<ul class="nav navbar-nav navbar-right" id="menu-test">
						   
						<?php 
						echo symbiostock_customer_nav_links();
						?>
						 
						</ul>
						<?php 		            
		            }
                }
                ?>   

                </div>
             </nav><!-- .site-navigation .main-navigation -->
                
        </div>
            
        
    </header><!-- #masthead .site-header -->
    <div id="main" class="site-main">
    <?php 
    if(isset($_GET['register'])){
        ?>
        <div class="alert alert-success"><?php _e('Registration successful!', 'symbiostock') ?> <?php echo symbiostock_customer_area( __('Your <strong>cart area</strong> is here', 'symbiostock') )?>.</div>
        <?php         
    }    
    ?>