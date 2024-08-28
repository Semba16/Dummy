<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class DbCreateCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'db:create {schemaName}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create database for jenkins';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $schemaName = $this->argument('schemaName');
    $charset = config('database.connections.mysql.charset', 'utf8mb4');
    $collation = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');

    $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
    DB::statement($query);

    return Command::SUCCESS;
  }
}
