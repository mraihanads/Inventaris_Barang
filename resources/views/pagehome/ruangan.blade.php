@extends('layouts.app')
@section('title', 'Data Ruangan - Web Inventaris PNL')

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

    /* === HEADER PARALLAX FULL TOP === */
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

    /* === SECTION RUANGAN === */
    .ruangan-section {
        background: linear-gradient(to bottom, #f9fafb, #eef2ff);
        padding: 4rem 0 6rem;
        width: 100%;
    }

    .ruangan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        width: 90%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .ruangan-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        transition: all 0.3s ease;
        border-top: 6px solid #3b82f6;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        display: block;
        cursor: pointer;
    }

    .ruangan-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .ruangan-card::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(to right, #3b82f6, #60a5fa);
        border-radius: 0 0 20px 20px;
    }

    .ruangan-card h2 {
        color: #1e3a8a;
        font-weight: 800;
        font-size: 1.6rem;
        margin-bottom: 0.8rem;
        border-bottom: 3px solid #60a5fa;
        display: inline-block;
        padding-bottom: 4px;
    }

    .ruangan-card p {
        color: #374151;
        margin: 0;
        font-size: 1rem;
        line-height: 1.5;
    }

    .text-center {
        text-align: center;
    }

    .text-gray-500 {
        color: #6b7280;
    }

    .col-span-full {
        grid-column: 1 / -1;
    }

    @media (max-width: 768px) {
        .header-bg {
            height: 28vh;
        }

        .ruangan-card {
            padding: 1.5rem;
        }

        .ruangan-card h2 {
            font-size: 1.3rem;
        }
    }
</style>

<!-- === HEADER === -->
<div class="header-bg">
    <h1>DAFTAR RUANGAN INVENTARIS</h1>
</div>

<!-- === LIST RUANGAN === -->
<section class="ruangan-section">
    <div class="ruangan-grid">
        @forelse($lokasi as $l)
            <a href="{{ route('barang.per.ruangan', $l->id) }}" class="ruangan-card">
                <h2>{{ $l->nama }}</h2>
                <p><strong>Deskripsi:</strong> {{ $l->deskripsi ?? 'Tidak ada keterangan' }}</p>
            </a>
        @empty
            <p class="text-center text-gray-500 col-span-full">Belum ada data ruangan.</p>
        @endforelse
    </div>
</section>
@endsection
