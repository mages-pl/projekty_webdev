{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2015 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}
<div class="col-md-6" style="box-shadow: 0px -15px 20px -15px rgba(0,0,0,0.1);padding: 20px;">    
 
<h2>Powiadom o dostępności</h2>
<p>Jak tylko produkt ponownie wróci na magazyn powiadomimy Cię mailowo</p>
<div class="js-mailalert" data-url="{url entity='module' name='ps_emailalerts' controller='actions' params=['process' => 'add']}" style="width:100%;">
    <div class="col-md-12">
	 {*{if isset($email) AND $email}  *}
            <input type="email" class="form-control" placeholder="{l s='your@email.com' d='Modules.Mailalerts.Shop'}"/> 
	 {*{/if} *}
  <input type="hidden" value="{$id_product}"/>
  <input type="hidden" value="{$id_product_attribute}"/>
  <a href="#" rel="nofollow"class="btn btn-primary" onclick="return addNotification();"><i class="material-icons">&#xE003;</i></a>
    </div>
    {* <div class="col-md-6">
	
    </div> *}
	<span style="display:none;"></span>
</div>


</div>