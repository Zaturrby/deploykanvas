<?php 
     if (!defined('_SAPE_USER')){
        define('_SAPE_USER', 'c9ed1c3173263ad73593fad8ceb4498f'); 
     }
     require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/inovado/admin/cache/'._SAPE_USER.'/cache.php'); 
    $o[ 'force_show_code' ] = true;
    
    //Добавье эту строку для вывода красной надписи
    $o[ 'verbose' ] = true;
$o['charset'] = 'UTF-8';
    $sape = new SAPE_client( $o );
    echo $sape->return_links();

?>