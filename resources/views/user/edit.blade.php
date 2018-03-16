@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">
                        <form method="POST" action="/user/edit/{{Auth::User()->id}}">
                            @csrf


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Почта</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $user->surname }}" >

                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Отчество</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ $user->middle_name }}" >

                                    @if ($errors->has('middle_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{$user->phone}}" >

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
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
                    <div class="form-group row ">
                        <div class="col-md-6 offset-md-4">
                            <a href="/user/reset-pass/{{Auth::user()->id}}"  class="btn btn-primary">
                                Сбросить пароль
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection