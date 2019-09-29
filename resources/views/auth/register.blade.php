@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body rounded-lg">
                    <p class="text-muted text-center mb-5">Silahkan masukan informasi dibawah ini.</p>
                    <div class="d-flex justify-content-center mb-5">
                        <a href="{{ route('login') }}" class="btn btn-white mr-3 text-button-login shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20"
                                 class="mr-3"
                                 width="20"
                                 height="20">
                                <path fill="#5e72e4"
                                      d="M14.66 15.66A8 8 0 1 1 17 10h-2a6 6 0 1 0-1.76 4.24l1.42 1.42zM12 10h8l-4 4-4-4z" />
                            </svg>
                            Kembali login.
                        </a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-4 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2zZZZ">
                                        <path
                                              fill="#eeeeee"
                                              d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="form-control border-0 text-muted {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   value="{{ old('name') }}"
                                   placeholder="Youre Name.."
                                   required
                                   autofocus>
                        </div>
                        <div class="input-group mb-4 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         width="20"
                                         height="20"
                                         class="mr-2zZZZ">
                                        <path fill="#eeeeee"
                                              d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control border-0 text-muted {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ old('email') }}"
                                   placeholder="Email"
                                   required>
                        </div>
                        <div class="input-group mb-2 mt-3 shadow-sm mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         width="20"
                                         height="20">
                                        <path fill="#eeeeee"
                                              d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control border-0 text-muted {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="Password"
                                   required>
                        </div>
                        <div class="input-group mb-2 mt-3 shadow-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         width="20"
                                         height="20">
                                        <path fill="#eeeeee"
                                              d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="password"
                                   name="password_confirmation"
                                   id="password-confirm"
                                   class="form-control border-0 text-muted"
                                   placeholder="Confirmation password.."
                                   required>
                        </div>

                        <div class="d-flex justify-content-center pt-3 mb-3">
                            <button type="submit" class="btn btn-primary shadow-sm">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
