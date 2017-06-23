<?php

App::uses('AppController', 'Controller');

class OpinionsController extends AppController {

    public function add_opinion() {
        $this->layout = 'things';
        if ($this->request->is('post')){
            $this->Opinion->create();
            $this->Opinion->save($this->request->data);
        }
    }
    


}
