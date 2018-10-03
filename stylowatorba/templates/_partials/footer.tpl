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
 {if $page.page_name == 'index'}
 <div class="row" style="margin-right:0px;margin-left:0px;margin-bottom:25px;margin-top: -50px;">
    <div class="col-md-11" style="margin:  auto;background: #fcfcfc;display:  block;float:  none;padding:  20px;">
        <div>
                  <h1> Dynamiczny rozwój sklepu internetowego  i ciągłe ulepszenia</h1>
                  <p>
StylowaTorba.pl to dynamicznie rozwijający się sklep internetowy z modną galanterią. Oferujemy szeroki wybór galanterii damskiej i męskiej. Cały czas poszerzamy dostępny asortyment oraz nawiązujemy kolejne współprace z producentami tak, by móc zaskakiwać naszych klientów zmieniającą się i bardziej dopasowaną do oczekiwań ofertą. Możemy poszczycić się kolekcją stylowych toreb, torebek i portfeli wykonanych z dokładnością i  starannością z najwyższej jakości skóry naturalnej. Produkty te są w stałej produkcji na terenie naszego kraju. Jesteśmy również otwarci na dalsze współprace, zwłaszcza z lokalnymi twórcami, ale nie tylko. Nasi kontrahenci ciągle dostarczają nam nowości idealnie pasujące klimatem do bieżących oraz nadchodzących sezonów modowych.
                  </p>
              </div>
    <div>
                  <h1>Bogata i nietuzinkowa stylistyka toreb</h1>
                  <p>
Kolekcje letnie to często produkty lekkie, wykonane z bambusa, wikliny czy trawy morskiej, doskonale sprawujące się podczas wakacyjnych wyjazdów. Produkcje ze skóry ekologicznej i naturalnej są natomiast nieodłacznym dodatkiem do codziennych i okazjonalnych stylizacji w sezonie jesienno-zimowym. 
                  </p>
              </div><div>
                  <h1>Modne fasony torebek damskich</h1>
                  <p>Począwszy od uniwersalnych shopperek i worków, niezbędnych dla kobiet, które zawsze muszą mieć pod ręką dokumenty czy laptop, przez listonoszki i kuferki aż do kopertówek doskonałych na okazje formalne. Wszystkie modne fasony w jednym miejscu, w sklepie internetowym StylowaTorba.pl. </p>
              </div><div>
                  <h1>Dziesiątki oryginalnych marek galanterii damskiej i męskiej</h1>
                  <p>W naszym sklepie internetowym znajduje się przeszło 50 marek skierowanych do różnych klientów. Dzięki temu z naszych usług zadowoleni są zarówno klienci ceniący sobie elegancję i klasykę, jak i luźny, sportowy styl. Najbardziej znanymi są między innymi Armani Jeans, Valentino Orlandi, Vera Pelle, Gallantry, Felice, Nucelle czy też Monnari.</p>
              </div></div>
    </div>
 
 {/if}
<div class="container">
  <div class="row">
    {block name='hook_footer_before'}
      {hook h='displayFooterBefore'}
    {/block}
  </div>
</div>
<div class="footer-container">
  <div class="container">
    <div class="row">
      {block name='hook_footer'}
        {hook h='displayFooter'}
      {/block}
    </div>
    <div class="row">
      {block name='hook_footer_after'}
        {hook h='displayFooterAfter'}
      {/block}
    </div>
    <div class="row">
      <div class="col-md-12">
          
       
      </div>
    </div>
     
      <div class="f_brand"><img src="{$urls.theme_assets}/img/footer_brands.png" id="footer_brand_img" alt="Kurierzy i płatności realizowane przez StylowaTorba.pl">
 
</div>
  
    <hr/>
    <div class="cookies_info">
    <p class="text-sm-center">
        Nasza strona internetowa używa plików cookies (tzw. ciasteczka) w celach statystycznych, reklamowych oraz funkcjonalnych. Dzięki nim możemy indywidualnie dostosować stronę do twoich potrzeb. Każdy może zaakceptować pliki cookies albo ma możliwość wyłączenia ich w przeglądarce, dzięki czemu nie będą zbierane żadne informacje.
               
          </p>
               <p class="text-sm-center footer_down">
            
            
          {block name='copyright_link'}
              copyright &copy; {$smarty.now|date_format:"%Y"} StylowaTorba.pl | Making A Great E-commerce Solutions in <span class="heart-gui"><i class="material-icons">&#xE87D;</i></span> Szczecin | Właścicielem sklepu jest firma <img src="{$urls.theme_assets}/img/mages_brand.png" class="mages_brand" alt=""/>
 
          {/block}
        </p>
    </div>
  </div>
        
</div>
       