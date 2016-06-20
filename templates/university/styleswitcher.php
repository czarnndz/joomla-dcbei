<?php
/*----------------------------------------------------------------------
#Youjoomla Styleeswitch  - 
# ----------------------------------------------------------------------
# Copyright (C) 2007 You Joomla. All Rights Reserved.
# Designed by: You Joomla
# License: Copyright
# Website: http://www.youjoomla.com
------------------------------------------------------------------------*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
session_start();
$mystyles = array();


$mystyles['red']['file'] = "red.css";
$mystyles['blue']['file'] = "blue.css";
$mystyles['green']['file'] = "green.css"; // default
$mystyles['orange']['file'] = "orange.css"; // default




$mystyles['green']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/green.gif" alt="Green" title="Green" />';
$mystyles['red']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/red.gif" alt="Red" title="Red" />';
$mystyles['blue']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/blue.gif" alt="Blue" title="Blue" />';
$mystyles['orange']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/orange.gif" alt="Orange" title="Orange" />';






if (isset($_GET['change_css']) && $_GET['change_css'] != "") {
    $_SESSION['css'] = $_GET['change_css'];
} else {
    $_SESSION['css'] = (!isset($_SESSION['css'])) ? $default_color : $_SESSION['css'];
}
switch ($_SESSION['css']) {
    case "green":
    $css_file = "green.css";
    $sifrColor ="#627F08";
	$sifrColorO ="#ffffff";
    break;
    case "red":
    $css_file = "red.css";
    $sifrColor ="#B50D07";
	$sifrColorO ="#ffffff";
    break;
	case "blue":
    $css_file = "blue.css";
	$sifrColor ="#175A87";
	$sifrColorO ="#ffffff";
    break;
	case "orange":
    $css_file = "orange.css";
	$sifrColor ="#DB710F";
	$sifrColorO ="#ffffff";
    break;
	default:
    $css_file = "template_css.css";
	$sifrColor ="#175A87";
	$sifrColorO ="#ffffff";
}



//
//function style_switcher() {
//while(list($key, $val) = each($mystyles)){
// echo "<a href='".$_SERVER['PHP_SELF']."?change_css=".$key."' title='".$val["label"]."'>".$val["label"]."</a>";
//}
//}
//FONT SWITCH

$myfont = array();


$myfont['small']['file'] = "9px";
$myfont['medium']['file'] = "12px";
$myfont['large']['file'] = "16px"; // default

$myfont['small']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/small.gif" alt="Small" title="Small" />';
$myfont['medium']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/medium.gif" alt="Medium" title="Medium" />';

$myfont['large']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/large.gif" alt="Large" title="Large" />';




if (isset($_GET['change_font']) && $_GET['change_font'] != "") {
    $_SESSION['font'] = $_GET['change_font'];
} else {
    $_SESSION['font'] = (!isset($_SESSION['font'])) ? $default_font : $_SESSION['font'];
}
switch ($_SESSION['font']) {
    case "small":
    $css_font = "9px";
    break;
    case "medium":
    $css_font = "12px";
    break;
	case "large":
    $css_font = "16px";
    break;
    default:
    $css_font = "12px";
}

//WIDTH SWITCH


$mywidth = array();


$mywidth['wide']['file'] = "1000px";
$mywidth['narrow']['file'] = "776px";
$mywidth['fluid']['file'] = "99%"; // default

$mywidth['narrow']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/narrow.gif" alt="Narrow" title="Narrow" />';
$mywidth['wide']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/wide.gif" alt="Wide" title="Wide" />';
$mywidth['fluid']['label'] = '<img src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/images/fluid.gif" alt="Fluid" title="Fluid" />';




if (isset($_GET['change_width']) && $_GET['change_width'] != "") {
    $_SESSION['width'] = $_GET['change_width'];
} else {
    $_SESSION['width'] = (!isset($_SESSION['width'])) ? $default_width : $_SESSION['width'];
}
switch ($_SESSION['width']) {
    case "wide":
    $css_width = "1000px";
    break;
    case "narrow":
    $css_width = "776px";
    break;
	case "fluid":
    $css_width = "99%";
    break;
    default:
    $css_width = "1000px";
}
//SIFR SWITCH

$mysifr = array();


$mysifr['Vipnagorgialla']['file'] = "Vipnagorgialla";
$mysifr['Arno']['file'] = "Arno";
$mysifr['Iskola']['file'] = "Iskola";
$mysifr['Tradegothic']['file'] = "Tradegothic";


$mysifr['Vipnagorgialla']['label'] = 'Vipnagorgialla &nbsp;';
$mysifr['Arno']['label'] = 'Arno &nbsp;';
$mysifr['Iskola']['label'] = 'Iskola &nbsp;';
$mysifr['Tradegothic']['label'] = 'Tradegothic &nbsp;';





if (isset($_GET['change_sifr']) && $_GET['change_sifr'] != "") {
    $_SESSION['sifr'] = $_GET['change_sifr'];
} else {
    $_SESSION['sifr'] = (!isset($_SESSION['sifr'])) ? $default_sifr : $_SESSION['sifr'];
}
switch ($_SESSION['sifr']) {
    case "Vipnagorgialla":
    $sifrFile = "Vipnagorgialla";
    break;
    case "Arno":
    $sifrFile = "Arno";
    break;
	case "Iskola":
    $sifrFile = "Iskola";
	    break;
	case "Tradegothic":
    $sifrFile = "Tradegothic";

}

//SIFR ON

$mysifra = array();


$mysifra['enable']['file'] = "1";
$mysifra['disable']['file'] = "0";

$mysifra['enable']['label'] = 'sIfr ON &nbsp;';
$mysifra['disable']['label'] = 'sIfr OF &nbsp;';


if (isset($_GET['enable_sifr']) && $_GET['enable_sifr'] != "") {
    $_SESSION['esifr'] = $_GET['enable_sifr'];
} else {
    $_SESSION['esifr'] = (!isset($_SESSION['esifr'])) ? $activate_sifr : $_SESSION['esifr'];
}
switch ($_SESSION['esifr']) {
    case "enable":
    $activate_sIFR = "1";
    break;
    case "disable":
    $activate_sIFR = "0";


}
?>