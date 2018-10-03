<?php

class mj_rabaty extends Module { 
    
    public function __construct() {
        
        $this->name="mj_rabaty";
        
        $this->author="Michał Jendraszczyk";
        
        $this->tab="other";
        
        $this->version="1.0";
        
        
        parent::__construct();
        
        $this->displayName=$this->l("MJ - System rabatowania");
        $this->description=$this->l("Umożliwia efektowne wyświetlenie ostatniego aktywnego rabatu dla klienta");
        
        $this->confirmUninstall= $this->l("Usunąć ? ");
        
        $this->bootstrap = true;
        
    }
    // Instaluj
    public function install() { 
 
        parent::install();
        
        Configuration::get('numer_rabatu','');
        
        return true;
        
    }
    // Deinstaluj
    public function uninstall() { 
        return parent::uninstall();
    }
    
    // Backend 
    public function getContent() {
        
        return $this->RenderForm();
    }
    
    // Przeslanie forma 
    public function postProccess()  {
        
       
    }
    
    //
    // IDEA, JEŚLI NIE MA ZDEFINIOWANEGO ID RABATU KTÓRY MA SIĘ POJAWIAĆ LOSUJ DOWOLNY KTÓRY JEST AKTYWNY I WAŻNY 
    //  JEŚLI JEST ZDEFINIOWANY TO DAWAJ TYLKO TEN KONKRETNY DLA KLIENTA
    //  (c) Michał Jendraszczyk
    //
    
    
    
    // Wyglad forma
    public function RenderForm() { 
        
        $fields_form[0]['form'] = [
            
            'legend'=> [
                'title' => $this->l('Ustawienia')
            ],
            'input' => [
                 [
                    'label' => $this->l('ID Rabatu'),
                    'type' => 'text',
                     'size' => '5',
                     'name' => 'numer_rabatu'
                 ],
//                [
//                    
//                ]
            ],
            'submit' => [
                'title' => $this->l("Zapisz"),
                'class' => 'btn btn-default pull-right'
            ]
            ];
        
        $form =  new HelperForm();
        
        $form->tpl_vars['fields_value']['numer_rabatu'] = Tools::getValue('numer_rabatu', Configuration::get("numer_rabatu"));
        
        
        
        return $form->generateForm($fields_form);
    }
    
    public function hookDisplayWrapperBottom() { 
        
         $sql = "SELECT * FROM "._DB_PREFIX_."cart_rule WHERE active = '1' AND priority = '1' ORDER BY id_cart_rule DESC LIMIT 1";
     // AND date_to < '".date('Y-m-d H:i:s')."'
         
         $results = Db::getInstance()->ExecuteS($sql, 1, 0);

         global $smarty;
         
       foreach($results as $result) :
//             //$results
              $smarty->assign('rabat_kod', $result['code']);
              $smarty->assign('rabat_wazny', $result['date_to']);
              $smarty->assign('rabat_dostawa', $result['free_shipping']);
              $smarty->assign('rabat_dyskont', $result['reduction_percent']);
 //reduction_percent          
           endforeach;
  
             
        
        return $this->display(__FILE__, 'mj_rabaty.tpl');
    }
    
}