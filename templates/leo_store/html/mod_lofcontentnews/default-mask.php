<?php 
/**
 * $ModDesc
 * 
 * @version		$Id: helper.php $Revision
 * @package		modules
 * @subpackage	$Subpackage.
 * @copyright	Copyright (C) Octorber 2010 LandOfCoder.com <@emai:landofcoder@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */
// no direct access
defined('_JEXEC') or die;
//print_r($categoryInfo);die();
?>
<div class="lof-categorybox clearfix" id="lof-contentnews<?php echo $id;?>">
	<div class="lof-wapper <?php echo $themeBox;?> <?php echo ( $showCategories?"":"lof-notopic" );?>">
    	<!-- HEADER OF THE BOX -->
        <!--   <div class="lof-headermodule clearfix">
				<?php if( $params->get('use_customheading',0) ):// echo $params->get('customheadding','');?>		   
                <?php else: ?><a href="<?php //echo $categoryInfo->link;?>" title="<?php echo $categoryInfo->title; ?>">
                    <?php // echo $categoryInfo->title; ?></a>
                <?php endif;?>       
       		</div> -->
        <!-- END_HEADER OF THE BOX //-->	
        <!-- CONTENT LEFT OF THE BOX //-->	   
        <div class="lof-box-left">
                <?php if( $leading && count($leading) ) : ?>
                <div class="lof-leading" style="width:<?php echo $params->get('leading_width','33.3');?>%">
                    <?php if( $params->get('leading_heading') ) : ?><div class="lof-header"><span><?php echo $params->get('leading_heading','');?></span></div><?php endif; ?>
                    <ul>
                    <?php foreach( $leading as $item ) : ?>
                        <?php require( 'item'.DS.'leading.php'); ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                 <?php if( $primary && count($primary) ) : ?>
                <div class="lof-primary" style="width:<?php echo $params->get('primary_width','33.3');?>%">
                   <?php if( $params->get('primary_heading') ) : ?>  <div class="lof-header"><span><?php echo $params->get('primary_heading','');?></span></div>  <?php endif; ?>
                       <ul>
						<?php foreach( $primary as $item ) : ?>
                            <?php require( 'item'.DS.'primary.php'); ?>
                        <?php endforeach; ?>
                      </ul>
                </div>
                  <?php endif; ?>
               	<?php if( $secondary && count($secondary) ) : ?> 
                <div class="lof-secondary" style="width:<?php echo $params->get('secondary_width','33.3');?>%">	
                     <?php if( $params->get('primary_heading') ) : ?> <div class="lof-header"><span><?php echo $params->get('secondary_heading','');?></span></div><?php endif; ?>
                    <ul>
                    <?php foreach( $secondary as $item ) : ?>
                        <?php require( 'item'.DS.'secondary.php'); ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                   
         </div>   
         <!-- END CONTENT LEFT OF THE BOX //-->	  
        <?php if( $showCategories ): ?>     
        <!--  CONTENT RIGHT OF THE BOX //-->	   
        <div class="lof-box-right">            
        	  <div class="lof-header"><span><?php echo JTEXT::_('Topic')?></span></div>                                                    
                <div class="lof-subcategories">                	                	
                    <?php foreach( $categories as $cii => $category ): ?>
                        <p><a href="<?php echo urldecode(JRoute::_(JRoute::_(ContentHelperRoute::getCategoryRoute($category->id))));?>"><?php echo $category->title; ?></a></p>
                    <?php 
					if( $cii+1>= $maxCatsShowed ){ break; }
					endforeach; ?>
                </div>
      	  </div>
          <!--  ENDCONTENT RIGHT OF THE BOX //--> 
          <?php endif; ?>  
       </div> 
</div>
<div class="clearfix"></div>

<?php if( array_key_exists($k, $positions) && $positions[$k] ) : ?>
 <!--  INJECT POS OF THE BOX //-->
	<div class="lof-injectpos">
    	<?php echo modLofContentNews::loadModulesByPosition( $positions[$k] );?>
    </div>
   <!-- END INJECT POS OF THE BOX //-->  
<?php endif; ?>