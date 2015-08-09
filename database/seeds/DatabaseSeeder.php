<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * All database tables
     *
     * @var array
     */
    protected $tables = [

        'users',
        'statuses'

    ];

    /**
     * All seeder class
     *
     * @var array
     */
    protected $seeders = [

        'UsersTableSeeder',
        'StatusTableSeeder'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->cleanDatabase();

        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }

        Model::reguard();

    }


    /**
     * Truncate all tables from database
     *
     */
    public function cleanDatabase()
    {
        //Disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();

        }
        //Disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


    }
}
