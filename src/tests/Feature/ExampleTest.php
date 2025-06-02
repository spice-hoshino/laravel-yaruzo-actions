<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * この意図的に失敗するテストはGitHub Actionの動作確認用です
     * テスト後は削除またはコメントアウトしてください
     */
    public function test_intentionally_failing_test_for_github_action(): void
    {
        // わざと失敗させるアサーション
        $this->assertTrue(false, 'このテストは意図的に失敗させています - GitHub Action動作確認用');
    }
}
