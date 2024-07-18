@extends('TampilanUser.partials.main')

@section('konten')
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-md-12 col-xl-12 col-xxl-8">
                    <!-- Project Card 1-->

                    @if ($postinganTerbaru)
                    <div class="card mb-3">
                        <img src="{{ asset('foto/postingan/' . $postinganTerbaru->gambar) }}" class="card-img-top"
                            alt="Wild Landscape" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $postinganTerbaru->judul }}</h5>
                            <p class="card-text">
                                {{ $postinganTerbaru->isi }}
                            </p>
                            <a href="{{ $postinganTerbaru->link }}" target="_blank" class="btn btn-primary">Selengkapnya</a>
                            <p class="card-text mt-3">
                                <small class="text-muted">{{ $postinganTerbaru->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-danger text-center">Tidak Ada Postingan</div>
                    @endif

                </div>
            </div>

            <!-- Project Card 2-->

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @if ($postinganDst)
                @foreach ($postinganDst as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('foto/postingan/' . $item->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text">{{ $item->isi }}</p>
                                <a href="{{ $item->link }}" target="_blank" class="btn btn-primary">Selengkapnya</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated
                                    {{ $item->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Call to action section-->
    <section class="py-5 bg-gradient-primary-to-secondary text-white">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Contact me</a>
            </div>
        </div>
    </section>
    </main>
@endsection