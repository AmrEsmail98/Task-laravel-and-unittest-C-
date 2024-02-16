<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */

//test for create new task and load admins and users

    public function test_loads_admins_and_users_in_the_create_task_page_with() {

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('task.create');
        $response->assertViewHasAll(['admins', 'users']);
    }

// test for function store to add new task
    public function test_it_stores_a_new_task_and_redirects() {

        $requestData = [
            'title'       => 'Task title',
            'description' => 'Task description',
            'admin_id'    => 1,
            'user_id'     => 1,
        ];

        $response = $this->post('/task/store', $requestData);
        $response->assertRedirect(route('task.index'));
        $this->assertDatabaseHas('tasks', $requestData);
    }

// test to show all tasks

    public function test_it_shows_all_tasks() {

        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response->assertViewIs('task.index');
        $response->assertViewHas('tasks');
    }

// test it load statistics page with a top users have task

    public function test_it_loads_the_statistics_page_with_top_users() {

        $response = $this->get('/statistics');
        $response->assertStatus(200);
        $response->assertViewIs('task.statistics');
        $response->assertViewHas('topUsers');
    }

}
