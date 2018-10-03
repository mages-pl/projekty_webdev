{*<div class="container-fluid">*}
<div id="home_category">
     
     {*   {$homepage_category__parent}
         {$homepage_category__children} <br/>
          {$homepage_category_array|print_r}
            <br/><br/><br/><br/>
            count {$homepage_category_array|count}*}
          
        {* {$homepage_category_array|var_dump}*}
        
      
       {*    {$homepage_category_id|print_r}
         *}
        
{*test {$homepage_category_array|print_r}*}
         
         {foreach $homepage_category_id as $category item=i key=k}
             
             
             
           {*  test:<br/>
             {$homepage_category_id.{$k}}
             
             end <br/>*}
       {*   item   {$i} : {$k}*}
       {*   {if ({$k} % 2) == 0}
              <div class="row">
              {/if}*}
              
             {* {if $homepage_category_array.1[{$k}] != "Kolekcje"}*}
                  
             {if $homepage_category_array.0[{$k}] != '36'}
             <div class="col-sm-{if $k==2}4 shop-box-l{/if}{if $k<2}6{/if}{if $k==3}6 shop-box-r{/if}{if $k>3}2{/if}">
                 <div style="text-align:center;margin:0 0 10px 0;">
                 <div class="kategoria_box">
                     <a href="{$link->getCategoryLink({$homepage_category_array.0[{$k}]}, {$homepage_category_array.3[{$k}]})|escape:'html':'UTF-8'}"> 
                         <div class="kategoria_img" style="text-align:center;width:100%;background-image:url({$homepage_category_array.4[{$k}]});background-repeat:no-repeat;background-position:center;background-size:contain;height:{if $k==2}320px;{/if}{if $k==0}860px;border-right:1px solid #eee;{/if}{if $k==1}450px;{/if}{if $k==3}320px;border-top:1px solid #eee;{/if}{if $k>3}300px{/if}">
                             <span class="caption_category">
                                 {*{$link->getCatImageLink($category->link_rewrite, $category->id_image)|escape:'html':'UTF-8'}
                                 *}
                                 <span>
                                     <p class="animate-loader count animated pulse infinite c{$homepage_category_array.0[{$k}]}">
                                         {*<i class="material-icons">&#xE8B8;</i>*}
                                       {*class="counter animated pulse infinite"*}  
                                           {$homepage_category_prodQty[{$k}][0]["COUNT(*)"]}  
                                       {*{$homepage_category_prodQty[$k]|print_r}*}
                                       
                                     </p>
                                     
                                     {*{$homepage_category_prodQty.1["COUNT(*)"]}*}
                                     
                                     {$homepage_category_array.1[{$k}]}
                                 <p class="btn btn-default" style="position:absolute;margin-top:50px;right:30px;">Sprawdź</p>
                                 </span> 
                                   
                             </span>
                            
                      </div>
                     </a>
                         
                 
              {*{$homepage_category_array.5[{$k}]}*}
                 </div>
                   {*  <span class="counter"> Qty:   {include file="$tpl_dir./category-count.tpl"}</span>*}
                   
           <div class="content_title_category">
               <h1>{$homepage_category_array.1[{$k}]}</h1>
                 </div>
     {*             <a href="{$link->getCategoryLink({$homepage_category_array.0[{$k}]}, {$homepage_category_array.3[{$k}]})|escape:'html':'UTF-8'}" class="btn btn-default">Zobacz</a>   *}  
           
                 </div>
                 </div>
     {/if}
                   {*{/if}*}
           {*   {if ({$k} % 2) == 0}
              </div>
                   {/if}*}
             {/foreach}
                      </div>
       {* </div>*}
  
 