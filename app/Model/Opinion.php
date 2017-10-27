<?php
App::uses('AppModel', 'Model');
/**
 * Opinion Model
 *
 */
class Opinion extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'content';
        
        public $validate = array(
            'content' => array(
                'rule' => 'notBlank',
                'message' => 'Cannot left empty!'
            ),
            'rate' => array(
                'rule' => array('inList', array('0','1','2','3','4','5')),
                'message' => "Rate can by only a number between 1 and 5!",
            ), 
            'nickname' => array(
                'rule' => array('minLength' , '4'),
                'message' => 'min 4 signs!'
            )
        );        
}
        
        
