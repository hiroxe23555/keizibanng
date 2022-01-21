<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $date = new Datetime();
        for($i=0; $i<30; $i++){
			DB::table('admins')->insert([
				'username' => 'User-' . $i,
				'email' => 'user-'.$i.'@example.com',
				'password' => bcrypt('password-' . $i),
                'datetime' =>  $date->format('Y-m-d H:i:s'),
			]);
		}
    }
}
