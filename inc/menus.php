<?php
include_once('classes/nav_walker_description.php');
include_once('classes/nav_walker_mobile.php');
/**
 * Navigation Menus for symbiostock
 */
function symbiostock_above_header_nav()
{
    wp_nav_menu(
    array(
    'theme_location'  => 'above-header-menu',
    'menu'            => '', 
    'container'       => 'ul', 
    'container_class' => 'menu-{menu slug}-container ', 
    'container_id'    => '',
    'menu_class'      => 'nav navbar-nav navbar-right', 
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 1,
    'walker'          => ''
        )
    );
    
}

function symbiostock_header_nav()
{
    wp_nav_menu(
    array(
    'theme_location'  => 'header-menu',
    'menu'            => 'primary', 
    'container'       => false, 
    'container_class' => '', 
    'container_id'    => '',
    'menu_class'      => 'nav navbar-nav', 
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 2,
    'walker'          =>  new wp_bootstrap_navwalker()
        )
    );
    
    
}
// generates a dropdown select element for navigation on mobile devices
function symbiostock_mobile_menu(){
    wp_nav_menu(
    array(
    'theme_location'  => 'mobile-navigation',
    'menu'            => '', 
    'container'       => 'div', 
    'container_class' => 'mobile_menu', 
    'container_id'    => 'symbiostock_mobile_menu',
    'menu_class'      => '', 
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap' => '<form><select class="default" id="prim-selector" name="URL" onchange="window.location.href= this.form.URL.options[this.form.URL.selectedIndex].value">%3$s</select></form>',
    'depth'           => 3,
    'walker'          =>  new nav_walker_mobile()
        )
    );    
    
} 
add_action('init', 'register_symbiostock_menus'); 
function register_symbiostock_menus()
{
    register_nav_menus(array( // Using array to specify more menus if needed        
        'header-menu' => 'Header Menu', // Main Navigation
        'above-header-menu' => 'Account/Cart Menu', // Extra Navigation if needed (duplicate as many as you need!)
        'sidebar-menu' => 'Sidebar Menu', // Sidebar Navigation            
    
    ));
}
 
?>