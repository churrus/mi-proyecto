<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{

    use RefreshDatabase;

    /** @test */

    function it_shows_the_users_list()
    {
        factory(User::class)->create([
            'name' => 'Joel',
        ]);

        factory(User::class)->create([
            'name' => 'Ellie',
        ]);

        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Listado de usuarios')
        ->assertSee('Joel')
        ->assertSee('Ellie');
    }

    /** @test */

    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

    /** @test */

    function it_displays_the_users_details()
    {
        $user = factory(User::class)->create([
            'name' => 'Duilio Palacios',
        ]);

        $this->get('/usuario/' .$user->id)
            ->assertStatus(200)
            ->assertSee('Duilio Palacios');
    }

    /** @test */

    function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuario/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /** @test */

    function it_loads_the_new_users_page()
    {
        $this->get('/usuario/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear usuario');
    }

    /** @test */

    function it_loads_the_edit_users_page()
    {
        $this->get('/usuario/7/edit')
            ->assertStatus(200)
            ->assertSee('Editando al usuario: 7');
    }

    /** @test */

    function it_creates_a_new_user()
    {
        $this->post('/usuarios/', [
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '1234567',
        ])->assertRedirect('usuarios');

        $this->assertCredentials([
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '1234567',
        ]);
    }

    /** @test */

    function the_name_is_required()
    {
        $this->from('usuario/nuevo')
            ->post('/usuarios/', [
                'name' => '',
                'email' => 'duilio@styde.net',
                'password' => '1234567',
        ])
            ->assertRedirect('/usuario/nuevo')
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertEquals(0, User::count());

//        $this->assertDatabaseMissing('users', [
//            'email' => 'duilio@styde.net',
//        ]);
    }

    /** @test */

    function the_email_is_required()
    {
        $this->from('usuario/nuevo')
            ->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => '',
                'password' => '1234567',
            ])
            ->assertRedirect('/usuario/nuevo')
            ->assertSessionHasErrors(['email' => 'El campo email es obligatorio']);

        $this->assertEquals(0, User::count());
    }

    /** @test */

    function the_email_must_be_valid()
    {
        $this->from('usuario/nuevo')
            ->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'correo-no-valido',
                'password' => '1234567',
            ])
            ->assertRedirect('/usuario/nuevo')
            ->assertSessionHasErrors(['email' => 'No es un email válido']);

        $this->assertEquals(0, User::count());
    }

    /** @test */

    function the_email_must_be_unique()
    {
        factory(User::class)->create([
            'email' => 'duilio@styde.net',
        ]);

        $this->from('usuario/nuevo')
            ->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '1234567',
            ])
            ->assertRedirect('/usuario/nuevo')
            ->assertSessionHasErrors(['email' => 'El email ya existe en la Base de datos.']);

        $this->assertEquals(1, User::count());
    }

    /** @test */

    function the_password_is_required()
    {
        $this->from('usuario/nuevo')
            ->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '',
            ])
            ->assertRedirect('/usuario/nuevo')
            ->assertSessionHasErrors(['password' => 'El campo password es obligatorio']);

        $this->assertEquals(0, User::count());
    }

    /** @test */

    function the_password_must_be_have_more_than_six()
    {
        $this->from('usuario/nuevo')
            ->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '123456',
            ])
            ->assertRedirect('/usuario/nuevo')
            ->assertSessionHasErrors(['password' => 'El password tiene que tener más de 6 caracteres.']);

        $this->assertEquals(0, User::count());
    }


}
