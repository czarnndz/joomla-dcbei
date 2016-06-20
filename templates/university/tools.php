<?
/*----------------------------------------------------------------------
#Youjoomla Defaul Index - 
# ----------------------------------------------------------------------
# Copyright (C) 2007 You Joomla. All Rights Reserved.
# Designed by: You Joomla
# License: GNU, GPL
# Website: http://www.youjoomla.com
------------------------------------------------------------------------*/
// 1 = 	SHOW ALL  | 2 COLOR AND WIDTH  | 3 COLOR AND FONT | 4 WIDTH AND FONT |5 WIDTH ONLY | 6 FONT ONLY | 7 COLOR ONLY
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

if ( $showtools== 1 || $showtools== 2 || $showtools== 3 || $showtools== 7 ){
// COLOR SWITCHER LINKS
while(list($key, $val) = each($mystyles)){
 echo "<a href='".$_SERVER['PHP_SELF']."?change_css=".$key."' >".$val["label"]."</a>";
 }
 
 }
 ?>
 <?
 if ( $showtools== 1 || $showtools== 3 || $showtools== 4 || $showtools== 6){
 // FONT SWITCHER LINKS
 while(list($key, $val) = each($myfont)){
 echo "<a href='".$_SERVER['PHP_SELF']."?change_font=".$key."' >".$val["label"]."</a>";
}

}
?>

<?
 if ( $showtools== 1 || $showtools== 2 || $showtools== 4 || $showtools== 5 ){
// WIDTH SWITCHER LINKS
while(list($key, $val) = each($mywidth)){
 echo "<a href='".$_SERVER['PHP_SELF']."?change_width=".$key."' >".$val["label"]."</a>";
}

}
?>