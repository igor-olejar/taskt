<?php


class UserTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    public function testValidation()
    {
        $user = User::create();
        $user->username = null;
        $this->assertFalse($user->validate(['username']));
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {

    }

}