@extends('halamanUtama.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto">
                <form action="/login" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            value="{{ old('username') }}" required />
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required />
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-2" name="submit" type="submit">
                        Login
                    </button>
                    <small class="d-block text-center mt-3">Lupa Password? <a href="/lupaPassword">Klik
                            Disni</a></small>
                    <small class="d-block text-center mt-1">Ubah Password? <a href="/ubahPassword">Klik
                            Disini</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection
