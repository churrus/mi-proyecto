<?php

use App\Profession;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $professions = DB::table('professions')->select('id')->take(1)->get();

//        $professions = DB::table('professions')->select('id','title')->where('title', '=', 'Desarrollador back-end')->first();
//        $professions = DB::table('professions')->select('id')->first();

//        $professionId = DB::table('professions')
//            ->where('title', 'Desarrollador back-end')
//            ->value('id');

        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');

        factory(User::class)->create([
            'name' => 'Duilio Palacios',
            'email' => 'duilio@styde.net',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
            'is_admin' => true,
        ]);

        factory(User::class)->create([
            'profession_id' => $professionId,
        ]);

        factory(User::class,48)->create();
    }
}
