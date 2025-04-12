<?php

namespace Database\Seeders;

use App\Models\HomeCounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeCounter();
        $obj->item1_icon = "fa fa-calendar";
        $obj->item1_number = "120";
        $obj->item1_title = "Events";
        $obj->item2_icon = "fa fa-user";
        $obj->item2_number = "100";
        $obj->item2_title = "Speakers";
        $obj->item3_icon = "fa fa-users";
        $obj->item3_number = "120";
        $obj->item3_title = "Attendees";
        $obj->item4_icon = "fa fa-th-list";
        $obj->item4_number = "100";
        $obj->item4_title = "Sponsors";
        $obj->background = "counter.jpg";

        $obj->status = 'Show';
        $obj->save();
    }
}
