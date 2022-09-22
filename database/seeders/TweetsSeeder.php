<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// データを挿入するためのDBモデル追加と型定義のためのStrを追加
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Tweetモデルの読み込み　
use App\Models\Tweet;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  ダミーデータを一括で挿入する
    public function run()
    {
        // ダミーデータの追加
        // DB::table('tweets')->insert([
        //     'content' => Str::random(100),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // ファクトリーを呼び出す
        Tweet::factory()->count(10)->create();
    }
}