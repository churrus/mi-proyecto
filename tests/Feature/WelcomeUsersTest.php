<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** @test */

    function it_welcomes_users_with_nickname()
    {
        $this->get('/saludo/sergio/txurrus')
            ->assertStatus(200)
            ->assertSee('Bienvenido Sergio, tu apodo es txurrus');
    }

    /** @test */

    function it_welcomes_users_without_nickname()
    {
        $this->get('/saludo/sergio')
            ->assertStatus(200)
            ->assertSee('Bienvenido Sergio');
    }
}
