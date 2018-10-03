<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mj_api_product extends Module
{
    //  Inicjalizacja
    public function __construct()
    {
        $this->name = 'mj_api_product';
        $this->tab = 'other';
        $this->version = '1.0';
        $this->author = 'Michał Jendraszczyk';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('API Produktów GA');
        $this->description = $this->l('Automatyczne dodawanie produktów z xml');

        $this->confirmUninstall = $this->l('Usunąć moduł?');
    }

    //  Instalacja
    public function install()
    {
        parent::install();


//        Configuration::updateValue("ge_xml_url", "");
//        Configuration::updateValue("ge_log_import", "");
       
        
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
         $log = "tests\ntest2\ntest3"; 
         
        $fields_form[0]['form'] = [
            'legend' => [
                'title' => $this->l('Settings'),
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->l('Link do pliku XML zgodnego z CENEO'),
                    'size' => '5',
                    'name' => 'ga_api_xml_url',
                    'required' => true,
                ],
//                [
//                    'type' => 'textarea',
//                    'label' => $this->l('Logi importu'),
//                    'size' => '5',
//                    'name' => 'ga_log_import',
//                    'required' => false,
//                    'readonly' => 'readonly'
//                ],
                 
            ],
            'submit' => [
                'title' => $this->l('Dodaj produkty'),
                'class' => 'btn btn-default pull-right',
            ],
        ];
        
         
        $form = new HelperForm();

        
         $form->token = Tools::getAdminTokenLite('AdminModules');
    $form->currentIndex = Tools::getHttpHost(true).__PS_BASE_URI__.'admin926usohzd/'.AdminController::$currentIndex.'&configure='.$this->name.'&import=1';

    
           $form->tpl_vars['fields_value']['ga_api_xml_url'] = Tools::getValue('ga_api_xml_url', Configuration::get("ga_api_xml_url"));
//           $form->tpl_vars['fields_value']['ga_log_import'] = Configuration::get("ga_log_import");
//       

        
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
            
                 Configuration::updateValue('ga_api_xml_url', Tools::getValue('ga_api_xml_url'));
           
         
        return $this->cronAPIProduct();
        
        endif; 
    }

    public function cronAPIProduct() {
             
   $log = 'PA: ';
        $url = Configuration::get('ga_api_xml_url');
        $xml = simplexml_load_file($url);
  
        $produktyTab = []; // lista 
        
        
         foreach($xml->children()->children() as $dx => $item) { 
              
             //Znajdz produkt w bazie o referencji tej z xml
             $find_product = "SELECT * FROM `"._DB_PREFIX_."product` p WHERE p.`reference` = '".($item['id']->__toString())."' AND p.`id_supplier` = '4' "; //AND p.`id_supplier` = '4'
                  
             // Wykonaj zapytanie
              $checkProduct = Db::getInstance()->ExecuteS($find_product,1,0);
              
              // Jesli znalazl produkt w bazie to nie rob nic
             if(count($checkProduct) != 0) { 
             } 
             // W przeciwnym razie dodaj produkt 
             else {
            
                 $wyklucz = array(";", "&", "&amp;","&#039;","'","#","&amp;&amp;");
            
                 if((strlen($item['id']) <= 32) && ((int)$item['stock'] > 0)) {
$product = new Product();
$product->ean13 = '';
$product->name = array((int)Configuration::get('PS_LANG_DEFAULT') =>  str_replace($wyklucz, "", $item->name) );
$product->id_category = 2;
$product->link_rewrite = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', str_replace($wyklucz, "", $item->name))));
$product->reference = $item['id'];
$product->description = '';
$product->description_short = $item->desc;
$product->id_category_default = 2;
$product->redirect_type = '404'; 
$product->price = ($item['price']*1.7);
$product->quantity = (int)$item['stock'];
$product->minimal_quantity = 1;
$product->show_price = 1;
$product->on_sale = 0;
$product->active = 1;
$product->condition = 'new';
$product->online_only = 0;
$product->meta_keywords = '';
$product->is_virtual=0;
$product->id_supplier=4;
$product->add();



  $id_product_supplier = ProductSupplier::getIdByProductAndSupplier((int)$product->id, 0, (int)$product->id_supplier);
    if ($id_product_supplier)
        $product_supplier = new ProductSupplier((int)$id_product_supplier);
    else
        $product_supplier = new ProductSupplier();

    $product_supplier->id_product = $product->id;
    $product_supplier->id_product_attribute = 0;
    $product_supplier->id_supplier = $product->id_supplier;
    $product_supplier->product_supplier_price_te = $product->wholesale_price;
    $product_supplier->product_supplier_reference = $product->supplier_reference;
    $product_supplier->save();

////Add  main product image

    $id_product = $product->id;
    $shops = Shop::getShops(true, null, true);    
     
    for($di=0;$di<count($item->imgs->i)+1;$di++) {
         if($di == 0) { 
    $url = $item->imgs->main[$di]['url'];        
         } 
         if($di > 0) {
     $url = $item->imgs->i[$di]['url'];        
         }
    
    $image = new Image();
    $image->id_product = $id_product;
    $image->position = Image::getHighestPosition($id_product) + 1;
    
    $image->cover = $di==0 ? true : false; // or false;
    
    if (($image->validateFields(false, true)) === true &&
    ($image->validateFieldsLang(false, true)) === true && $image->add())
    {
        $image->associateTo($shops);
        if (!AdminImportController::copyImg($id_product, $image->id, $url, 'products', true)) // or false if you dont want regenerate
        {
            $image->delete();
        } 
    }
    }

    for($df=0;$df<count($item->attrs->a);$df++) {
        if($item->attrs->a[$df]['name'] == "Materiał") {
           $item->attrs->a[$df]['name'] = "Materiał dominujący";
        }
        if($item->attrs->a[$df]['name'] == "Kolor") {
           $item->attrs->a[$df]['name'] = "Kolor dominujący";
        }
    $id_feature = (int)Feature::addFeatureImport($item->attrs->a[$df]['name'], '');
    $id_feature_value = (int)FeatureValue::addFeatureValueImport($id_feature,$item->attrs->a[$df], $id_product, 1, "");
     
    $product->addFeatureProductImport($product->id, $id_feature, $id_feature_value);
  
    }    
               //  $log .= 'ID: '.$item['id'].' Name: '.$item->name.' IMG '.$item->imgs->main['url'].' ATTR '.$item->attrs->a[0]['name'].':'.$item->attrs->a[0].'|'.$item->attrs->a[1]['name'].' t:'.$item->attrs->a[1].'+ '.count($checkProduct).'&-'.count($item->attrs->a).'<br/>';
                 
             }
             }
         }  
         return 'LOGI:'.$log;
 
    }
}
