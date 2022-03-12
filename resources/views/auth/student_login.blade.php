@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student {{ __('Login') }}</div>

                  @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('student_login_submit') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label for="Registration Number" class="col-md-4 col-form-label text-md-end">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="Registration Number" type="text" class="form-control @error('Registration Number') is-invalid @enderror" name="regi" value="{{ old('Registration Number') }}" required autocomplete="Registration Number" autofocus>

                                @error('Registration Number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="Batch" class="col-md-4 col-form-label text-md-end">{{ __('batch') }}</label>

                            <div class="col-md-6">
                                <input id="batch" type="text" class="form-control @error('Batch') is-invalid @enderror" name="batch" value="{{ old('Batch') }}" required autocomplete="Batch" autofocus>

                                @error('Batch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                          <div class="row mb-3">
                            <label for="Shift" class="col-md-4 col-form-label text-md-end">{{ __('Shift') }}</label>

                            <div class="col-md-6">
                                <input id="shift" type="text" class="form-control @error('shift') is-invalid @enderror" name="shift" value="{{ old('shift') }}" required autocomplete="shift" autofocus>

                                @error('shift')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <br>
                            <br>
                            <br>

                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
