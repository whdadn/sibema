@extends('halamanUtama.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto">
                <form>
                    <h1 class="h3 mb-3 fw-normal text-center">Ubah Password</h1>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Usernamer" />
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="passbaru" class="form-control" id="passbaru" placeholder="Password" />
                        <label for="passbaru">Password Baru</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">
                        Simpan
                    </button>
                    <small class="d-block text-center mt-3">Lupa Password? <a href="/lupaPassword">Klik
                            Disni</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection
