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
{block name='product_miniature_item'}
  <article class="product-miniature js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
      {block name='product_thumbnail'}
        <a href="{$product.url}" class="thumbnail product-thumbnail">
            {* data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw== *}
          <img
            class="lazy lazyOwl" src="{$product.cover.bySize.home_default.url}" data-src = "{$product.cover.bySize.home_default.url}"
            alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:125:'...'}{/if}"
            data-full-size-image-url = "{$product.cover.large.url}"
          >
        </a>
      {/block}

      <div class="product-description">
        {block name='product_name'}
          <h1 class="h3 product-title" itemprop="name"><a href="{$product.url}">{$product.name|truncate:30:'...'}</a></h1>
        {/block}

        {block name='product_price_and_shipping'}
          {if $product.show_price}
            <div class="product-price-and-shipping">
              {if $product.has_discount}
                {hook h='displayProductPriceBlock' product=$product type="old_price"}

                <span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
                <span class="regular-price">{$product.regular_price}</span>
                {if $product.discount_type === 'percentage'}
                  <span class="discount-percentage discount-product">{$product.discount_percentage}</span>
                {elseif $product.discount_type === 'amount'}
                  <span class="discount-amount discount-product">{$product.discount_amount_to_display}</span>
                {/if}
              {/if}

              {hook h='displayProductPriceBlock' product=$product type="before_price"}

              <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
              <span itemprop="price" class="price">{$product.price}</span>
 {if $product.has_discount}
     <div class="product_list_promo">
             <div class="promotion-time-box">
             <i class="material-icons">&#xE192;</i> 
             {if $product.specific_prices.to == '0000-00-00 00:00:00'}
             <span class="odliczanie" data-promotion="9999-12-31 23:59:59">
                 <span class="animate-loader"><i class="material-icons">&#xE8B8;</i></span>
                  {else}
                      <span class="odliczanie" data-promotion="{$product.specific_prices.to}">
                      {*{$product.specific_prices.to}*}
                       
              
              </span>
          </span>
             {/if}
             </div>
             </div>
              {/if}
              {hook h='displayProductPriceBlock' product=$product type='unit_price'}

              {hook h='displayProductPriceBlock' product=$product type='weight'}
              
              <div class="row">
                  <div class="col-sm-8">
                      <div class="delivery-info-box hidden-sm-down">
             {*<i class="material-icons">&#xE192;</i> 
             <span>    
              {$product.delivery_information}
             </span>*}
             
            
             {if $product.show_availability && $product.availability_message}
          {if $product.availability == 'available'}
              {if $product.quantity > 0}
              <span class="alert-success">
            <i class="material-icons rtl-no-flip product-available">&#xE5CA;</i>
            </span>
              {else}
                <span class="alert-danger">
            <i class="material-icons product-unavailable">&#xE14B;</i>
            </span>  
                 
                  {/if}
          {elseif $product.availability == 'last_remaining_items'}
              <span class="alert-warning">
            <i class="material-icons product-last-items">&#xE002;</i>
            </span>
          {else}
              <span class="alert-danger">
            <i class="material-icons product-unavailable">&#xE14B;</i>
            </span>
          {/if}
          {$product.availability_message}
          
        {/if}
             
                      </div>
                  </div>
             <div class="col-sm-4">
             
             <div class="clearfix atc_div">
                <input name="qty" type="hidden" class="form-control atc_qty" value="1" onfocus="if(this.value == '1') this.value = '';" onblur="if(this.value == '') this.value = '1';"/>
               
                
          {if $product.availability == 'available'}
            <button class="add-to-cart btn btn-primary btn-sm" onclick="mypresta_productListCart.add({literal}$(this){/literal});">
                    <i class="material-icons no-margin">add_shopping_cart</i>
                    {*{l s='Add to cart' d='Shop.Theme.Actions'}*}
                </button>
          {elseif $product.availability == 'last_remaining_items'}
           <button class="add-to-cart btn btn-primary btn-sm" onclick="mypresta_productListCart.add({literal}$(this){/literal});">
                    <i class="material-icons no-margin">add_shopping_cart</i>
                    {*{l s='Add to cart' d='Shop.Theme.Actions'}*}
                </button>
          {else}
            <button class="add-to-cart btn btn-primary btn-sm disabled">
                    <i class="material-icons no-margin">add_shopping_cart</i>
                    {*{l s='Add to cart' d='Shop.Theme.Actions'}*}
                </button>
          {/if}
                
                
            </div>
             </div>
                
            </div>
             
                   
             
            </div>
          {/if}
        {/block}

        {block name='product_reviews'}
          {hook h='displayProductListReviews' product=$product}
        {/block}
      </div>

      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
              {if $flag.type == 'new'} 
                  <li class="product-flag {$flag.type}">{$flag.label}</li>
                    {else}
                    <li class="product-flag {$flag.type}">{$flag.label}</li>
                    {/if}
          {/foreach}
        </ul>
      {/block}

      <div class="highlighted-informations{if !$product.main_variants} no-variants{/if} hidden-sm-down">
      {*  {block name='quick_view'}
          <a class="quick-view" href="#" data-link-action="quickview">
            <i class="material-icons search">&#xE8B6;</i> {l s='Quick view' d='Shop.Theme.Actions'}
          </a>
        {/block}*}

        {*{block name='product_variants'}
          {if $product.main_variants}
            {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
          {/if}
        {/block}*}
      </div>
      <div class="clearfix">      
      </div>
    </div>
  </article>
{/block}
