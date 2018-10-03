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

{block name='page_title'}
  {$cms.meta_title}
{/block}

{block name='page_content_container'}
     
       {if $cms.id_cms_category == '2'}
  <section id="content" class="page-content page-cms page-cms-{$cms.id} col-md-9">
       {else}
  <section id="content" class="page-content page-cms page-cms-{$cms.id}">         
           {/if}
      
  
{if $cms.feature_image != ''}
     {if $cms.id_cms_category == '2'}
    <div class='feature_image blog' style="background-image:url('{$urls.img_ps_url}blog/{$cms.feature_image}');background-size:cover;background-position:center;width:100%;height:300px;">
         </div> 
    {/if}
{/if}
    {block name='cms_content'}
         {$cms.content nofilter} 
    
    {/block}

    {block name='hook_cms_dispute_information'}
      {hook h='displayCMSDisputeInformation'}
    {/block}

    {block name='hook_cms_print_button'}
      {hook h='displayCMSPrintButton'}
    {/block}

  </section>
     {if $cms.id_cms_category == '2'}
         <div class="col-md-3">
             {hook h="displayRightColumn"}
         </div>
       {else}
   
           {/if}
{/block}
