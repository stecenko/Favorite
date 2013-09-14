<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Generic Layout -->
<div id="k2Container" class="genericView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
	<?php if($this->params->get('show_page_title')): ?>
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if(count($this->items)): ?>
		<div class="catItemList">
			<?php foreach($this->items as $item): ?>
			<div class="catItemView">
			<?php if($item->params->get('genericItemDateCreated')): ?>
			<div class="gkDate">
				  <div><?php echo JHTML::_('date', $item->created , JText::_('d')); ?></div>
				  <div><?php echo JHTML::_('date', $item->created , JText::_('M')); ?></div>
			</div>
			<?php endif; ?>
			
			<div class="gkItemBlock">
				<div class="catItemHeader"> 
				  <?php if($item->params->get('genericItemTitle')): ?>
					<h2 class="catItemTitle">
					<?php if ($item->params->get('genericItemTitleLinked')): ?>
						<a href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
						</a>
					<?php else: ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
				  </h2>
				  <?php endif; ?>

				<?php if($item->params->get('genericItemCategory')): ?>
					<div class="catItemAdditionalInfo">
						<span class="catItemCategory">
							<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
							<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
						</span>
					</div>
				<?php endif; ?>
			  </div>
			  
			  <div class="catItemBody">
				  <?php if($item->params->get('genericItemImage') && !empty($item->imageGeneric)): ?>
				  <div class="catItemImageBlock">
					  <span class="catItemImage">
						<a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>">
							<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
						</a>
					  </span>
				  </div>
				  <?php endif; ?>

				  <?php if($item->params->get('genericItemIntroText')): ?>
				  <div class="catItemIntroText">
					<?php echo $item->introtext; ?>
				  </div>
				  <?php endif; ?>
			  </div>

				<?php if($item->params->get('genericItemExtraFields') && count($item->extra_fields)): ?>
				<div class="catItemExtraFields">
					<h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
					
					<ul>
						<?php foreach ($item->extra_fields as $key=>$extraField): ?>
							<?php if($extraField->value): ?>
							<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
								<span class="genericItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
								<span class="genericItemExtraFieldsValue"><?php echo $extraField->value; ?></span>		
							</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			  
				<?php if ($item->params->get('genericItemReadMore')): ?>
				<div class="catItemReadMore">
					<a class="k2ReadMore" href="<?php echo $item->link; ?>">
						<?php echo JText::_('K2_READ_MORE'); ?>
					</a>
				</div>
				<?php endif; ?>
			</div>
			</div>
			<?php endforeach; ?>
		</div>

		<?php if($this->pagination->getPagesLinks()): ?>
		<div class="k2Pagination">
			<?php echo $this->pagination->getPagesLinks(); ?>
			<?php echo $this->pagination->getPagesCounter(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if($this->params->get('genericFeedIcon',1)): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
	</div>
	<?php endif; ?>
</div>
<!-- End K2 Generic Layout -->