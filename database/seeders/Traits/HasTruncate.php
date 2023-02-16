<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

trait HasTruncate
{
  private function truncate(
    string $tableName
  ) {
    Schema::disableForeignKeyConstraints();
    DB::table($tableName)->truncate();
    Schema::enableForeignKeyConstraints();
  }
}
