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
 <div id="_desktop_cart" class="col-lg-3 col-md-4 col-sm-6">
  <div class="blockcart cart-preview {if $cart.products_count > 0}active{else}inactive{/if}" data-refresh-url="{$refresh_url}">
    <div class="header">
      {if $cart.products_count > 0}
        <a href="{$cart_url}">
      {/if}
        <i class="material-icons shopping-cart">shopping_cart</i>
        <span class="hidden-sm-down">{l s='Cart' d='Shop.Theme.Checkout'}</span>
        <span class="cart-products-count">{$cart.products_count}</span>
      {if $cart.products_count > 0}
        </a>
      {/if}
    </div>
  </div>
</div>

</div>
 {*{if $page.page_name == 'index'}*}
             

          {if $cart.products_count > 0} 
 
        
               <div class="rabat_date koszyk animated fadeInRight" style="    min-width: 25%;width: auto;box-shadow: 0px 2px 10px rgba(0,0,0,0.2);bottom: 15px;position: fixed;right: 15px;z-index: 999;border: 1px solid #d8c4a3;color: #3f453a;height: 60px;color: #3f453a;background: #ffff;">
                   <a href='{$cart_url}'>
            <span class="animated pulse infinite" style="display: inline-block;width: 60px;color: #3f453a !important;text-align:  center;height: 20px;float:  left;vertical-align:  middle;
"><i class="material-icons shopping-cart" style="font-size: 1.5rem;position:  absolute;left:  0;padding: 10px 20px;
">shopping_cart</i>
</span> <strong style="display: inline-block;padding: 0 5px;"><span style="font-weight: 900;font-size:  1.25rem;">Kup teraz</span> - otrzymasz rabat <br><span style="color: #575e44;
">-5%</span> na następne zakupy</strong>
        </a></div>
        
        {/if} 
{*            {/if}*}