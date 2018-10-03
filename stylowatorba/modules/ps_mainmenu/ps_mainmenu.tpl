{assign var=_counter value=0}
{function name="menu" nodes=[] depth=0 parent=null}
    {if $nodes|count}
      <ul class="top-menu" {if $depth == 0}id="top-menu"{/if} data-depth="{$depth}">
          
          
        {foreach from=$nodes item=node}
            
            
            <li class="{$node.type}{if $node.current} current {/if}" id="{$node.page_identifier}">
            {assign var=_counter value=$_counter+1}
              <a
                class="{if $depth >= 0}dropdown-item{/if}{if $depth === 1} dropdown-submenu{/if}"
                href="{$node.url}" data-depth="{$depth}"
                {if $node.open_in_new_window} target="_blank" {/if}
              >
                {if $node.children|count}
                  {* Cannot use page identifier as we can have the same page several times *}
                  {assign var=_expand_id value=10|mt_rand:100000}
                 
                  <span class="float-xs-right hidden-md-up">
                    <span data-target="#top_sub_menu_{$_expand_id}" data-toggle="collapse" class="navbar-toggler collapse-icons">
                      <i class="material-icons add">&#xE313;</i>
                    <i class="material-icons remove">&#xE316;</i>
                    </span>
                  </span>
                       
                {/if}
                {$node.label}
                {if $depth == 0}
                      {if $node.children|count}
                 <i class="material-icons add hidden-sm-down">&#xE313;</i>
                 {/if}
                 {/if}
              </a>
              {if $node.children|count}
              <div {if $depth === 0} class="popover sub-menu js-sub-menu collapse"{else} class="collapse"{/if} id="top_sub_menu_{$_expand_id}">
                {menu nodes=$node.children depth=$node.depth parent=$node}
                
                
                
                {if $node.image_urls} 
                       
                      
                  
                {foreach from=$node.image_urls item=image_urls}
                    {if $depth == 0} 
                       
                    <div class="col-lg-2 col-md-2 col-sm-12 no-margin">
    <ul class="top-menu">
    <a href="#" class="dropdown-item dropdown-submenu">    Galanteria </a>
<div class="">
    <ul class="top-menu">
    <li class="category">
        <a href="{$node.url}?q=Materiał+dominujący-Skóra+naturalna" class="dropdown-item">Skóra naturalna</a>
    </li>
    <li class="category">
        <a href="{$node.url}?q=Materiał+dominujący-Skóra+ekologiczna" class="dropdown-item">Skóra ekologiczna</a>
    </li>
</ul>
    
</div>
        </ul>
    
    
        <ul class="top-menu">
    <a href="#" class="dropdown-item dropdown-submenu">    Torebki </a>
<div class="">
    <ul class="top-menu">
    <li class="category">
        <a href="{$node.url}?q=Rozmiar-Nie+mieszcząca+A4" class="dropdown-item">Mała (nie miesząca A4)</a>
    </li>
    <li class="category">
        <a href="{$node.url}?q=Rozmiar-Mieszcząca+A4" class="dropdown-item">Duża (mieszcząca A4)</a>
    </li>
</ul>
    
</div>
        </ul>
    
</div> 
              {/if}      
                    <img src="{$image_urls}" class="text-right"/>
                    {/foreach}
                {/if}
              </div>
              {/if}
            
            </li>
        {/foreach}
      </ul>
    {/if}
{/function}

<div class="menu col-lg-12 col-md-12 js-top-menu position-static hidden-sm-down" id="_desktop_top_menu">
    {menu nodes=$menu.children}
     
    <div class="clearfix"></div>
        
      {*  {$menu|var_dump}*}
        
</div>
