@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">
                        <p>Сброс пароля для пользователя {{$user->name}} почта({{$user->email}})</p>
                        <form method="POST" action="/user/reset-pass/{{$user->id}}">
                            @csrf
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <a href="/user/edit/{{$user->id}}" class="btn btn-primary">
                                назад в личный кабинет
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection