<!DOCTYPE html>
<html>

<head>
    <title>SI BEBAS MASALAH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div style="text-align: center;">
        <h2>POLITEKNIK NEGERI BANJARMASIN</h2>
        <p>Jl. Brigjen H. Hasan Basri Komp. ULM Kayutangi Banjarmasin</p>
        <p>web : www.poliban.ac.id, email : poliban@poliban.ac.id</p>
        <p>Telepon : (0511)3305052</p>
    </div>

    <hr>

    <div style="text-align: center;">
        <h3>Bukti Bebas Masalah</h3>
    </div>

    <div class="row mb-2">
        <div class="col-2">
            Nama
        </div>
        <div class="col">
            : {{ $mahasiswa->pluck('nama_mhs')->implode(', ') }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-2">
            Nim
        </div>
        <div class="col">
            : {{ $mahasiswa->pluck('nim')->implode(', ') }}
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            Prodi
        </div>
        <div class="col">
            : {{ $mahasiswa->jurusan->nama_prodi ?? '' }}
        </div>
    </div>

    <div class="mt-5">
        <div class="row mb-2">
            <div class="col-2">
                Status Tugas Akhir
            </div>
            <div class="col">
                : {{ $mahasiswa->tugas_akhir->first()->status_ta }}
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-2">
                Status Registrasi
            </div>
            <div class="col">
                : {{ $mahasiswa->keuangan->first()->status_keuangan }}
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                Status Perpustakaan
            </div>
            <div class="col">
                : {{ $mahasiswa->perpustakaan->first()->status_perpus }}
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                Status Akademik
            </div>
            <div class="col">
                : {{ $mahasiswa->akademik->first()->status_akademik }}
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                Status Bebas Masalah
            </div>
            <div class="col">
                : {{ $mahasiswa->status_umum }}
            </div>
        </div>
    </div>

    <hr>

    <div style="text-align: center;">
        <p>POLITEKNIK NEGERI BANJARMASIN</p>
    </div>
</body>

<script type="text/javascript">
    window.print();
</script>

</html>
