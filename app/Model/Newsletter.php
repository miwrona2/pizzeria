<?php
App::uses('AppModel', 'Model');
/**
 * Newsletter Model
 *
 */
class Newsletter extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';
        
        public $validate = array(
            'email' => array(
                'emailRule1' => array(
                    'rule' => array('email', true),
                    'message' => 'Proszę podać prawidłowy adres e-mail'
                 ),
                'emailRule2' => array(
                    'rule' => 'isUnique',
                    'message' => 'Ten e-mail został już wcześniej dodany!'
                )
            )
        );
        
        
}
        
        
