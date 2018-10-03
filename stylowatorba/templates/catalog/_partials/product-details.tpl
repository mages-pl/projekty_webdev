<div class="tab-pane fade{if !$product.description} in active{/if}"
     id="product-details"
     data-product="{$product.embedded_attributes|json_encode}"
     role="tabpanel"
  >
  {block name='product_reference'}
    {if isset($product_manufacturer->id)}
    {*  <div class="product-manufacturer">
        {if isset($manufacturer_image_url)}
          <a href="{$product_brand_url}">
            <img src="{$manufacturer_image_url}" class="img img-thumbnail manufacturer-logo" alt="{$product_manufacturer->name}">
          </a>
        {else}
          <label class="label">{l s='Brand' d='Shop.Theme.Catalog'}</label>
          <span>
            <a href="{$product_brand_url}">{$product_manufacturer->name}</a>
          </span>
        {/if}
      </div>*}
    {/if}
    {if isset($product.reference_to_display)}
     {* <div class="product-reference">
        <label class="label">{l s='Reference' d='Shop.Theme.Catalog'} </label>
        <span itemprop="sku">{$product.reference_to_display}</span>
      </div>*}
    {/if}
  {/block}

  {block name='product_quantities'}
    {if $product.show_quantities}
      <div class="product-quantities">
        <label class="label">{l s='In stock' d='Shop.Theme.Catalog'}</label>
        <span data-stock="{$product.quantity}" data-allow-oosp="{$product.allow_oosp}">{$product.quantity} {$product.quantity_label}</span>
      </div>
    {/if}
  {/block}

  {block name='product_availability_date'}
    {if $product.availability_date}
      <div class="product-availability-date">
        <label>{l s='Availability date:' d='Shop.Theme.Catalog'} </label>
        <span>{$product.availability_date}</span>
      </div>
    {/if}
  {/block}

  {block name='product_out_of_stock'}
    <div class="product-out-of-stock">
      {hook h='actionProductOutOfStock' product=$product}
    </div>
  {/block}

  {block name='product_features'}
    {if $product.grouped_features}
         
      <section class="product-features">
        {*<h3 class="h6">{l s='Data sheet' d='Shop.Theme.Catalog'}</h3>*}
        <dl class="data-sheet">
          {foreach from=$product.grouped_features item=feature}
             {if ($feature.value) != ' '}
            <dt class="name" id="product-feature{$feature.id_feature}">
                 {if $feature.id_feature == '6'}
                     <img src='{$urls.theme_assets}img/features/material.png' />
                {/if}
            {if $feature.id_feature == '7'}
                <img src='{$urls.theme_assets}img/features/color.png' />
                {/if}
                 {if $feature.id_feature == '8'}
                     <img src='{$urls.theme_assets}img/features/condition.png' />
                {/if}
                 {if $feature.id_feature == '12'}
                     <img src='{$urls.theme_assets}img/features/technology.png' />
                {/if}
            {if $feature.id_feature == '10' || $feature.id_feature == '32' || $feature.id_feature == '31' || $feature.id_feature == '33' ||  $feature.id_feature == '39'}
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
                {if $feature.id_feature == '29'}
                     <img src='{$urls.theme_assets}img/features/quality.png' />
                {/if}
                
                
                {if $feature.id_feature == '35'}
                    <img src='{$urls.theme_assets}img/features/pocket.png' />
                    {/if}
                {if $feature.id_feature == '30'}
                    <img src='{$urls.theme_assets}img/features/country.png' />
                    {/if}
                {if $feature.id_feature == '34'}
                     <img src='{$urls.theme_assets}img/features/laptop.png' />
                {/if}
                {if $feature.id_feature == '11'  || $feature.id_feature == '36'}
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
            {/if}
          {/foreach}
        </dl>
      </section>
    {/if}
  {/block}

  {* if product have specific references, a table will be added to product details section *}
  {block name='product_specific_references'}
    {if isset($product.specific_references)}
      <section class="product-features">
        <h3 class="h6">{l s='Specific References' d='Shop.Theme.Catalog'}</h3>
          <dl class="data-sheet">
            {foreach from=$product.specific_references item=reference key=key}
              <dt class="name">{$key}</dt>
              <dd class="value">{$reference}</dd>
            {/foreach}
          </dl>
      </section>
    {/if}
  {/block}

  {block name='product_condition'}
    {if $product.condition}
      <div class="product-condition">
        <label class="label">{l s='Condition' d='Shop.Theme.Catalog'} </label>
        <link itemprop="itemCondition" href="{$product.condition.schema_url}"/>
        <span>{$product.condition.label}</span>
      </div>
    {/if}
  {/block}
</div>
