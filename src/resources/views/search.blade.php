@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection
@section('script-search')
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2 class="contact-form__title">管理システム</h2>
    </div>

    <form class="form" action="/search" method="get">
        <div class="form__container">
            <div class="form__group">
                <label class="form__label--item" for="s_fullname">
                    お名前
                </label>
                <div class="form__input-layout form__input-layout--first">
                    <input class="form__input-item" type="text" name="s_fullname" id="s_fullname" value="">
                    <div class="form__input-layout-inner">
                        <span class="form__label--item">性別</span>
                        <label>
                            <input class="form__input--gender form__input-radio" type="radio" name="s_gender" value="" checked>
                            <span>全て</span>
                        </label>
                        <label>
                            <input class="form__input-radio" type="radio" name="s_gender" id="" value="1">
                            <span>男性</span>
                        </label>
                        <label>
                            <input class="form__input-radio" type="radio" name="s_gender" id="" value="2">
                            <span>女性</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <label class="form__label--item" for="s_from">
                    登録日
                </label>
                <div class="form__input-layout">
                    <input class="form__input-item form__input-item--date" type="date" name="s_from" id="s_from">
                    <span class="form__input-item--dash">~</span>
                    <input class="form__input-item form__input-item--date" type="date" name="s_until" >
                </div>
            </div>
            <div class="form__group">
                <label class="form__label--item" for="s_email">
                    メールアドレス
                </label>
                <div class="form__input-layout">
                    <input class="form__input-item" type="text" name="s_email" id="s_email">
                </div>
            </div>
            <div class="form__group-search">
                <!-- <button class="form__group-search-button" type="submit">検索</button> -->
                <button class="form__group-search-button" type="submit">検索</button>
            </div>
            <div class="form__group-reset">
                <button class="form__group-reset-button" type="submit" name="reset" value="reset">リセット</button>
            </div>
        </div>
    </form>

    <div class="paginate">
        {{ $contacts->appends(request()->query())->links('vendor.pagination.tailwind') }} 
    </div>

    <table class="search-table">
        <tr class="search-table__row">
            <th class="search-table__heading">ID</th>
            <th class="search-table__heading">お名前</th>
            <th class="search-table__heading">性別</th>
            <th class="search-table__heading">メールアドレス</th>
            <th class="search-table__heading">ご意見</th>
            <th class="search-table__heading">
            </th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="search-table__row">
            <td class="search-table__detail">{{ $contact->id }}</td>
            <td class="search-table__detail">{{ $contact->fullname }}</td>
            <td class="search-table__detail">
                @if ($contact->gender == '1')
                {{'男性'}}
                @else
                {{'女性'}}
                @endif
            </td>
            <td class="search-table__detail">{{ $contact->email }}</td>
            <td class="search-table__detail">{{ Str::limit($contact->opinion, 50) }}</td>
            <td class="search-table__detail">
                <form action="/search" method="post">
                @method('DELETE')
                @csrf
                    <div>
                        <input type="hidden" name="id" value="{{ $contact['id'] }}">
                        <div class="form__input-delete">
                            <button class="form__input-delete-button" type="submit">削除</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
