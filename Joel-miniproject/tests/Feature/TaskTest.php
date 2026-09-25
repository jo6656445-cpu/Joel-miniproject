<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_complete_the_task_crud_workflow(): void
    {
        $this->get(route('tasks.index'))->assertOk();

        $this->post(route('tasks.store'), [
            'task_name' => 'Finish project',
            'description' => 'Complete the Laravel mini project',
            'status' => 'Pending',
            'due_date' => '2026-09-30',
        ])->assertRedirect(route('tasks.index'));

        $task = Task::query()->firstOrFail();
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'Pending']);

        $this->put(route('tasks.update', $task), [
            'task_name' => 'Finish Laravel project',
            'description' => 'Complete and submit the project',
            'status' => 'Pending',
            'due_date' => '2026-10-01',
        ])->assertRedirect(route('tasks.index'));

        $this->put(route('tasks.status', $task), [
            'status' => 'Completed',
        ])->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'Completed']);

        $this->delete(route('tasks.destroy', $task))->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}