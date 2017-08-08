<?php

App::uses('AppController', 'Controller');


class ProductsController extends AppController {
   
    public function index(){
        $this->layout = 'things';
        $data = $this->Product->find('all');
        $this->set('products',$data);
    }
}
