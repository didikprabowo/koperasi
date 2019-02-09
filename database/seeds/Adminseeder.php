<?php

use Illuminate\Database\Seeder;
use App\Admin;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->email = "didik@gmail.com";
        $admin->username = "didikprabowo";
        $admin->password = Hash::make('didik');
        $admin->save();
    }
}
