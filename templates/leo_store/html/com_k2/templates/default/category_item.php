<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div class="catItemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<?php echo $this->item->event->BeforeDisplay; ?>
	<?php echo $this->item->event->K2BeforeDisplay; ?>

	<?php if(isset($this->item->editLink)): ?>
	<span class="catItemEditLink">
		<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
			<?php echo JText::_('K2_EDIT_ITEM'); ?>
		</a>
	</span>
	<?php endif; ?>

    <div class="catItemContent">
	      <div class="catItemHeader">
	            <?php if($this->item->params->get('catItemTitle')): ?>
				<div class="leoDate">
				    <div><?php echo JHTML::_('date', $this->item->created , JText::_('d')); ?></div>
				    <div><?php echo JHTML::_('date', $this->item->created , JText::_('M')); ?></div>
				   
				    <?php if($this->item->params->get('catItemCommentsAnchor')): ?>
				    <div class="leoComments"> 
					    <a href="<?php echo $this->item->link; ?>#itemCommentsAnchor" class="catComments">
					    	<strong><?php echo $this->item->numOfComments; ?></strong>
					        <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
					    </a> 
				    </div>
				    <?php endif; ?>
				</div>

				<div class="leoItemBlock">
		            <h3 class="catItemTitle">
		            	<?php if ($this->item->params->get('catItemTitleLinked')): ?>
		                	<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
		                <?php else: ?>
		                	<?php echo $this->item->title; ?>
		                <?php endif; ?>
	
		                <?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
		                <span><sup><?php echo JText::_('K2_FEATURED'); ?></sup></span>
		                <?php endif; ?>
		            </h3>
		            <?php endif; ?>

	            	<div class="catItemAdditionalInfo">
	    	        <?php if($this->item->params->get('catItemCategory') || $this->item->params->get('catItemAuthor')): ?>
	            	<div class="catItemCategory">
            		    <?php if($this->item->params->get('catItemAuthor')): ?>
            		    <span class="catItemAuthor">
            		      	<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?>
            		      	<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
            		    </span>
            		    <?php endif; ?>
            		    <span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>

            		    <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
            		</div>
            		<?php endif; ?>

		        	      <?php if($this->item->params->get('catItemRating')): ?>
		        	      <div class="catItemRatingBlock">
		        	            <span><?php echo JText::_('K2_RATE_THIS_ITEM'); ?></span>
		        	            <div class="itemRatingForm">
		        	                  <ul class="itemRatingList">
		        	                        <li class="itemCurrentRating" id="itemCurrentRating<?php echo $this->item->id; ?>" style="width:<?php echo $this->item->votingPercentage; ?>%;"></li>
		        	                        <li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_1_STAR_OUT_OF_5'); ?>" class="one-star">1</a></li>
		        	                        <li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_2_STARS_OUT_OF_5'); ?>" class="two-stars">2</a></li>
		        	                        <li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_3_STARS_OUT_OF_5'); ?>" class="three-stars">3</a></li>
		        	                        <li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_4_STARS_OUT_OF_5'); ?>" class="four-stars">4</a></li>
		        	                        <li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_5_STARS_OUT_OF_5'); ?>" class="five-stars">5</a></li>
		        	                  </ul>
		
		        	                  <div id="itemRatingLog<?php echo $this->item->id; ?>" class="itemRatingLog"><?php echo $this->item->numOfvotes; ?></div>
		        	            </div>
		        	      </div>
		        	      <?php endif; ?>
		
		        	      <?php if(
		        	  			$this->item->params->get('catItemHits') ||
		        	  			$this->item->params->get('catItemTags')
		        	  	   ): ?>
		        	      <div class="catItemLinks">
		        	            <?php if($this->item->params->get('catItemHits')): ?>
		        	            <div class="catItemHitsBlock">
		        	                  <span class="catItemHits"><?php echo JText::_('K2_READ'); ?>: <?php echo $this->item->hits; ?> 
		        	                  <?php echo JText::_('K2_TIMES'); ?></span>
		        	            </div>
		        	            <?php endif; ?>
		
		        	            <?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
		        	            <div class="catItemTagsBlock">
		        	                  <span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
		        	                  <ul class="catItemTags">
		        	                        <?php foreach ($this->item->tags as $tag): ?>
		        	                        <li>
		        	                              <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
		        	                        </li>
		        	                        <?php endforeach; ?>
		        	                  </ul>
		        	            </div>
		        	            <?php endif; ?>
		        	      </div>
		        	      <?php endif; ?>
		
			           	<?php if($this->item->params->get('catItemDateModified') && $this->item->created != $this->item->modified): ?>
			            <span class="catItemDateModified">
			           		<?php echo JText::_('K2_LAST_MODIFIED_ON'); ?>
			            	<?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
			            </span>
			           	<?php endif; ?>
		
			            <?php echo $this->item->event->AfterDisplay; ?>
			            <?php echo $this->item->event->K2AfterDisplay; ?>
			         </div>
	            </div>   
	      </div>

	      <?php echo $this->item->event->AfterDisplayTitle; ?> 
	      <?php echo $this->item->event->K2AfterDisplayTitle; ?>
	      
	      <div class="leoItemBlock">
			  <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
			  <div class="catItemImageBlock">
			       	<span class="catItemImage">
			       	<a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
			    		<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="max-width:93%<?php //echo $this->item->imageWidth; ?>; height:auto;" />
			  		</a>
			        </span>
			  </div>
			  <?php endif; ?>
			  
		      <div class="catItemBody">
		            <?php echo $this->item->event->BeforeDisplayContent; ?>
		            <?php echo $this->item->event->K2BeforeDisplayContent; ?>
	
		            <?php if($this->item->params->get('catItemIntroText')): ?>
		            <div class="catItemIntroText">
		            	<?php echo $this->item->introtext; ?>
		            </div>
		            <?php endif; ?>
	
		            <?php if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)): ?>
		            <div class="catItemExtraFields">
		            	<h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
	                     <ul>
	                        <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
	                        <?php if($extraField->value): ?>
	                        <li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
	                            <span class="catItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
	                            <span class="catItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
	                        </li>
	                        <?php endif; ?>
	                        <?php endforeach; ?>
	                      </ul>
		            </div>
		            <?php endif; ?>
	
		            <?php if($this->item->params->get('catItemVideo') && !empty($this->item->video)): ?>
		            <div class="catItemVideoBlock">
		                  <h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>
		                  <?php if($this->item->videoType=='embedded'): ?>
		                  <div class="catItemVideoEmbedded">
		                        <?php echo $this->item->video; ?>
		                  </div>
		                  <?php else: ?>
		                  <span class="catItemVideo"><?php echo $this->item->video; ?></span>
		                  <?php endif; ?>
		            </div>
		            <?php endif; ?>
	
		            <?php if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
		            <div class="catItemImageGallery">
		                  <h4><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h4>
		                  <?php echo $this->item->gallery; ?>
		            </div>
		            <?php endif; ?>
	
		            <?php if($this->item->params->get('catItemAttachments') && count($this->item->attachments)): ?>
		            <div class="catItemAttachmentsBlock">
		                  <span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
		                  <ul class="catItemAttachments">
		                        <?php foreach ($this->item->attachments as $attachment): ?>
	                             <li>
	                                <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>">
	                                    <?php echo $attachment->title ; ?>
	                                </a>
	                                <?php if($this->item->params->get('catItemAttachmentsCounter')): ?>
	                                <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
	                                <?php endif; ?>
	                            </li>
		                        <?php endforeach; ?>
		                  </ul>
		            </div>
		            <?php endif; ?>
	
		            <?php if ($this->item->params->get('catItemReadMore')): ?>
		            <a class="k2ReadMore readon" href="<?php echo $this->item->link; ?>">
		            	<?php echo JText::_('K2_READ_MORE'); ?>
		            </a>
		            <?php endif; ?>
	
		            <?php echo $this->item->event->AfterDisplayContent; ?>
		            <?php echo $this->item->event->K2AfterDisplayContent; ?>
		      </div>
	      </div>
      </div>
</div>
<!-- End K2 Item Layout -->