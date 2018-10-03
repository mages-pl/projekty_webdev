<div id="bestsellers-mod">
<div class="col-md-3" style="overflow: hidden;float: none;width: 25%;background-size: cover;background-image: url(https://cdn.pixabay.com/photo/2017/04/22/11/17/handbags-2251089_960_720.jpg);display: table-cell;background-position: 20% 50%;">     
</div>
<div class="col-md-9" style="float: none;display: table-cell;vertical-align: middle;">
        <h1 class="h1 products-section-title text-uppercase">
   Bestsellers
  </h1>
<div class="row specialsHere featured-products">
 


    <br/> {foreach $produkty as $key => $produkt}
  
       <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
          
            <a href="{$link->getProductLink($produkt->id)}">
                <img class="lazy" src="{$link->getImageLink($produkt->link_rewrite,$covers[$key]['id_image'],'large_default')}" />
            </a>
            
            
            
            <div class="product-description">
        
          <h1 class="h3 product-title" itemprop="name">
              <a href="{$link->getProductLink($produkt->id)}">
                 {$produkt->name}
              </a>
          </h1>
        

        
                      <div class="product-price-and-shipping">
                              

                <span class="sr-only">Cena podstawowa</span>
                 
               

              <span class="sr-only">Cena</span>
              <span itemprop="price" class="price">
                   
                   {Product::getPriceStatic($produkt->id, true, null, 2, null, false, true, 1, false, null, null, null, $produkt->specificPrice,true,true, null, true)}
                   {if $produkt->specificPrice && $produkt->specificPrice.reduction_type == 'percentage'}
                   <span class="regular-price">{math equation="x / y" x=$produkt->getPrice(true) y=(1-$produkt->specificPrice.reduction)  format="%.2f"}  </span>
             {/if}
              {if $produkt->specificPrice && $produkt->specificPrice.reduction_type == 'percentage'}
                <span class="discount-percentage discount-product">
                    -{$produkt->specificPrice.reduction*100}%
                </span>
                {/if}
              </span>

         
            </div>
                  
   
      </div>
              
              
            {* *}
             
          {*  <div class="price-box">

                <span class="price special-price">
                

                    {* // price * 1 / 1-discount
                     
   
                   {* {convertPrice price=Product::getPriceStatic($produkt->id, true, null, 2, null, false, true, 1, false, null, null, null, $produkt->specificPrice,true,
                    true, null, true)}
                    
                 {*   {if $productPriceWithoutReduction > $productPrice}{convertPrice price=$productPriceWithoutReduction|floatval}{/if}
                 
                 {if $produkt->specificPrice && $produkt->specificPrice.reduction_type == 'percentage'}
                 <span style="text-decoration: line-through;font-weight: 300;font-size: 1.8rem;">{math equation="x / y" x=$produkt->getPrice(true) y=(1-$produkt->specificPrice.reduction)  format="%.2f"} {$currency->suffix}</span>
                   {/if} 
 
                </span>
                {if $produkt->specificPrice && $produkt->specificPrice.reduction_type == 'percentage'}
                <span class="price-percent-reduction">
                    -{$produkt->specificPrice.reduction*100}%
                </span>
                {/if}
            </div>*}
           
</div>
        </article>
 
         
    {/foreach}
</div>
</div>

    </div>

<div class="clearfix"></div>