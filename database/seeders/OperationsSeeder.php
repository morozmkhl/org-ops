<?php

namespace Database\Seeders;

use App\Models\Operation;
use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = Organization::all();
        Operation::factory()->count(10000)->make()->each(function ($operation) use ($organizations) {
            $operation->seller = $organizations->random()->id;
            do {
                $operation->buyer = $organizations->random()->id;
            } while ($operation->buyer === $operation->seller);
            $operation->save();
        });
    }
}
