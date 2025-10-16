@extends('layouts.app')
@section('title', 'Data Barang - ' . $lokasi->nama)

@section('content')
<style>
    html, body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        scroll-behavior: smooth;
        background: #f8fafc;
        font-family: 'Poppins', sans-serif;
    }

    /* === HEADER PARALLAX === */
    .header-bg {
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        width: 100vw;
        height: 30vh;
        background: url('{{ asset('images/bg-inventaris.jpg') }}') center center / cover no-repeat fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        overflow: hidden;
        z-index: 0;
        margin-left: calc(-50vw + 50%);
        margin-right: calc(-50vw + 50%);
    }

    main {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }

    .header-bg::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.65);
        z-index: 1;
    }

    .header-bg h1 {
        position: relative;
        z-index: 2;
        font-size: clamp(1.5rem, 4vw, 3rem);
        font-weight: 800;
        text-transform: uppercase;
        text-shadow: 0 6px 25px rgba(0, 0, 0, 0.85);
        letter-spacing: 3px;
        margin: 0;
    }

    /* === SECTION BARANG === */
    .barang-section {
        background: linear-gradient(to bottom, #f9fafb, #eef2ff);
        padding: 4rem 0 6rem;
        width: 100%;
    }

    .barang-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        width: 90%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .barang-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        transition: all 0.3s ease;
        border-top: 6px solid #3b82f6;
        position: relative;
        overflow: hidden;
    }

    .barang-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .barang-card h2 {
        color: #1e3a8a;
        font-weight: 800;
        font-size: 1.4rem;
        margin-bottom: 0.8rem;
        border-bottom: 3px solid #60a5fa;
        display: inline-block;
        padding-bottom: 4px;
    }

    .barang-card p {
        color: #374151;
        margin: 0.3rem 0;
        font-size: 0.95rem;
        line-height: 1.4;
    }

    .empty-state {
        text-align: center;
        color: #6b7280;
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        padding: 3rem;
        width: 90%;
        max-width: 600px;
        margin: 2rem auto;
    }

    .btn-kembali {
        display: inline-block;
        margin-top: 2rem;
        background: #3b82f6;
        color: white;
        font-weight: 600;
        padding: 12px 28px;
        border-radius: 9999px;
        transition: background 0.3s ease;
        text-decoration: none;
    }

    .btn-kembali:hover {
        background: #2563eb;
    }

    @media (max-width: 768px) {
        .barang-card {
            padding: 1.5rem;
        }

        .barang-card h2 {
            font-size: 1.2rem;
        }

        .header-bg {
            height: 28vh;
        }
    }
</style>

<!-- === HEADER === -->
<div class="header-bg">
    <h1>BARANG DI RUANGAN {{ strtoupper($lokasi->nama) }}</h1>
</div>

<!-- === SECTION BARANG === -->
<section class="barang-section">
    <div class="barang-grid">
        @if($lokasi->barang->isEmpty())
            <div class="empty-state col-span-full">
                <h2>Tidak ada barang di ruangan ini</h2>
                <p>{{ $lokasi->deskripsi ?? 'Tidak ada deskripsi untuk ruangan ini.' }}</p>
            </div>
        @else
            @foreach($lokasi->barang as $b)
                <div class="barang-card">
                    <h2>{{ $b->nama }}</h2>
                    <p><strong>Kode:</strong> {{ $b->kode_barang }}</p>
                    <p><strong>Jumlah:</strong> {{ $b->jumlah }}</p>
                    <p><strong>Harga/Unit:</strong> Rp{{ number_format($b->harga_per_unit, 0, ',', '.') }}</p>
                    <p><strong>Total:</strong> Rp{{ number_format($b->harga_total, 0, ',', '.') }}</p>
                    <p><strong>Kondisi:</strong> {{ $b->kondisi }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <div class="text-center">
        <a href="{{ route('ruangan.public') }}" class="btn-kembali">
            ← Kembali ke Daftar Ruangan
        </a>
    </div>
</section>
@endsection
