@extends('frontend.shared._layout',array('seoList' => array('en' => array('title' => 'error','keyword' => '','description' => ''),'zh-TW' => array('title' => 'error','keyword' => '','description' => ''))))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div style="text-align: center;width: 100%;top:35%;position: absolute;">
        <h1>Oops,404</h1>
        <div class="text">
            <p>{{ trans('lang.errortitle') }}</p>
            <p>{{ trans('lang.errorcontent') }}</p>
        </div>
    </div>
</main>
@endsection

@section('script')

@endsection