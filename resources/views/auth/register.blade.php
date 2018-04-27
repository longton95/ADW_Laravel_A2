@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                   {!!Form::open(array('url' => '/register', 'method'=>'POST', 'files' => true))!!}

                        {!! csrf_field() !!}

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">First Name</label>

                            <div class="col-lg-6">
                                <input
                                        type="text"
                                        class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
                                        name="firstName"
                                        value="{{ old('firstName') }}"
                                        required
                                >
                                @if ($errors->has('firstName'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label text-lg-right">Last Name</label>

                           <div class="col-lg-6">
                                <input
                                        type="text"
                                        class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                                        name="lastName"
                                        value="{{ old('lastName') }}"
                                        required
                                >
                                @if ($errors->has('lastName'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </div>
                                @endif
                           </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>

                            <div class="col-lg-6">
                                <input
                                        type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                >

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Password</label>

                            <div class="col-lg-6">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        required
                                >
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Confirm Password</label>

                            <div class="col-lg-6">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation"
                                        required
                                >
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           <label for="image" class="col-lg-4 col-form-label text-lg-right">Avatar</label>
                           <div class="col-lg-6">
                              <input type="file" name="image">
                              <div class="invalid-feedback">
                                  <strong>If an image is not uploaded Gravatar will be used.</strong>
                              </div>
                           </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
