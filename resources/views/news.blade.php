@extends('layout.master')

@section('title', 'news')

@section('extra_head')

@endsection

@section('content')
    <section class="first">
        <label>News</label>
        <h1>最新消息</h1>
        <div class="filters">
            <label class="alliance-title">選擇預顯示的聯盟</label>
            <select class="alliance-filter">
                <option>全部</option>
                <option>延展實境應用技術產學聯盟</option>
                <option>化學迴路程序於資源化技術聯盟</option>
            </select>
            <label class="year-title">年份</label>
            <select class="year-filter">
                <option>All</option>
                <option>2019</option>
                <option>2018</option>
            </select>
        </div>
    </section>
@endsection