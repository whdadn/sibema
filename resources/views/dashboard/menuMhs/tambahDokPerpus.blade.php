@extends('dashboard.layouts.utama')

@section('container')
    <div class="left-side-bar">

        <p class="text-light text-center">Politeknik Negeri Banjarmasin</p>
        <img class="rounded mx-auto d-block mb-3" src="/gambar/poliban.png" alt="Logo" width="95">

        <div class="menu-block
                customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="/dashboardMhs" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-grid"></span><span class="mtext">Dasboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-upload1"></span><span class="mtext">Upload Dokumen</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/dashboardMhs/uploadTa">Dokumen Tugas Akhir</a></li>
                            <li>
                                <a href="/dashboardMhs/uploadRegis">Dokumen Registrasi</a>
                            </li>
                            <li><a href="/dashboardMhs/uploadPerpus">Dokumen Perpustakaan</a></li>
                            <li><a href="/dashboardMhs/uploadAkademik">Dokumen Akademik</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="row justify-content-center mb-lg-5">
            <div class="col-md-6 col-sm-12">
                <div class="title text-center mb-45">
                    <h4>Tambah Dokumen Perpustakaan</h4>
                </div>
            </div>
        </div>

        <div id="errorContainer"></div>

        <form action="/dashboardMhs/uploadPerpus/tambahDokPerpus" method="POST" enctype="multipart/form-data"
            id="uploadForm">
            @csrf
            <div class="form-group">
                <label>Bukti Pengembalian</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="pengembalian" id="pengembalian">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan" id="keterangan" required>
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#uploadForm').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const formData = new FormData(form[0]);

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function() {
                    // Jika berhasil diunggah, redirect ke halaman yang dituju
                    window.location.href = "/dashboardMhs/uploadPerpus";
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    const errorContainer = $('#errorContainer');
                    errorContainer.empty();

                    $.each(errors, function(field, messages) {
                        const label = $(".file-input-label[for='" + field + "']")
                            .text();
                        $.each(messages, function(key, message) {
                            errorContainer.append('<p>' + label + ' ' +
                                message + '</p>');
                        });
                    });
                }
            });
        });
    });
</script>
