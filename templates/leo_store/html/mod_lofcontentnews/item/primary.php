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
$item = modLofContentNews::onBeforeRender( $item, $pDescriptionMaxChars, $limitDescriptionBy, $params->get('itemAuthor',0));
?>
<li class="lof-item">
     <h4><a href="<?php echo $item->link;?>" class="<?php echo modLofContentNews::getIcon($item);?>"><span><?php echo $item->title ?></span></a></h4>
    <?php if( $pShowImage ) : ?>
    <?php echo modLofContentNews::getImage( $item, $pImageWidth, $pImageHeight, $isThumb ); ?>
    <?php endif; ?>
    <?php if($item->description && $item->description != "..." ): ?>
    <div class="lof-description">
    	<?php echo  $item->description;?>
    </div>
    <?php endif; ?>
   	    <div class="lof-extrainfo">
  			<?php if( $params->get('itemCategory',0) ) : ?>
            <?php echo JText::_('Published In');?> 
                <a title="<?php echo $item->categoryname;?>" href="<?php echo $item->categoryLink;?>"><b><?php echo $item->categoryname;?></b></a>
            <?php endif; ?>
            <?php if( $params->get('itemDateCreated',0) ) : ?>
           <!--  -  <i><?php //echo $item->date;?></i>-->
            <?php endif; ?> 
            <?php if( $params->get('itemAuthor',0) ) : ?>
            	- <span class="lof-author">  <?php echo JText::_('Author'); ?> : <b><?php echo $item->author; ?></b></span>
            <?php endif; ?>
            <?php if( $params->get('itemReadMore',0) ): ?>
				 - <a class="lof-readmore" href="<?php echo $item->link;?>"><b><?php echo JText::_("Readmore");?></b></a> 
    		<?php endif; ?> 
    	</div>   
	    <?php if( $params->get('itemHits',0) ): ?>
    	<div class="lof-item-hits"><b><?php echo $item->hits; ?></b> <?php echo JText::_('Clicks');?></div>       
    	<?php endif; ?>        
</li>