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
                //$allItems[] = array('id' => $id, 'itemName' => $itemName, 'price' => $price, 'size' => $size);
                //$this->saveArray($allItems);   
                //var_dump($allItems[0]['id']);
                $green = CakeSession::read('array');
                $policz = count($green);
                
                $flaga = false;
                for($k=0; $k<$policz; $k++){
                    echo '<pre>';
                    var_dump($green[$k]);
                    $bolean = in_array($id, array($green[$k]['id']));
                    
                    echo '</pre>';
                    if ($bolean){
                        //echo 'id sie zgadza, KONIEC PETLI - NIE DODAWAJ DO KOSZYKA PIZZY';
                        $flaga = true;
                        break;
                    }else{
                        //echo 'tutaj id sie rozni, petla dalej leci';
                        $flaga = false;
                    }
                }
                if ($flaga == true){
                    echo 'Pętla po wszystkich rekordach przeleciała, w jednym miejscu flaga była TRUE, pętla się zatrzymała - nie dodajemy do koszyka';
                } else {
                    echo 'wszystkie warunki w petli byly FALSE - nie ma pizzy w koszyku - DODAJEMY DO KOSZYKA';
                    $allItems[] = array('id' => $id, 'itemName' => $itemName, 'price' => $price, 'size' => $size);
                    $this->saveArray($allItems);   
                }
                var_dump($flaga);
                    //var_dump($bolean);
//                if($flaga){
//                    $allItems[] = array('id' => $id, 'itemName' => $itemName, 'price' => $price, 'size' => $size);
//                } else { echo 'Przykro mi, pizza nie zostanie dodana, bo już jest w koszyku...';}
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
