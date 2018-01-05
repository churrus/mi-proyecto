<?php

use App\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('professions')->insert([
//            'title' => 'Desarrollador back-end',
//        ]);
//
//        DB::table('professions')->insert([
//            'title' => 'Desarrollador front-end',
//        ]);
//
//        DB::table('professions')->insert([
//            'title' => 'Diseñador web',
//        ]);
        factory(Profession::class)->create([
            'title' => 'Desarrollador back-end',
        ]);

        factory(Profession::class)->create([
            'title' => 'Desarrollador front-end',
        ]);

        factory(Profession::class)->create([
            'title' => 'Diseñador web',
        ]);

        factory(Profession::class,17)->create();
    }

}
