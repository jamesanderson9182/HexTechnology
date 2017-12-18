<?php

namespace HexTechnology\Custard;

use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HexTechnologyDataSeeder implements DemoDataSeederInterface
{

    public function seedData(OutputInterface $output)
    {
        new AssetsDataSeeder();
        new ClientDataSeeder();
        new ProjectDataSeeder();
        new ExpenseSeeder();
        new TaskDataSeeder();
        new QuoteDataSeeder();
    }
}