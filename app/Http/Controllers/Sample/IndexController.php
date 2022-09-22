<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Hello Worldの表示を行ってみよう
    public function showHello(){
        return 'Hello World';
    }

    // getメソッドでurlを取得し表示する idを引数にとる
    public function showId($id){
        // これでもいける
        // return 'show' . $id;

        // ダブルクォートで囲む必要あり
        return "test {$id}";
    }
}