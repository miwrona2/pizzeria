<?php

App::uses('AppController', 'Controller');

class MainsController extends AppController {
    
    public function index() {
        $this->redirect(array('controller' => 'pages', 'action' => 'home'));
    }
    
    public function menu() {
        $this->layout = 'main';

        $this->loadModel('Pizza', 'Salad');
        $pizzas = $this->Pizza->find('all');
        $this->set('pizzas', $pizzas);
        
        $this->loadModel('Pasta');
        $pastas = $this->Pasta->find('all');
        $this->set('pastas', $pastas); 
        
        $this->loadModel('Salad');
        $salads = $this->Salad->find('all');
        $this->set('salads', $salads); 
        
        $this->loadModel('Addition');
        $additions = $this->Addition->find('all');
        $this->set('additions', $additions); 
        
        $this->loadModel('Sauce');
        $sauces = $this->Sauce->find('all');
        $this->set('sauces', $sauces); 
        
        $this->loadModel('Drink');
        $drinks = $this->Drink->find('all');
        $this->set('drinks', $drinks); 
 
        $mealsInCart = $this->beforeFilter('array');
        $this->set('mealsInCart', $mealsInCart); 
    }
     
    public function discount() {
        $this->layout = 'main';
    }
    
    public function contact() {
        $this->layout = 'main';
    }
    
    public function gallery() {
        $this->layout = 'main';
    }
   
    public function addToBoxSession() {
            $this->autoRender = false;
           if ($this->request->is('post')) {
                    $id = $this->request->data['Main']['product_id'];
                    $name = $this->request->data['Main']['item_name'];
                    $price = $this->request->data['Main']['price'];
                    $size = $this->request->data['Main']['size'];
                    $this->Main->addProduct($id);
                    $putItemInSession = $this->Main->putItemInSession($id, $name, $price, $size);
            } 

            $getCount = $this->Main->getCount();
            $arrayPizza = array("counter" => $getCount, "id" => $id, "name" => $name, "price" => $price, "size" => $size, "whetherItemInCart" => $putItemInSession);
            return json_encode($arrayPizza);
    }
      
    public function clearSession() {
    $this->autoRender = false;
    $this->Main->clearSessionInModel();
    $this->redirect('menu');
    }

    public function incrementController($id, $price, $size) {
        $this->autoRender = false;
        $valueAfterIncrement = $this->Main->increment($id, $size);
        $this->Main->addProduct($id);
        $count = $this->Main->getCount();
        
        return json_encode(array("amount" => $valueAfterIncrement, "count" => $count, "price" => $price ));
    }
            
    public function decrementController($id, $price, $size) {
        $this->autoRender = false;
        $valueAfterDecrement = $this->Main->decrement($id, $size);
        $this->Main->subtractProduct($id);
        $count = $this->Main->getCount();
        if($valueAfterDecrement === 0 ){$this->removeInController($id, $size);}
        
        return json_encode(array("amount" => $valueAfterDecrement, "count" => $count, "price" => $price ));
    }
    
    public function readUpdatedArrayFromSession($id, $size){
    $this->autoRender = false;
    $updatedArray = $this->Main->readArray();
    $itemsAmountInCart = count($updatedArray);


        for ($i=0; $i<$itemsAmountInCart; $i++) {
            $itemExistInCart = in_array($id, array($updatedArray[$i]['id']));
            $sizeMatch = in_array($size, array($updatedArray[$i]['size']));
            if ($itemExistInCart && $sizeMatch){
                return json_encode(array("amount" => $updatedArray[$i]['amount'], "price" => $updatedArray[$i]['price']));
            } else {
                //do nothing
            }
        }
    }
        
    public function removeInController($id, $size){
        $this->autoRender = false;
        $this->Main->removeRecordFromArray($id, $size);
        $this->Main->sortById($this->Main->readArray());
    }
        
    public function total() {
        $this->autoRender = false;
        return json_encode(number_format($this->Main->countTotatalOrderPrice(),2));
    }
}

