<?php

namespace App\Console\Commands;

use App\Helpers\BusinessContentManager;
use App\Models\Business;
use Illuminate\Console\Command;

class Demo extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'demo';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Add demo data to business';

	/**
	 * Create a new command instance.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$businesses = Business::all();
		foreach ($businesses as $business) {
			$this->line("<fg=cyan>{$business->id} - <fg=magenta>{$business->name}</>");
		}
		$business_id = $this->ask('Select business id');

		if (!$business_id) {
			$business_id = Business::first()->id;
		}

		$business = Business::find($business_id);
		if (!$business) {
			$this->error('Business not found');

			return 1;
		}

		$demo_data_builder = new BusinessContentManager($business_id);
		$demo_data_builder->build();

		return 0;
	}
}
