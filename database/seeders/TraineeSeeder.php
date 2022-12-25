<?php

namespace Database\Seeders;

use App\Models\Trainee;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class TraineeSeeder extends Seeder
{
    use HasTruncate;

    const TRAINEE_QUANTITY = 10_000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('trainees');

        $bar = $this->command->getOutput()->createProgressBar(self::TRAINEE_QUANTITY);
        $bar->start();
        for ($i = 0; $i < self::TRAINEE_QUANTITY; $i++) {
            Trainee::factory()
                ->create();
            $bar->advance();
        }
        $bar->finish();
        $this->command->getOutput()->newLine();
    }
}
