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

    /**
     * 失敗テスト1: 文字列比較失敗
     */
    public function test_string_comparison_failure(): void
    {
        $expected = 'Laravel';
        $actual = 'Symfony';
        $this->assertEquals($expected, $actual, '文字列が一致しません');
    }

    /**
     * 失敗テスト2: 数値比較失敗
     */
    public function test_number_comparison_failure(): void
    {
        $this->assertEquals(100, 50, '数値が期待値と異なります');
    }

    /**
     * 失敗テスト3: 配列比較失敗
     */
    public function test_array_comparison_failure(): void
    {
        $expected = ['apple', 'banana', 'cherry'];
        $actual = ['apple', 'orange', 'cherry'];
        $this->assertEquals($expected, $actual, '配列の内容が一致しません');
    }

    /**
     * 失敗テスト4: null/not nullアサーション失敗
     */
    public function test_null_assertion_failure(): void
    {
        $value = 'not null';
        $this->assertNull($value, '値がnullではありません');
    }

    /**
     * 失敗テスト5: HTTPステータス失敗
     */
    public function test_http_status_failure(): void
    {
        $response = $this->get('/');
        $response->assertStatus(404, 'HTTPステータスが期待値と異なります');
    }

    /**
     * 失敗テスト6: 例外発生テスト
     */
    public function test_exception_failure(): void
    {
        throw new \Exception('意図的に発生させた例外です');
    }

    /**
     * 失敗テスト7: JSONレスポンス失敗
     */
    public function test_json_response_failure(): void
    {
        // 存在しないAPIエンドポイントにアクセス
        $response = $this->getJson('/api/nonexistent');
        $response->assertStatus(200)
                 ->assertJson(['status' => 'success']);
    }

    /**
     * 失敗テスト8: ファイル存在チェック失敗
     */
    public function test_file_exists_failure(): void
    {
        $this->assertFileExists('/path/to/nonexistent/file.txt', 'ファイルが存在しません');
    }

    /**
     * 失敗テスト9: 正規表現マッチ失敗
     */
    public function test_regex_match_failure(): void
    {
        $text = 'Hello World';
        $this->assertMatchesRegularExpression('/^Laravel/', $text, '正規表現にマッチしません');
    }

    /**
     * 失敗テスト10: カウント失敗
     */
    public function test_count_failure(): void
    {
        $array = [1, 2, 3, 4, 5];
        $this->assertCount(10, $array, '配列の要素数が期待値と異なります');
    }
}
