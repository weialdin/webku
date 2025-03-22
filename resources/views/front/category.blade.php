@extends('front.master')
@section('content')

<body class="font-[Poppins] pb-10 sm:pb-[83px]"> {{-- Padding bottom responsif --}}
	<x-navbar />

	<nav id="Category" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8"> {{-- Menggunakan max-w-7xl dan padding responsif --}}
			<div class="flex justify-center items-center gap-2 sm:gap-4 overflow-x-auto"> {{-- Membuat kategori bisa di-scroll horizontal jika tidak muat --}}
		@foreach($categories as $item_category)
		<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-3 sm:p-[12px_22px] flex gap-2 sm:gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] whitespace-nowrap"> {{-- whitespace-nowrap agar kategori tidak wrap text --}}
			<div class="w-5 h-5 sm:w-6 sm:h-6 flex shrink-0"> {{-- Ukuran icon kategori lebih kecil di mobile --}}
				<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
			</div>
			<span class="text-sm sm:text-base">{{ $item_category->name }}</span> {{-- Ukuran teks kategori lebih kecil di mobile --}}
		</a>
		@endforeach
			</div>
	</nav>

	<section id="Category-result" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center flex-col gap-8 md:gap-[30px] mt-16 md:mt-[70px]"> {{-- Padding responsif, gap dan margin top responsif --}}
		<h1 class="text-3xl sm:text-4xl leading-tight sm:leading-[45px] font-bold text-center"> {{-- Ukuran font responsif untuk judul kategori --}}
			Explore Our <br />
			{{$category->name}} News
		</h1>

		<div id="search-cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-[30px]"> {{-- Grid kolom responsif, gap responsif --}}

			@forelse ($category->news as $news)
            <a href="{{ route('front.details', $news->slug) }}" class="card">
				<div
					class="flex flex-col gap-4 p-4 sm:p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white"> {{-- Padding card responsif --}}
					<div class="thumbnail-container h-[150px] sm:h-[200px] relative rounded-[20px] overflow-hidden"> {{-- Tinggi thumbnail responsif --}}
						<div
							class="badge absolute left-3 top-3 bottom-auto right-auto flex p-2 sm:p-[8px_18px] bg-white rounded-[50px]"> {{-- Padding badge responsif --}}
							<p class="text-[10px] sm:text-xs leading-[15px] sm:leading-[18px] font-bold uppercase">{{ $news->category->name }}</p> {{-- Ukuran font badge responsif --}}
						</div>
						<img src="{{ Storage::url($news->thumbnail) }}" alt="thumbnail photo"
							class="w-full h-full object-cover" />
					</div>
					<div class="flex flex-col gap-[6px]">
						<h3 class="text-lg leading-[27px] font-bold">
                            {{ $news->name }}
                        </h3>
						<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $news->created_at->format('M d, Y') }}</p>
					</div>
				</div>
			</a>
            @empty
            <p>Belum ada artikel untuk kategori ini!</p>
			@endforelse


		</div>
	</section>


	<section id="Advertisement" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center mt-16 md:mt-[70px]"> {{-- Padding responsif, margin top responsif --}}
		<div class="flex flex-col gap-3 shrink-0 w-full sm:w-fit"> {{-- Lebar wrapper iklan banner responsif --}}
			<a href="{{ $bannerads->link }}">
				<div class="w-full sm:w-[900px] h-[100px] sm:h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden"> {{-- Ukuran banner responsif --}}
					<img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
			</p>
		</div>
	</section>

	<x-footer />
</body>

@endsection

@push('after-scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush