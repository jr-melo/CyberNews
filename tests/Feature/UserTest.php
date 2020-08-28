<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * @test
     */
    public function a_user_can_create_user()
    {
        $this->withoutExceptionHandling();
        
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $user = [
            "name" => "lorem ipsum",
            "email" => "test@test.com",
            "role_id" => "3",
            "password" => "12345678",
            "pass2" => "12345678"
        ];
        
        $this->get('/admin/users/create')->assertStatus(200);

        $user["password"]=bcrypt($user["password"]);
        $user["pass2"]=$user["password"];

        $this->post('/admin/users',$user)->assertRedirect('/admin/users');

        unset($user["password"]);
        unset($user["pass2"]);

        $this->assertDatabaseHas('users', $user);
    }


    /**
     * @test
     */
    public function a_user_can_view_users()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $user = factory(User::class)->create();
        $this->get('/admin/users')->assertSee($user->name);
    }

    /**
     * @test
     */
    public function a_user_can_view_a_user()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $user = factory(User::class)->create();
        $this->get('/admin/users/'. $user->id )->assertSee($user->name);
    }

    /**
     * @test
     */
    public function a_user_can_update_a_user()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $user = factory(User::class)->create();
        $this->get('/admin/users/'. $user->id . '/edit')->assertSee($user->name);

        $user->name = $this->faker->name;
        $user->email = $this->faker->unique()->safeEmail;
        $user->role_id = "3";
        $user->password = $this->faker->password;
        $user->save();

        $this->get('/admin/users/'. $user->id . '/edit')->assertSee($user->name);
    }

    /**
     * @test
     */
    public function a_user_can_delete_a_user()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $user = factory(User::class)->create();
        $this->get('/admin/users/' . $user->id  )->assertSee($user->name);

        $user->field_status = false;
        $user->save();

        $this->get('/admin/users/' . $user->id  )->assertStatus(200);
    }
}
