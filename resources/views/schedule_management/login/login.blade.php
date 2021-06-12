
@extends('schedule_management.login.layout')
@section('title', 'ログイン画面')
@section('main')<!DOCTYPE html>
<main id="login-page">
    <div class="screen-title__wrap">
        <h1 class="title">ログイン画面</h1>
    </div>
    <div class="create-account__wrap">
        <div class="form-title">
            <h2>メールアドレスでログイン</h2>
        </div>
        <form action="{{ route('login') }}" id="login" method="POST">
        @csrf
            <div class="email-outer">
                <div class="input-wrap">
                    <i_right class="fas fa-envelope"></i_right>
                    <input id="email" name="email" type="email" placeholder="メールアドレス">
                </div>
            </div>
            <div class="password-outer">
                <div class="input-wrap">
                    <i_right class="fas fa-key"></i_right>
                    <input id="password" name="password" type="password" placeholder="パスワード">
                    <button id="password-view__btn"><i class="fas fa-eye"></i></button>
                </div>
            </div>
            @if($errors->has('email'))
            <p class="error">※{{ $errors->first('email') }}</p>
            @endif
            @if($errors->has('password'))
            <p class="error">※{{ $errors->first('password') }}</p>
            @endif

            @if (session('login_error'))
            <div>
                {{ session('login_error') }}
            </div>
            @endif

            <div class="ac-login_button">
                <button type="submit" form="login">
                    <span>ログインする</span>
                </button>
            </div>
        </form>
        <div class="login-page__move">
            <p>新規アカウントの作成は<a href="{{ route('account') }}">こちら</a></p>
        </div>
    </div>
</main>
@endsection