<?php

App::uses('AppController', 'Controller');

class OpinionsController extends AppController {
    
    
        public function opinions() {
        $this->layout = 'things';
          
        $this->loadmodel('Opinion');
        $record = $this->Opinion->find('first');
        $this->set('record', $record);
    
        $records = $this->Opinion->find('all');
        $this->set('records', $records);
    }
    
    public function add_opinion() {
        //$this->autoRender = false;
        $this->layout = 'things';
        if ($this->request->is('post')){
            $this->Opinion->create();
            if($this->Opinion->save($this->request->data)){
                return $this->redirect(array('action' => 'opinions'));
            }
            else {return 404;}
        }
    }

}
