<?php
/*----------------------------------------------------------------------
#Youjoomla Defaul Index - 
# ----------------------------------------------------------------------
# Copyright (C) 2007 You Joomla. All Rights Reserved.
# Designed by: You Joomla
# License: GNU, GPL
# Website: http://www.youjoomla.com
------------------------------------------------------------------------*/
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$iso = split( '=', _ISO );
// xml prolog - quirks mode
//echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';

 
// DEFAULT STYLES CONTROL
$default_color = "red"; // set the default color | red | blue | green | orange
$default_font= "medium"; // set the default font size  | small | medium | large
$default_width = "wide"; // set the default width  | wide | narrow | fluid

//TOOLS CONTROL
$showtools  = '0'; //  0= HIDE TOOLS | 1 = 	SHOW ALL  | 2 COLOR AND WIDTH  | 3 COLOR AND FONT | 4 WIDTH AND FONT |5 WIDTH ONLY | 6 FONT ONLY | 7 COLOR ONLY


//SIFR FONT CONTORL

$default_sifr = 'Tradegothic';  // | Vipnagorgialla | Iskola | Arno |  Tradegothic 
$activate_sifr = 'disable';       //    enable | disable


// TOP MENU SWITCH // 
$menu_name = "mainmenu";// mainmenu by default, can be any Joomla! menu name

//MENU STYLE SWITCH//
$menustyle = '2';  //  1 = Standard Dropdown (Suckerfish)  | 2  = SMooth Dropdown


// SEO SECTION //
$seo  = 'weddingsbeautiful.com.mx'; # JUST FOLOW THE TEXT
$tags = 'weddingsbeautiful.com.mx, weddings';    # JUST FOLOW THE TEXT

#DO NOT EDIT BELOW THIS LINE//////////////////////////////////////////////////////////////////////////

include ($mosConfig_absolute_path."/templates/" . $mainframe->getTemplate() . "/styleswitcher.php");

include ($mosConfig_absolute_path."/templates/" . $mainframe->getTemplate() . "/settings.php");
require($mosConfig_absolute_path."/templates/" . $mainframe->getTemplate() . "/suckerfish.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link rel="shortcut icon" href="<?php echo $mosConfig_live_site;?>/templates/university/images/favicon.ico">
<link href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/<?php echo $css_file; ?>" rel="stylesheet" type="text/css" />
<? include ($mosConfig_absolute_path."/templates/" . $mainframe->getTemplate() . "/head.php");?>
</head>
<!-- ODVAJANJE ZAREZOM -->
<body>
<div id="centarmain" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<!--header-->
<div id="header">
<div id="hl">
<div id="hr">
<div id="logo">
<div id="logo2">
<div id="srch"><div id="tags"> <h1><a href="index.php" title="<?php echo $tags?>"><?php echo $seo ?></a></h1></div>
<div id="banw">
<?php if (mosCountModules('header')) { ?>
<div id="searchbox"><?php mosLoadModules('header',-2);?></div><?php } ?>
</div></div></div></div></div></div></div>
<!-- end header-->
<!-- suckerfish-->
<div id="suck" style="font-size:<?php echo $css_font; ?>;">
<div id="sl">
<div id="sr">
  <div id="navigacija">
      <?php mosShowListMenu($menu_name); ?>
    </div></div></div></div>
<!-- end suckerfish-->
</div><!-- end centarmain-->
<?php if (mosCountModules('user1') || mosCountModules('user2')) { ?>
<!--- box  -->
<div id="centar2" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<div id="boxtop">				
<!--- box top border -->
<div id="lbtop"><div id="rbtop"><div id="bbtop"><div id="blctop"><div id="brctop">
<div id="tbtop"><div id="tlctop"><div id="trctop">
<!--  -->
<div id="boxcontent">
<div id="topwr">
<?php if (mosCountModules('user1')) { ?>
<div id="user1" style="width:<?php echo $user1w ?>;"><?php mosLoadModules('user1',-2);?>  </div><?php } ?>
<?php if (mosCountModules('user2')) { ?>
<div id="<?php echo $username ?>" style="width:<?php echo $user2w ?>;"><?php mosLoadModules('user2',-2);?>  </div><?php } ?>
</div></div>		
<!--- end of box top border -->
</div></div></div></div></div></div></div></div>
<!-- -->
</div></div>
<!--- end of box  --><?php } ?>
<div id="centar" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<!--- box  -->
<div id="box">				
<!--- box border --><div id="lb"><div id="rb"><div id="bb"><div id="blc"><div id="brc">
<div id="tb"><div id="tlc"><div id="trc"><!--  -->
<div id="boxcontenttop">
<div id="<?php echo $wrap?>">
<div id="<?php echo $insidewrap ?>">
<div id="<?php echo $mainbody ?>">
<div id="<?php echo $content ?>">
<div class="inside">
<?php mospathway() ?> 
<?php if (mosCountModules('advert1') || mosCountModules('advert2')) { ?>

<div id="newsflash">
<?php if (mosCountModules('advert1')) { ?>
<div id="advert1" style="width:<?php echo $topswidth; ?>;"><?php mosLoadModules('advert1',-2);?></div><?php } ?>
<?php if (mosCountModules('advert2')) { ?>
<div id="advert2" style="width:<?php echo $topswidth; ?>;"><?php mosLoadModules('advert2',-2);?></div><?php } ?>
  
</div><?php } ?>




<?php mosMainBody(); ?> 

<?php if (mosCountModules('user8') || mosCountModules('user9')) { ?>

<div id="bannerb">
<?php if (mosCountModules('user8')) { ?>
<div id="user8" style="width:<?php echo $userswidth; ?>;"><?php mosLoadModules('user8',-2);?></div><?php } ?>
<?php if (mosCountModules('user9')) { ?>
<div id="user9" style="width:<?php echo $userswidth; ?>;"><?php mosLoadModules('user9',-2);?></div><?php } ?>
  
</div><?php } ?>



</div></div>
<?php if (mosCountModules('left')) { ?>
<div id="<?php echo $left ?>"> 
<div class="inside"><!-- keep mods of edges-->
<?php mosLoadModules('left',-3);?>
<!-- end inside--></div><!-- end modsl--></div><!-- end left side-->
<?php } ?>
</div> <!--end of main-body-->
<!-- right side always stand alone-->
<?php if (mosCountModules('right')) { ?>
<div id="<?php echo $right ?>"> 
<div class="inside"> <!-- keep mods of edges-->
<?php mosLoadModules('right',-3);?>
</div><!-- end of inside --></div><!-- end right side-->
<div class="clr"></div>
<?php } ?>
</div><!-- end of insidewrap--></div> <!--end of wrap-->
<div class="clr"></div>
</div>	
<!--- end of box border -->
</div></div></div></div></div></div></div></div>
<!-- -->
</div>
<!--- end of box  -->
</div><!-- end centar-->
<!-- bottom mods-->
<?php if (mosCountModules('user3') || mosCountModules('user4') || mosCountModules('user5')) { ?>
<div id="botw" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<div id="bwl">
<div id="bwr">
<div id="botmwr">
<?php if (mosCountModules('user3')) { ?>
<div id="user3" style="width:<?php echo $bottw; ?>;"><?php mosLoadModules('user3',-2);?></div><?php } ?>
<?php if (mosCountModules('user4')) { ?>
<div id="user4" style="width:<?php echo $bottw; ?>;"><?php mosLoadModules('user4',-2);?></div><?php } ?>
<?php if (mosCountModules('user5')) { ?>
<div id="user5" style="width:<?php echo $bottw; ?>;"><?php mosLoadModules('user5',-2);?></div><?php } ?>
</div></div></div></div>
<!-- end--><?php } ?>
<!-- footer-->
<div id="footer" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<div id="fl">
<div id="fr">
<div id="copyright">
Copyright&nbsp;&copy;&nbsp;<?php echo date(Y) ?>&nbsp;Universidad del Caribe. Todos los derechos reservados.&nbsp;<a href="http://www.unicaribe.edu.mx">Design by DCBeI </a><br>SM. 78, Mza. 1, Lote 1, Esquina Fraccionamiento Tabachines. Tel: 01998-881-44-00, C.P. 77528, Canc&uacute;n Quintana Roo, M&eacute;xico.<br>&nbsp;
<br>Joomla! is Free Software released under the GNU/GPL License. 
<a href="#centarmain">Top</a><div id="tools"><? include ($mosConfig_absolute_path."/templates/" . $mainframe->getTemplate() . "/tools.php");?></div>
</div></div></div></div>
<!--end-->
</body>
</html>

