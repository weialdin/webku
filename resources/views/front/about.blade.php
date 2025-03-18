@extends('front.master')
@section('content')

<body class="font-[Poppins] pb-[83px]">
<x-navbar />
<div id="about" class="relative bg-white overflow-hidden mt-16">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100"></polygon>
            </svg>

            <div class="pt-1"></div>

            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h2 class="my-6 text-2xl tracking-tight font-extrabold text-gray-900 sm:text-3xl md:text-4xl">
                        Tentang Saya <i class="fa-solid fa-face-smile icon-terbakar" style="color: red;"></i>
                    </h2>

                    <p>
                        Salam kenal! Saya Ahmad Aminudin, atau lebih akrab disapa Aldin. Bagi saya, dunia ini penuh dengan cerita dan solusi yang menunggu untuk diungkap. 
                        Itulah mengapa saya begitu jatuh cinta pada menulis dan ngoding. Menulis adalah cara saya berpikir, merangkai ide, dan berbagi perspektif. 
                        Sementara ngoding adalah bahasa kreativitas saya, membangun jembatan digital dari imajinasi menjadi kenyataan. Blog ini adalah ruang saya untuk menuangkan kedua passion tersebut.
                        Semoga apa yang saya tulis bisa bermanfaat, menghibur, atau sekadar menemani waktu luang Anda. Mari berbagi dan belajar bersama! 
                    </p>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/3">
        <img class="h-56 w-full object-cover object-top sm:h-72 md:h-96 lg:w-96 lg:h-full" src="{{ asset('assets/images/photos/me.jpg')}}" alt="">
    </div>
</div>
<x-footer />
</body>
@endsection
