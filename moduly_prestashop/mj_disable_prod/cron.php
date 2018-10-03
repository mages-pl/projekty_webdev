<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../../config/config.inc.php';
include_once 'mj_disable_prod.php';

$syncIntegration = new mj_disable_prod();
$syncIntegration->automateDisableProducts();

echo "OK";
