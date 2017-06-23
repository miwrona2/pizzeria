<?php
App::uses('Pizza', 'Model');

/**
 * Pizza Test Case
 */
class PizzaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pizza'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pizza = ClassRegistry::init('Pizza');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pizza);

		parent::tearDown();
	}

}
