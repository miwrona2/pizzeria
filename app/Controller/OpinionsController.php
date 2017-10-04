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
        
        if ($this->request->is('post')){
            
            $this->Opinion->set($this->request->data);

            if($this->Opinion->save($this->request->data)){
                return $this->redirect(array('action' => 'opinions'));
            }   
        }
    }

}
