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
    public function putItemInSession($id, $itemName, $price, $size) {
                $allItems = $this->readArray();
                $allItems[] = array('id' => $id, 'itemName' => $itemName, 'price' => $price, 'size' => $size);
                $this->saveArray($allItems);   
                //var_dump($allItems[0]['id']);
                //$green = CakeSession::read('array', array('conditions' => array('id')) );
                $green = CakeSession::read('array');
                $policz = count($green);
                
                for($k=0; $k<$policz; $k++){
                        echo '<pre>';
                        var_dump($green[$k]["id"]);
                        $bolean = in_array($id, $green[$k]);
                        var_dump($bolean);
                        echo '</pre>';
                        if ($bolean){
                            return 'hvhufhfahffdsdsd';
                        }else{
                            echo 'szukałem weszędzie i dupa';}
      

                }
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
            return CakeSession::write('array',$array);
    }

    /*
     * read cart data from session
     */
    public function readProduct() {
            return CakeSession::read('cart');
    }
    public function readArray() {
            return CakeSession::read('array');
    }
        
    public function clearSessionInModel() {
            return CakeSession::destroy();
    }
}
