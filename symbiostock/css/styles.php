<?php
header("Content-type: text/css; charset: UTF-8");
require_once( dirname( __FILE__ ) . '/../../../../wp-load.php' );;
define('CSSBG', get_bloginfo('template_url') . '/img/bg');
?>
html {
    font-family: 'Open Sans', sans-serif;
    font-size: 62.5%; /* Corrects text resizing oddly in IE6/7 when body font-size is set using em units http://clagnut.com/blog/348/#c790 */
    overflow-y: scroll; /* Keeps page centred in all browsers regardless of content height */
    -webkit-text-size-adjust: 100%; /* Prevents iOS text size adjust after orientation change, without disabling user zoom */
    -ms-text-size-adjust: 100%; /* www.456bereastreet.com/archive/201012/controlling_text_size_in_safari_for_ios_without_disabling_user_zoom/ */
    
}
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
nav,
section {
    display: block;
}
ol, ul {
    list-style: none;
}
table { /* tables still need 'cellspacing="0"' in the markup */
    border-collapse: separate;
    border-spacing: 0;
}
caption, th, td {
    font-weight: normal;
    text-align: left;
}
blockquote:before, blockquote:after,
q:before, q:after {
    content: "";
}
blockquote, q {
    quotes: "" "";
}
a:focus {
    outline: thin dotted;
}
a:hover,
a:active { /* Improves readability when focused and also mouse hovered in all browsers people.opera.com/patrickl/experiments/keyboard/test */
    outline: 0;
}
a img {
    border: 0;
}
/* =WordPress Core
-------------------------------------------------------------- */
.alignnone {
    margin: 5px 20px 20px 0;
}
.aligncenter,
div.aligncenter {
    display: block;
    margin: 5px auto 5px auto;
}
.alignright {
    float:right;
    margin: 5px 0 20px 20px;
}
.alignleft {
    float: left;
    margin: 5px 20px 20px 0;
}
.aligncenter {
    display: block;
    margin: 5px auto 5px auto;
}
a img.alignright {
    float: right;
    margin: 5px 0 20px 20px;
}
a img.alignnone {
    margin: 5px 20px 20px 0;
}
a img.alignleft {
    float: left;
    margin: 5px 20px 20px 0;
}
a img.aligncenter {
    display: block;
    margin-left: auto;
    margin-right: auto
}
.wp-caption {
    background: #fff;
    border: 1px solid #f0f0f0;
    max-width: 96%; /* Image does not overflow the content area */
    padding: 5px 3px 10px;
    text-align: center;
}
.wp-caption.alignnone {
    margin: 5px 20px 20px 0;
}
.wp-caption.alignleft {
    margin: 5px 20px 20px 0;
}
.wp-caption.alignright {
    margin: 5px 0 20px 20px;
}
.wp-caption img {
    border: 0 none;
    height: auto;
    margin: 0;
    max-width: 98.5%;
    padding: 0;
    width: auto;
}
.wp-caption p.wp-caption-text {
    font-size: 11px;
    line-height: 17px;
    margin: 0;
    padding: 0 4px 5px;
}
/* =Global
----------------------------------------------- */
body,
button,
input,
select,
textarea {
    text-rendering: optimizelegibility;
    line-height: 1.68;
    font-family: 'Open Sans',Arial,sans-serif;
    text-shadow: 0 1px rgba(255, 255, 255, 0.75);
}
ul {
    
    text-shadow: none;
    }
footer {
    
    text-shadow: none;
    }
body{
        
    
    }
h1 {
    
    font-size: 32px;
    font-weight: normal;
    
    }
h2, h3, h4, h5, h6 {
    font-weight: normal;
    font-size: 24px;
    color: #666;
    
    }
footer.site-footer {
    background-color: #111;
    background-image: url(<?php echo CSSBG; ?>/type.png);
    border-top: 7px solid #333;
    padding: 20px 20px;
    color: #E6E6E6;
    }
footer .footer_section{
    background-image: url(<?php echo CSSBG; ?>/transparent_dark.png);
    padding: 10px;
    border-radius:5px 5px;
    border: 1px solid #333;
    margin-bottom: 10px;
    }
footer .footer_info {
    background-image: url(<?php echo CSSBG; ?>/transparent_dark.png);
    padding: 10px 0;
    margin: 10px 0;
    text-align: center;    
    border: 1px solid #333;
    }    
.tags-links .icon-tag, .entry-meta .icon-tag{
    color: #999;
    }
.carousel .carousel-control {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    }    
/* Alignment */
.alignleft {
    display: inline;
    float: left;
    margin-right: 1.5em;
}
.alignright {
    display: inline;
    float: right;
    margin-left: 1.5em;
}
.aligncenter {
    clear: both;
    display: block;
    margin: 0 auto;
}
/* Text meant only for screen readers */
.assistive-text {
    clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
    clip: rect(1px, 1px, 1px, 1px);
    position: absolute !important;
}
.site-header{
    background-color: transparent;
    
    }
/* =Menu
----------------------------------------------- */
.main-navigation {
    clear: both;
    display: block;
    float: left;
    width: 100%;
}
.main-navigation ul {
    list-style: none;
    margin: 0;
    padding-left: 0;
}
.main-navigation li {
    float: left;
    position: relative;
}
.main-navigation a {
    display: block;
    text-decoration: none;
}
.mobile_menu {
    background-color: #666;
    /*background-image: url(<?php echo CSSBG; ?>/transparent_dark.png);*/
    border-radius: 5px;
    margin-bottom: 10px;
    }
.mobile_menu form {
    padding: 10px 10px 0px 10px;
    margin: 0;
    }
    
.mobile_menu select {
    background-image: url(<?php echo CSSBG; ?>/bgnoise.png);
    width: 100%;
    }    
    
.main-navigation ul ul {
    -moz-box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    -webkit-box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    display: none;
    float: left;
    position: absolute;
        top: 1.5em;
        left: 0;
    z-index: 99999;
}
.main-navigation ul ul ul {
    left: 100%;
    top: 0;
}
.main-navigation ul ul a {
    width: 200px;
}
.main-navigation ul ul li {
}
.main-navigation li:hover > a {
}
.main-navigation ul ul :hover > a {
}
.main-navigation ul ul a:hover {
}
.main-navigation ul li:hover > ul {
    display: block;
}
.main-navigation li.current_page_item a,
.main-navigation li.current-menu-item a {
}
/* Small menu */
/*above header nav*/
.above-header-menu{
    float: right;
    border: 1px solid #E6E6E6;
    border-width: 0 1px 1px 1px;
    -webkit-border-radius: 0px 0px 5px 5px;
        border-radius: 0px 0px 5px 5px;
        padding:0 10px 0 10px;
        width: auto;
        font-size: 12px;
    }
ul.above-header-menu li{
    float: right;
    }
/*above header nav*/
.menu-toggle {
    cursor: pointer;
}
.main-small-navigation .menu {
    display: none;
}
.header-main-nav {
    border:1px solid #E6E6E6;
    border-left:0;
    border-right:0;
    margin-bottom: 20px; 
    margin-top: 10px;     
}
.header-main-nav ul li {
    border-right:dotted 1px #E6E6E6;
    
}
.header-main-nav ul li a:link, .header-main-nav ul li a:visited {
    border-radius:0;
    text-transform:uppercase;
    color:#666;
    display:block;
    padding:20px;
    margin:2px;
    margin-bottom:3px;
    padding-top:18px;
    font-weight:bold;
    font-size:14px;
    text-align: center;
}
.header-main-nav ul li a:hover {
    color:#333;
    border-top:solid 3px #333;
    padding-top:15px;
    background-color: transparent;
}
.header-main-nav ul li i {
    display:block;
    font-size:12px;
    text-align:center;
    margin-left:auto;
    margin-right:auto;
    font-weight:normal;
    text-transform:lowercase;
    margin-top:5px
}
.header-main-nav ul li a i {
    color:#999;
}
.header-main-nav ul li a:hover i {
    color:#333;
}
.header-main-nav .icon-home, .header-main-nav .icon-chevron-down {
    display: inline;
    font-size: inherit;
    text-align: inherit;
    font-weight: inherit;
    text-transform: inherit;
    color: inherit;
    }
.header-main-nav .icon-chevron-down {
    padding-left: 8px;
    }
.dropdown-toggle a:link {
}
.dropdown-toggle .sub-menu {
    position:absolute;
    top:100%;
    border: #E6E6E6 1px solid;
    border-radius:0 0 14px 14px;
    background-color: #FFF;
    padding-bottom:10px
}
.dropdown-toggle .sub-menu li {
    background-color:transparent;
    border:0
}
.dropdown-toggle .sub-menu li a {
    background-image:none;
    background-color:transparent
}
.dropdown-toggle .sub-menu li a:link, .dropdown-toggle .sub-menu li a:visited {
    color: #666;
    font-size:12px;
    text-align:left;
    padding:0 20px 0 20px;
    background-color:none
}
.dropdown-toggle .sub-menu li a:hover {
    background-color:#666;
    color:#0088CC;
    border:0;
    background-color:transparent
}
.dropdown-toggle .sub-menu ul {
    top:0;
    border-width: 1px;
    border-color:#E6E6E6;
    border-radius:14px 14px 14px 14px;
    background-color:#FFF;
    left:90%
}
.header-main-nav ul li.current-menu-item a:link, .header-main-nav ul li.current-menu-item a:visited, .header-main-nav ul li.current-menu-item a:hover, .header-main-nav ul li.current-menu-item a:active {
    background-color: transparent;
}
.header-main-nav ul li.current-menu-item ul a:link, .header-main-nav ul li.current-menu-item ul a:visited {
    border:0;
    background-color:transparent;
    color:#999
}
.header-main-nav ul li.current-menu-item ul a:hover {
    color:#FFF
}
.header-main-nav ul li.current-menu-item a:link i, .header-main-nav ul li.current-menu-item a:visited i, .header-main-nav ul li.current-menu-item a:hover i, .header-main-nav ul li.current-menu-item a:active i {
    color:#333
}
.header-main-nav ul li.current-menu-item ul li a:link, .header-main-nav ul li.current-menu-item ul li a:visited , .header-main-nav ul li.current-menu-item ul li a:hover , .header-main-nav ul li.current-menu-item ul li a:active {
    color:#333
}
 .header-main-nav ul li ul li.current-menu-item a:link, .header-main-nav ul li ul li.current-menu-item a:visited, .header-main-nav ul li ul li.current-menu-item a:hover, .header-main-nav ul li ul li.current-menu-item a:active{
     padding-top: 0;
    
     }
/*--------------------------------------------------------------
SYMBIOSTOCK CONTENT
--------------------------------------------------------------*/
.content-wrap{
    clear: both;
    }
.item-preview img.photo {
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}    
.site-main {
    border-top: #E6E6E6 0px solid;
    }
.site-content:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0;
} 
.site-content{
    margin: 0px 0px 20px 0px;
    padding: 0px 20px 20px 0px;
    border: 1px solid #E6E6E6;
    border-top: 0;
    border-bottom: 0;
    border-left: 0;
    
    }
    
.home .site-content    {
    margin: 0;
    padding: 0;
    border: 0;
    
    }
.home-content h1 {
    font-size: 24px;    
    color: #666;
    }
.home-content {
    color: #666;
    }    
        
/*--------------------------------------------------------------
SYMBIOSTOCK WIDGETS
--------------------------------------------------------------*/    
.widget-area{
    color: #999;
    }
.widget-area ul {
    list-style-type: none;
    }        
.widget-area aside{
    padding-bottom: 40px;
    }
.widget-area h1, .widget-area h2, .widget-area h3, .widget-area h4, .widget-area h5, .widget-area h6 {
    clear: both;
    font-size: 22px;
    color: #999;
    letter-spacing: 1px;
    border-bottom: 3px solid #E6E6E6;
    padding: 5px 0 5px 0;
    margin: 5px 0 4px 0;
    line-height: 1.618;
    }
.widget-area ul li a:link, .widget-area ul li a:visted {
    color: #999;
    text-decoration: none;
    display: block;
    width: 100%;
    }
.widget-area ul {
    margin: 0;
    padding: 0;
    }    
    
.widget-area ul li{
    padding-top: 5px;
    padding-bottom: 4px;
    border-bottom: 1px #E6E6E6 solid;
    }
    
/*--------------------------------------------------------------
SYMBIOSTOCK CART
--------------------------------------------------------------*/    
.symbiostock_product th {
    background-color: #E6E6E6;
    }
#symbiostock_product_table tr{
    }
#symbiostock_product_table tr.in_cart td,
#symbiostock_product_table tr.in_cart label {
    font-style: oblique;
    background-color: #FFFF64;
    
    }    
span.compare_discount{
    text-decoration:line-through;
    color: #999;
    
    }
.not_available {
    color: #E6E6E6;
    }
    
.not_available label {
    text-decoration: line-through;
    }    
    
 em.compare_discount {
    text-decoration: none;
    font-weight: bold;
    color: #06F;
    
    }    
    
.total{
    font-weight: bold;
    font-size: 16px;
    display: block;
    margin-bottom: 13px;
    
    }
.gotocart{
    font-size: 20px;
    }
a:link.remove_from_cart {
    color: #999;
    
    }
a:visited.remove_from_cart {
    color: #999;
    }    
a:hover.remove_from_cart {
    text-decoration: none;
    color: #F00;
    }    
a:active.remove_from_cart {}            
/*tags*/
#keywords-listing a:link {color: #666;} 
#keywords-listing  a:visited {color: #666;} 
#keywords-listing a:hover {color: #333;} 
#keywords-listing a:active {color: #666;}
/*--------------------------------------------------------------
SYMBIOSTOCK FEATURED POSTS
--------------------------------------------------------------*/    
.widget-featured .inner-featured{
    }
.front-page-featured{
    
    }
.widget_symbiostock_latest_images h3, .widget_symbiostock_featured_images h3 {
    background-color: #F0F0F0;
    margin: 0;
    margin-bottom: 10px;
    padding-left: 10px;    
    }    
.widget_symbiostock_latest_images, .widget_symbiostock_featured_images {
    border-top: 1px solid #E6E6E6;
    border-bottom: 1px solid #E6E6E6;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-bottom: 10px;
    }    
.widget_symbiostock_featured_images_homepage h3{
    font-size: 16px;    
    }    
.widget-featured img {
    border: #E6E6E6 1px solid;
    -webkit-border-radius: 12px;
    border-radius: 12px; 
    display: block;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 10px;
    
    }
#primary .widget-featured {
    color: #666;
    
    }
#primary .widget-featured a:link, #primary .widget-featured a, .widget-area  a:link, .widget-area  a {
    font-size: 14px;
    color: #333;
    }
.widget-area  a:hover{
    color: #0088CC;
    }    
#primary .widget-featured p, .widget-area .widget-featured p{
    margin: 0;
    max-width: 220px;
    padding: 0;
    line-height: 1.618;
    font-size: 12px;
    
    
    }
#primary .widget-featured .entry-date, .widget-area .widget-featured .entry-date{
    color:  #999;
        
    }
#primary .widget-featured a:link.read-more{
    display: block;
    font-style: oblique;
    font-size: 12px;
    text-align: right;
    }
/*--------------------------------------------------------------
SYMBIOSTOCK SEARCH RESULTS
--------------------------------------------------------------*/    
.network_carousel {
    height: 280px;
    }

.network_results_container{
    
    height: 290px;
    
    }
    
.search_page {
    border-right: 0;
    padding-top: 10px;
    
    }
.symbiostock_loader{
    }
.search-result{
    text-align: center;
    float: left;
    width: 170px;
    height: 170px;
    margin: 10px;
    }
.sscntrl{
    display: none;
    font-size: 18px;
    padding: 2px;
    
    }
.modal_control {
    
    font-size: 24px;
    }
.modal-preview {
    min-height: 400px;
    
    }
.modal-preview img {
    display: block;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
    }    
.results_for{
    text-align: center;
    }    
.results_info{
    
    }    
.search_minipic{
    border: 1px solid #DDDDDD;
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
    padding: 4px;
    }
.symbiostock_pagination{
    margin: 0;
    clear: both;
    }    
    
.network_results{
    
    }
    
.network_results_header{
    }    
.network_results .pagination{
    margin: 0;
    }    
.network_results .pagination ul{
    margin: 15px 0 5px 0;
    }            
.purchased_file{
    text-align: center;
    float: left;
    width: 170px;
    margin: 10px;
    }
/* =Content
----------------------------------------------- */
.symbiostock-image a:link, 
.symbiostock-image a:visited,
.symbiostock-image a:hover, 
.symbiostock-image a:active{    
    text-decoration: none;
    color: #666;
    }
.symbiostock-image h1 {
    font-size: 18px;
    margin-top: 0;
    margin-bottom: 20px;    
    }
.sticky {
}
.hentry {
    margin: 0 0 1.5em;
}
.entry-meta {
    clear: both;
}
.byline {
    display: none;
}
.single .byline,
.group-blog .byline {
    display: inline;
}
.entry-content,
.entry-summary {
    margin: 1.5em 0 0;
}
.page-links {
    clear: both;
    margin: 0 0 1.5em;
}
/* =Asides
----------------------------------------------- */
.blog .format-aside .entry-title,
.archive .format-aside .entry-title {
    display: none;
}
/* =Media
----------------------------------------------- */
.site-header img,
.entry-content img,
.comment-content img,
.widget img {
    max-width: 100%; /* Fluid images for posts, comments, and widgets */
}
.site-header img,
.entry-content img,
img[class*="align"],
img[class*="wp-image-"] {
    height: auto; /* Make sure images with WordPress-added height and width attributes are scaled correctly */
}
.site-header img,
.entry-content img,
img.size-full {
    max-width: 100%;
    width: auto; /* Prevent stretching of full-size images with height and width attributes in IE8 */
}
.entry-content img.wp-smiley,
.comment-content img.wp-smiley {
    border: none;
    margin-bottom: 0;
    margin-top: 0;
    padding: 0;
}
.wp-caption {
    border: 1px solid #E6E6E6;
    max-width: 100%;
}
.wp-caption.aligncenter,
.wp-caption.alignleft,
.wp-caption.alignright {
    margin-bottom: 1.5em;
}
.wp-caption img {
    display: block;
    margin: 1.2% auto 0;
    max-width: 98%;
}
.wp-caption-text {
    text-align: center;
}
.wp-caption .wp-caption-text {
    margin: 0.8075em 0;
}
.site-content .gallery {
    margin-bottom: 1.5em;
}
.gallery-caption {
}
.site-content .gallery a img {
    border: none;
    height: auto;
    max-width: 90%;
}
.site-content .gallery dd {
    margin: 0;
}
.site-content .gallery-columns-4 .gallery-item {
}
.site-content .gallery-columns-4 .gallery-item img {
}
/* Make sure embeds and iframes fit their containers */
embed,
iframe,
object {
    max-width: 100%;
}
/* =Navigation
----------------------------------------------- */
.site-content .site-navigation {
    margin: 0 0 1.5em;
    overflow: hidden;
}
.site-content .nav-previous {
    float: left;
    width: 50%;
}
.site-content .nav-next {
    float: right;
    text-align: right;
    width: 50%;
}
#symbiostock_main_search{
    float: right;
}
#symbiostock_main_search form {
margin: 5px;
    }
#symbiostock_main_search #s {
color: #97be0e;
font-weight: bold;
font-style: oblique;
border-color: #009de0;
border-radius: 8px 0px 0px 8px; 
-moz-border-radius: 10px 0px 0px 10px; 
-webkit-border-radius: 8px 0px 0px 8px; 
padding-left: 10px;
    }
    
#symbiostock_main_search #select_type{
    border-color: #009de0;
    width:100px;
    border-left-width: 0;
    }
#symbiostock_main_search button {
    border-color:#009de0;
    width:100px;
    }    
/* =Comments
----------------------------------------------- */
.bypostauthor {
}
/* =Widgets
----------------------------------------------- */
.widget {
}
/* Search widget */
#searchsubmit {
    display: none;
}
#commentform input[type=text],
#commentform textarea {
    width: 90%;
}
.form-allowed-tags code{
    white-space: normal;
    }
.standard-form#signup_form div.submit {
    float: right;
}
.symbiostock_carousel_preview_container{
    width: 590px;    
    }
.symbiostock_carousel_preview_container .item{    
    height: 590px;
    }
    
.symbiostock_carousel_minipic_container{
    width: 250px;    
    }
.symbiostock_carousel_minipic_container .item{    
    height: 250px;
    }    
.symbiostock_carousel_preview_container img, .symbiostock_carousel_minipic_container img{    
    display: block;
    margin-left: auto;
    margin-right: auto;    
    }    
.symbiostock_carousel_preview{
    
    }
.network_results .carousel-indicators {
    top: -12px;        
    background-color: #000;
    -moz-opacity: 0.20;
    opacity: 0.20;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=20);
    padding: 2px;
    border-radius: 7px; 
    -moz-border-radius: 7px; 
    -webkit-border-radius: 7px; 
    border: 1px solid #000000;
}
.network_results .network_avatar {
    padding-right: 10px;
    margin-right: 10px;
    border-right: 1px #CCC solid;
}

.network_directory .author_container{
    width: 330px;
    height: 150px;
    float: left;
    margin: 30px;
    }
.network_directory  .bio-container{
    height: 100px;
    overflow: hidden;
    }