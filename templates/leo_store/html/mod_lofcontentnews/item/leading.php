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
defined('_JEXEC') or die;  // echo '<pre>'.print_r($item,1); die;

$item = modLofContentNews::onBeforeRender( $item, $lShowDescription, $limitDescriptionBy, $params->get('itemAuthor',1) ); ?>
<li class="lof-item">
    <?php if( $lShowImage ) : ?>
      <?php echo  modLofContentNews::getImage( $item,$lImageWidth,$lImageHeight , $isThumb ); ?>
    <?php endif; ?>
	 <div class="lof-extrainfo">
                <?php if( $params->get('itemCategory',1) ) : ?>
                <?php echo JText::_('Published In');?> 
                    <a title="<?php echo $item->categoryname;?>" href="<?php echo $item->categoryLink;?>"><b><?php echo $item->categoryname;?></b>-</a>
                <?php endif; ?>
                <?php if( $params->get('itemDateCreated',1) ) : ?>
                 <i><?php echo $item->date;?></i>
                <?php endif; ?> 
                <?php if( $params->get('itemAuthor',1) ) : ?>
                    - <span class="lof-author">  <?php echo JText::_('Author'); ?> : <b><?php echo $item->author; ?></b></span>
                <?php endif; ?>
            </div>  
	    <h4>
    	<a href="<?php echo $item->link;?>" class="<?php echo modLofContentNews::getIcon($item);?>"><span><?php echo $item->title ?></span></a>
    	</h4>
           
    
    <?php if($item->description && $item->description != "..." ): ?>
    <div class="lof-description">
    	<?php echo  $item->description;?>
    </div>
    <?php endif; ?>
    
    <?php if( $params->get('itemHits',1) ): ?>
    	<div class="lof-item-hits"><b><?php echo $item->hits; ?></b> <?php echo JText::_('Clicks');?></div>       
    <?php endif; ?>	    	
	
	<?php if( $params->get('itemReadMore',1) ): ?>
		<a class="lof-readmore" href="<?php echo $item->link;?>"> <?php echo JText::_("Readmore");?> </a> 
    <?php endif; ?>
</li>