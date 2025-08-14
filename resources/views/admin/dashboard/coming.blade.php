@extends('layouts.simple.master')

@section('css')
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #5f27cd, #ff6b6b);
            color: #fff;
        }

        .coming-soon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
            flex-direction: column;
            padding: 20px;
        }

        .coming-soon-wrapper h1 {
            font-size: 72px;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .coming-soon-wrapper p {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .coming-soon-wrapper .btn-home {
            background-color: #fff;
            color: #ff6b6b;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .coming-soon-wrapper .btn-home:hover {
            background-color: #ff6b6b;
            color: #fff;
        }

        .coming-soon-wrapper .countdown {
            margin-top: 30px;
            font-size: 28px;
            letter-spacing: 2px;
        }

        @media (max-width: 768px) {
            .coming-soon-wrapper h1 {
                font-size: 48px;
            }

            .coming-soon-wrapper p {
                font-size: 20px;
            }

            .coming-soon-wrapper .countdown {
                font-size: 22px;
            }
        }
    </style>
@endsection

@section('main_content')
    <div class="coming-soon-wrapper">
        <h1>Coming Soon</h1>
        <p>We are working hard to bring something amazing. Stay tuned!</p>
        <a href="{{ route('admin.outlets.index') }}" class="btn-home">Go to Master</a>

        {{-- Optional countdown timer --}}
        <div class="countdown" id="countdown"></div>
    </div>
@endsection

@section('scripts')
    <script>
        // Optional countdown timer
        const countdownElement = document.getElementById('countdown');
        const launchDate = new Date("{{ now()->addDays(10) }}").getTime(); // example: 10 days from now

        const timer = setInterval(() => {
            const now = new Date().getTime();
            const distance = launchDate - now;

            if (distance < 0) {
                clearInterval(timer);
                countdownElement.innerHTML = "We're Live!";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }, 1000);
    </script>
@endsection
