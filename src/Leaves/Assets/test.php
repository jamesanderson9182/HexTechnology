<?php
/**
 * Created by PhpStorm.
 * User: janderson
 * Date: 10/01/2017
 * Time: 13:36
 */

namespace HexTechnology\Leaves\Assets;

use HexTechnology\Models\Asset;
use Rhubarb\Leaf\Leaves\Leaf;
use Rhubarb\Leaf\Tests\Fixtures\LeafTestCase;
use Rhubarb\Leaf\Tests\Leaves\TestLeafView;

class test extends LeafTestCase
{

	/**
	 * @return Leaf
	 */
	protected function createLeaf()
	{
		$item = new AssetsItem(new Asset());

		return $item;
	}

	public function testSerials()
	{
		$model = $this->leaf->getModelForTesting();
		$model->saveClickedEvent->raise();

		$this->assertEquals(234, $model->price);

	}
}