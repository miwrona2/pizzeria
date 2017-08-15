<?php
App::uses('AppModel', 'Model');
App::uses('CakeSession', 'Model/Datasource');

class Thing extends AppModel {

    public $useTable = false; 
    
    public function addProduct($productId) {
            $allProducts = $this->readProduct();
            if (null!=$allProducts) {
                    if (array_key_exists($productId, $allProducts)) {
                            $allProducts[$productId]++;
                    } else {
                            $allProducts[$productId] = 1;
                    }
            } else {
                    $allProducts[$productId] = 1;
            }
            $this->saveProduct($allProducts);
            //print_r($allProducts);
                    //$tuPodajeArray= array('klucz1'=>$this->getCount(), 'klucz2'=>$item_name);
           //$this->saveArray($tuPodajeArray);
            //return ($tuPodajeArray);
    }

    public function getCount() {
            $allProducts = $this->readProduct();

            if (count($allProducts)<1) {
                    return 0;
            }

            $count = 0;
            foreach ($allProducts as $product) {
                    $count=$count+$product;
            }
            return $count;
    }

    /*
     * save data to session
     */
    public function saveProduct($data) {
            return CakeSession::write('cart',$data);
    }
    
    public function saveArray($array) {
            return CakeSession::write('cart',$array);
    }

    /*
     * read cart data from session
     */
    public function readProduct() {
            return CakeSession::read('cart');
    }
        
    public function clearSessionInModel() {
            return CakeSession::delete('cart');
    }
}
