{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
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
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<section class="featured-products productsHomeLoop male clearfix">
  <h1 class="products-section-title text-uppercase">
      <span>
    {l s='Skórzane paski, aktówki, walizki, portfele' d='Shop.Theme.Catalog'}
      </span>
    <strong>On</strong>
  </h1>
  {if $page.page_name == 'index'}
       {*{if $isMobile != 4} *}
      <img src="{$urls.theme_assets}img/home/home_on_img.jpg" class="hidden-sm-down" style="max-height:800px!important;left: -25px;position: absolute;max-width: 30%;margin-top: -100px;"/>
       {*{/if} *}
  {/if}
  <div class="products">
      <div class="{if $page.page_name=="search"}single-carousel{elseif $page.page_name=="index"}home-carousel{else}products-carousel{/if}">
    {foreach from=$products item="product"}
      {include file="catalog/_partials/miniatures/product.tpl" product=$product}
    {/foreach}
    
      </div> 
  </div>
  <a class="all-product-link float-xs-left float-md-right h4" href="{$allProductsLink}">
    {l s='All products' d='Shop.Theme.Catalog'}<i class="material-icons">&#xE315;</i>
  </a>
</section>
