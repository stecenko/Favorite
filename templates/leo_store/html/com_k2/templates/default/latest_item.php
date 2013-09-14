<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Item Layout -->
<div class="latestItemView">
	<div class="itemContainer">
		<div class="catItemView clearfix">
			<?php if($this->params->get('latestItemsCols') == 1) : ?>
				<?php if($this->item->params->get('latestItemDateCreated')): ?>
				<div class="leoDate">
				    <div><?php echo JHTML::_('date', $this->item->created , JText::_('d')); ?></div>
				    <div><?php echo JHTML::_('date', $this->item->created , JText::_('M')); ?></div>
				</div>
				<?php endif; ?>
			<?php endif; ?>
			
			<div class="catItemContent<?php if($this->params->get('latestItemsCols') == 1) : ?> leoItemBlock<?php endif; ?>">
	
			<?php echo $this->item->event->BeforeDisplay; ?>
			<?php echo $this->item->event->K2BeforeDisplay; ?>

			<div class="catItemHeader">
			  <?php if($this->item->params->get('latestItemTitle')): ?>
			  <h2 class="catItemTitle">
			  	<?php if ($this->item->params->get('latestItemTitleLinked')): ?>
				<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
			  	<?php else: ?>
			  		<?php echo $this->item->title; ?>
			  	<?php endif; ?>
			  </h2>
			  <?php endif; ?>
			  
			  <div class="catItemAdditionalInfo">
			  	<?php if($this->item->params->get('latestItemCategory')): ?>
			  	<div class="catItemCategory">
			  		<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
			  		<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
			  	</div>
			  	<?php endif; ?>
			  	
			  	<?php if($this->item->params->get('latestItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
			  		<?php if(!empty($this->item->event->K2CommentsCounter)):?>
			  			<?php echo $this->item->event->K2CommentsCounter; ?>
			  		<?php else: ?>
			  			<?php if($this->item->numOfComments > 0): ?>
			  			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor" class="catComments">
			  				<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
			  			</a>
			  			<?php else: ?>
			  			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor" class="catComments">
			  				<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
			  			</a>
			  			<?php endif; ?>
			  		<?php endif; ?>
			  	<?php endif; ?>
			  </div>
		  </div>
		
		  <?php echo $this->item->event->AfterDisplayTitle; ?>
		  <?php echo $this->item->event->K2AfterDisplayTitle; ?>
		
		<?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
		<div class="catItemImageBlock">
			  <span class="catItemImage">
			   <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
		    </a>
			  </span>
		</div>
		<?php endif; ?>
		
		  <div class="catItemBody">
			  <?php echo $this->item->event->BeforeDisplayContent; ?>
			  <?php echo $this->item->event->K2BeforeDisplayContent; ?>
	
			  <?php if($this->item->params->get('latestItemIntroText')): ?>
			  <div class="catItemIntroText">
			  	<?php echo $this->item->introtext; ?>
			  </div>
			  <?php endif; ?>

			  <?php echo $this->item->event->AfterDisplayContent; ?>
			  <?php echo $this->item->event->K2AfterDisplayContent; ?>
			  
			  <?php if ($this->item->params->get('latestItemReadMore')): ?>
			  <div class="catItemReadMore">
			  	<a class="k2ReadMore" href="<?php echo $this->item->link; ?>">
			  		<?php echo JText::_('K2_READ_MORE'); ?>
			  	</a>
			  </div>
			  <?php endif; ?>
		  </div>

		  <?php if($this->item->params->get('latestItemTags')): ?>
		  <div class="catItemLinks">
		  	  <?php if($this->item->params->get('latestItemTags') && count($this->item->tags)): ?>
		  	  <div class="catItemTagsBlock">
		  		  <span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
		  		  <ul class="catItemTags">
		  		    <?php foreach ($this->item->tags as $tag): ?>
		  		    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
		  		    <?php endforeach; ?>
		  		  </ul>
		  	  </div>
		  	  <?php endif; ?>
		  </div>
		  <?php endif; ?>
		
		  <?php if($this->params->get('latestItemVideo') && !empty($this->item->video)): ?>
		  <div class="catItemVideoBlock">
		  	<h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>
			  <span class="catItemVideo<?php if($this->item->videoType=='embedded'): ?> embedded<?php endif; ?>"><?php echo $this->item->video; ?></span>
		  </div>
		  <?php endif; ?>

		  	<?php echo $this->item->event->AfterDisplay; ?>
		  	<?php echo $this->item->event->K2AfterDisplay; ?>
	  </div>
		</div>
	</div>
</div>
<!-- End K2 Item Layout -->