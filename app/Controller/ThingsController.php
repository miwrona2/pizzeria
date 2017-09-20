<?php

App::uses('AppController', 'Controller');

class ThingsController extends AppController {
    
//public $uses = array('Thing');


    public function index() {
        $this->redirect(array('controller' => 'pages', 'action' => 'home'));
    }
    
    public function opinions() {
        $this->layout = 'things';
          
        $this->loadmodel('Opinion');
        $record = $this->Opinion->find('first');
        $this->set('record', $record);
    
        $records = $this->Opinion->find('all');
        $this->set('records', $records);
    }
      
    public function menu() {
        $this->layout = 'things';
       
        $this->loadModel('Pizza');
        $pizzas = $this->Pizza->find('all');
        $this->set('pizzas', $pizzas); 
        
        $this->loadModel('CartItem');
        $counter = $this->CartItem->find('count');
        $this->set('counter', $counter);
        
        //działa ale to jest do poprawki
        //$dishesInCart = $this->CartItem->find('all');
        //$this->set('dishesInCart', $dishesInCart); 
        $dishesInCart = $this->beforeFilter('array');
        $this->set('dishesInCart', $dishesInCart); 
    }
     
    public function discount() {
        $this->layout = 'things';
    }
    
    public function delivery() {
        $this->layout = 'things';
    }
    
    public function contact() {
        $this->layout = 'things';
    }
    
    public function gallery() {

    }
    
    public function allergens() {
//        $this->layout = 'admin';
    } 
   
    public function addToBoxSession() {
            $this->autoRender = false;
           if ($this->request->is('post')) {
                    $id = $this->request->data['Thing']['product_id'];
                    $name = $this->request->data['Thing']['item_name'];
                    $price = $this->request->data['Thing']['price'];
                    $size = $this->request->data['Thing']['size'];
                    $this->Thing->addProduct($id);
                    $putItemInSession = $this->Thing->putItemInSession($id, $name, $price, $size);
            } 

            $getCount = $this->Thing->getCount();
            $arrayPizza = array("counter" => $getCount, "id" => $id, "name" => $name, "price" => $price, "size" => $size, "boolean" => $putItemInSession);
            return json_encode($arrayPizza);
    }
      
    public function clearSession() {
    $this->autoRender = false;
    $this->Thing->clearSessionInModel();
    $this->redirect('menu');
    }
    
    public function incrementController($id, $price) {
        $this->autoRender = false;
        $valueAfterIncrement = $this->Thing->increment($id);
        $this->Thing->addProduct($id);
        $count = $this->Thing->getCount();
        
        return json_encode(array("amount" => $valueAfterIncrement, "count" => $count, "price" => $price ));
    }
            
    public function decrementController($id) {
        $this->autoRender = false;
        $valueAfterDecrement = $this->Thing->decrement($id);
        $this->Thing->subtractProduct($id);
        $count = $this->Thing->getCount();
        if($valueAfterDecrement === 0 ){$this->removeController($id);}
        
        return json_encode(array("amount" => $valueAfterDecrement, "count" => $count ));
    }
    
    public function readUpdatedArrayFromSession($id){
    $this->autoRender = false;
    $updatedArray = $this->Thing->readArray();
    $itemsAmountInCart = count($updatedArray);


        for ($i=0; $i<$itemsAmountInCart; $i++) {
            $itemExistInCart = in_array($id, array($updatedArray[$i]['id']));
            if ($itemExistInCart){
                return json_encode(array("amount" => $updatedArray[$i]['amount'], "price" => $updatedArray[$i]['price']));
            } else {
                //do nothing
            }
        }
    }
        
        public function haystack(){
            $this->autoRender = false;
            return json_encode($this->Thing->readArray());
        }
        
        public function check($id){
        $this->autoRender = false;   
        $this->Thing->checkLogic($id);
        }
        
        public function removeController($id){
            $this->autoRender = false;
            $this->Thing->remove($id);
            $this->Thing->sortById($this->Thing->readArray());
        }
}

