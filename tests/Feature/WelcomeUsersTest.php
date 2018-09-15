<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** @test  */
    public function it_wellcome_users_with_nickname()
    {
        $this->get('saludo/jose/jbello2')
        	->assertStatus(200)
        	->assertSee('Bienvenido Jose, ');
    }
    public function it_wellcome_users_without_nickname()
    {
        $this->get('saludo/jose/jbello2')
        	->assertStatus(200)
        	->assertSee('Bienvenido Jose, tu apodo es jbello2');
    }
}
