<?php

App::uses('AppController', 'Controller');

class OpinionsController extends AppController {
        public $components = array('Recaptcha.Recaptcha');

        public function opinions() {
        $this->layout = 'things';
          
        $this->loadmodel('Opinion');
        $record = $this->Opinion->find('first');
        $this->set('record', $record);
    
        $records = $this->Opinion->find('all', array(
                    'order' => array('Opinion.modified' => 'desc')
                    ));
        $this->set('records', $records);
              
        if ($this->request->is('post')){
            $this->Opinion->set($this->request->data);
            if ($this->Recaptcha->verify() && ($this->Opinion->save($this->request->data))) {  
            return $this->redirect(array('action' => 'opinions'));                 
            } else {
                $error_bot = 'Potwierdź, że nie jesteś botem' . '<br>';
                $this->set('error_bot', $error_bot);
            }
            
        }
    }

}
