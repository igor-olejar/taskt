<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('log out');
$I->amOnPage('/logout');
$I->see('Login');
