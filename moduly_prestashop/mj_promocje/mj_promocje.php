<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mj_promocje extends Module
{
    //  Inicjalizacja
    public function __construct()
    {
        $this->name = 'mj_promocje';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Automatyczne ustawianie promocji');
        $this->description = $this->l('Automatyczne ustawianie produktów z dyskontem w Promocjach');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install()
    {
        parent::install();

        Configuration::updateValue("id_promo_cat", "36");
        
        
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
                [
                    'type' => 'text',
                    'label' => $this->l('ID kategorii z promocjami'),
                    'size' => '5',
                    'name' => 'id_promo_cat',
                    'required' => true,
                ],
               
                 
            ],
            'submit' => [
                'title' => $this->l('Automatyzuj'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        
         
        
        $form = new HelperForm();
 
          $form->tpl_vars['fields_value']['id_promo_cat'] = Tools::getValue('id_promo_cat', Configuration::get("id_promo_cat"));
       

        
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
            
            
           Configuration::updateValue("id_promo_cat",Tools::getValue("id_promo_cat"));
         
        $this->automateBuildPromotions();
       
  
          
        // return "ok".Configuration::get('me_xml_url');
         //return 'XML'.print_r($produktTab);
        endif;
    }

   public function automateBuildPromotions()
    { 
       
     
        // ROZPOCZYNAMY ALGORYTM
        // TEORIA:
        // Wybieramy wszystkie produkty z kategorii promocje
        // Czyścimy promocje 
        // Wybieramy wszystkie produkty które mają dyskont
        // tym produktom aktualizujemy kategorię na ID KAT Promocja
        // 
         
       
        $category_id = Configuration::get('id_promo_cat');

        $base_lang = '1';

        $pobierzKatagoriePromocje = 'SELECT * FROM '._DB_PREFIX_.'category_product WHERE id_category = '.Configuration::get('id_promo_cat').''; // uzun wszystkie produkty z kategorii

        $results = Db::getInstance()->ExecuteS($pobierzKatagoriePromocje, 1, 0);

        if (count($results) > 0)  : // Jeżeli cokolwiek się znajduje w tej kategorii to usuwaj 

            $deleteAllProductFromPromocje = 'DELETE FROM '._DB_PREFIX_.'category_product WHERE id_category = '.Configuration::get('id_promo_cat').'';

        $resultsDelete = Db::getInstance()->Execute($deleteAllProductFromPromocje, 1, 0);

        endif;
        
        // OK mamy czystą kategorie promocje, teraz wybierz prdukty ktore maja dyskont i przypisz je 

        $setAssocProductPromotion = 'SELECT * FROM `'._DB_PREFIX_.'specific_price` WHERE ps_specific_price.to >= "'.date('Y-m-d H:i:s').'" OR ps_specific_price.to = "0000-00-00 00:00:00"';

        $resultsProductsPromotion = Db::getInstance()->ExecuteS($setAssocProductPromotion, 1, 0);

        foreach ($resultsProductsPromotion as $key => $addProduct) :

                     $addOneProduct = 'INSERT INTO '._DB_PREFIX_.'category_product (id_category,id_product, position) VALUES ('.Configuration::get('id_promo_cat').','.$addProduct['id_product'].','.$key.')'; // dodawaj iteracyjnie nowe rekordy z produktami

        $resultAddProduct = Db::getInstance()->Execute($addOneProduct, 1, 0);

        endforeach;

         //  return var_dump($resultsLast30DaysProducts);
    }

     
}

