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
<div class="images-container"> 
  {block name='product_cover'}
      <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="product-cover">
        <div class="magnify hidden-sm-down">
        <div class="product-thumb-large" style="background-image:url({$product.cover.bySize.large_default.url})"></div>
      <img class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}" style="width:100%;" itemprop="image">
      <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
        <i class="material-icons zoom-in">&#xE8FF;</i>
      </div>
    </div>
      </div>
      </div>
  {/block}
  {block name='product_images'}
          <div class="col-lg-12 col-md-12 col-sm-12 no-margin">
                 <div class="scroll-box-arrows hidden-sm-down">
                <i class="material-icons left">keyboard_arrow_left</i>
                 <i class="material-icons right">keyboard_arrow_right</i>
              </div>
    <div class="js-qv-mask mask">
      <ul class="product-images js-qv-product-images">
        {foreach from=$product.images item=image}
            
          <li class="thumb-container hidden-sm-down">
            <img
              class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-medium-src="{$image.bySize.medium_default.url}"
              data-image-large-src="{$image.bySize.large_default.url}"
              src="{$image.bySize.home_default.url}"
              alt="{$image.legend}"
              title="{$image.legend}"
              width="100"
              itemprop="image"
            >
          </li>
        {/foreach}
        
         
       
      </ul>
        
         
    </div>
      </div>
        <div class="hidden-md-up">
        <div class="single-carousel">
                {foreach from=$product.images item=image}
                      
                     <article class="product-miniature js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
        
         
          <img
            class="lazy lazyOwl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src = "{$image.bySize.large_default.url}"
            alt = "{$image.legend}"
          >
          
      </div>
      </article>
                     
                {/foreach}
        </div>
        </div>
 
  {/block}

</div>
{hook h='displayAfterProductThumbs'}
