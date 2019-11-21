@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="privacy_polity page_block">
        <div class="block_inner">
            <h1 class="block_title">{!! nl2br(e($privacy->privacylang[0]->title)) !!}</h1>
            <div class="text">
                {!! nl2br(e($privacy->privacylang[0]->content)) !!}
                <br>
                @foreach($termList as $termKey => $termValue)
                    <h2 class="block_subtitle">{!! nl2br(e($termValue->privacyTermlang[0]->title)) !!}</h2>
                    {!!  html_entity_decode($termValue->privacyTermlang[0]->content) !!}
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')

@endsection