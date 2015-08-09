<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{


    public function run()
    {

        factory('Crimibook\User', 50)->create();

    }
}
