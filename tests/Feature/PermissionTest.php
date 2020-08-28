<?php

namespace Tests\Feature;

use App\Permission;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * @test
     */
    public function a_user_can_create_permission()
    {
        $this->withoutExceptionHandling();
        
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/permissions/create')->assertStatus(200);

        $this->post('/admin/permissions',$permission->toArray())->assertRedirect('/admin/permissions');

        $this->assertDatabaseHas('permissions', $permission->toArray());
    }


    /**
     * @test
     */
    public function a_user_can_view_permissions()
    {
        $this->withoutExceptionHandling();
        $permission = factory(Permission::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $this->get('/admin/permissions')->assertSee($permission->name);
    }

    /**
     * @test
     */
    public function a_user_can_view_a_permission()
    {
        $this->withoutExceptionHandling();
        $permission = factory(Permission::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $this->get('/admin/permissions/'. $permission->id )->assertSee($permission->name);
    }

    /**
     * @test
     */
    public function a_user_can_update_a_permission()
    {
        $this->withoutExceptionHandling();
        $permission = factory(Permission::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/permissions/'. $permission->id . '/edit')->assertSee($permission->name);

        $permission->name = $this->faker->userName;
        $permission->description = $this->faker->sentence();
        $permission->save();

        $this->get('/admin/permissions/'. $permission->id . '/edit')->assertSee($permission->name);
    }

    /**
     * @test
     */
    public function a_user_can_delete_a_permission()
    {
        $this->withoutExceptionHandling();
        $permission = factory(Permission::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/permissions/' . $permission->id  )->assertSee($permission->name);

        $permission->field_status = false;
        $permission->save();

        $this->get('/admin/permissions/' . $permission->id  )->assertStatus(200);
    }
}
