<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mj_disable_prod extends Module
{
    //  Inicjalizacja
    public function __construct()
    {
        $this->name = 'mj_disable_prod';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Automatyczne wyłączanie produktów');
        $this->description = $this->l('Automatyczne wyłączanie niedostępnych produktów');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install()
    {
        parent::install();

      //  Configuration::updateValue("id_promo_cat", "36");
        
        
        return true;
    }

    // Deinstalacja
    public function uninstall()
    {
        return parent::uninstall();
    }

    // Budowanie formularza
    public function RenderForm()
    {
         
        $fields_form[0]['form'] = [
            'legend' => [
                'title' => $this->l('Settings'),
            ],
            'input' => [
//                [
//                    'type' => 'text',
//                    'label' => $this->l('ID kategorii z promocjami'),
//                    'size' => '5',
//                    'name' => 'id_promo_cat',
//                    'required' => true,
//                ],
               
                 
            ],
            'submit' => [
                'title' => $this->l('Automatyzuj'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        
         
        
        $form = new HelperForm();
 
         // $form->tpl_vars['fields_value']['id_promo_cat'] = Tools::getValue('id_promo_cat', Configuration::get("id_promo_cat"));
       

        
        return $form->generateForm($fields_form);
    }

    // Wyswietlenie contentu
    public function getContent()
    {
        return $this->postProcess().$this->RenderForm();
    }

    public function postProcess()
    {
          
        if (Tools::isSubmit('submitAddconfiguration')) :
         //return "gdfgfd";   
         return  $this->automateDisableProducts();  
       //    Configuration::updateValue("id_promo_cat",Tools::getValue("id_promo_cat"));
         
      
        
        
       
        // return "ok".Configuration::get('me_xml_url');
         //return 'XML'.print_r($produktTab);
        endif;
    }

   public function automateDisableProducts()
    { 
 
       
        $base_lang = '1';

        
        
         
        
        
                $WybierzProduktyNiedostepne  =  "SELECT * FROM ps_stock_available"; // uzun wszystkie produkty z kategorii

//        $UstawProduktyNiedostepne = 'UPDATE `'._DB_PREFIX_.'product` p SET p.`active` = "0" WHERE p.`id_supplier` = "4" AND p.`quantity` = "0"'; 
       

        $results = Db::getInstance()->ExecuteS($WybierzProduktyNiedostepne, 1, 0);
            $c = '';
        foreach($results as $key=>$result) : 
            
            if($result['quantity'] == '0') {
            $c .= $key." QTY:".$result['id_product']."+".$result['quantity']."<br/>";
                $UstawProduktyNiedostepne = "UPDATE ps_product SET ps_product.visibility = 'none', ps_product.available_for_order = '1' WHERE ps_product.id_product = ".$result['id_product']." AND ps_product.id_supplier = "; 
        
            $wynik = Db::getInstance()->execute($UstawProduktyNiedostepne,1,0);
            
                $UstawProduktyShopNiedostepne = "UPDATE ps_product_shop SET ps_product_shop.visibility = 'none' WHERE ps_product_shop.id_product = ".$result['id_product']." "; 
        
            $wynikProduktyShop = Db::getInstance()->execute($UstawProduktyShopNiedostepne,1,0);
            
            }
       else {
               $UstawProduktyNiedostepne = "UPDATE ps_product SET ps_product.visibility = 'both', ps_product.active = '1', ps_product.available_for_order = '1' WHERE ps_product.id_product = ".$result['id_product']." "; 
        
            $wynik = Db::getInstance()->execute($UstawProduktyNiedostepne,1,0);
        
                $UstawProduktyShopNiedostepne = "UPDATE ps_product_shop SET ps_product_shop.visibility = 'both' WHERE ps_product_shop.id_product = ".$result['id_product']." "; 
        
            $wynikProduktyShop = Db::getInstance()->execute($UstawProduktyShopNiedostepne,1,0);
              
       }
        
//       Tools::clearSmartyCache();
//        Tools::clearXMLCache();
//        Media::clearCache();
//            
        endforeach;
        //return "fgdgd".$c;
        
      // return var_dump($results);
         //  return var_dump($resultsLast30DaysProducts);
    }

     
}

