<?php 
/*----------------------------------------------------------------------
#Youjoomla Defaul Index - 
# ----------------------------------------------------------------------
# Copyright (C) 2007 You Joomla. All Rights Reserved.
# Designed by: You Joomla
# License: GNU, GPL
# Website: http://www.youjoomla.com
------------------------------------------------------------------------*/


defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' ); ?>

<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/src/mootools.v1.1.js"></script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/src/sve.js"></script>
<?php if($activateSIFR = $activate_sIFR) :?>
<link href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/sifr/sscreen.css"  rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/sifr/sifr.js"></script>
<script type="text/javascript">
if(typeof sIFR == "function"){
sIFR.replaceElement(".module h3,.moduletable h3,.contentpaneopen h1,.contentpaneopen h2, .contentpaneopen h3,.contentpaneopen h4,.contentpaneopen h5", named( {sFlashSrc: "<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/sifr/<?php echo $sifrFile ?>.swf", sColor: "<?php echo $sifrColor ?>", sWmode: "transparent"} ));


sIFR.replaceElement(".module_orange h3,.module_blue h3,.module_green h3,.module_red h3", named( {sFlashSrc: "<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/sifr/<?php echo $sifrFile ?>.swf", sColor: "<?php echo $sifrColorO ?>", sWmode: "transparent"} ));
}
</script>
<?php endif; ?>
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/src/ie2.js"></script><![endif]-->
<!--[if IE 6]>
<style type="text/css">
img{
	behavior: url(<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/iepngfix.htc);
}
#images_slide img{
	behavior:none;
}
</style>
<![endif]-->
<!--[if IE 6]>
<link href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/iesucks.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php if ( $menustyle == 2  ) {
echo '<script type="text/javascript" src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/src/mouseover.js"></script>';
}?>
<?php if ( $my->id ) { initEditor(); }?>
<?php mosShowHead(); ?>