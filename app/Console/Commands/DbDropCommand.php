<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class DbDropCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'db:drop {schemaName}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Drop database for jenkins';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $schemaName = $this->argument('schemaName');

    $query = "DROP DATABASE IF EXISTS $schemaName;";
    DB::statement($query);

    return Command::SUCCESS;
  }
}
