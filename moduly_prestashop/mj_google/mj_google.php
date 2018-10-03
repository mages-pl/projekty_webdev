<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GoolgeSimpleXMLElement extends SimpleXMLElement {

    public function addChildWithCData($name, $value) {
        $new = parent::addChild($name);


        $base = dom_import_simplexml($new);

        $docOwner = $base->ownerDocument;
        $base->appendChild($docOwner->createCDATASection($value));
    }

    public function getCDataWithAttr($name, $value, $attr_name, $attr_val) {
        $element = parent::addChild($name);

        $element->addAttribute($attr_name, $attr_val);

        $generuj_element = dom_import_simplexml($element);


        $docOwner = $generuj_element->ownerDocument;
        $generuj_element->appendChild($docOwner->createCDATASection($value));
    }

}

class mj_google extends Module {

    //  Inicjalizacja
    public function __construct() {
        $this->name = 'mj_google';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Integrator Goolge Data');
        $this->description = $this->l('Generowanie pliku xml dla Google');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install() {
        parent::install();


        Configuration::updateValue("google_xml_dostawca", "");
        Configuration::updateValue("google_xml_url", "");


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
                    'type' => 'text',
                    'label' => $this->l('Link do pliku XML'),
                    'size' => '5',
                    'name' => 'google_xml_url',
                    'disabled' => 'disabled',
                    'required' => true,
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('ID dostawcy'),
                    'size' => '5',
                    'name' => 'google_xml_dostawca',
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->l('Zapisz'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        $form = new HelperForm();

         $form->token = Tools::getAdminTokenLite('AdminModules');
    $form->currentIndex = Tools::getHttpHost(true).__PS_BASE_URI__.'admin926usohzd/'.AdminController::$currentIndex.'&configure='.$this->name.'&export=1';

        
        $form->tpl_vars['fields_value']['google_xml_url'] = Tools::getValue('google_xml_url', Configuration::get("google_xml_url"));
        $form->tpl_vars['fields_value']['google_xml_dostawca'] = Tools::getValue('google_xml_dostawca', Configuration::get("google_xml_dostawca"));



        return $form->generateForm($fields_form);
    }

    // Wyswietlenie contentu
    public function getContent() {
        return $this->postProcess() . $this->RenderForm();
    }

    

    public function postProcess() {
        
        if (Tools::isSubmit('submitAddconfiguration')) :
            // $this->_clearCache('mjproducts.tpl');

            Configuration::updateValue("google_xml_url", Tools::getHttpHost(true).__PS_BASE_URI__.'modules/mj_google/mj-google.xml');
            Configuration::updateValue("google_xml_dostawca", Tools::getValue("google_xml_dostawca"));

           
            
            $this->CronGoogle();

         endif;
    }

    
    public function CronGoogle() {
         
            $sql = "SELECT * FROM ps_product JOIN ps_image_shop ON ps_product.id_product = ps_image_shop.id_product JOIN ps_product_lang ON ps_product.id_product = ps_product_lang.id_product JOIN ps_stock_available ON ps_product.id_product = ps_stock_available.id_product JOIN ps_tax ON ps_product.id_tax_rules_group = ps_tax.id_tax WHERE ps_product_lang.id_lang = 1 AND ps_image_shop.cover = 1 AND ps_product.active = 1 ORDER BY ps_product.id_product"; //WHERE `ps_product.id_supplier` = '3' // or 4 //  AND ps_feature_product.id_feature = '19'
            //AND ps_product.id_supplier = '".Configuration::get('google_xml_dostawca')."'

            $results = Db::getInstance()->ExecuteS($sql, 1, 0);
            
            
            $xml = new GoolgeSimpleXMLElement('<?xml version="1.0"?><rss xmlns:g="http://base.google.com/ns/1.0" version="2.0"/>');
            
            $produkty = $xml->addChild("channel");
            
            
            //
            
            $produkty->addChild("data",date('d-m-Y H:i:s'));
            $produkty->addChild("title",  Configuration::get('PS_SHOP_NAME'));  // set title
            $produkty->addChild("link", iconv("UTF-8", "UTF-8", Tools::getHttpHost(true).__PS_BASE_URI__));
            $produkty->addChild("description", iconv("UTF-8", "UTF-8", 'opis')); //set opis 
            
            //
            
            $getVAT = "SELECT t.`id_tax`, t.`rate` FROM `ps_tax` t WHERE `id_tax` = 1";
            $tax_result = Db::getInstance()->ExecuteS($getVAT, 1, 0);
            
            
            foreach($results as $result) :
                
                if($result['quantity'] > 0) :
                 /* Obrazki podpięte pod url ps */

                $len_img = strlen($result['id_image']);
                $img_path = '';
                $z = 0;
                while ($z < $len_img) {
                    $x = $z;
                    $y = $z + 1;
                    //$img_path .= substr($rows['id_image'],$z,$z+1)."/";
                    $img_path .= substr($result['id_image'], $z, 1) . "/";

                    $z++;
                } 


                $produkt = $produkty->addChild("item");


                $produkt->addChild("g:g:id", $result['id_product']);   
                $produkt->addChildWithCData("g:g:title", Configuration::get('PS_SHOP_NAME') . " " . $result['name'], "", "");
                
                $produkt->addChildWithCData("g:g:description", ucwords(strtolower(iconv("UTF-8", "UTF-8", $result['description_short']))), "", "");


                  $produkt->addChild("g:g:image_link", Tools::getHttpHost(true).__PS_BASE_URI__ . "img/p/" . $img_path . "" . $result['id_image'] . ".jpg");

    
                
                $produkt->addChild("g:g:link", Tools::getHttpHost(true).__PS_BASE_URI__. "?controller=product&amp;id_product=" . $result['id_product']); //."?controller=product&id_product="
                $produkt->addChild("g:g:condition", $result['condition']);

                
                // Ustawianie ilości
                if (intval($result['quantity']) > 1) {
                $result['quantity'] = "in stock";
                } else {
                $result['quantity'] = "out of stock"; 
                }
    
                // koniec ustawiania ilości
    
                $produkt->addChild("g:g:availability", $result['quantity']);
                $produkt->addChild("g:g:gtin", $result['ean13']);
                $produkt->addChildWithCData("g:g:mpn", iconv("UTF-8", "UTF-8", $result['reference']));

                $produkt->addChild("g:g:brand", Configuration::get('PS_SHOP_NAME'));
                
                foreach($tax_result as $tax) :
                $produkt->addChild("g:g:price", number_format(round(($result['price'] * (1 + (round($tax['rate'], 2)) / 100)), 2),2,'.','') . ' PLN');
    
                $dostawa = $produkt->addChild("g:g:shipping");

                $dostawa->addChild("g:g:country","PL");
       
               
                 
                 $dostawa->addChild("g:g:price",number_format(round('14', 2),2,'.','') . ' PLN');
                $dostawa->addChild("g:g:service","Standard");
                endforeach;
                
               endif;
               
            endforeach;
            
             $xml->asXML(__DIR__."/mj-google.xml");
             
           

    }
    
}




