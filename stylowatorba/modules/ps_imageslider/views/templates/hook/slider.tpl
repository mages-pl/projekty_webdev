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

{if $homeslider.slides}
  <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="{$homeslider.speed}" data-wrap="{(string)$homeslider.wrap}" data-pause="{$homeslider.pause}">
    <ul class="carousel-inner" role="listbox">
      {foreach from=$homeslider.slides item=slide name='homeslider'}
        <li class="carousel-item {if $smarty.foreach.homeslider.first}active{/if}" role="option" aria-hidden="{if $smarty.foreach.homeslider.first}false{else}true{/if}">
          <a href="{$slide.url}">
            <figure>
              <img src="{$slide.image_url}" alt="{$slide.legend|escape}">
              {if $slide.title || $slide.description}
            {*    <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">{$slide.title}</h2>
                  <div class="caption-description">{$slide.description nofilter}</div>
                </figcaption>*}
              {/if}
            </figure>
          </a>
        </li>
      {/foreach}
    </ul>
    <div class="direction" aria-label="{l s='Carousel buttons' d='Shop.Theme.Global'}">
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="icon-prev hidden-xs" aria-hidden="true">
          <i class="material-icons">&#xE5CB;</i>
        </span>
        <span class="sr-only">{l s='Previous' d='Shop.Theme.Global'}</span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true">
          <i class="material-icons">&#xE5CC;</i>
        </span>
        <span class="sr-only">{l s='Next' d='Shop.Theme.Global'}</span>
      </a>
    </div>
      
      
      <div class="slider-bottom row" style="
    position: relative;
    bottom: 20px;
   
    text-align:  center;
">
    <div class="col-md-4" style="
    /* text-align: right; */
">
    <a href="https://stylowatorba.pl/3-dla-niej" title="Stylowe Torebki damskie i akcesoria modowe" style="
    color:  #ffffff;
    font-weight:  700;
    display:  block;
    background: rgba(0,0,0,0.75);
    padding: 15px 25px;
 
    border: 1px solid white;
  
">
    <i class="material-icons" style="
    position:  absolute;
    top: -12px;
    color: #404040;
    text-align:  center;
    transform:  rotate(-90deg);
    display:  block;
    margin:  auto;
    width:  100%;
    left:  0;
">
play_arrow
</i>
    Modne torebki dla kobiet</a>
    </div>
    <div class="col-md-4">
    <a href="https://stylowatorba.pl/6-dla-niego" title="Stylowe dodatki dla mężczyzn" style="
    color: #3d3737;
    font-weight:  700;
    display:  block;
    background: rgba(216, 196, 163, 0.75);
    padding: 15px 25px;
    border: 1px solid white;
">
    <i class="material-icons" style="
    position:  absolute;
    top: -12px;
    color: #e2d3bb;
    text-align:  center;
    transform:  rotate(-90deg);
    display:  block;
    margin:  auto;
    width:  100%;
    left:  0;
">
play_arrow
</i>
    Akcesoria dla mężczyzn</a>
    </div>
    <div class="col-md-4" style="
">
    <a href="https://stylowatorba.pl/36-promocje" title="Gorące promocje galanterii męskiej i damskiej" style="
    color: #3d3737;
    display:  block;
    font-weight:  700;
    background: rgba(201, 201, 201, 0.75);
    padding: 15px 25px;
    border: 1px solid #ffffff;
    margin:  0 0 0 5px;
"><i class="material-icons" style="
    position:  absolute;
    top: -12px;
    color: #d7d7d7;
    text-align:  center;
    transform:  rotate(-90deg);
    display:  block;
    margin:  auto;
    width:  100%;
    left:  0;
">
play_arrow
</i>
    Zjawiskowe promocje</a></div>
    </div>
      
  </div>
{/if}
<div class="row" style="
    text-align:  center;
">
    
    <div class="col-sm-3">
    <img src="../themes/classic/assets/img/icons/homepage-icons/dostawa.png" style="
    display:  block;
    text-align:  center;
    margin:  auto;
">
    <strong>Darmowa dostawa od 250zł</strong>
    <p style="
    font-size: .8rem;
    margin:  10px 0;
">
    Kupując na StylowaTorba za minimum 250 zł otrzymujesz od nas dostawę kurierem gratis, który dostarczy ją bezpośrednio pod wskazany adres. Nie wierzysz? Przekonaj się już teraz. 
    </p>
        
    </div>
    <div class="col-sm-3">
    <img src="../themes/classic/assets/img/icons/homepage-icons/czas.png" style="
    display:  block;
    text-align:  center;
    margin:  auto;
">
    <strong>Błyskawiczna wysyłka</strong>
    
    <p style="
    font-size: .8rem;
    margin: 10px 0;
">
        Szanując czas naszych klientów realizujemy wysyłkę większości naszego asortymentu już w ciągu pierwszych 24 godzin od momentu złożenia zamówienia. 
    </p>
    </div>
    <div class="col-sm-3">
    <img src="../themes/classic/assets/img/icons/homepage-icons/zwroty.png" style="
    display:  block;
    text-align:  center;
    margin:  auto;
">
    <strong>Akceptujemy zwroty</strong>
    <p style="
    font-size:  .8rem;
    margin:  10px 0;
">
 Na każde zamówienie złożone na StylowaTorba przysługuje prawo do zwrotu, które realizujemy możliwie najszybciej finalizując je zawsze z satysfakcją dla Klienta. 
    </p>
    </div>
    <div class="col-sm-3">
    <img src="../themes/classic/assets/img/icons/homepage-icons/jakosc.png" style="
    display:  block;
    text-align:  center;
    margin:  auto;">
    <strong>Produkty wysokiej jakości</strong>
<p style="
    font-size:  .8rem;
    margin:  10px 0;
">
  Oferowana przez nas galanteria wykonana jest z wysokiej jakości skóry. Jej ponadczasowy unikalny wygląd zagwarantuje Państwu satysfakcję z dokonanego zakupu.
</p>
        
    </div>
</div>
