<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('role_user');
    $dg = User::create([

        'name'=>'DG',
        'email'=>'dg@gmail.com',
        'password'=>Hash::make('12345678')
     ]);
     $shallow = User::create([

        'name'=>'Shallow',
        'email'=>'shallow@gmail.com',
        'password'=>Hash::make('12345678')
     ]);
     $aderant = User::create([

        'name'=>'Aderant',
        'email'=>'aderant@gmail.com',
        'password'=>Hash::make('12345678')
     ]);
     $dgRole=Role::where('role','DG')->first();
     $shallowRole=Role::where('role','Shallow')->first();
     $aderantRole=Role::where('role','Aderant')->first();

     $dg->roles()->attach($dgRole);
     $shallow->roles()->attach($shallowRole);
     $aderant->roles()->attach($aderantRole);
    }
}
