<?php 
/*------------------------------------------------------------------------
 # Leo Template Framework - 
 # ------------------------------------------------------------------------
 # author    LeoTheme
 # copyright Copyright (C) 2010 leotheme.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Websites: http://www.leotheme.com
 # Technical Support:  Forum - http://www.leotheme.com/forum.html
-------------------------------------------------------------------------*/
defined( '_JEXEC' ) or die( 'Restricted access' );
$docs = JFactory::getDocument();
$menustyle 		= $this->getParam('leo_menustyle');
$default_menu 	= $this->getParam('menutype');
$customColor 	= $this->getParam('use_custom_color',0);
$customBody 	= $this->getParam('enable_custom_body',0);
$customTops 	= $this->getParam('enable_custom_tops',0);
$customBottoms 	= $this->getParam('enable_custom_bottoms',0);
$userControl 	= $this->getParam('enable_toolspanel',0);
$customTopColor 	= $this->getParam('use_custom_top_color',0);
$customBottomColor 	= $this->getParam('use_custom_bottom_color',0);
$paramColor     = $this->getParam("bg_body",'EEEEEE');
$topBgColor     = $this->getParam("top_bgcolor",'032e28');
$bottomBgColor     = $this->getParam("bottom_bgcolor",'FFFFFF');
$bodytextColor     = $this->getParam("body_text_picker",'000000');
$bodylinkColor     = $this->getParam("body_link_picker",'FFFFFF');
$toptextColor     = $this->getParam("leo_text_top",'FFFFFF');
$toplinkColor     = $this->getParam("leo_link_top",'FFFFFF');
$bottomtextColor     = $this->getParam("leo_text_bottom",'FFFFFF');
$bottomlinkColor     = $this->getParam("leo_link_bottom",'FFFFFF');
$menu 			= $this->getMenu( "mega" , $this->_templateName, $this->objTemplate->params );	
$this->addCustomCssRule( '.leo-container { max-width: ' . $this->getParam('template_width','960px') . '!important; }' );
$this->calTemplateColumnsWidth();

$bgbodyClass = $customBody?$this->getParam("image_bottom-pattern",'pattern2'):"";
if($customColor == 1 && $customBody == 1){
	if(($paramColor != 'FFFFFF')){
		$docs->addStyleDeclaration( 
			'   #leo-page { background-color: #' . $paramColor . ';
			}'	
		);
	}
	$docs->addStyleDeclaration( 
		'   #leo-page { color: #' . $bodytextColor . ';
		}
			#leo-page a{ color: #' . $bodylinkColor . ';
		}'	
	);
}
if($customTopColor == 1 && $customTops == 1){
	$docs->addStyleDeclaration( 
		'
			#leo-toppos { color: #' . $toptextColor . ';
		}
			#leo-toppos { background-color: #' . $topBgColor . ';
		}
			#leo-toppos a{ color: #' . $toplinkColor . ';
		}'	
	);
}

$bgbottomClass = '';
if($customBottomColor == 1 && $customBottoms == 1){
	$docs->addStyleDeclaration( 
		'
			#leo-blockbottom { color: #' . $bottomtextColor . ';
		}
			#leo-blockbottom { background-color: #' . $bottomBgColor . ';
		}
			#leo-blockbottom a{ color: #' . $bottomlinkColor . ';
		}'	
	);
	$bgbottomClass = $this->getParam("image_bottoms",'pattern0');
}
    
 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<?php JHTML::_('behavior.mootools'); ?>
<?php  $this->renderBlock( "head" ); ?>
</head>
<body id="leo-page" class="fs<?php echo $this->getUserParam( 'font' ); ?> <?php echo $bgbodyClass;?>">
<div id="page-container">
  <div id="page-container-inner">
  	
    <?php $this->renderBlock( "toppos" ); ?>
	 
    <!-- HEADER BLOCK -->
    <div id="leo-blockheader" class="wrap" >
	<div class="inner-wrap">
      <div class="leo-container">
        <div id="leo-header-inner">
          <?php $this->renderBlock( "logo" ); ?>
          <!-- HEADER TOP -->
           <?php if($this->countModules('header-top')) : ?>
            <div id="leo-header-top" >
                  <jdoc:include type="modules" name="header-top" />
            </div>
            <?php endif; ?>
    
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
	</div>
    <!-- MAIN TOP MENU -->
          <div id="leo-mainmenu" class="wrap">
          <div class="leo-container">
            <div id="leo-mainmenu-inner">
              <?php  $menu->preProcess()->render(); ?>
            </div>
           
           <?php if( $this->getParam("enable_responsive",1) ): ?>
           <!-- RESPONESIVE MENU --> 
            <div id="leo-responsivemenu">
				<?php $this->getMenu( "combobox" , $this->_templateName, $this->objTemplate->params )->preProcess()->render();?>            
            </div>
            
           <!-- END RESPONESIVE MENU //--> 
           <?php endif; ?>
           </div>
          </div>
            <!-- END MAIN TOP MENU -->
   <?php $this->renderBlock( "cols", array(  "name"=>"top", 'numcols'=>4, 'start'=>1, "id"=>"headertop" ) ); ?>
   
    <!-- END HEADER BLOCK //-->
    <?php if($this->countModules('slideshow')) : ?>
    <div id="leo-slideshow"  class="wrap">
      <div class="leo-container">
        <div id="leo-slideshow-inner">
          <jdoc:include type="modules" name="slideshow" />
        </div>
      </div>
    </div>
    <?php endif; ?>
    
    <?php $this->renderBlock( "cols", array(  "name"=>"user", 'numcols'=>4, 'start'=>1, "id"=>"usertop1" ) ); ?>
    <?php $this->renderBlock( "cols", array(  "name"=>"user", 'numcols'=>4, 'start'=>5, "id"=>"usertop2" ) ); ?>
      <?php if($this->countModules('breadcrumbs-top')) : ?>
    <div id="leo-breadcrumbs-top"  class="wrap">
      <div class="leo-container">
        <div id="leo-breadcrumbs-top-inner">
        <div id="leo-breadcrumbs-top-inner-inner">
          <jdoc:include type="modules" name="breadcrumbs-top" style="xhtml" />
        </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- MAIN WRAPPER BLOCK -->
   	<?php $this->renderBlock( "mainwrap" );?>
    <!-- END MAIN WRAPPER BLOCK -->
      <?php if($this->countModules('showcase-bottom')) : ?>
    <div id="leo-showcase-bottom"  class="wrap">
      <div class="leo-container">
        <div id="leo-showcase-bottom-inner">
          <jdoc:include type="modules" name="showcase-bottom" />
        </div>
      </div>
    </div>
    <?php endif; ?>
      <?php if($this->countModules('breadcrumbs-bottom')) : ?>
    <div id="leo-breadcrumbs-bottom"  class="wrap">
      <div class="leo-container">
        <div id="leo-breadcrumbs-bottom-inner">
        <div id="leo-breadcrumbs-bottom-inner-inner">
          <jdoc:include type="modules" name="breadcrumbs-bottom" style="xhtml" />
        </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php $this->renderBlock( "cols", array(  "name"=>"user", 'numcols'=>4, 'start'=>9, "id"=>"userbottom" ) ); ?>
    
    <div id="leo-blockbottom" class="wrap <?php echo $bgbottomClass;?>">
		<div class="inner-wrap">
      <?php $this->renderBlock( "cols", array(  "name"=>"user", 'numcols'=>5, 'start'=>13, "id"=>"userbottom1", "style"=>"leoxhtml2" ) ); ?>
      <?php $this->renderBlock( "cols", array(  "name"=>"user", 'numcols'=>4, 'start'=>18, "id"=>"userbottom2", "style"=>"leoxhtml2" ) ); ?>
      <!-- FOOTER BLOCK -->
      <?php echo $this->renderBlock( "footer" ); ?>
     <!-- END FOOTER BLOCK -->
	 </div>
    </div>
    
  </div>
</div>
<jdoc:include type="modules" name="debug" />
<?php 	if( $this->getParam('enable_toolspanel',1) ) { $this->renderAddon( "toolspanel" ); } ?>
<?php 	if( $this->getParam('enable_ga',0) ) { $this->renderAddon( "ga" ); } ?>

</body>
</html>
