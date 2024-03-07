@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2 class="contact-form__title">内容確認</h2>
    </div>

    <form class="form" action="/thanks" method="post">
        @csrf
        <dl class="confirm-list">
            <dt class="confirm-list__label">お名前</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input class="confirm-list__input--name" type="hidden" name="last_name" value="{{  $contact['last_name'] }}" readonly>
                    <input class="confirm-list__input--name" type="hidden" name="first_name" value="{{ $contact['first_name'] }}"> {{  $contact['last_name'] }} {{ $contact['first_name'] }}
                </dd>
            </div>
        </dl>

        <dl class="confirm-list">
            <dt class="confirm-list__label">性別</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly>
                    @if ($contact['gender'] == '1')
                    {{'男性'}}
                    @else
                    {{'女性'}}
                    @endif
                </dd>
            </div>
        </dl>

        <dl class="confirm-list">
            <dt class="confirm-list__label">メールアドレス</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input class="confirm-list__input" type="hidden" name="email" value="{{ $contact['email'] }}" readonly> {{ $contact['email'] }}
                </dd>
            </div>
        </dl>

        <dl class="confirm-list">
            <dt class="confirm-list__label">郵便番号</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input class="confirm-list__input" type="hidden" name="postcode" value="{{ $contact['postcode'] }}" readonly> {{ $contact['postcode'] }}
                </dd>
            </div>
        </dl>

        <dl class="confirm-list">
            <dt class="confirm-list__label">住所</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input class="confirm-list__input" type="hidden" name="address" value="{{ $contact['address'] }}" readonly> {{ $contact['address'] }}
                </dd>
            </div>
        </dl>

        <dl class="confirm-list">
            <dt class="confirm-list__label">建物名</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input class="confirm-list__input" type="hidden" name="building_name" value="{{ $contact['building_name'] }}" readonly>{{ $contact['building_name'] }}
                </dd>
            </div>
        </dl>

        <dl class="confirm-list">
            <dt class="confirm-list__label">ご意見</dt>
            <div class="confirm-list__detail-layout">
                <dd class="confirm-list__detail">
                    <input class="confirm-list__input" type="hidden" name="opinion" value="{{ $contact['opinion'] }}" readonly>{{ $contact['opinion'] }}
                </dd>
            </div>
        </dl>

        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        <div class="form__button--fix">
            <button class="form__button-submit--back" type="submit" name="back" value="back">修正する</button>
        </div>
    </form>
</div>
@endsection
