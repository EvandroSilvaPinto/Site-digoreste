<?php

use Illuminate\Database\Seeder;

use App\Model\Permissions;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = DB::table('roles')->first();

        if(empty($roles))
        {
            DB::table('roles')->insert(array(
                'name'       => 'Administrador',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ));
        }

        $routes = Route::getRoutes();

        foreach($routes as $route)
        {  
            if(substr($route->getName(), 0, 3) == "cms"
                && $route->getName() != 'cms-auth'
                && $route->getName() != 'cms-home'
                && $route->getName() != 'cms-auth-logout'
            ){
                $permission = Permissions::where('name', $route->getName())->get();

                if(count($permission) == 0)
                {   
                    $permissionId = Permissions::create(array(
                        'readable_name' => $route->getAction()['nickname'],
                        'name'          => $route->getName(),
                    ))->id;

                    DB::table('permission_role')->insert(array(
                        'permission_id' => $permissionId,
                        'role_id'       => 1,
                        'value'         => -1,
                        'expires'       => null,
                    ));
                }
            }
        }

        $user = DB::table('users')->first();

        $countries = DB::table('countries')->first();

        if(empty($countries))
        {
            $countries = file_get_contents("database/seeds/files/countries.json");

            DB::table('countries')->insert(json_decode($countries, true));
        }

        $states = DB::table('states')->first();

        if(empty($states))
        {
            $states    = file_get_contents("database/seeds/files/states.json");

            DB::table('states')->insert(json_decode($states, true));
        }

        $cities = DB::table('cities')->first();

        if(empty($cities))
        {
            $cities    = file_get_contents("database/seeds/files/cities.json");

            DB::table('cities')->insert(json_decode($cities, true));
        }   

        $sexes = DB::table('sexes')->first();

        if(empty($sexes))
        {
            $sexes    = file_get_contents("database/seeds/files/sexes.json");

            DB::table('sexes')->insert(json_decode($sexes, true));
        }          

        if(empty($user))
        {
            DB::table('users')->insert([
                'first_name'     => 'Administrador',
                'last_name'      => 'CMS',
                'email'          => 'evandrosilvapinto@outlook.com',
                'address'        => '',
                'cep'            => '',
                'neighoarhood'   => '',
                'phone'          => '',
                'cellphone'      => '',
                'countries_id'   => '1',
                'states_id'      => '11',
                'cities_id'      => '5220',
                'sexes_id'       => '1',
                'status'         => '1',
                'password'       => bcrypt('927254'),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ]);
        } 

        $rolesUser = DB::table('role_user')->first();

        if(empty($rolesUser))
        {
            DB::table('role_user')->insert(array(
                'user_id' => 1,
                'role_id' => 1
            ));
        }
        
    }
}
