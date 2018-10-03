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
{extends file='page.tpl'}

 
    {block name='page_content_container'}
        
      <section id="content" class="page-home">
        {block name='page_content_top'}{/block}
    
        
        {block name='page_content'}
          {block name='hook_home'}
              
          
              
            {$HOOK_HOME nofilter}
      
          {/block}
         <h1 class="h1 products-section-title text-uppercase">
              Blog
          </h1>
          <div class="row">
        
              {foreach from=CMS::getCMSPages(1,2,true) key=k item=cmspages name=blog}
              {if $isMobile == 4}
               {if $smarty.foreach.blog.first} 
                 <div class="col-lg-12 col-md-12 col-sm-12">
             
             <div class="article-news">
                 <div class="feature-image-article">
                 <a href="{$link->getCMSLink($cmspages.id_cms, $cmspages.link_rewrite)|escape:'htmlall':'UTF-8'}">
                     <div style="background-image:url({$urls.img_ps_url}blog/{$cmspages.feature_image});height:350px;width:100%;background-size:cover;background-position:center;">
                          </div>
                 </a>
                 </div>
             <h3>{$cmspages.meta_title|escape:'htmlall':'UTF-8'}</h3>
             <p>
                 {*{$cmspages.meta_description|escape:'htmlall':'UTF-8'}*}
                 {$cmspages.content|truncate:350|strip_tags:false}
             </p>
             <div class='clearfix'></div>
             <a href="{$link->getCMSLink($cmspages.id_cms, $cmspages.link_rewrite)|escape:'htmlall':'UTF-8'}" class="btn btn-default">Więcej</a>
             </div>
          </div>
                 {/if}
                 {else}
                     <div class="col-lg-4 col-md-12 col-sm-12">
             
             <div class="article-news">
                 <div class="feature-image-article">
                 <a href="{$link->getCMSLink($cmspages.id_cms, $cmspages.link_rewrite)|escape:'htmlall':'UTF-8'}">
                     <div style="background-image:url({$urls.img_ps_url}blog/{$cmspages.feature_image});height:350px;width:100%;background-size:cover;background-position:center;">
                          </div>
                 </a>
                 </div>
             <h3>{$cmspages.meta_title|escape:'htmlall':'UTF-8'}</h3>
             <p>
                 {*{$cmspages.meta_description|escape:'htmlall':'UTF-8'}*}
                 {$cmspages.content|truncate:350|strip_tags:false}
             </p>
             <div class='clearfix'></div>
             <a href="{$link->getCMSLink($cmspages.id_cms, $cmspages.link_rewrite)|escape:'htmlall':'UTF-8'}" title="Przeczytaj więcej na blogu" class="btn btn-primary">Więcej</a>
             </div>
          </div>
                 {/if} 
	 
             
             {*{$cmspages|var_dump}*}

          {/foreach}
           
          </div>
        {/block}
        
         
      </section>
    {/block}
