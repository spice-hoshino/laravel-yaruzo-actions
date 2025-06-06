<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PostgresConnectionTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function データを保存・取得できること()
    {
        DB::table('users')->insert([
            'name' => 'taro',
            'email' => 'aaa@aaa.com',
            'password' => bcrypt('password'),
        ]);

        // データ取得
        $user = DB::table('users')->where('name', 'taro')->first();

        $this->assertNotNull($user);
        $this->assertEquals('taro', $user->name);
        $this->assertEquals('aaa@aaa.com', $user->email);
        $this->assertNotEmpty($user->password);
    }

    #[Test]
    public function postgres特有の集約関数を利用できること()
    {
        DB::statement('CREATE TABLE IF NOT EXISTS items (
            id SERIAL PRIMARY KEY,
            price INT NOT NULL
        )');

        DB::table('items')->insert(['price' => 100]);
        DB::table('items')->insert(['price' => 200]);

        // Postgres特有の集約関数例：array_agg
        $result = DB::select('SELECT array_agg(price) as prices FROM items');

        $this->assertNotEmpty($result);
        $this->assertEquals([100, 200], array_map('intval', explode(',', trim($result[0]->prices, '{}'))));

        DB::statement('DROP TABLE IF EXISTS items');
    }
}
