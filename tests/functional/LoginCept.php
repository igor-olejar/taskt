<?php
$I = new FunctionalTester($scenario);
$I->wantTo('log in');
$I->amOnPage('/login');
$I->see('Login');
$I->fillField('username', 'igor');
$I->fillField('password', 'password');
$I->click('.btn');
$I->see('Track your time');
