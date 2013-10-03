<?php
//showing an author box from the .csv files generated by Symbiostock
//this function is so big it gets its own file!
function symbiostock_csv_symbiocard_box($symbiocard_location = '', $compact = true, $id='symbiostock_author', $attribution = false){    
    
    if(empty($symbiocard_location)){
        
        $symbiocard_location = ABSPATH . '/symbiocard.csv';    
        
        if(file_exists(ABSPATH . '/symbiocard.csv')){
            
            $symbiocard_location = ABSPATH . '/symbiocard.csv';    
            
            } else {
                
            return;
                
            }
        }
    
    $author = new network_manager;
    $info = $author->csv_to_array($symbiocard_location, ',');
    
    
    $symbiocard = $info[0];    
    
    $symbiostock_categories = htmlspecialchars_decode ( maybe_unserialize( $symbiocard['symbiostock_author_categories'] ) );
    
    $symbiocard = array_map('strip_tags', $symbiocard);
    
    if( empty($symbiocard) || !is_array($symbiocard) ){
        echo '<em>Symbiocard not available...</em>';
        return;
    }
    
    foreach ($symbiocard as $key=>$value) {
        $symbiocard[$key] = stripslashes($value);
    }
    
    if($compact ==true && $attribution == true){
        $links = 'dropdown-menu';
        $btn_group = 'btn-group';
        
        //we toggle schema and markup based on which page we are on
        $schema = '';
        $creator_credits = 'author contributor copyrightHolder creator name';
        $bio = '';
    } elseif($compact ==true && $attribution == false){
        
        $links = 'dropdown-menu';    
        $btn_group = 'btn-group';
        
        //we toggle schema and markup based on which page we are on
        $schema = '';
        $creator_credits = '';
        $bio = '';
        
    } else {        
    
        $links = 'nav nav-list';    
        $btn_group = '';
        
        //we toggle schema and markup based on which page we are on
        $schema = 'itemtype="http://schema.org/CreativeWork"';
        $creator_credits = 'givenName name';
        $bio = 'itemprop="description"';
    }
    
        
    ?>
 
    <div <?php echo $schema; ?> class="author-bio contributor vcard col-md-12">        
        <div class="symbiostock_author_info col-md-7">
            <div class="author-name">
            <span itemprop="<?php echo $creator_credits ?>" ><a class="ssref" title="Author <?php echo $symbiocard['symbiostock_display_name'] ?>" href="<?php echo $symbiocard['symbiostock_author_page'] ?>"><?php echo $symbiocard['symbiostock_display_name'] ?></a></span>                   
            </div>
            <div class="bio-container">                        
                <p <?php echo $bio; ?>><?php
                
                 if(isset($symbiocard['symbiostock_author_bio']) && !empty($symbiocard['symbiostock_author_bio'])){
                    if($compact == true && strlen($symbiocard['symbiostock_author_bio']) > 74){
                        $pos=strpos(stripslashes($symbiocard['symbiostock_author_bio']), ' ', 75);
                        $bio_text = substr($symbiocard['symbiostock_author_bio'], 0, min(max($pos,75),90) ) . '...<small><a class="ssref" title="See full author bio..." href="'.$symbiocard['symbiostock_author_page'].'"> [more]</a></small>';

                    } else {
                        if(!empty($symbiocard['symbiostock_author_bio'])):
                        $bio_text =    stripslashes($symbiocard['symbiostock_author_bio']);
                        endif;
                    }
                    echo $bio_text;
                }
                ?></p>
            </div>   
            <?php if($compact == false):
             
            if(!empty($symbiocard['symbiostock_home_location_coords'])):                
            $symbiostock_map_info = maybe_unserialize($symbiocard['symbiostock_home_location_coords']);
            endif;
            
            if(!empty($symbiostock_map_info) && is_array($symbiostock_map_info)){                
                $home_area = $symbiostock_map_info['results'][0]['formatted_address'];                
                } else {$home_area = '';}
                
                
            $symbiostock_temp_location_1_info = maybe_unserialize($symbiocard['symbiostock_temporary_location_1_info']);
                if(!empty($symbiostock_temp_location_1_info) && is_array($symbiostock_temp_location_1_info)){                
                $temp_location_1 = $symbiostock_temp_location_1_info['results'][0]['formatted_address'];                
                } else {$temp_location_1 = '';}
            $symbiostock_temp_location_2_info = maybe_unserialize($symbiocard['symbiostock_temporary_location_2_info']);
                if(!empty($symbiostock_temp_location_2_info) && is_array($symbiostock_temp_location_2_info)){                
                $temp_location_2 = $symbiostock_temp_location_2_info['results'][0]['formatted_address'];                
                } else {$temp_location_2 = '';}        
                    
            ?>
            <div id="<?php echo $id ?>" class="accordion">            
                <!--author important links-->  
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo $id ?>" href="#collapseOne_<?php echo $id ?>"><i style="margin-right: 20px;" class="icon-expand-alt"> </i><i class="icon-link">&nbsp;</i>  <span itemprop="address">Author </span></a>
                    </div>
                    <div id="collapseOne_<?php echo $id ?>" class="accordion-body collapse">
                        <div class="accordion-inner">                    
                <?php endif; ?> 
                
                <div class="<?php echo $btn_group ?>">
                    <?php if($compact == true): ?>
                    <button type="button" class="btn btn-default" data-toggle="dropdown">info</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    </button>
                    <?php endif; ?>
                    
                    <ul class="<?php echo $links ?>">
                        <?php if (isset($symbiocard['symbiostock_author_page']) && !empty($symbiocard['symbiostock_author_page'])): ?>
                        <li><a class="ssref" itemprop="" title="Author <?php echo $symbiocard['symbiostock_display_name'] ?>" href="<?php echo $symbiocard['symbiostock_author_page'] ?>"><i class="icon-user"> </i> Author Page</a></li>                
                        <?php endif; ?>
                        
                        <?php if (isset($symbiocard['symbiostock_portfolio']) && !empty($symbiocard['symbiostock_portfolio'])): ?>
                        <li><a itemprop="" class="symbiostock_num_images_link ssref" title="Portfolio" href="<?php echo $symbiocard['symbiostock_portfolio'] ?>"><i class="icon-search"> </i> Portfolio: <?php echo $symbiocard['symbiostock_num_images'] ?> images.</a></li>
                        <?php endif; ?>
                        
                        <?php if (isset($symbiocard['symbiostock_gallery_page']) && !empty($symbiocard['symbiostock_gallery_page'])): ?>
                        <li><a itemprop="" class="symbiostock_gallery_link ssref" title="Gallery" href="<?php echo $symbiocard['symbiostock_gallery_page'] ?>"><i class="icon-star"> </i> Gallery Page</a></li>
                        <?php endif; ?>
                        
                        <?php if (isset($symbiocard['symbiostock_contact_page']) && !empty($symbiocard['symbiostock_contact_page'])): ?>
                        <li><a itemprop="" class="symbiostock_contact_author contact author ssref" title="Contact <?php echo $symbiocard['symbiostock_display_name'] ?>" href="<?php echo $symbiocard['symbiostock_contact_page'] ?>"><i class="icon-envelope"> </i> Contact <?php echo $symbiocard['symbiostock_first_name'] ?></a></li>
                        <?php endif; ?>
                       
                           <?php if (isset($symbiocard['symbiostock_rss']) && !empty($symbiocard['symbiostock_rss'])): ?>
                        <li><a itemprop="" class="symbiostock_author_rss ssref" href="<?php echo $symbiocard['symbiostock_rss'] ?>"><i class="icon-rss"> </i> Updates / RSS</a></li>
                        <?php endif; ?>
                        
                        <?php if (isset($symbiocard['symbiostock_network_page']) && !empty($symbiocard['symbiostock_network_page'])): ?>
                        <li><a itemprop="" class="symbiostock_network_page ssref" href="<?php echo $symbiocard['symbiostock_network_page'] ?>"><i class="icon-sitemap"> </i> Network</a></li>
                        <?php endif; ?>
                    </ul>           
                </div>  
                
                <?php if($compact == false): ?>
                           </div>
                    </div>
                </div>
                              
                <!--author categories-->
                <div class="symbiostock_author_categories accordion-group">                    
                    <div class="accordion-heading">
                        <div>
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo $id ?>" href="#collapseTwo_<?php echo $id ?>"><i style="margin-right: 20px;" class="icon-expand-alt"> </i><i class="icon-reorder">&nbsp;</i>  <span itemprop="address"> Categories </span> </a>
                        </div>
                    </div>
                    <div id="collapseTwo_<?php echo $id ?>" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <ul class="">                        
                            <?php echo $symbiostock_categories; ?> 
                            </ul>                              
                        </div>
                    </div>                   
                </div>          
                                                 
                <!--author network-->
                <div class="symbiostock_author_network accordion-group">                    
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo $id ?>" href="#collapseThree_<?php echo $id ?>"><i style="margin-right: 20px;" class="icon-expand-alt"> </i><i class="icon-sitemap">&nbsp;</i>  <span>Network </span> </a>
                    </div>
                    <div id="collapseThree_<?php echo $id ?>" class="accordion-body collapse">
                        <div class="accordion-inner">
                        <!--network links-->
                        <?php                        
                        if(isset($symbiocard['symbiostock_networked_sites']) && !empty($symbiocard['symbiostock_networked_sites'])){
                            
                            $network_sites = unserialize($symbiocard['symbiostock_networked_sites']);
                            ?><ul class="nav nav-list"> <?php
                            foreach($network_sites as $site){
                                !empty($site['description'])?$desc = $site['description'] : $desc  = $site['address'];
                                echo '<li><a class="ssref" title="'.$desc.'" href="'.$site['address'].'"><i class="icon-user">&nbsp;</i> '.$desc.'</a></li>';
                                
                                }                            
                            }
                            ?></ul> <?php                    
                        ?>
                        </div>
                    </div>                   
                </div>  
                  
                <!--author site attributes-->
                <div class="accordion-group">
                       <div class="accordion-heading">    
                           <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo $id ?>" href="#collapseFour_<?php echo $id ?>"><i style="margin-right: 20px;" class="icon-expand-alt"> </i><i class="icon-book">&nbsp;</i> <span data-toggle="collapse" data-target="#symbiostock-author-attributes-toggle">Attributes & Symbiocard</span></a>
                    </div>
                    <div id="collapseFour_<?php echo $id ?>" class="accordion-body collapse">
                        <table id="symbiostock-author-attributes-toggle" class="table table-condensed accordion-inner">
                            <thead><tr class="info"><th colspan="2">Author Attributes</th></tr></thead>
                           
                            <?php if (isset($symbiocard['symbiostock_profession_1']) && !empty($symbiocard['symbiostock_profession_1'])): ?>
                            <tr><td>Profession 1:</td><td itemprop="jobTitle"><?php echo $symbiocard['symbiostock_profession_1'] ?></td></tr>
                            <?php endif; ?>
                            
                            <?php if (isset($symbiocard['symbiostock_profession_2']) && !empty($symbiocard['symbiostock_profession_2'])): ?>
                            <tr><td>Profession 2: </td><td itemprop="jobTitle"><?php echo $symbiocard['symbiostock_profession_2'] ?></td></tr>
                            <?php endif; ?>
                            
                            <?php if (isset($symbiocard['symbiostock_languages']) && !empty($symbiocard['symbiostock_languages'])): ?>
                            <tr><td>Language(s): </td><td><?php echo $symbiocard['symbiostock_languages'] ?></td></tr> 
                            <?php endif; ?>
                            
                            <?php if (isset($symbiocard['symbiostock_equipment']) && !empty($symbiocard['symbiostock_equipment'])): ?>                    
                            <tr><td>Equipment: </td><td><?php echo $symbiocard['symbiostock_equipment'] ?></td></tr> 
                            <?php endif; ?>                    
                            
                            <?php if (isset($symbiocard['symbiostock_software']) && !empty($symbiocard['symbiostock_software'])): ?>                 
                            <tr><td>Software: </td><td><?php echo $symbiocard['symbiostock_software'] ?></td></tr>
                            <?php endif; ?> 
                            
                            <?php if (isset($symbiocard['symbiostock_open_for_assignment_jobs']) && !empty($symbiocard['symbiostock_open_for_assignment_jobs'])): ?> 
                            <tr><td>Available for<br /> Assignments: </td><td><?php echo $symbiocard['symbiostock_open_for_assignment_jobs'] ?></td></tr>
                            <?php endif; ?> 
                            <?php if (isset($home_area) && !empty($home_area)): ?>
                            <tr><td>Home<br /> Location: </td><td itemprop="address"><?php echo '<a target="_blank" title="' . $home_area . '" href="https://maps.google.com/?q='.urlencode($home_area).'">' . $home_area . '</a>'; ?></td></tr>
                            <?php endif; ?> 
                            
                            <?php if (isset($temp_location_1) && !empty($temp_location_1)): ?>
                            <tr><td>Temporary<br /> Location 1: </td><td><?php echo '<a target="_blank" title="' . $temp_location_1 . '" href="https://maps.google.com/?q='.urlencode($temp_location_1).'">' . $temp_location_1 . '</a>'; ?></td></tr>
                            <?php endif; ?> 
                            
                            <?php if (isset($temp_location_2) && !empty($temp_location_2)): ?>
                            <tr><td>Temporary<br /> Location 2: </td><td><?php echo '<a target="_blank" title="' . $temp_location_2 . '" href="https://maps.google.com/?q='.urlencode($temp_location_2).'">' . $temp_location_2 . '</a>'; ?></td></tr>
                            <?php endif; ?> 
                            
                            <thead><tr class="info"><th colspan="2">Site Attributes</th></tr></thead>
                            
                            <?php if (isset($symbiocard['symbiostock_num_images']) && !empty($symbiocard['symbiostock_num_images'])): ?>
                            <tr><td># Images: </td><td><?php echo $symbiocard['symbiostock_num_images'] ?></td></tr> 
                            <?php endif; ?> 
                            
                            <?php if (isset($symbiocard['symbiostock_portfolio_focus_1']) && !empty($symbiocard['symbiostock_portfolio_focus_1'])): ?>
                            <tr><td>Focus 1: </td><td><?php echo $symbiocard['symbiostock_portfolio_focus_1'] ?></td></tr> 
                            <?php endif; ?> 
                            
                            <?php if (isset($symbiocard['symbiostock_portfolio_focus_2']) && !empty($symbiocard['symbiostock_portfolio_focus_2'])): ?>
                            <tr><td>Focus 2: </td><td><?php echo $symbiocard['symbiostock_portfolio_focus_2'] ?></td></tr>
                            <?php endif; ?> 
                            
                            <?php if (isset($symbiocard['symbiostock_specialty_1']) && !empty($symbiocard['symbiostock_specialty_1'])): ?>
                            <tr><td>Specialty 1: </td><td><?php echo $symbiocard['symbiostock_specialty_1'] ?></td></tr>
                            <?php endif; ?>
                            
                            <?php if (isset($symbiocard['symbiostock_specialty_2']) && !empty($symbiocard['symbiostock_specialty_2'])): ?>
                            <tr><td>Specialty 2: </td><td><?php echo $symbiocard['symbiostock_specialty_2'] ?></td></tr> 
                            <?php endif; ?>                    
                                                 
                            <tr><td>Symbiostock vsn: </td><td><?php echo $symbiocard['symbiostock_version'] ?></td></tr>
                            <tr><td>Last Update: </td><td><?php echo $symbiocard['symbiostock_csv_generated_time'] ?></td></tr>       
                        </table>
                        <div class=row>
                        
                        <a class="btn btn-large col-md-12" title="Get Symbiocard" href="<?php echo $symbiocard['symbiostock_site'].'/symbiocard.csv' ?>">Get <?php echo $symbiocard['symbiostock_display_name'] ?>'s Symbiocard</a>
                        </div>
                    </div>
                </div>              
            </div>
            <?php endif; ?> 
        </div>
        <div class="symbiostock_author_avatar col-md-5">
            
            <?php         
            
            
            !isset($symbiocard['symbiostock_personal_photo'])||!isset($symbiocard['symbiostock_personal_photo']) ? $avatar_img = symbiostock_IMGDIR . '/generic-user.jpg' : $avatar_img = $symbiocard['symbiostock_personal_photo'] ;
            ?>
            <p>
            <a class="ssref pull-right" title="<?php echo $symbiocard['symbiostock_display_name']; ?>" href="<?php echo $symbiocard['symbiostock_author_page'] ?>">          
                <img class="avatar avatar-150 thumbnail" src="<?php echo $avatar_img  ?>" alt="Author avatar" /> 
            </a> 
        </div>
        
        <div class="clearfix"></div>
      
    </div>
<?php    
} 
    
function symbiostock_csv_symbiocard_listing($symbiocard_location = ''){
    
    if(empty($symbiocard_location)){
        return;
        }
    
    }
function symbiostock_csv_symbiocard_network_results($symbiocard_location = ''){
    
    if(empty($symbiocard_location)){
        return;
        }
    if(!file_exists($symbiocard_location)){return;}
    
    $author = new network_manager;
    $info = $author->csv_to_array($symbiocard_location, ',');
    $symbiocard = $info[0];
    foreach ($symbiocard as $key=>$value) {
        $symbiocard[$key] = stripslashes($value);
    }
            
    ?>
<img class="network_avatar" alt="<?php echo $symbiocard['symbiostock_my_network_name']; ?>" src="<?php echo $symbiocard['symbiostock_my_network_avatar']; ?>" />            
<div class="btn-group">    
    <button type="button" class="btn btn-default" data-toggle="dropdown"><i class="icon-user"> </i> <?php echo $symbiocard['symbiostock_display_name'] ?> Network Results:</button>
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <colspan class="caret"></colspan>
    </button> 
   
    <ul class="dropdown-menu">
                    
        <?php if (isset($symbiocard['symbiostock_my_network_logo']) && !empty($symbiocard['symbiostock_my_network_logo'])): ?>
        <li><img class="media-object img-rounded aligncenter" alt="<?php echo $symbiocard['symbiostock_my_network_name']; ?>" src="<?php echo $symbiocard['symbiostock_my_network_logo']; ?>" /></li>                
        <li class="divider"></li>
        <?php endif; ?>        
            
        <?php if (isset($symbiocard['symbiostock_author_page']) && !empty($symbiocard['symbiostock_author_page'])): ?>
        <li><a class="ssref" itemprop="" title="Author <?php echo $symbiocard['symbiostock_display_name'] ?>" href="<?php echo $symbiocard['symbiostock_author_page'] ?>"><i class="icon-user"> </i> Author Page</a></li>                
        <?php endif; ?>
        
        <?php if (isset($symbiocard['symbiostock_portfolio']) && !empty($symbiocard['symbiostock_portfolio'])): ?>
        <li><a itemprop="" class="symbiostock_num_images_link ssref" title="Portfolio" href="<?php echo $symbiocard['symbiostock_portfolio'] ?>"><i class="icon-search"> </i> Portfolio: <?php echo $symbiocard['symbiostock_num_images'] ?> images.</a></li>
        <?php endif; ?>
        
        <?php if (isset($symbiocard['symbiostock_gallery_page']) && !empty($symbiocard['symbiostock_gallery_page'])): ?>
        <li><a itemprop="" class="symbiostock_gallery_link ssref" title="Gallery" href="<?php echo $symbiocard['symbiostock_gallery_page'] ?>"><i class="icon-star"> </i> Gallery Page</a></li>
        <?php endif; ?>
        
        <?php if (isset($symbiocard['symbiostock_contact_page']) && !empty($symbiocard['symbiostock_contact_page'])): ?>
        <li><a itemprop="" class="symbiostock_contact_author contact author ssref" title="Contact <?php echo $symbiocard['symbiostock_display_name'] ?>" href="<?php echo $symbiocard['symbiostock_contact_page'] ?>"><i class="icon-envelope"> </i> Contact <?php echo $symbiocard['symbiostock_first_name'] ?></a></li>
        <?php endif; ?>
       
        <?php if (isset($symbiocard['symbiostock_rss']) && !empty($symbiocard['symbiostock_rss'])): ?>
        <li><a itemprop="" class="symbiostock_author_rss ssref" href="<?php echo $symbiocard['symbiostock_rss'] ?>"><i class="icon-rss"> </i> Updates / RSS</a></li>
        <?php endif; ?>
        
        <?php if (isset($symbiocard['symbiostock_network_page']) && !empty($symbiocard['symbiostock_network_page'])): ?>
        <li><a itemprop="" class="symbiostock_network_page ssref" href="<?php echo $symbiocard['symbiostock_network_page'] ?>"><i class="icon-sitemap"> </i> Network</a></li>
        <?php endif; ?>
    </ul>           
</div>
     
    <?php
    }    
?>