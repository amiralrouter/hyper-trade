<?php

namespace App\Console\Commands;

use App\Models\Business;
use App\Helpers\DemoImporter;
use Illuminate\Console\Command;
use App\Helpers\BusinessBuilder;
use Illuminate\Support\Facades\DB;

class Beta extends Command
{
	protected $signature = 'beta';

	protected $description = 'Create beta testing commands';

	public function __construct()
	{
		parent::__construct();
	}

	public function handle()
	{
		$this->info('Creating beta business');

		// remove all business
		$businesses = Business::all();
		foreach ($businesses as $business) {
			$business->delete();
		}

		DB::update('ALTER TABLE businesses AUTO_INCREMENT = 1001;');
		DB::update('ALTER TABLE units AUTO_INCREMENT = 1;');

		$business_builder = new BusinessBuilder();
		$business_builder->setName('A Hotel');
		$business_builder->setLanguageId(1);
		$business_builder->setRoomCount(0);
		$business_builder->setDeskCount(0);
		$business_builder->build();

		$business = $business_builder->getBusiness();

		$importer = new DemoImporter();

		$demos = $importer->getList();

		foreach ($demos as $i => $demo) {
			$this->info($i . ' - ' . $demo['name']);
		}

		$demo_id = 1;
		// $demo_id = $this->ask('choose id');

		$importer->setDemoId($demo_id);
		$importer->setBusinessId($business->id);
		$importer->import();

		return 0;
	}
}
