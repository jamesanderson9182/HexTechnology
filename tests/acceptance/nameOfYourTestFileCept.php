<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage("/");
$I->see("Magic");

$I->wantTo("Show off and prove that I work");
$I->click("Assets");
$I->wait(1);

$I->click("Clients");
$I->wait(1);

$I->click("Expenses");
$I->wait(1);

$I->click("Projects");
$I->wait(1);

$I->click("Tasks");
$I->wait(1);