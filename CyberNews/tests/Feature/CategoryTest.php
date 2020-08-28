<?php

namespace Tests\Feature;

use App\categorys;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * @test
     */
    public function a_user_can_create_category()
    {
        $this->withoutExceptionHandling();
        
        $role = factory(Role::class)->create();
        $category = factory(categorys::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/categorys/create')->assertStatus(200);

        $this->post('/admin/categorys',$category->toArray())->assertRedirect('/admin/categorys');

        $this->assertDatabaseHas('categorys', $category->toArray());
    }


    /**
     * @test
     */
    public function a_user_can_view_categorys()
    {
        $this->withoutExceptionHandling();
        $category = factory(categorys::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $this->get('/admin/categorys')->assertSee($category->nombre);
    }

    /**
     * @test
     */
    public function a_user_can_view_a_category()
    {
        $this->withoutExceptionHandling();
        $category = factory(categorys::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());

        $this->get('/admin/categorys/'. $category->id )->assertSee($category->nombre);
    }

    /**
     * @test
     */
    public function a_user_can_update_a_category()
    {
        $this->withoutExceptionHandling();
        $category = factory(categorys::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/categorys/'. $category->id . '/edit')->assertSee($category->nombre);

        $category->nombre = $this->faker->usernombre;
        $category->description = $this->faker->sentence();
        $category->save();

        $this->get('/admin/categorys/'. $category->id . '/edit')->assertSee($category->nombre);
    }

    /**
     * @test
     */
    public function a_user_can_delete_a_category()
    {
        $this->withoutExceptionHandling();
        $category = factory(categorys::class)->create();
        $role = factory(Role::class)->create();
        $this->be(factory('App\User')->create());
        
        $this->get('/admin/categorys/' . $category->id  )->assertSee($category->nombre);

        $category->field_status = false;
        $category->save();

        $this->get('/admin/categorys/' . $category->id  )->assertStatus(200);
    }
}
