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
                $itemsAmountInCart = count($allItems);
                
                $flag = false;
                //comparison of given id with id's of particular items inside the cart
                for ($i=0; $i<$itemsAmountInCart; $i++) {
                    $itemExistInCart = in_array($id, array($allItems[$i]['id']));
                    if ($itemExistInCart){
                        //item with this id already exist in cart, stop the loop and DON'T ADD this item to cart
                        $flag = true;
                        break;
                    } else {
                        $flag = false;
                        //given id doesn't match to this particular item's id from cart, carry on looping
                    }
                }
                if ($flag == true) {
                    //DON'T ADD this item to cart
                    //launch 'increment' method
                    $this->increment($id);
                    return false;
                } elseif ($flag == false) {
                    //any item from the cart doesn't match to given item so there is no as item in cart 
                    //ADD GIVEN ITEM TO THE CART
                    $allItems[] = array('id' => $id, 'itemName' => $itemName, 'price' => $price, 'size' => $size, 'amount' => 1);
                    $this->saveArray($allItems);    
                    //$true = $this->returnTrue();
                    return true;
                } else {
                    echo 'Undefined $allitems'; 
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
    
    public function increment($par) {
        $tabelaArrayZSesji = $this->readArray();
        
        $itemsAmountInCart = count($tabelaArrayZSesji);       
        for ($i=0; $i<$itemsAmountInCart; $i++) {
            $itemExistInCart = in_array($par, array($tabelaArrayZSesji[$i]['id']));
            if ($itemExistInCart){
                $tabelaArrayZSesji[$i]['amount'] = $tabelaArrayZSesji[$i]['amount']+1;
                $this->saveArray($tabelaArrayZSesji);   
                //break;  
                return $tabelaArrayZSesji[$i]['amount'];
            } else {
                //do nothing
            }
        }
    }
    
    public function decrement($par) {
        $tabelaArrayZSesji = $this->readArray();
        
        $itemsAmountInCart = count($tabelaArrayZSesji);       
        for ($i=0; $i<$itemsAmountInCart; $i++) {
            $itemExistInCart = in_array($par, array($tabelaArrayZSesji[$i]['id']));
            if ($itemExistInCart && ($tabelaArrayZSesji[$i]['amount'] > 0)){
                $tabelaArrayZSesji[$i]['amount'] = $tabelaArrayZSesji[$i]['amount'] - 1;
                $this->saveArray($tabelaArrayZSesji);   
                //break;  
                return $tabelaArrayZSesji[$i]['amount'];
            } 
            else if ($itemExistInCart && ($tabelaArrayZSesji[$i]['amount'] == 0)){return 0;}
        }
    }
}
