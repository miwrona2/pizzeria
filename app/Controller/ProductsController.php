<?php

App::uses('Controller', 'Controller');

class ProductsController extends AppController {
        public function index(){
        $data = $this->Product->find('all');
        $this->set('products',$data);
             }
}
