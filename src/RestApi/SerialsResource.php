<?php

namespace HexTechnology\RestApi;

use Rhubarb\RestApi\Resources\ModelRestResource;

class SerialsResource extends ModelRestResource
{

	/**
	 * Returns the name of the model to use for this resource.
	 *
	 * @return string
	 */
	public function getModelName()
	{
		return "SerialNumber";
	}
}