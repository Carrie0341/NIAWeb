@extends('layout.master')

@section('title', 'alliance')

@section('extra_head')

@endsection

@section('content')
<div class="bg-vl">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
    <div class="four"></div>
    <div class="five"></div>
</div>
<section class="first">
    <div class="alliance-title">
        <h3>Alliance</h3>
        <h1>產學聯盟</h1>

        <div class="d-flex flex-row flex-wrap" style="margin-top: 41px;">
            <a href="/alliance/era" class="ia-icon">
                <img src="/images/ia-circle.svg">
                <div class="ai-logo">
                    <img src="/images/alliance/era-icon.svg">
                </div>
                <div>延展實境應用技術產學聯盟</div>
            </a>
            <a href="/alliance/rrclp" class="ia-icon">
                <img src="/images/ia-circle.svg">
                <div class="ai-logo">
                    <img src="/images/alliance/rrclp-icon.svg">
                </div>
                <div>化學迴路程序於資源化技術聯盟</div>
            </a>
            <a href="/alliance/sport" class="ia-icon">
                <img src="/images/ia-circle.svg">
                <div class="ai-logo">
                    <img src="/images/logo-01-cut.png">
                </div>
                <div>智能運動科技應用技術聯盟</div>
            </a>
        </div>
    </div>
</section>

@endsection
