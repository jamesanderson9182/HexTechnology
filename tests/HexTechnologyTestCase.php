<?php

namespace HexTechnology\Tests;

use Codeception\TestCase\Test;
use HexTechnology\HexTechnology;
use HexTechnology\Models\HexTechnologySolutionSchema;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Stem\Repositories\Offline\Offline;
use Rhubarb\Stem\Repositories\Repository;
use Rhubarb\Stem\Schema\SolutionSchema;

abstract class HexTechnologyTestCase extends Test
{
	/** @var  HexTechnology */
	protected $application;

	protected function _before()
	{
		parent::_before();

		$this->application = new HexTechnology();
		$this->application->unitTesting = true;
		$this->application->initialiseModules();

		//This is pretty cool, this uses an offline database so that our data will remain intact!
		Repository::setDefaultRepositoryClassName(Offline::class);
		SolutionSchema::registerSchema('App', HexTechnologySolutionSchema::class);

		LayoutModule::disableLayout();

		//The following will be of use later
		/*
		 HashProvider::setProviderClassName(Sha512HashProvider::class);
        EmailProvider::setProviderClassName(UnitTestingEmailProvider::class);
        LoginProvider::setProviderClassName(TestLoginProvider::class);
        HexTechnologySolutionSchema::checkGroupPermissions();
		 */
	}

    /**
     * @param string $expectedException
     * @param callable $callable
     * @param string|null $message
     */
    public function assertThrowsException($expectedException, callable $callable, $message = null)
    {
        $thrown = false;
        try {
            $callable();
        } catch (\Exception $ex) {
            $thrown = true;
            $this->assertInstanceOf($expectedException, $ex);
        }

        $this->assertTrue($thrown, $message !== null ? $message : "Expected a {$expectedException} to be thrown");
    }

}