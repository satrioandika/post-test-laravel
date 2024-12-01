@extends('layout.app')

@section('content')

<style>
    body {
    font-family: 'Montserrat', 'Poppins', sans-serif;
    background-color: #f8f9fa;
}

.hero-section {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 100px 0;
}

.hero-section h1 {
    font-size: 3em;
    font-weight: bold;
}

.hero-section p {
    font-size: 1.2em;
}

.card {
    background-color:  #343a40;
    color: white;
}

.category-card {
    transition: transform 0.3s;
}

.category-card:hover {
    transform: scale(1.05);
}
</style>

<div class="hero-section">
    <div class="container mt-5">
        <h1 class="display-4">Selamat datang di Data Produk</h1>
        <p class="lead">Solusi lengkap Anda untuk mengelola informasi produk dengan efisien.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-3">Lihat Produk</a>
    </div>
</div>

<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Kategori Produk</h2>
        <p class="text-muted">Jelajahi berbagai macam kategori produk kami.</p>
    </div>
    <div class="row">
    <div class="col-md-4 mb-4">
            <div class="card category-card shadow">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title text-center">Kategori 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est numquam repellendus accusamus commodi maiores, culpa quas corporis aliquid totam iusto saepe, beatae fuga blanditiis nemo quasi sint ipsam animi impedit?</p>
                    <a href="#" class="btn btn-primary mt-auto">Jelajahi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card category-card shadow">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title text-center">Kategori 2</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae odio repudiandae, praesentium nemo dolores sunt ipsa, quidem eum dolorum nisi minima harum, quis architecto inventore aperiam ullam dolor omnis maiores?</p>
                    <a href="#" class="btn btn-primary mt-auto">Jelajahi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card category-card shadow">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title text-center">Kategori 3</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam ad, dolore delectus, distinctio, voluptas deserunt ipsum reprehenderit ab voluptatibus illum dolor pariatur magnam laborum maxime. Impedit aut possimus unde cum?</p>
                    <a href="#" class="btn btn-primary mt-auto">Jelajahi</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
