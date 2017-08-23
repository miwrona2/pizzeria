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
                    $this->Thing->putItemInSession($id, $name, $price, $size);
            } 
            $getCount = $this->Thing->getCount();
            $arrayPizza = array("counter" => $getCount, "id" => $id, "name" => $name, "price" => $price, "size" => $size);
            return json_encode($arrayPizza);
    }
      
    public function clearSession() {
    $this->autoRender = false;
    $this->Thing->clearSessionInModel();
    $this->redirect('menu');
    }
    
}
