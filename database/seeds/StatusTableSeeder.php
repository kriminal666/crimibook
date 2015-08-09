<?php

use Illuminate\Database\Seeder;



class StatusTableSeeder extends Seeder
{
    public function run()
    {

        factory('Crimibook\Models\Status', 50)->create();

    }
}
