<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class nowosci_mj extends Module
{
    //  Inicjalizacja
    public function __construct()
    {
        $this->name = 'nowosci_mj';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Cykliczne Nowości');
        $this->description = $this->l('Automartycznie grupuje nowe produkty do kategorii nowości');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install()
    {
        parent::install();

        if (!$this->registerHook('displayHome')) :
            return false;
        endif;

        Configuration::updateValue('nr_kategorii', '38');

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
                    'label' => $this->l('Numer kategorii'),
                    'size' => '5',
                    'name' => 'nr_kategorii',
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->l('Zapisz'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        $form = new HelperForm();

        $form->tpl_vars['fields_value']['nr_kategorii'] = Tools::getValue('nr_kategorii', Configuration::get('nr_kategorii'));

        return $form->generateForm($fields_form);
    }

    // Wyswietlenie contentu
    public function getContent()
    {
        return $this->postProcess().$this->RenderForm().$this->automateBuildLastProducts();
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitAddconfiguration')) :
            $this->_clearCache('mjproducts.tpl');

        Configuration::updateValue('nr_kategorii', Tools::getValue('nr_kategorii'));
        // Configuration::updateValue('ilosc_produktow', Tools::getValue('ilosc_produktow'));

        // return 'ok';
        endif;
    }

    public function automateBuildLastProducts()
    {
        // ROZPOCZYNAMY ALGORYTM
        // TEORIA: POBIERAMY NR KATEGORII I JEZYK
        // POBIERAMY PRODUKTY Z KATEGORII
        // SPRAWDZAMY CZY COKOLWIEK JEST W NOWOSCIACH
        // USUWAMY WSZYSTKO
        // WYBIERAMY PRODUKTY SPRZED 30 OSTATNICH DNI   //date_add
        // SPROWADZAMY ID PRODUKTOW DO TABLICYI DODAJEMY JE DO TABELI KATEGORII Z POZYCJA INKREMENTACYJNA

        $category_id = Configuration::get('nr_kategorii');

        $base_lang = '1';

        $getCategoryProduct = 'SELECT * FROM '._DB_PREFIX_.'category_product WHERE id_category = '.Configuration::get('nr_kategorii').''; // uzun wszystkie produkty z kategorii

        $results = Db::getInstance()->ExecuteS($getCategoryProduct, 1, 0);

        if (count($results) > 0)  :

            $deleteAllProductFromNowosci = 'DELETE FROM '._DB_PREFIX_.'category_product WHERE id_category = '.Configuration::get('nr_kategorii').'';

        $resultsDelete = Db::getInstance()->Execute($deleteAllProductFromNowosci, 1, 0);

        endif;

        $selectLast30DaysProducts = 'SELECT * FROM '._DB_PREFIX_.'product WHERE date_add >= "'.date('Y-m-d H:i:s', strtotime('-30 days')).'"';

        $resultsLast30DaysProducts = Db::getInstance()->ExecuteS($selectLast30DaysProducts, 1, 0);

        foreach ($resultsLast30DaysProducts as $key => $addProduct) :

                     $addOneProduct = 'INSERT INTO '._DB_PREFIX_.'category_product (id_category,id_product, position) VALUES ('.Configuration::get('nr_kategorii').','.$addProduct['id_product'].','.$key.')'; // dodawaj iteracyjnie nowe rekordy z produktami

        $resultAddProduct = Db::getInstance()->Execute($addOneProduct, 1, 0);

        endforeach;

         //  return var_dump($resultsLast30DaysProducts);
    }

    // public function hookHome()
    // {

    // }
}
