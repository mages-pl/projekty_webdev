<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SitemapClass extends SimpleXMLElement {

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

class mj_sitemap extends Module {

    //  Inicjalizacja
    public function __construct() {
        $this->name = 'mj_sitemap';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('MJ Sitemap Generator');
        $this->description = $this->l('Dynamicznie tworzy XML mapy strony');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install() {
        parent::install();

       Configuration::updateValue('url_sitemap_xml', Tools::getHttpHost(true).__PS_BASE_URI__.'modules/'.$this->name.'/sitemap.xml');
         
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
                    'label' => $this->l('Link do pliku sitemap.xml'),
                    'desc' => $this->l('Wyświetla link do mapy strony'),
                    'size' => '5',
                    'name' => 'url_sitemap_xml',
                    'disabled' => 'disabled',
                    'required' => false,
                ],
                 
            ],
            'submit' => [
                'title' => $this->l('Generuj'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        $form = new HelperForm();

                 $form->token = Tools::getAdminTokenLite('AdminModules');
    $form->currentIndex = Tools::getHttpHost(true).__PS_BASE_URI__.'admin926usohzd/'.AdminController::$currentIndex.'&configure='.$this->name.'&export=1';

    
        $form->tpl_vars['fields_value']['url_sitemap_xml'] = Tools::getValue('url_sitemap_xml', Configuration::get('url_sitemap_xml'));
         
       

        return $form->generateForm($fields_form);
    }

    // Wyswietlenie contentu
    public function getContent() {
        return $this->postProcess() . $this->RenderForm(); //.$this->automateBuildLastProducts();
    }

    public function postProcess() {
        if (Tools::isSubmit('submitAddconfiguration')) :
       
            
             Configuration::updateValue('url_sitemap_xml', 'http://'.Tools::getHttpHost(false).__PS_BASE_URI__.'modules/mj_sitemap/sitemap.xml');
           
        
            $this->cronSitemap();
            
              
  
        endif;
    }

     
    public function cronSitemap() {
         
             
            $xml = new SitemapClass('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" version="1"/>');
 
            
            $sql_cms = "SELECT cms.`id_cms`, lcms.`meta_title`, lcms.`link_rewrite` FROM `ps_cms` cms JOIN `ps_cms_lang` lcms ON cms.`id_cms` = lcms.`id_cms` WHERE cms.`active` = 1";
            
            $result_cms = Db::getInstance()->ExecuteS($sql_cms, 1, 0);
         
          
         foreach($result_cms as $k => $cms) { 
             
             $url = $xml->addChild('url');
             $url->addChild('loc',$this->context->link->getCMSLink($cms['id_cms']));
             $url->addChild('lastmod',date('Y-m-d'));
             $url->addChild('changefreq','daily');
             $url->addChild('priority','1');
             
         }
         
            $sql_category= "SELECT c.`id_category`, c.`active`, cl.`name`, cl.`description`, cl.`link_rewrite`, cl. `meta_title` FROM `ps_category` c JOIN `ps_category_lang` cl ON cl.`id_category` = c.`id_category` WHERE c.`active` = 1";
            
            $result_category = Db::getInstance()->ExecuteS($sql_category, 1, 0);
         
      
            foreach($result_category as $j => $category) { 
             
             $url = $xml->addChild('url');
               
             $url->addChild('loc',$this->context->link->getCategoryLink($category['id_category'], $category['link_rewrite']));
             $url->addChild('lastmod',date('Y-m-d'));
             $url->addChild('changefreq','daily');
             $url->addChild('priority','1');
             
         }
      
         
  $sql_products = "SELECT p.`id_product`, pl.`name`, pl.`link_rewrite` FROM `ps_product` p JOIN `ps_product_lang` pl ON p.`id_product` = pl.`id_product` WHERE p.`active` = 1";
         
          $result_product = Db::getInstance()->ExecuteS($sql_products, 1, 0);
         
          
            foreach($result_product as $product) : 

                $url = $xml->addChild('url');
               
             $url->addChild('loc',$this->context->link->getProductLink($product['id_product'], $product['link_rewrite']));
             $url->addChild('lastmod',date('Y-m-d'));
             $url->addChild('changefreq','daily');
             $url->addChild('priority','1');
             
                
            endforeach;

          $xml->asXML(__DIR__.'/sitemap.xml');

           
            
            Configuration::updateValue('url_sitemap_xml', 'http://'.Tools::getHttpHost(false).__PS_BASE_URI__.'modules/mj_sitemap/sitemap.xml');
              
    }
    
     
}
