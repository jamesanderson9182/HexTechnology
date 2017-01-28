<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage("/");
$I->see("Magic");

$I->wantTo("test that all of the pages appear");

$I->click("Assets");
$I->see("Asset Name", '//*[@id="AssetsCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->see("Description");

$I->click("Manufacturers");
$I->see("Manufacturer Name", '//*[@id="ManufacturersCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->seeLink("Manufacturers", "../");

$I->click("Asset-Types");
$I->see("Asset Type Name", '//*[@id="AssetTypesCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->seeLink("AssetTypes", "../");

$I->click("Clients");
$I->see("Client Display Name", '//*[@id="ClientsCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->seeLink("Clients", "../");

$I->click("Expenses");
$I->see("Expense Title", '//*[@id="ExpensesCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->seeLink("Expenses", "../");

$I->click("Projects");
$I->see("Project Name", '//*[@id="ProjectCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->seeLink("Projects", "../");

$I->click("Tasks");
$I->see("Task Title", '//*[@id="TasksCollection_Table"]/div[2]/table/thead/tr/th[2]');
$I->click("view");
$I->seeLink("Tasks", "../");
