{if ($page.page_name == 'index' || $page.page_name == 'cart')} 
    {if $rabat_wazny > date('Y-m-d H:i:s')}
<div class="mj_rabaty"> 
    
      
    <i class="material-icons" style="margin: 0 15px;">shopping_cart</i>
    KUP TANIEJ! RABAT NA ZAKUPY 
    <span style="padding: 5px 10px;border: 1px dashed;">
        {if $rabat_dostawa != '1'}
        -{$rabat_dyskont|string_format:"%d"}%
        {else}
            DARMOWA DOSTAWA
        {/if}
</span>
        KOD: <strong style="color:#e05555;padding:0 10px;">{$rabat_kod}</strong> od 150zł
        <div class="rabat_date">
            <strong>WAŻNY JESZCZE</strong>
            <div class='clearfix'></div>
        <span class="odliczanie" data-promotion="{$rabat_wazny}"></span>
        </div>
        <div class='close-mj-rabaty-btn'>
             <i class="material-icons">&#xE14C;</i> 
        </div>
</div>
    
{/if}
{/if}