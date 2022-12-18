<?php

namespace Database\Seeders;

use App\Models\Trainee;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class TraineeSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('trainees');

        Trainee::factory()
            ->count(10)
            ->create();
    }
}
