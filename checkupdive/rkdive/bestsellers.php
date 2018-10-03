<h1>Polecane produkty</h1>
                    <h2 class="thin">Bestsellery</h2>
                    <div class="row">
                        <?php 
                        
                        $sourceXML = "http://mjendraszczy.nazwa.pl/rkdive/modules/mj_xml_export/xml-export.xml";
                        
                        $getXML = file_get_contents($sourceXML);
                        
                        $showXML = simplexml_load_string($getXML);
                        
                         //print_r($showXML);
                         foreach($showXML as $item) {
                             if($keyu < 4) {  
                             
                             ?>
                        
                        <div class="col-md-3  col-sm-6 col-xs-12 text-center">
                            <a href="<?php echo $item['url']; ?>">
                                <img class="wow bounceIn" src="<?php echo $item->imgs->main['url']; ?>" />
                            <h4 class="product-title thin">
                                <?php
                             echo $item->name.'<br/>';
                             ?>
                            </h4>
                            <div class="price">
                                <?php
                             echo $item['price'].'<br/>';
                             ?>
                            </div> 
                        </a>
                        </div>
                                                     <?php
                             }
                             $keyu++;
                         }
                        ?>
                        <a href="<?php echo shopUrl() ?>" class="btn btn-radius dark" style="color: #fff;margin:30px auto;">
                            Odwiedź nasz sklep
                        </a>
                    </div>