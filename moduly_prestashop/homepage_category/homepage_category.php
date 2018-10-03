<?php

class homepage_category extends Module {

    function __construct() {
        $this->name = "homepage_category";
        $this->tab = "other";
        $this->version = "1.1";
        $this->author = "Michał Jendraszczyk";

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l("Homepage Category");

        $this->displayDescription = $this->l("Display categories on homepage");

        $this->ConfirmUninstall = $this->l("Are you sure you want to uninstall?");

        $this->module_key = 'ddd6142b63cb185868d4c97060155b66';
    }

// instalacja

    public function install() {
        parent::install();

        if (!$this->registerHook('Home'))
            return false;

    
        Configuration::updateValue("homepage_category__parent", " ");
        Configuration::updateValue("homepage_category__children", "0");
        
        return true;
    }

//uzyskanie contentu
    public function postProcess() {

        if (Tools::isSubmit("submitAddconfiguration")) {

            $this->_clearCache('homepage_category.tpl');

 
            Configuration::updateValue("homepage_category__parent", Tools::getValue("homepage_category__parent"));

            Configuration::updateValue("homepage_category__children", Tools::getValue('homepage_category__children'));
 

            return $this->displayConfirmation($this->l("Save changes"));
            $this->hookHome();
           
        }
        return '';
    }

    public function getContent() {

        // return $this->displayConfirmation($this->l("Save successfully")) . $this->renderForm();
        return $this->postProcess() . $this->renderForm();
    }

    public function renderForm() {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                      array(
                        'name' => 'homepage_category__parent',
                        'type' => 'text',
                        'label' => 'Id parent category',
                        'desc' => 'Set ID parent category'
                    ),
                    array(
                        'name' => 'homepage_category__children',
                        'type' => 'text',
                        'label' => 'Get children categories',
                        'desc' => 'List children categories'
                    ),
               
                ),
                'submit' => array(
                    'title' => $this->l('Save')
                )
            )
        );

        $helper = new HelperForm();
 
        $helper->table = $this->table;
        $helper->module = $this;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;

        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;


        $this->fields_form = array();
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->submit_action = 'submitAddconfiguration';
        $helper->tpl_vars = array(
            'fields_value' => array(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

     
        $helper->tpl_vars['fields_value']['homepage_category__parent'] = Tools::getValue('homepage_category__parent', Configuration::get("homepage_category__parent"));
        $helper->tpl_vars['fields_value']['homepage_category__children'] = Tools::getValue('homepage_category__children', Configuration::get("homepage_category__children"));


        return $helper->generateForm(array($fields_form));
    }

 

    public function hookHome() {
        
        global $smarty;

       // $sql = "SELECT * FROM `"._DB_PREFIX_."category` c INNER JOIN "._DB_PREFIX_."ps_scene_category cs ON WHERE `c.id_parent` = `1`"; //AND `c.id_category` = `` 
        //   $sql = "SELECT * FROM `"._DB_PREFIX_."category` c INNER JOIN "._DB_PREFIX_."ps_category_lang cl ON WHERE `c.id_parent` = `1` AND `c.id_category` = `cl.id_category` AND `cl.id_lang` = `6`"; //AND `c.id_category` = `` 
          // $sql = "SELECT * FROM `"._DB_PREFIX_."category` WHERE `id_parent` = '1'"; //AND `c.id_category` = `` // rightly
          
          // $sql = "SELECT * FROM "._DB_PREFIX_."category JOIN "._DB_PREFIX_."category_lang ON "._DB_PREFIX_."category.id_category = "._DB_PREFIX_."category_lang.id_category WHERE "._DB_PREFIX_."category.id_parent = '".Configuration::get("homepage_category__parent")."' AND "._DB_PREFIX_."category.active = '1' AND "._DB_PREFIX_."category_lang.id_lang = '1' "; //AND `c.id_category` = `` // rightly
//--         
//$sql = "SELECT * FROM "._DB_PREFIX_."category c JOIN "._DB_PREFIX_."category_lang cl ON c.`"._DB_PREFIX_."category`.id_category = cl.`"._DB_PREFIX_."category_lang`.id_category WHERE c.`"._DB_PREFIX_."category`.id_parent = '".Configuration::get("homepage_category__parent")."'";
        
          $sql = "SELECT * FROM `"._DB_PREFIX_."category` c JOIN `"._DB_PREFIX_."category_lang` cl ON c.`id_category` = cl.`id_category` WHERE c.`id_parent` = '".Configuration::get("homepage_category__parent")."' AND c.`active` = '1' AND cl.`id_lang` = '1' ";
        
         
         $result = Db::getInstance()->executeS($sql);
$tab_id = array();
$tab_name = array();
$tab_opis = array();
$tab_url = array();
$tab_img = array();
$tab_qty = array();

        foreach($result as $row) :
            $id_kategori = $row['id_category'];
        
      $sqlQtyProdFromCat = "SELECT COUNT(*) FROM `"._DB_PREFIX_."category_product` cp JOIN `"._DB_PREFIX_."product` p ON p.`id_product` = cp.`id_product` JOIN `"._DB_PREFIX_."category` c ON p.`id_category_default` = c.`id_category` WHERE (cp.`id_category` = ".$id_kategori.")"; //OR p.`id_category_default` = ".$id_kategori."
  
  
  
//SELECT * FROM ps_category_product cp JOIN ps_product p ON p.id_product = cp.id_product WHERE cp.id_category = 6 AND p.active = 1  
        $resultQty = Db::getInstance()->executeS($sqlQtyProdFromCat);
           
           //$ilosc_produktow = $resultQty;
           
            $nazwa_kategori = $row['name'];
            $opis_kategori = $row['description'];
            $url_kategori = $row['link_rewrite'];
            $img_kategori = "img/c/".$row['id_category'].'.jpg'; //_PS_IMG_DIR_.
            
            
            
array_push($tab_id,$id_kategori);
array_push($tab_name,$nazwa_kategori);
array_push($tab_opis,$opis_kategori);
array_push($tab_url,$url_kategori);

array_push($tab_img, $img_kategori);


 array_push($tab_qty,$resultQty);
//var_dump($resultQty);
 



        endforeach;
        
        
        $smarty->assign('homepage_category__parent', Configuration::get("homepage_category__parent"));
        $smarty->assign('homepage_category__children', Configuration::get("homepage_category__children"));
        
         $smarty->assign('homepage_category_array', [
           $tab_id,
             $tab_name,
             $tab_opis,
             $tab_url,
             $tab_img,
             $tab_qty
//             var_dump($tab_url),
//               var_dump($tab_img)
             
            //   array_reverse
         ]);
         
         
        $qtyProductsFromCat = fopen(_PS_MODULE_DIR_.'homepage_category/results.json', 'w');
        fwrite($qtyProductsFromCat, json_encode($tab_id));
        fclose($qtyProductsFromCat);


         $smarty->assign("homepage_category_id",$tab_id);
         
//         $json = file_get_contents('http://mjendraszczy.nazwa.pl/stylowatorba/3-dla-niej');
//var_dump(json_encode($json));

         
         $smarty->assign("homepage_category_prodQty",$tab_qty);
         
         
//         $smarty->assign("homepage_category_name",$tab_name);
//         $smarty->assign("homepage_category_opis",$tab_opis);
//         $smarty->assign("homepage_category_url",$tab_url);
//          $smarty->assign("homepage_category_img",$tab_img);
    
         $smarty->assign('is_https', (array_key_exists('HTTPS', $_SERVER) && $_SERVER['HTTPS'] == "on" ? 1 : 0));

        $smarty->assign("main_url", $this->context->link->getPageLink('/', true));

        return $this->display(__FILE__, "homepage_category.tpl");
    }

 

// delete func

    public function uninstall() {

        return parent::uninstall();
    }

}

?>
