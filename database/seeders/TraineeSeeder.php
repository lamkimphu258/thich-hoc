<?php

namespace Database\Seeders;

use App\Models\Trainee;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class TraineeSeeder extends Seeder
{
    use HasTruncate;

    const TRAINEE_QUANTITY = 1_000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('trainees');

        Trainee::factory()
            ->count(self::TRAINEE_QUANTITY)
            ->create();
    }
}
