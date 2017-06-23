<?php
App::uses('Opinion', 'Model');

/**
 * Opinion Test Case
 */
class OpinionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.opinion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Opinion = ClassRegistry::init('Opinion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Opinion);

		parent::tearDown();
	}

}
