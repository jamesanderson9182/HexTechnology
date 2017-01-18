<?php

namespace HexTechnology\Tests\Unit;

use HexTechnology\Models\Asset;
use HexTechnology\Models\Client;
use HexTechnology\Models\Rental;
use HexTechnology\Models\SerialNumber;
use HexTechnology\Tests\HexTechnologyTestCase;

class RentalTest extends HexTechnologyTestCase
{
    public function testModelCreation()
    {
        $rental = new Rental();
        $rental->save();

        $this->assertEquals(1, sizeof(Rental::all()), "A Rental should be able to be created");
    }

    public function testRentalCanHaveAClient()
    {
        $client = new Client();
        $client->save();

        $rental = new Rental();
        $rental->ClientID = $client->ClientID;
        $rental->save();

        $this->assertEquals($client->Rentals[0]->RentalID, $rental->RentalID, "A client should be able to have rentals");
    }


}