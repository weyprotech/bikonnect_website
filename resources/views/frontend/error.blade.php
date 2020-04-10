@extends('frontend.shared._layout',array('seoList' => array('en' => array('title' => 'error','keyword' => '','description' => ''),'zh-TW' => array('title' => 'error','keyword' => '','description' => ''))))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div style="text-align: center;width: 100%;top:35%;position: absolute;">
        <h1>Oops,404</h1>
        <div class="text">
            <p>很抱歉，找不到您要的頁面</p>
            <p>請點選上方選單，前往您有興趣的頁面繼續瀏覽</p>
        </div>
    </div>
</main>
@endsection

@section('script')

@endsection