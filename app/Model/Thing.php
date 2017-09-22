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
    }
    
    public function subtractProduct($productId) {
            $allProducts = $this->readProduct();
                    if (array_key_exists($productId, $allProducts)) {
                        while ($allProducts[$productId]>0) {
                            $allProducts[$productId] --;
                            break;
                        }
                    }
            
            $this->saveProduct($allProducts);
    }
    
    public function putItemInSession($id, $itemName, $price, $size) {
                $allMeals = $this->readArray();
                $itemsAmountInCart = count($allMeals);
                
                $flag = false;
                //comparison of given id with id's of particular items inside the cart
                for ($i=0; $i<$itemsAmountInCart; $i++) {
                    $itemExistsInCart = in_array($id, array($allMeals[$i]['id']));
                    if ($itemExistsInCart){
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
                    return true;
                } elseif ($flag == false) {
                    //any item from the cart doesn't match to given item so there is no as item in cart 
                    //ADD GIVEN ITEM TO THE CART
                    $allMeals[] = array('id' => $id, 'itemName' => $itemName, 'price' => $price, 'size' => $size, 'amount' => 1);
                    $this->saveArray($allMeals);    
                    //$true = $this->returnTrue();
                    return false;
                } else {
                    echo 'Undefined $allMeals'; 
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
            $itemExistsInCart = in_array($par, array($tabelaArrayZSesji[$i]['id']));
            if ($itemExistsInCart){
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
            $itemExistsInCart = in_array($par, array($tabelaArrayZSesji[$i]['id']));
            if ($itemExistsInCart && ($tabelaArrayZSesji[$i]['amount'] > 0)){
                $tabelaArrayZSesji[$i]['amount'] --;
                $this->saveArray($tabelaArrayZSesji);   
                //break;  
                return $tabelaArrayZSesji[$i]['amount'];
            } 
            else if ($itemExistsInCart && ($tabelaArrayZSesji[$i]['amount'] == 0)){return 0;}
        }
    }
    
    public function remove($id) {
            $array = $this->readArray();
            
            for($i = 0; $i < count($array); $i++){
                if(in_array($id, array($array[$i]['id']))){
                    $name = "array.{$i}";
                    return CakeSession::delete($name);
                }
            }
    }
    
    public function sortById($array){
        function posortujRosnaca($item1,$item2)
        {
            if ($item1['id'] == $item2['id']) return 0;
            return ($item1['id'] > $item2['id']) ? 1 : -1;
        }
        usort($array, 'posortujRosnaca');
        $this->saveArray($array);
    }
    
    public function countTotatalOrderPrice(){
        $value = $this->readArray();
        return $value;
    }
}
