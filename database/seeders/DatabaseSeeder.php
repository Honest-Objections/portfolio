<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $skills = ['Electron', 'NodeJS', 'Javascript', 'C#', 'Unity3D', '.NET']; 
        foreach($skills as $skill){
            DB::table('skills')->insert(['name' => $skill]);
        }

        DB::table('portfolios')->insert([
            'display_name' => 'Chris Clifton',
            'personal_statement' => 'Coming into my fifth year in the industry, I’m looking for new opportunities in a mid-level role and the challenges that will come with it. While my experience covers a variety of projects, technologies and industries, I consider myself a full stack developer, comfortable using any high level languages and always keen to gain more experience with lower level languages too.',
            'display_image' => 'whatever.png'
        ]);
    }
}
