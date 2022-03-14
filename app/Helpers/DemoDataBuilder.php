<?php

namespace App\Helpers;

use App\Models\Business;

class DemoDataBuilder
{
	private $business;

	public function __construct($business_id = null)
	{
		if (null !== $business_id) {
			$this->setBusinessId($business_id);
		}
	}

	public function setBusinessId($id)
	{
		$this->business = Business::find($id);

		return $this;
	}

    public function flushAll(){

    }

    public function createBlocks(){
        Block::create([
            
        ])
    }

    public function createFloors(){

    }

    public function createRooms(){

    }

    public function createDesks(){

    }



	public function build(): void
	{
	}
}
