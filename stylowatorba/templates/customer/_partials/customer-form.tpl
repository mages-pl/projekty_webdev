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
{block name='customer_form'}
  {block name='customer_form_errors'}
    {include file='_partials/form-errors.tpl' errors=$errors['']}
  {/block}

<form action="{block name='customer_form_actionurl'}{$action}{/block}" id="customer-form" class="js-customer-form" method="post">
  <section>
    {block "form_fields"}
      {foreach from=$formFields item="field"}
          {if $field.name != "id_gender"}
              {if $field.name != "newsletter"}
          {block "form_field"}
            {form_field field=$field}
          {/block}
          {/if}
       {/if}
        {*{block "form_field"}
          {form_field field=$field}
        {/block}*}
      {/foreach}
      {if $page.page_name == 'authentication'}
      <div class="form-control" style="margin: 25px auto;">
            
            <label style="text-align:  justify;">
                <input type="checkbox" value="1" required>
                Wyrażam zgodę na przetwarzanie podanych w formularzu danych osobowych w zakresie niezbędnym do utworzenia konta, zgodnie z ustawą z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną oraz ustawą z dnia 29 sierpnia 1997 r. o ochronie danych osobowych.
Administratorem danych osobowych jest {$nazwa_firmy} z siedzibą {$adres_firmy}
            </label>
        </div>
            {/if}
      {$hook_create_account_form nofilter}
    {/block}
  </section>

  {block name='customer_form_footer'}
    <footer class="form-footer clearfix">
      <input type="hidden" name="submitCreate" value="1">
      {block "form_buttons"}
        <button class="btn btn-primary form-control-submit float-xs-right" data-link-action="save-customer" type="submit">
          {l s='Save' d='Shop.Theme.Actions'}
        </button>
      {/block}
    </footer>
  {/block}

</form>
{/block}
