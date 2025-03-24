<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Admin;
        $obj->name = "SilverMask";
        $obj->email = "silvermask@gmail.com";
        $obj->photo = "admin.jpg";
        $obj->password = Hash::make('1234');
        $obj->token = "";
        $obj->save();
    }
}
