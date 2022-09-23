<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OPDTableSeeder::class);
        $this->call(MasterJenisTableSeeder::class);
        $this->call(MasterBentukTableSeeder::class);
        $this->call(MasterJalurTableSeeder::class);
        $this->call(MasterNamaTableSeeder::class);
        $this->call(ApiIntegrationTableSeeder::class);
    }
}
