{extends file='page.tpl'}

{block name='page_content_container' prepend}
    

    <section id="content-hook_order_confirmation" class="card">
        {*{$order.products|print_r}*}
      <div class="card-block">
        <div class="row">
          <div class="col-md-12">

              {literal}
     
    <script type="text/javascript">
        console.log("ceneo");
        {/literal}
    ceneo_client_email = '{$customer.email}';
    ceneo_order_id = '{$order.details.reference}';
    ceneo_amount = {number_format($order.totals.total.amount-$order.subtotals.shipping.amount,2,".","")};
    ceneo_shop_product_ids = {foreach $order.products as $product}'#{$product.reference}'{/foreach};
{literal} 
</script>
{/literal}
<script type="text/javascript" src="https://ssl.ceneo.pl/transactions/track/v2/script.js?accountGuid=dd4d8496-29e6-4763-a3da-fa2383c7a8f5"></script>
   
            {block name='order_confirmation_header'}
              <h3 class="h1 card-title">
                <i class="material-icons rtl-no-flip done">&#xE876;</i>{l s='Your order is confirmed' d='Shop.Theme.Checkout'}
              </h3>
            {/block}

            <p>
              {l s='An email has been sent to your mail address %email%.' d='Shop.Theme.Checkout' sprintf=['%email%' => $customer.email]}
              {if $order.details.invoice_url}
                {* [1][/1] is for a HTML tag. *}
                {l
                  s='You can also [1]download your invoice[/1]'
                  d='Shop.Theme.Checkout'
                  sprintf=[
                    '[1]' => "<a href='{$order.details.invoice_url}'>",
                    '[/1]' => "</a>"
                  ]
                }
              {/if}
            </p>

            {block name='hook_order_confirmation'}
              {$HOOK_ORDER_CONFIRMATION nofilter}
            {/block}

          </div>
        </div>
      </div>
    </section>
{/block}

{block name='page_content_container'}
    <div class="col-md-6">
  <section id="content" class="page-content page-order-confirmation card">
    <div class="card-block">
      <div class="row">

        {block name='order_confirmation_table'}
 
            
            <script type="text/javascript" src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>

 
 <script type="text/javascript">
  window.renderOptIn = function() {
    window.gapi.load('surveyoptin', function() {
      window.gapi.surveyoptin.render(
        {
          // REQUIRED FIELDS
          "merchant_id": 122730551,
          "order_id": "{$order.details.reference}",
          "email":  "{$customer.email}",
          "delivery_country": "PL",
          "estimated_delivery_date": "{$order.details.order_date}",

           
        });
    });
  }
</script> 
          {include
            file='checkout/_partials/order-confirmation-table.tpl'
            products=$order.products
            subtotals=$order.subtotals
            totals=$order.totals
            labels=$order.labels
            add_product_link=false
          }
        {/block}

        {block name='order_details'}
          <div id="order-details" class="col-md-4">
            <h3 class="h3 card-title">{l s='Order details' d='Shop.Theme.Checkout'}:</h3>
            <ul>
              <li>{l s='Order reference: %reference%' d='Shop.Theme.Checkout' sprintf=['%reference%' => $order.details.reference]}</li>
              <li>{l s='Payment method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.details.payment]}</li>
              {if !$order.details.is_virtual}
                <li>
                  {l s='Shipping method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.carrier.name]}<br>
                  <em>{$order.carrier.delay}</em>
                </li>
              {/if}
            </ul>
          </div>
        {/block}

      </div>
    </div>
  </section>
    </div>
        
  {block name='hook_payment_return'}
      <div class="col-md-6">
    {if ! empty($HOOK_PAYMENT_RETURN)}
    <section id="content-hook_payment_return" class="card definition-list">
      <div class="card-block">
        <div class="row">
          <div class="col-md-12">
            {$HOOK_PAYMENT_RETURN nofilter}
          </div>
        </div>
      </div>
    </section>
     {/if}
            {block name='customer_registration_form'}
    {if $customer.is_guest}
      <div id="registration-form" class="card">
        <div class="card-block">
          <h4 class="h4">{l s='Save time on your next order, sign up now' d='Shop.Theme.Checkout'}</h4>
          {render file='customer/_partials/customer-form.tpl' ui=$register_form}
        </div>
      </div>
    {/if}
  {/block}
    </div>
  {/block}
  <div class="clearfix"></div>
  

  {block name='hook_order_confirmation_1'}
    {hook h='displayOrderConfirmation1'}
  {/block}

  {block name='hook_order_confirmation_2'}
    <section id="content-hook-order-confirmation-footer">
      {hook h='displayOrderConfirmation2'}
    </section>
  {/block}
{/block}
