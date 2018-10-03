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
{extends file=$layout}

{block name='head_seo' prepend}
  <link rel="canonical" href="{$product.canonical_url}">
{/block}

{block name='head' append}
  <meta property="og:type" content="product">
  <meta property="og:url" content="{$urls.current_url}">
  <meta property="og:title" content="{$page.meta.title}">
  <meta property="og:site_name" content="{$shop.name}">
  <meta property="og:description" content="{$page.meta.description}">
  <meta property="og:image" content="{$product.cover.large.url}">
  <meta property="product:pretax_price:amount" content="{$product.price_tax_exc}">
  <meta property="product:pretax_price:currency" content="{$currency.iso_code}">
  <meta property="product:price:amount" content="{$product.price_amount}">
  <meta property="product:price:currency" content="{$currency.iso_code}">
  {if isset($product.weight) && ($product.weight != 0)}
  <meta property="product:weight:value" content="{$product.weight}">
  <meta property="product:weight:units" content="{$product.weight_unit}">
  {/if}
{/block}

{block name='content'}
  <section id="main" itemscope itemtype="https://schema.org/Product">
      
    <meta itemprop="url" content="{$product.url}">
       <div class="row buttony_next_prev">
          {if $prev_product.id_product != ''}
        <a href="{$link->getProductLink($prev_product.id_product, $next_product.link_rewrite)}" class="btn btn-default"><i class="material-icons left">keyboard_arrow_left</i> Poprzedni produkt</a>
        {/if}
        {if $next_product.id_product != ''}
        <a href="{$link->getProductLink($next_product.id_product, $next_product.link_rewrite)}" class="btn btn-default right">Następny produkt <i class="material-icons right">keyboard_arrow_right</i></a>
        {/if}
    </div>
  
    <div class="row">
        <div class="col-md-6 followProduct"> 
            
        {block name='page_content_container'}
          <section class="page-content" id="content">
            {block name='page_content'}
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

              {block name='product_cover_thumbnails'}
               
                {include file='catalog/_partials/product-cover-thumbnails.tpl'}
              {/block}
              
              

            {/block}
            
            
          </section>
        {/block}
        </div>
        <div class="col-md-6">
          {block name='page_header_container'}
            {block name='page_header'}
              <h1 class="h1" id="product_title" itemprop="name">{block name='page_title'}{$product.name}{/block}</h1>
            {/block}
          {/block} 
          <div class="col-md-6" style="padding:0;">
              
              <i class="material-icons">&#xE41D;</i> <a href="{$link->getCategoryLink($product.id_category_default, $product.category)|escape:'html':'UTF-8'}">{$product.category_name}</a>
              <div style="background: {if $product.quantity < 5}#c66e6e{else}#6ec697{/if};padding: 5px 10px;font-weight: 600;display: table;border-radius:  5px;margin: 5px 0;color:  #fff;">
    W magazynie {$product.quantity} {if $product.quantity == 1} sztuka{elseif $product.quaintity == 0} sztuk{elseif $product.quantity < 5} sztuki {else} sztuk{/if}
</div>
    </div>
          <div class="col-md-6" style="padding:0;">
              {if $product.price >= 250}
                  <i class="material-icons">&#xE54C;</i> Dostawa <strong class="success-label">0 zł</strong> 
                  {else}
              <i class="material-icons">&#xE54C;</i> Kurier już od <strong>{Tools::displayPrice($delivery_price)}</strong> 
              {/if}
               
              <div class="clearfix"></div> 


              <i class="material-icons">&#xE86F;</i> Kod produktu {$product.reference} 
              <div class="clearfix"></div>
           <i class="material-icons">&#xE192;</i>
           Wysyłka: {$kurier->delay[1]}
            {*{if $product.delivery_information}Wysyłka{else}{if $product.availability_date}Szacowany czas dostępności{/if}{/if}
        {if $product.delivery_information}
          <span class="delivery-information">fd{$product.delivery_information}</span>
        {/if}
         {if $product.availability_date}
        <span>niedostepne{$product.availability_date}</span>
    {/if}*}
    </div>
          
          {block name='product_prices'}
            {include file='catalog/_partials/product-prices.tpl'}
          {/block}
          
          {if $product.has_discount}
          <i class="material-icons">&#xE8B5;</i> <span class="promotion-time-box">
          {if $product.specific_prices.to == '0000-00-00 00:00:00'}
              
              <span class="odliczanie" data-promotion="9999-12-31 23:59:59">
                  <span class="animate-loader"><i class="material-icons">&#xE8B8;</i></span>
                  {else}
                      <span class="odliczanie" data-promotion="{$product.specific_prices.to}">
                      {*{$product.specific_prices.to}*}
                      
              {/if}
              </span>
          </span>
         {/if}
          
          <div class="product-information">
           {* {block name='product_description_short'}
              <div id="product-description-short-{$product.id}" itemprop="description">{$product.description_short nofilter}</div>
            {/block}*}

          {*  {if $product.quantity <= 0}
            {include file="../../modules/ps_emailalerts/views/templates/hook/product.tpl" id_product=$product.id id_product_attribute=0} 
            {/if}*}
            
            {if $product.is_customizable && count($product.customizations.fields)}
              {block name='product_customization'}
                {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}
              {/block}
            {/if}

            
     
            
            <div class="product-actions">
              {block name='product_buy'}
                <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                  <input type="hidden" name="token" value="{$static_token}">
                  <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                  <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id">

                  {block name='product_variants'}
                    {include file='catalog/_partials/product-variants.tpl'}
                  {/block}

                  {block name='product_pack'}
                    {if $packItems}
                      <section class="product-pack">
                        <h3 class="h4">{l s='This pack contains' d='Shop.Theme.Catalog'}</h3>
                        {foreach from=$packItems item="product_pack"}
                          {block name='product_miniature'}
                            {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack}
                          {/block}
                        {/foreach}
                    </section>
                    {/if}
                  {/block}

                  {block name='product_discounts'}
                    {include file='catalog/_partials/product-discounts.tpl'}
                  {/block}

                  {block name='product_add_to_cart'}
                    {include file='catalog/_partials/product-add-to-cart.tpl'}
                  {/block}

                 

                  {block name='product_refresh'}
                    <input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="{l s='Refresh' d='Shop.Theme.Actions'}">
                  {/block}
                </form>
              {/block}

            </div>

              
            
              
            {block name='hook_display_reassurance'}
              {hook h='displayReassurance'}
            {/block}

          
              {block name='product_accessories'}
      {if $accessories}
        <section class="product-accessories clearfix">
          <h1 class="h1 text-uppercase">{l s='Dostępne warianty' d='Shop.Theme.Catalog'}</h3>
          <div class="row products">
            {foreach from=$accessories item="product_accessory"}
<div class="col-sm-3">
                <article class="product-miniature js-product-miniature" data-id-product="{$product_accessory.id_product}" data-id-product-attribute="{$product_accessory.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
                    <div class="">

                        <a href="{$product_accessory.url}" class="thumbnail" title="{$product_accessory.name|truncate:60:'...'}">
                            <img
                                class="" src="{$product_accessory.cover.bySize.cart_default.url}" data-src="{$product_accessory.cover.bySize.cart_default.url}"
                                alt = "{if !empty($product_accessories.cover.legend)}{$product_accessory.cover.legend}{else}{$product_accessory.name|truncate:30:'...'}{/if}" 
                                data-full-size-image-url = "{$product_accessory.cover.large.url}" style="max-width: 100%;"  
                                >
                        </a>
                    </div>
                </article>
</div>
                
              {*{block name='product_miniature'}
                {include file='catalog/_partials/miniatures/product.tpl' product=$product_accessory}
              {/block}*}
            {/foreach}
          </div>
        </section>
      {/if}
    {/block}
        </div>
      </div>
    </div>
            <div class="row">
            <div class="clearfix"></div>
             {block name='product_additional_info'}
                    {include file='catalog/_partials/product-additional-info.tpl'}
                  {/block}
              {block name='product_tabs'}
            <div class="clearfix"></div>
            <div class="col-md-4 left-desc">
               
                 <h1 style="
    margin: 50px 0 0 0;
    font-size:  1.8rem;
"><i class="material-icons" style="font-size: 3rem;">&#xE5D0;</i> Specyfikacja produktu</h1>
<h2 style="
    font-weight:  300;
    font-size:  1rem;
    padding-left: 4rem;
">Zapoznaj się z szczegółami oferowanego produktu</h2>
                
                <div class="product-description" style="
    margin: 50px 0 0 0;
    display:  block;
">
     
     {$product.description_short nofilter}
     
     <div class="col-lg-12 col-md-12 hidden-sm-down">
         <img src="{$product.cover.bySize.large_default.url}" style="max-width:100%;" />
         {if $product_manufacturer->name}<h3><!--{l s='Manufacturer'}:--><a href="{$link->getmanufacturerLink($product->id_manufacturer, $product->link_rewrite)|escape:'htmlall':'UTF-8'}" title="{l s='List items made by'} {$product->manufacturer_name|escape:'htmlall':'UTF-8'}"> {$product->manufacturer_name|escape:'htmlall':'UTF-8'}</a></h3>{/if}

     </div>
                </div>
            </div>
            <div class="col-md-8">
              <div class="tabs">
                <ul class="nav nav-tabs" role="tablist">
            
                    
                  {if $product.description}
                       
                    <li class="nav-item">
                       <a
                         class="nav-link{if $product.description} active{/if}"
                         data-toggle="tab"
                         href="#description"
                         role="tab"
                         aria-controls="description"
                         {if $product.description} aria-selected="true"{/if}><i class="material-icons">description</i> {l s='Description' d='Shop.Theme.Catalog'}</a>
                    </li>
                  {/if}
                   
                  <li class="nav-item">
                    <a
                      class="nav-link{if !$product.description} active{/if}"
                      data-toggle="tab"
                      href="#product-details"
                      role="tab"
                      aria-controls="product-details"
                      {if !$product.description} aria-selected="true"{/if}><i class="material-icons">list</i> {l s='Specyfikacja' d='Shop.Theme.Catalog'}</a>
                  </li>
                  {if $product.attachments}
                    <li class="nav-item">
                      <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#attachments"
                        role="tab"
                        aria-controls="attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
                    </li>
                  {/if}
                  {foreach from=$product.extraContent item=extra key=extraKey}
                    <li class="nav-item">
                      <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#extra-{$extraKey}"
                        role="tab"
                        aria-controls="extra-{$extraKey}">{$extra.title}</a>
                    </li>
                  {/foreach}
                  <li class="nav-item">
                       <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#dostawa"
                        role="tab"
                        aria-controls="extra-dostawa"><i class="material-icons">local_shipping</i> Dostawa</a>
                  </li>
                  <li class="nav-item">
                       <a
                        class="nav-link"
                        data-toggle="tab"
                        href="#platnosci"
                        role="tab"
                        aria-controls="extra-platnosci"><i class="material-icons">attach_money</i> Płatności</a>
                  </li>
                  
                </ul>

                <div class="tab-content" id="tab-content">
                 <div class="tab-pane fade in{if $product.description} active{/if}" id="description" role="tabpanel">
                     
                              {if $product.grouped_features}
         
      <section class="product-features">
        {*<h3 class="h6">{l s='Data sheet' d='Shop.Theme.Catalog'}</h3>*}
        <dl class="data-sheet">
          {foreach from=$product.grouped_features item=feature}
             
            
            <dt class="name" id="product-feature{$feature.id_feature}">
                 {if $feature.id_feature == '6'}
                     <img src='{$urls.theme_assets}img/features/material.png' />
                {/if}
            {if $feature.id_feature == '7' || $feature.id_feature == '41'}
                <img src='{$urls.theme_assets}img/features/color.png' />
                {/if}
                 {if $feature.id_feature == '8'}
                     <img src='{$urls.theme_assets}img/features/condition.png' />
                {/if}
                 {if $feature.id_feature == '12'}
                     <img src='{$urls.theme_assets}img/features/technology.png' />
                {/if}
                {if $feature.id_feature == '10' || $feature.id_feature == '32' || $feature.id_feature == '31' || $feature.id_feature == '39'}
                     <img src='{$urls.theme_assets}img/features/deph.png' />
                {/if}
                {if $feature.id_feature == '13'}
                     <img src='{$urls.theme_assets}img/features/pattern.png' />
                {/if}
                {if $feature.id_feature == '9'}
                     <img src='{$urls.theme_assets}img/features/gender.png' />
                {/if}
                {if $feature.id_feature == '16'}
                     <img src='{$urls.theme_assets}img/features/zip.png' />
                {/if}
                {if $feature.id_feature == '17'}
                     <img src='{$urls.theme_assets}img/features/podszewka.png' />
                {/if}
                {if $feature.id_feature == '18'}
                     <img src='{$urls.theme_assets}img/features/smartphone.png' />
                {/if}
                {if $feature.id_feature == '19'}
                     <img src='{$urls.theme_assets}img/features/tablet.png' />
                {/if}
                {if $feature.id_feature == '20'}
                     <img src='{$urls.theme_assets}img/features/wallet.png' />
                {/if}
                {if $feature.id_feature == '11'}
                     <img src='{$urls.theme_assets}img/features/paper.png' />
                {/if}
                {if $feature.id_feature == '22'}
                     <img src='{$urls.theme_assets}img/features/deph.png' />
                {/if}
                 
                {if $feature.id_feature == '24'}
                     <img src='{$urls.theme_assets}img/features/pocket.png' />
                {/if}
                {if $feature.id_feature == '25'}
                     <img src='{$urls.theme_assets}img/features/type.png' />
                {/if}
                {if $feature.id_feature == '14'}
                     <img src='{$urls.theme_assets}img/features/producer.png' />
                {/if}
                {if $feature.id_feature == '23'}
                     <img src='{$urls.theme_assets}img/features/komory.png' />
                {/if}
                {if $feature.id_feature == '21'}
                     <img src='{$urls.theme_assets}img/features/nozki.png' />
                {/if}
                {if $feature.id_feature == '15'}
                     <img src='{$urls.theme_assets}img/features/raczki.png' />
                {/if}
                {if $feature.id_feature == '26'}
                    <img src='{$urls.theme_assets}img/features/komory.png' />
                    {/if}
                {$feature.name} 
            
            </dt>
            <dd class="value">{$feature.value|escape:'htmlall'|nl2br nofilter}</dd>
          {/foreach}
        </dl>
      </section>
    {/if}
                     
                   {block name='product_description'}
                     <div class="product-description">{$product.description nofilter}</div>
                   {/block}
                 </div>

                 {block name='product_details'}
                   {include file='catalog/_partials/product-details.tpl'}
                 {/block}

                 {block name='product_attachments'}
                   {if $product.attachments}
                    <div class="tab-pane fade in" id="attachments" role="tabpanel">
                       <section class="product-attachments">
                         <h3 class="h5 text-uppercase">{l s='Download' d='Shop.Theme.Actions'}</h3>
                         {foreach from=$product.attachments item=attachment}
                           <div class="attachment">
                             <h4><a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name}</a></h4>
                             <p>{$attachment.description}</p
                             <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                               {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
                             </a>
                           </div>
                         {/foreach}
                       </section>
                     </div>
                   {/if}
                 {/block}

                 {foreach from=$product.extraContent item=extra key=extraKey}
                 <div class="tab-pane fade in {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
                   {$extra.content nofilter}
                 </div>
                 {/foreach}
                 <div class="tab-pane fade in" id="dostawa" role="tabpanel">
                      {foreach from=CMS::getCMSContent(1,1,null) key=k item=productTab name=productTab}
                          {$productTab nofilter}
                          {/foreach}
                      
                 </div>
                 <div class="tab-pane fade in" id="platnosci" role="tabpanel">
                      {foreach from=CMS::getCMSContent(5,1,null) key=k item=productTab name=productTab}
                          {$productTab nofilter}
                          {/foreach}
                      
                 </div>
                 
              </div>  
            </div>
            </div>
          {/block}
    </div>

    
    
    

    {block name='product_footer'}
      {hook h='displayFooterProduct' product=$product category=$category}
    {/block}

    {*{$product.id_manufacturer}*}
<div class="row container product--brand--info"> 
    {if $product.id_manufacturer == '21' || $product.id_manufacturer == '20'}
    
        <div class="col-md-3" style="border-top: 1px solid #eee;">
             
            <img src="https://stylowatorba.pl/img/blog/logo_4_big.png" alt="Torebki damskie Felice" style="max-width:  100%;margin: 50px 0;">     
                 
            
    </div>
        <div class="col-md-9" style="padding: 40px 20px; border-top: 1px solid #eee;border-left: 1px solid #eee;">

                 
    {foreach from=CMS::getCMSContent(12,1) key=k item=cmspage name=marka}
        {$cmspage|truncate:1550 nofilter}
        {/foreach}
        
    </div>
    
        
        {/if}
        
         {if $product.id_manufacturer == '19'}
     
        <div class="col-md-3" style="border-top: 1px solid #eee;">
             
            <img src="https://stylowatorba.pl/img/blog/logo_1_big.jpg" alt="Stylowe toreby męskie Solier" style="max-width:  100%;margin: 50px 0;">     
                 
            
    </div>
        <div class="col-md-9" style="padding: 40px 20px; border-top: 1px solid #eee;border-left: 1px solid #eee;">

                 
    {foreach from=CMS::getCMSContent(11,1) key=k item=cmspage name=marka}
        {$cmspage|truncate:1550 nofilter}
        {/foreach}
        
    </div>
    
         
        {/if}
        
         {if $product.id_manufacturer == '57'}
     
        <div class="col-md-3" style="border-top: 1px solid #eee;">
             
            <img src="https://stylowatorba.pl/img/blog/brodrene_logo.jpg" alt="Skórzana galanteria męska Brodrene" style="max-width:  100%;margin:50px 0;">     
                 
            
    </div>
        <div class="col-md-9" style="padding: 40px 20px; border-top: 1px solid #eee;border-left: 1px solid #eee;">

                 
    {foreach from=CMS::getCMSContent(14,1) key=k item=cmspage name=marka}
        {$cmspage|truncate:1550 nofilter}
        {/foreach}
        
    </div>
    
        
        {/if}
        
        {if $product.id_manufacturer == '4'}
        <div class="col-md-3" style="border-top: 1px solid #eee;">
             
            <img src="https://stylowatorba.pl/img/blog/farbotka_logo.jpg?v=1530191438" alt="Eksluzynwne kolorowe torebki damskie Farbotka" style="max-width:  100%;margin:50px 0;">     
                 
            
    </div>
        <div class="col-md-9" style="padding: 40px 20px; border-top: 1px solid #eee;border-left: 1px solid #eee;">

                 
    {foreach from=CMS::getCMSContent(13,1) key=k item=cmspage name=marka}
        {$cmspage|truncate:1550 nofilter}
        {/foreach}
        
    </div>
        
            
            {/if}
        </div>
    
    {block name='product_images_modal'}
      {include file='catalog/_partials/product-images-modal.tpl'}
    {/block}

    {block name='page_footer_container'}
      <footer class="page-footer">
        {block name='page_footer'}
          <!-- Footer content -->
        {/block}
      </footer>
    {/block}
  </section>

{/block}
