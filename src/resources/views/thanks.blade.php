@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__heading">
        <h2>ご意見いただきありがとうございました。</h2>

        <!-- トップページへの遷移は作成しない -->
        <div class="thanks__link">
            <a class="thanks__link-item" href="#">トップページへ</a>
        </div>
        
    </div>
</div>
@endsection