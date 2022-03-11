<?php

namespace App\Helpers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Business;
use App\Models\UnitType;

class BusinessBuilder
{
	private $name;

	private $business;

	private $has_rooms = false;

	private $room_count = 0;

	private $has_desks = false;

	private $desk_count = 0;

	private $admin;

	public function setName($name): void
	{
		$this->name = $name;
	}

	public function setRoomCount($room_count): void
	{
		$this->room_count = $room_count;
		if ($this->room_count > 0) {
			$this->has_rooms = true;
		}
	}

	public function setDeskCount($desk_count): void
	{
		$this->desk_count = $desk_count;
		if ($this->desk_count > 0) {
			$this->has_desks = true;
		}
	}

	private function buildBusiness(): void
	{
		$this->business = new Business();
		$this->business->name = $this->name;
		$this->business->save();
	}

	private function buildRooms(): void
	{
		if ($this->has_rooms) {
			$unit_type = UnitType::create([
				'business_id' => $this->business->id,
				'name' => 'Room',
			]);
			for ($i = 1; $i <= $this->room_count; ++$i) {
				$room = new Unit();
				$room->business_id = $this->business->id;
				$room->name = 'Room ' . $i;
				$room->save();
			}
		}
	}

	private function buildDesks(): void
	{
		if ($this->has_desks) {
			$unit_type = UnitType::create([
				'business_id' => $this->business->id,
				'name' => 'Desk',
			]);
			for ($i = 1; $i <= $this->desk_count; ++$i) {
				$desk = new Unit();
				$desk->business_id = $this->business->id;
				$desk->name = 'Desk ' . $i;
				$desk->save();
			}
		}
	}

	private function buildAdmin(): void
	{
		$this->admin = new User();
		$this->admin->business_id = $this->business->id;
		$this->admin->firstname = 'Admin';
		$this->admin->lastname = 'Admin';
		$this->admin->username = 'admin';
		$this->admin->save();
	}

	public function build(): void
	{
		$this->buildBusiness();
		$this->buildRooms();
		$this->buildDesks();
		$this->buildAdmin();
	}
}
