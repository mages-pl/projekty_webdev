<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mjproducts extends Module
{
    //  Inicjalizacja
    public function __construct()
    {
        $this->name = 'mjproducts';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Feature products on homepage');
        $this->description = $this->l('Wyświetla produkty tygodnia');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install()
    {
        parent::install();

        if (!$this->registerHook('displayHome')) :
            return false;
        endif;

        Configuration::updateValue("nr_kategorii", "0");
        Configuration::updateValue("ilosc_produktow", "3");
        
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
                [
                    'type' => 'text',
                    'label' => $this->l('Ilość produktów'),
                    'size' => '5',
                    'name' => 'ilosc_produktow',
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->l('Zapisz'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        $form = new HelperForm();

          $form->tpl_vars['fields_value']['nr_kategorii'] = Tools::getValue('nr_kategorii', Configuration::get("nr_kategorii"));
        $form->tpl_vars['fields_value']['ilosc_produktow'] = Tools::getValue('ilosc_produktow', Configuration::get("ilosc_produktow"));

        
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
            $this->_clearCache('mjproducts.tpl');
        
            Configuration::updateValue("nr_kategorii", Tools::getValue("nr_kategorii"));
                  Configuration::updateValue("ilosc_produktow", Tools::getValue("ilosc_produktow"));
       
       // return 'ok';
        endif;
    }

    // Get products from category
//    public function getProductsFromCategory()
//    {
//        $sql = 'SELECT * FROM '._DB_PREFIX_.'product INNER JOIN ps_product_lang ON ps_product_lang.id_product = ps_product.id_product INNER JOIN ps_category_product ON ps_category_product.id_product = ps_product.id_product INNER JOIN ps_image ON ps_image.id_product = ps_product.id_product WHERE ps_image.cover = 1 AND ps_category_product.id_category = '.Configuration::get("nr_kategorii").' ORDER BY ps_product.id_product DESC  LIMIT '.Configuration::get("ilosc_produktow").'';
//
//        $results = Db::ExecuteS($sql);
//
//        $produkty = [];
//
//        foreach ($results as $result) :
//
//            array_push($produkty, $result['id_product']);
//
//        $i = 0;
//
//        $link = new Link();
//
//        while ($i < count($produkty)) :
//                $product = new Product($produkty[$i], false, Context::getContext()->language->id);
//
//        ++$i;
//        endwhile;
//
//        array_push($produkty, $product);
//
//        endforeach;
//
//        return $produkty;
//    }

    public function hookHome()
    {
        $category_id =  Configuration::get("nr_kategorii");
        $ilosc_produktow =  Configuration::get("ilosc_produktow");
        $base_lang = '1';

        $sql = 'SELECT * FROM '._DB_PREFIX_.'product INNER JOIN ps_product_lang ON ps_product_lang.id_product = ps_product.id_product INNER JOIN ps_category_product ON ps_category_product.id_product = ps_product.id_product INNER JOIN ps_image ON ps_image.id_product = ps_product.id_product WHERE ps_image.cover = 1 AND ps_category_product.id_category = '.$category_id.' AND ps_product_lang.id_lang = '.$base_lang.' ORDER BY ps_product.date_upd DESC  LIMIT '.$ilosc_produktow.''; //ORDER BY ps_product.id_product DESC
        //$sql = 'SELECT * FROM `ps_product`  LIMIT 3';

        $results = Db::getInstance()->ExecuteS($sql, 1, 0);

        $produkty = [];
        $products = [];
        $covers = [];
        $i = 0;
        foreach ($results as $k => $result) :

            array_push($produkty, $result['id_product']);

        $link = new Link();

        while ($i < count($produkty)) :

                $product = new Product($produkty[$i], false, Context::getContext()->language->id);
        $images = Product::getCover($produkty[$i]);

        ++$i;

        endwhile;

        array_push($products, $product);
        array_push($covers, $images);

        endforeach;

        global $smarty;
        $smarty->assign('produkty2', $results);
        $smarty->assign('produkty', $products);
        $smarty->assign('covers', $covers);
        $smarty->assign('id_kategorii',Configuration::get("nr_kategorii"));
        $smarty->assign('ilosc_produktow',Configuration::get("ilosc_produktow"));

        //       $smarty->assign('produkty', $produkty);
        //return var_dump($results);
        return $this->display(__FILE__, 'mjproducts.tpl');
    }
}
