<?php

use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
    	    Esto se puede escribir como esta en la proxima linea.
        $professionId = DB::table('professions')
        	->where('title'), 'Desarrollador back-end')
			->value('id');
		*/

		// $professions = DB::select('SELECT id FROM professions WHERE title = ?' , ["Desarrollador back-end"]);	

		// $professions = DB::table('professions')->select('id')->take(1)->get();
		//$profession = DB::table('professions')->select('id', 'title')->first();
		//$profession = DB::table('professions')->first();
		//$profession = DB::table('professions')->select('id')->first();
		//$professionId = DB::table('professions')->where('title', 'Desarrollador back-end')->value('id');

		$professionId = Profession::where('title', 'Desarrollador back-end')->value('id');			

        // dd($profession);

		// dd($profession->id);
		// $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');	

		//dd($professionId);

		factory(User::class)->create([
			'name'			=> 'Jose Bello',
			'email' 		=> 'jbello262@gmail.com',
			'password' 		=> bcrypt('l1n4x'),
			'profession_id'	=> $professionId,
			'is_admin'		=> true,
		]);

		factory(User::class)->create([
			'profession_id' => $professionId
		]);

		factory(User::class, 48)->create();
		
    }
}