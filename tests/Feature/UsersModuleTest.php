<?php

namespace Tests\Feature;

use App\User;
use App\Profession;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{

	//Use RefreshDatabase;
	
    /** @test   */

	function it_shows_the_users_lists()
    {
        
        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');
        
        // dd($professionId);

    	factory(User::class)->create([
    		'name' => 'Joel',
    		'website' => 'thelastofus.com',
    		'profession_id' => $professionId,
    	]); 

    	factory(User::class)->create([
    		'name' => 'Ellie',
    	]); 

        $this->get('/usuarios/')
        	->assertStatus(200)
        	->assertSee('Joel')
        	->assertSee('Ellie');
    }

    /** @test   */

    function it_loads_the_users_list_page()
    {
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Joel')
        	->assertSee('Ellie');
    }

    /** @test   */
	
	function it_displays_a_404_error_if_the_user_if_not_found()
	{
		$this->get('/usuarios/999')
			->assertStatus(404)
			->assertSee('Usuario no encontrado');
	}

    /** @test   */
    
    function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
        	->assertStatus(200)
        	->assertSee("Crear un nuevo usuario");
    }

    /** @test   */

    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
    	$this->get('/usuarios?empty')
    		->assertStatus(200)
    		->assertSee('No hay usuarios registrados');
    }

    /** @test   */

    function it_displays_the_users_details()
    {
    	$user = factory(User::class)->create([
    		'name' => 'Jose Bello'
    	]);

        $this->get('/usuarios/'.$user->id)
        	->assertStatus(200)
        	->assertSee('Jose Bello');
    }

    /** @test   */

    function it_crates_a_new_user()
    {
        // Este metodo regresa los errores 
        //$this->withoutExceptionHandling();

        $this->post('/usuarios/', [
            'name'  => 'Jose Bello',
            'email' => 'jbello262@gmail.com',
            'password' => bcrypt(123456),
        ])->assertRedirect('usuarios');

        // ->assertSee('Procesando información...');

        $this->assertCredentials('users', [
            'name' => 'Jose Bello',
            'email' => 'jbello262@gmail.com',
            'password' => '123456',
        ]);

    }

    

}
