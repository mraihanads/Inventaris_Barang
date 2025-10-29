@extends('layouts.app')
@section('title', 'Web Inventaris PNL')

@section('content')
<style>
    html, body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        height: 100%;
        width: 100%;
    }

    .hero {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: url('{{ asset('images/bg-inventaris.jpg') }}') center center / cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        overflow: hidden;
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.75);
        z-index: 1;
    }

    .content {
        position: relative;
        z-index: 2;
        padding: 0 20px;
        text-align: center;
        max-width: 90%;
    }

    #welcome-text {
        font-size: clamp(2.5rem, 6vw, 5.5rem);
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: 2px;
        text-shadow: 0 4px 25px rgba(0, 0, 0, 0.8);
    }

    .word {
        display: inline-block;
        margin-right: 1rem;
        opacity: 0;
        transform: translateY(40px);
        animation: fadeUp 4.1s ease forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .buttons {
        opacity: 0;
        transform: translateY(40px);
        transition: all 1s ease;
        margin-top: 3rem;
    }
    .buttons.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .btn {
        display: inline-block;
        margin: 10px;
        padding: 14px 28px;
        font-size: clamp(1rem, 2vw, 1.2rem);
        border-radius: 9999px;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
    }

    .btn-primary {
        background: #38bdf8;
        color: #111827;
    }
    .btn-primary:hover {
        background: #0ea5e9;
        transform: translateY(-3px);
    }

    .btn-admin {
        background: #4f46e5;
        color: white;
    }
    .btn-admin:hover {
        background: #4338ca;
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .btn {
            width: 80%;
            font-size: 1rem;
        }
    }
</style>

<section class="hero">
    <div class="content">
        <h1 id="welcome-text" class="mb-8"></h1>

        <div id="action-buttons" class="buttons">
            <a href="{{ route('ruangan.public') }}" class="btn btn-primary">
                <i class="fa-solid fa-box-open mr-2"></i> Lihat Data Barang
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const text = "SELAMAT DATANG DI WEB INVENTARIS PNL";
    const container = document.getElementById('welcome-text');
    const buttons = document.getElementById('action-buttons');

    const words = text.split(" ");
    words.forEach((word, i) => {
        const span = document.createElement('span');
        span.textContent = word;
        span.classList.add('word');
        span.style.animationDelay = `${i * 0.4}s`;
        container.appendChild(span);
    });

    setTimeout(() => {
        buttons.classList.add('visible');
    }, words.length * 400 + 800);
});
</script>
@endsection
