<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mj_wielowariantowosc extends Module {

    //  Inicjalizacja
    public function __construct() {
        $this->name = 'mj_wielowariantowosc';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Wielowariantowość');
        $this->description = $this->l('Masowe ustawianie wielowariantowośći w produktach');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install() {
        parent::install();

        //  Configuration::updateValue("id_promo_cat", "36");


        return true;
    }

    // Deinstalacja
    public function uninstall() {
        return parent::uninstall();
    }

    // Budowanie formularza
    public function RenderForm() {

        $fields_form[0]['form'] = [
            'legend' => [
                'title' => $this->l('Settings'),
            ],
            'input' => [
                [
                    'type' => 'textarea',
                    'label' => $this->l('ID produtów, które mają być powiązane'),
                    'size' => '5',
                    'name' => 'id_products_tab',
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->l('Automatyzuj'),
                'class' => 'btn btn-default pull-right',
            ],
        ];



        $form = new HelperForm();

 
        return $form->generateForm($fields_form);
    }

    // Wyswietlenie contentu
    public function getContent() {
        return $this->postProcess() . $this->RenderForm();
    }

    public function postProcess() {

        if (Tools::isSubmit('submitAddconfiguration')) :

            
             return $this->initWielowariantowosc();

        endif;
    }

    public function initWielowariantowosc() {

         
        $IdTab = explode(",",Tools::getValue('id_products_tab'));
  
//750,751,752
        
        if(count($IdTab) > 1) {
        for ($j = 0; $j < count($IdTab); $j++) :

            for ($i = 0; $i < count($IdTab); $i++) :
 
                 $addOneProduct = 'INSERT INTO ps_accessory (id_product_1,id_product_2) VALUES (' . $IdTab[$j] . ',' . $IdTab[$i] . ')';
                // dodawaj iteracyjnie nowe rekordy z łączeń produktów
                 $resultAddProduct = Db::getInstance()->Execute($addOneProduct, 1, 0);

            endfor;

        endfor;
        }
    }

}
