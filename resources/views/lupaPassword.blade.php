@extends('halamanUtama.utama')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto">
                @if (session()->has('berhasil'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('berhasil') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session()->has('gagal'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('gagal') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="/lupaPassword" method="POST">
                    @csrf

                    <h1 class="h3 mb-3 fw-normal text-center">Lupa Password</h1>

                    <div class="form-floating mb-2">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" />
                        <label for="Email">Email</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit">
                        Kirim Verifikasi Link
                    </button>

                </form>
            </main>
        </div>
    </div>
@endsection
