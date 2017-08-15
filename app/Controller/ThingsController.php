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
        $dishesInCart = $this->CartItem->find('all');
        $this->set('dishesInCart', $dishesInCart);  
        return $pizzas;
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
    
    public function add() {
            $this->autoRender = false;
            if ($this->request->is('post')) {
                     $this->Thing->addProduct($this->request->data['Cart']['product_id']);
            } 
             echo $this->Thing->getCount();
    }
    
    public function addToBoxSesja() {
            $this->autoRender = false;
           if ($this->request->is('post')) {
                    $par1 = $this->request->data['Thing']['product_id'];
//                    $par2 = $this->request->data['Thing']['item_name'];
//                    $par3 = $this->request->data['Thing']['price'];
//                    $par4 = $this->request->data['Thing']['size'];
                     $this->Thing->addProduct($this->request->data['Thing']['product_id']);
            } 
             $GetCount = $this->Thing->getCount();
             //echo $GetCount;
                 //    print_r($this->request->data);
             //$zwroc = $this->request->data['Thing']['item_name'];
             //$arrayPizza = json_encode(array($this->Thing->addProduct($par1, $par2), $GetCount, $par1, $par2, $par3, $par4));
                     //$arrayPizza = json_encode(array("1"=> $this->request->data, "2"=> $this->Thing->getCount()));
             //var_dump('sadasjhdadsahdsajdsaj');
              //print_r(serialize($this->request->data['Thing']['item_name']));
              return json_encode(array("key0" => $par1,"key1" => $GetCount, "key2" => $this->request->data['Thing']['item_name']));
    }

    public function addToBoxAjax($id, $name, $size, $price){
        $this->autoRender = false;
        $this->loadModel('CartItem');
        $this->CartItem->read(null);
                
        $this->CartItem->set(array(
            'pizzaid' => $id,
            'item_name' => $name,
            'price' => $price,
            'size' => $size
        ));
        $this->CartItem->save();
    }
    
    public function AjaxClearCart(){
    $this->autoRender = false;
    $this->loadModel('CartItem');
    $this->CartItem->query('TRUNCATE TABLE cart_items');
//    $this->redirect(array('action' => 'menu'));
    }
       
    public function clearSession() {
    $this->autoRender = false;
    $this->Thing->clearSessionInModel();
    $this->redirect('menu');
    }

    public function wywalJSONwConsoli() {
        $this->autoRender = false;
        //$this->loadModel('Pizza');
        //$pizzas = $this->Pizza->find('all');
        //$this->set('pizzas', $pizzas); 
        $pizzas = $this->menu('pizzas');
        echo json_encode(array($pizzas)); 
    }
}
