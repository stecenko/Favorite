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
<div id="leo-footer" class="wrap" >
<div class="leo-container">
  <div id="leo-footer-inner">
    <div id="leo-copyright">
      <?php if($this->getUserParam('leo_footer')) : ?>
      <?php echo $this->getUserParam('leo_footer_text'); ?>
      <?php else : ?>
      <?php endif; ?></p>
    </div>
    <?php if($this->countModules('footer')) : ?>
    <div id="leo-footer-menu">
      <jdoc:include type="modules" name="footer" />
    </div>
    <?php endif; ?>
    <div class="clearfix"></div>
  </div>
</div>
</div>