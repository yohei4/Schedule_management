@extends('schedule_management.login.layout')
@section('title', '新規アカウント作成')
@section('main')
<main id="account-page">
    <div class="screen-title__wrap">
        <h1 class="title">新規アカウント作成画面</h1>
    </div>
    <div class="create-account__wrap">
        <div class="form-title">
            <h2>新規アカウント作成</h2>
        </div>
        @if($errors->has('name'))
        <p class="error">※{{ $errors->first('name') }}</p>
        @endif
        @if($errors->has('email'))
        <p class="error">※{{ $errors->first('email') }}</p>
        @endif
        @if($errors->has('password'))
        <p class="error">※{{ $errors->first('password') }}</p>
        @endif
        <form action="{{ route('user.store') }}" id="create-account" method="POST">
        @csrf
            <div class="name-outer">
                    <p><label for="name">名前</label></p>
                    <div class="input-wrap">
                        <input id="name" name="name" type="text">
                    </div>
            </div>
            <div class="email-outer">
                <p><label for="email">メールアドレス</label></p>
                <div class="input-wrap">
                    <input id="email" name="email" type="email">
                </div>
            </div>
            <div class="password-outer">
                <p><label for="password">パスワード</label></p>
                <div class="input-wrap">
                    <input id="password" name="password" type="password">
                    <button id="password-view__btn"><i class="fas fa-eye"></i></button>
                </div>
                <p>※パスワードは6文字以上</p>
            </div>
            <div class="ac-login_button">
                <button type="submit" form="create-account">
                    <span>アカウント作成</span>
                </button>
            </div>
        </form>
        <div class="login-page__move">
            <p>ログインの方は<a href="{{ route('showLogin') }}">こちら</a></p>
        </div>
    </div>
</main>
@endsection