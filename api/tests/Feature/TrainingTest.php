<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Training;

class TrainingTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_training()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/trainings', [
            'name' => 'Test Training',
            'description' => 'Descrição teste',
            'level' => 'beginner',
        ]);

        $response->assertCreated();
        $response->assertJsonFragment(['name' => 'Test Training']);
    }

    public function test_user_cannot_create_training_without_name()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/trainings', [
            'description' => 'Descrição',
            'level' => 'beginner',
        ]);

        $response->assertStatus(422); // validation error
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_user_cannot_access_others_trainings()
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        $training = Training::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($other)->getJson("/api/trainings/{$training->id}");

        $response->assertStatus(403);
    }
}
