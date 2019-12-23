@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="privacy_polity page_block">
        <div class="block_inner">
            <h1 class="block_title">{!! nl2br(e($term->termlang[0]->title)) !!}</h1>
            <div class="text">
                {!!  html_entity_decode($term->termlang[0]->content) !!}
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')

@endsection