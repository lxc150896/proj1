<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $data = [
            [
                'email' => 'lxc150896@gmail.com',
                'password' => bcrypt('12345'),
                'level' => 1,
            ],
            [
                'email' => 'lxc@gmail.com',
                'password' => bcrypt('12345'),
                'level' => 1,
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'level' => 0,
            ],
        ];
        DB::table('users')->insert($data);
    }
}
