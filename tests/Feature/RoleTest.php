<?php

namespace Tests\Feature;

use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * @test
     */
    public function a_user_can_create_role()
    {
        $this->withoutExceptionHandling();
        
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        /* $role = [
            "rolname" => "sysadmin",
            "description" => "Administrador de sistema.",
        ]; */
        
        $this->get('/admin/roles/create')->assertStatus(200);


        $this->post('/admin/roles',$role->toArray())->assertRedirect('/admin/roles');

        $this->assertDatabaseHas('roles', $role->toArray());
    }


    /**
     * @test
     */
    public function a_user_can_view_roles()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $this->get('/admin/roles')->assertSee($role->rolname);
    }

    /**
     * @test
     */
    public function a_user_can_view_a_role()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $this->get('/admin/roles/'. $role->id )->assertSee($role->rolname);
    }

    /**
     * @test
     */
    public function a_user_can_update_a_role()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/roles/'. $role->id . '/edit')->assertSee($role->rolname);

        $role->rolname = $this->faker->userName;
        $role->description = $this->faker->sentence();
        $role->save();

        $this->get('/admin/roles/'. $role->id . '/edit')->assertSee($role->rolname);
    }

    /**
     * @test
     */
    public function a_user_can_delete_a_role()
    {
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/roles/' . $role->id  )->assertSee($role->rolname);

        $role->field_status = false;
        $role->save();

        $this->get('/admin/roles/' . $role->id  )->assertStatus(200);
    }
}
