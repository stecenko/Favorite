﻿<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$col= 1 ;
$pwidth= ' width'.floor ( 100 / $products_per_row );
if ($products_per_row > 1) { $float= "float:left";}
else {$float="center";}
?>
<div class="vmgroup<?php echo $params->get( 'moduleclass_sfx' ) ?>">

<?php if ($headerText) { ?>
	<div class="vmheader"><?php echo $headerText ?></div>
<?php }
if ($display_style =="div") { ?>
<div class="vmproduct<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($products as $product) { ?>
	<div style="<?php echo $float ?>" class="<?php echo $pwidth ?>"><div class="spacer">
<?php
 if (!empty($product->images[0]) )
 $image = $product->images[0]->displayMediaThumb('class="featuredProductImage" border="0"',false) ;
 else $image = '';

 echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),$image,array('title' => $product->product_name) );

 echo '<div class="clear"></div>';
	  echo '<div class="product_s_title">';					
 $url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.
$product->virtuemart_category_id); ?>		<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>		<?php echo '</div>'; ?><?php	echo '<div class="clear"></div>'; ?>

	
						<div class="product_s_desc">
						<?php echo shopFunctionsF::limitStringByWord($product->product_s_desc, 65, '...') ?>
						</div>
 <div class="cart-price">
<?php

 if ($show_price) {
 // 		echo $currency->priceDisplay($product->prices['salesPrice']);
 if (!empty($product->prices['salesPrice'] ) ) echo $currency->createPriceDiv('salesPrice','',$product->prices,true);
 // 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
 if (!empty($product->prices['salesPriceWithDiscount']) ) echo $currency->createPriceDiv('salesPriceWithDiscount','',$product->prices,true);
 } 
 ?>
 </div>
 <?php
 if ($show_addtocart) echo mod_virtuemart_product::addtocart($product);
 ?>

 </div></div>
	<?php
		if ($col == $products_per_row && $products_per_row && $col < $totalProd ) {
			echo "	</div><div style='clear:both;'>";
			$col= 1 ;
		} else {
			$col++;
		}
	} ?>
</div>
<br style='clear:both;' />

<?php
} else {
$last = count($products)-1;
?>

<ul class="vmproduct<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($products as $product) : ?>
 <li class="<?php echo $pwidth ?> >
 <?php
 if (!empty($product->images[0]) )
			$image = $product->images[0]->displayMediaThumb('class="featuredProductImage" border="0"',false) ;
		else $image = '';
			echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),$image,array('title' => $product->product_name) );		
	$url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.
$product->virtuemart_category_id); ?><a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>		
 <div class="cart-price">
 <?php
		if ($show_price) {
			echo $currency->createPriceDiv('salesPrice','',$product->prices,true);
			if ($product->prices['salesPriceWithDiscount']>0) echo $currency->createPriceDiv('salesPriceWithDiscount','',$product->prices,true);
		}
        ?>
        </div>
         <?php
		if ($show_addtocart) echo mod_virtuemart_product::addtocart($product);
		?>
	</li>
<?php
	if ($col == $products_per_row && $products_per_row && $last ) {
		echo '
		</ul><div class="clear"></div>
		<ul  class="vmproduct'.$params->get('moduleclass_sfx')  .'">';
		$col= 1 ;
	} else {
		$col++;
	}
	$last--;
	endforeach; ?>
</ul><div class="clear"></div>

<?php }
	if ($footerText) : ?>
	<div class="vmfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</div>
<?php endif; ?>
</div>
