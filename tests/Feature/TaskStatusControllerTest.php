<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->user = User::factory()->create();
        TaskStatus::factory()->count(10)->create();
    }
    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($this->user)->get(route('task_statuses.edit', $taskStatus));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->actingAs($this->user)->post(route('task_statuses.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate(): void
    {
        $taskStatus = TaskStatus::factory()->create();
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->actingAs($this->user)->patch(route('task_statuses.update', $taskStatus), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDelete(): void
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('task_statuses', ['id' => (array) $taskStatus['id']]);
    }
}
