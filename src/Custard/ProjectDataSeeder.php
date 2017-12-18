<?php

namespace HexTechnology\Custard;

use HexTechnology\Models\Expense;
use HexTechnology\Models\Project;
use Rhubarb\Crown\DateTime\RhubarbDate;

class ProjectDataSeeder extends SeederUseCase
{
    function seed()

    {
        /*
         * Projects for Hillary
         */
        $client = $this->clientGenerator(
            "Hillary Thompson",
            "Hillary",
            "Thompson",
            "Ap #119-2029 Morbi St.",
            "UY4U 7CY",
            "Akhisar",
            "0861 794 5942",
            "070 7521 6106",
            "scelerisque.mollis@Phasellus.edu"
        );

        $project = $this->projectGenerator($client, $projectName = "VHS To DVD");
        $this->timeGenerator($project, "2017-01-01 00:00:00", "2017-01-01 07:30:00");
        $date = new RhubarbDate("3 days ago");
        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to ...",
            $date,
            3,
            15.0,
            Expense::EXPENSE_TYPE_TIME);
        $this->projectExpenseGenerator(
            $project,
            "DVDs",
            "Had to buy a dvd to burn onto",
            $date,
            1,
            2,
            Expense::EXPENSE_TYPE_PURCHASE
        );
        $this->projectTaskGenerator("Do what I'm told", $project);
        $this->projectGenerator($client, "Sky Box to DVD");
        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to ...",
            $date,
            3,
            15,
            Expense::EXPENSE_TYPE_TIME
        );
        $this->projectExpenseGenerator(
            $project,
            "DVDs",
            "Had to buy a dvd to burn onto",
            $date,
            1,
            2,
            Expense::EXPENSE_TYPE_TIME
        );
        $this->projectTaskGenerator("Do what I'm told", $project);

        $project = $this->projectGenerator($client, "New Years Eve");
        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to ...",
            $date,
            3,
            15,
            Expense::EXPENSE_TYPE_TIME
        );
        $this->projectExpenseGenerator(
            $project,
            "Broken Microphone",
            "Had to buy a new microphone as one got dropped into pool by drunkard",
            $date,
            1,
            2,
            Expense::EXPENSE_TYPE_PURCHASE
        );
        $this->projectTaskGenerator("Park the cars", $project);

        /*
         * Projects for Trinity, I'm putting a Quote on this too
         */

        $client = $this->clientGenerator(
            "Trinity Methodist Church",
            "Paul",
            "Coulter",
            "Ballymacoss Avenue",
            "BT28 2GU",
            "LISBURN",
            "028 9260 5335",
            "028 9260 5335",
            "nec.euismod.in@auctornunc.org"
        );

        $project = $this->projectGenerator(
            $client,
            "Worship evening"
        );
        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to...",
            $date,
            3,
            15,
            Expense::EXPENSE_TYPE_TIME
        );
        $this->selfRentalExpenseGenerator($project, $date);
        $tasks = [
            "Pack gear",
            "Check venue for internet",
            "Arrange transport"
        ];
        foreach ($tasks as $task) {
            $this->projectTaskGenerator($task, $project);
        }

        $project = $this->projectGenerator($client, "QU32 Training");
        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to ...",
            $date,
            3,
            15,
            Expense::EXPENSE_TYPE_TIME
        );
        $tasks = [
            "Create Powerpoint",
            "Arrange dates"
        ];
        foreach ($tasks as $task) {
            $this->projectTaskGenerator($project, $task);
        }
        $quote = $this->quoteGenerator($client, $project);
        $quoteItems = [
            "YAMAHA DXS 12 Sub" => 18.10,
            "K&M 21366 Sat Pole" => 0,
            "RGB Flood Light" => 4,
            "DrumKit6 Drum Micriphone Kit" => 12,
            "QU32 LEDlamp" => 1.3,
            "Eurolight DMX Move Control 512" => 4.2
        ];
        foreach ($quoteItems as $item => $unitCost) {
            $this->quoteItemGenerator($quote, $item, $unitCost, 2);
        }

        /*
         * Projects in Kilkeel
         */

        $client = $this->clientGenerator(
            "FuseFM",
            "Roberta",
            "Heaney",
            "P.O. Box 856 5228 Mauris Ave",
            "V09 8PN",
            "Mödling",
            "070 0204 8595",
            "0845 46 49",
            "Aliquam.auctor.velit@interdumfeugiatSed.edu"
        );

        $project = $this->projectGenerator($client, "11th Night 2016");
        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to...",
            $date,
            3,
            15,
            Expense::EXPENSE_TYPE_TIME
        );

        $this->projectExpenseGenerator(
            $project,
            "CD",
            "Had to buy a cd to give to them after the event",
            new RhubarbDate("now"),
            2,
            2,
            Expense::EXPENSE_TYPE_PURCHASE
        );

        $this->selfRentalExpenseGenerator($project, $date);

        $tasks = [
            "Check for internet in field",
            "12th 2016",
            "Check for internet in field"
        ];
        foreach ($tasks as $task) {
            $this->projectTaskGenerator($task, $project);
        }

        $this->projectExpenseGenerator(
            $project,
            "Time",
            "Time taken to ...",
            new RhubarbDate("now"),
            15,
            3,
            Expense::EXPENSE_TYPE_TIME
        );

        $this->projectExpenseGenerator(
            $project,
            "CD",
            "Had to burn 2 copies of the cd",
            new RhubarbDate("now"),
            2,
            4,
            Expense::EXPENSE_TYPE_PURCHASE
        );

        $this->selfRentalExpenseGenerator($project, $date);

        $this->projectTaskGenerator("Check for internet in field", $project);

        $project = $this->projectGenerator($client, "11th Day Tent Band 2016");

        $this->timeExpenseGenerator($project);

        $this->projectExpenseGenerator(
            $project,
            "CD",
            "Had to burn 2 copies of the cd",
            $date,
            2,
            4,
            Expense::EXPENSE_TYPE_TIME
        );

        $this->projectTaskGenerator("Check for internet in tent", $project);

        $project = $this->projectGenerator($client, "Christmas Presenter Training");
        $this->timeExpenseGenerator($project);
        $this->projectTaskGenerator("Arrange date for training", $project);
        $this->timeExpenseGenerator($this->projectGenerator($client, "Plugging in ethernet cable"));

        $this->projectTaskGenerator("Plug in the cable", $project);
        $this->projectTaskGenerator("Contemplate stupidity of the human race", $project);

        $project = $this->projectGenerator($client, "GTFO Training");
        $this->timeExpenseGenerator($project);
        $this->projectTaskGenerator("Arrange date for training", $project);
        $this->projectTaskGenerator("Kiss that moustache goodbye forever!", $project);

        /*
         * Projects that don't have a client
         */
        $project = new Project();
        $project->ProjectName = "No clients, woo!";
        $project->save();
    }
}