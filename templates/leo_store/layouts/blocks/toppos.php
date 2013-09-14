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
 
?>
<?php if( $this->countModules("search + topmenu + timer") ): 
	$bgtop = $this->getParam("enable_custom_tops")?$this->getParam("image_tops",'pattern0'):"";
?>
<div id="leo-toppos" class="wrap <?php echo $bgtop;?>" >
      <div class="leo-container">
        <div id="leo-toppos-inner">
          <?php if($this->getUserParam('leo_time')) : ?>
          <div id="leo-time"><?php echo @date('l, F d, Y'); ?></div>
          <?php endif; ?>
          <?php if($this->countModules('topmenu')) : ?>
          <div id="leo-topmenu">
            <div class="leo-box-inside">
              <jdoc:include type="modules" name="topmenu" style="leoxhtml" />
            </div>
          </div>
          <?php endif; ?>
          <?php if($this->countModules('search')) : ?>
          <div id="leo-search" >
            <jdoc:include type="modules" name="search" />
          </div>
          <?php endif; ?>
        
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
<?php endif; ?>	