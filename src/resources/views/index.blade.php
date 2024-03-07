@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('script-post')
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@endsection


@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2 class="contact-form__title">お問い合わせ</h2>
    </div>

    <form class="form h-adr" action="/confirm" method="post">
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label--item" for="last_name">お名前</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <div class="form__input-name-layout">
                        <input class="form__input-item--name" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                        <input class="form__input-item--name" type="text" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    <div class="form__error form__error--name">
                        <p>
                            @error('last_name')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="form__input-example">
                    <div class="form__input-example-layout">
                        <p class="form__input-example-text">例） 山田</p>
                        <p class="form__input-example-text">例） 太郎</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text form__input-text--radio">
                    <label>
                        <input class="form__input-item--radio" type="radio" name="gender" value="1" checked>
                        <span class="form__input-item-text">男性</span>
                    </label>
                    <label>
                        <input class="form__input-item--radio_woman form__input-item--radio" type="radio" name="gender" value="2" @if(old('gender')=="2") checked @endif>
                        <span class="form__input-item-text">女性</span>
                    </label>
                    <div class="form__error">
                        <!-- バリテーション -->
                    @error('gender')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label--item" for="email">メールアドレス</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input class="form__input-item" type="email" name="email" id="email" value="{{ old('email') }}">
                    <span class="error-message">メールアドレス形式で入力してください</span>
                    <div class="form__error">
                        <!-- バリテーション -->
                    @error('email')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="form__input-example">
                    <p class="form__input-example-text">例） test@example.com</p>
                </div>
            </div>
        </div>

        <!-- 郵便番号 -->
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label--item" for="postcode">郵便番号</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <!-- 下の記述はCSSでnoneにする -->
                    <span class="p-country-name">Japan</span>
                    <!-- noneはここまで -->
                    <div class="form__input-post-layout">
                        <span class="form__input-post-mark">〒</span>
                        <div class="form__input-post-block">
                            <input class="form__input-item--post p-postal-code" type="text" id="postcode" name="postcode" size="8" max-length="8" value="{{ old('postcode') }}">
                        </div>
                    </div>
                    <div class="form__error">
                        <!-- バリテーション -->
                    @error('postcode')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="form__input-example form__input-example--post">
                    <p class="form__input-example-text">例） 123-4567</p>
                </div>
            </div>
        </div>
        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label--item" for="address">住所</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <!-- <input type="text" name="address"> -->
                    <input class="form__input-item p-region p-locality p-street-address p-extended-address" type="text" name="address" id="address" value="{{ old('address') }}">
                    <!-- <span class="error-message">郵便番号は8文字で入力してください</span> -->
                    <div class="form__error">
                        <!-- バリテーション -->
                    @error('address')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="form__input-example">
                    <p class="form__input-example-text">例） 東京都渋谷区千駄ヶ谷1-2-3</p>
                </div>
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label--item" for="building_name">建物名</label>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input class="form__input-item" type="text" name="building_name" id="building_name" value="{{ old('building_name') }}">
                    <div class="form__error">
                        <!-- バリテーション -->
                    @error('building_name')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="form__input-example">
                    <p class="form__input-example-text">例） 千駄ヶ谷マンション101</p>
                </div>
            </div>
        </div>

        <!-- ご意見 -->
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label--item" for="opinion">ご意見</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <textarea class="form__input-item--textarea" name="opinion" id="opinion" maxlength="120">{{ old('opinion') }}</textarea>
                    <div class="form__error">
                        <!-- バリテーション -->
                    @error('opinion')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection