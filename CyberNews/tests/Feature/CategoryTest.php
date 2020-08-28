<?php

namespace Tests\Feature;

use App\categorys;
use App\Role;
use categorysTableSeeder;
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
        
        $this->get('/admin/category/create')->assertStatus(200);

        $this->post('/admin/category',$category->toArray())->assertRedirect('/admin/category');

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

        $this->get('/admin/category')->assertSee($category->nombre);
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

        $this->get('/admin/category/'. $category->id )->assertSee($category->nombre);
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
        
        $this->get('/admin/category/'. $category->id . '/edit')->assertSee($category->nombre);

        $category->nombre = $this->faker->userName;
        $category->descripcion = $this->faker->sentence();
        $category->save();

        $this->get('/admin/category/'. $category->id . '/edit')->assertSee($category->nombre);
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
        
        $this->get('/admin/category/' . $category->id  )->assertSee($category->nombre);

        $category->field_status = false;
        $category->save();

        $this->get('/admin/category/' . $category->id  )->assertStatus(200);
    }
}
