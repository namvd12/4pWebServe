<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\devices;
class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 200; $i++)
        {
            $device = new Devices();
            $device->SN = "SN".$i;
            $device->NameDevice = "Name device".$i; 
            $device->save();
        }
    }
}