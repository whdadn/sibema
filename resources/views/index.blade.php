@extends('halamanUtama.utama')

@section('container')
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($berita as $news)
                <div class="carousel-item">
                    <div class="card mb-3">
                        @if ($news->gambar)
                            <div style="max-height: 200px; overflow:hidden">
                                <img src="{{ asset('storage/' . $news->gambar) }}" alt="">
                            </div>
                        @else
                            <div style="max-height: 200px; overflow:hidden">
                                <img src="https://source.unsplash.com/1200x200?graduation" alt="Default Image">
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->judul_berita }}</h5>
                            <p class="card-text">{{ $news->excerpt }}</p>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $news->id_berita }}">
                                See more..
                            </button>
                        </div>
                    </div>
                </div>

                {{-- modal --}}
                <div class="modal fade{{ $news->id_berita }}" id="exampleModal{{ $news->id_berita }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $news->judul_berita }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $news->isi_berita }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
