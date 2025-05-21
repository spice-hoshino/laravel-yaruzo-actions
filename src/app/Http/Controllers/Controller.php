<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function test(int $a): string
    {
        // 型違反: intを返すべきでないのに返す
        return $a;
    }

    public function undefinedVar(): int
    {
        // 未定義変数を返す
        return $undefined;
    }
}
