<?php
use App\Role;
use Illuminate\Database\Seeder;
class RolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create(['role'=>'DG']);
      Role::create(['role'=>'Shallow']);
      Role::create(['role'=>'Aderant']);
    }
}
