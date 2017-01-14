<?php

namespace HexTechnology\RestApi;

use HexTechnology\Models\Asset;
use Rhubarb\RestApi\Resources\ModelRestResource;

class AssetsResource extends ModelRestResource
{

    /**
     * Returns the name of the model to use for this resource.
     *
     * @return string
     */
    public function getModelName()
    {
        return "Asset";
    }

	public function getChildResource( $childUrlFragment )
	{
		switch ($childUrlFragment) {
			case "/serials":
				/** @var Asset $asset */
				$asset = $this->getModel();
				$serials = $asset->SerialNumbers;
				$serialResource = new SerialsResource($this);
				$serialResource->setModelCollection($serials);
				return $serialResource;
				break;
		}
		return parent::getChildResource($childUrlFragment);
	}

}