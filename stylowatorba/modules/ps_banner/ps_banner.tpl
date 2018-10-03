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
 {*<a class="banner" href="{$banner_link}"  style="position:relative;" title="{$banner_desc}">*}
 <div class="banner hidden-md-down"  style="position:relative;">
  {if isset($banner_img)}
          <h1 style="position: absolute;z-index: 22;top: 50px;left: 50px;text-transform: uppercase;font-weight: 400;font-size: 1.4rem;">
              Mamy dla Ciebie ponad 
              <strong class="counter" style="font-weight: 900;font-family: Ubuntu,sans-serif;font-size: 10rem;color: #dfdfdf;left: 0;position: absolute;letter-spacing: -5px;">
                  {$all_products}
              </strong> produktów</h1>
    <img src="{$banner_img}" alt="{$banner_desc}" title="{$banner_desc}" style="position:relative;float:right;margin-top:-150px;max-width: 100%;" class="img-fluid">
  {else}
    <span>{$banner_desc}</span>
  {/if}
{*</a>*}
