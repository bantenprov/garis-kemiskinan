<?php

use Illuminate\Database\Seeder;

class BantenprovGarisKemiskinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovGarisKemiskinanSeederGarisKemiskinan::class);
    }
}
