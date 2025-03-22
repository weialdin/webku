@extends('front.master')
@section('content')

<body class="font-[Poppins]">
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
	<header class="flex flex-col items-center gap-10 mt-16 sm:mt-20"> {{-- Mengurangi gap dan margin top di ukuran mobile --}}
		<div id="Headline" class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-4 items-center"> {{-- Menggunakan max-w-3xl dan padding responsif untuk headline --}}
			<p class="w-fit text-[#A3A6AE]">{{ $articleNews->created_at->format('M d, Y') }} • {{$articleNews->category->name}}</p>
			<h1 id="Title" class="font-bold text-3xl sm:text-4xl md:text-5xl lg:text-[46px] leading-tight sm:leading-normal text-center two-lines"> {{-- Ukuran font responsif untuk judul --}}
				{{ $articleNews->name }}
			</h1>
			<div class="flex flex-col sm:flex-row items-center justify-center gap-5 sm:gap-10 md:gap-20 lg:gap-24"> {{-- Mengubah gap dan layout author rating responsif --}}
				<a id="Author" href="{{ route('front.author', $articleNews->author->slug) }}" class="w-fit h-fit">
					<div class="flex items-center gap-3">
						<div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full overflow-hidden"> {{-- Ukuran avatar author lebih kecil di mobile --}}
							<img src="{{ Storage::url($articleNews->author->avatar)}}" class="object-cover w-full h-full" alt="avatar">
						</div>
						<div class="flex flex-col">
							<p class="font-semibold text-sm leading-[21px]">{{ $articleNews->author->name }}</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">{{ $articleNews->author->occupation }}</p>
						</div>
					</div>
				</a>
				<div id="Rating" class="flex items-center gap-1">
					<div class="flex items-center">
						<div class="w-3 h-3 sm:w-4 sm:h-4 flex shrink-0"> {{-- Ukuran icon rating lebih kecil di mobile --}}
							<img src="{{asset('assets//images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-3 h-3 sm:w-4 sm:h-4 flex shrink-0">
							<img src="{{asset('assets//images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-3 h-3 sm:w-4 sm:h-4 flex shrink-0">
							<img src="{{asset('assets//images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-3 h-3 sm:w-4 sm:h-4 flex shrink-0">
							<img src="{{asset('assets//images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-3 h-3 sm:w-4 sm:h-4 flex shrink-0">
							<img src="{{asset('assets//images/icons/Star 1.svg')}}" alt="star">
						</div>
					</div>
					<p class="font-semibold text-xs leading-[18px]">(12,490)</p>
				</div>
			</div>
		</div>
		<div class="w-full h-[300px] sm:h-[400px] md:h-[500px] flex shrink-0 overflow-hidden"> {{-- Tinggi gambar header responsif --}}
			<img src="{{ Storage::url($articleNews->thumbnail) }}" class="object-cover w-full h-full" alt="cover thumbnail">
		</div>
	</header>
	<section id="Article-container" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8 md:gap-10 lg:gap-20 mt-10 sm:mt-12 md:mt-16"> {{-- Layout artikel dan sidebar responsif, gap dan margin top responsif --}}

		<article id="Content-wrapper" class="w-full lg:w-3/4"> {{-- Lebar wrapper konten artikel responsif --}}
			{!! $articleNews->content !!}
		</article>


		<div class="side-bar flex flex-col w-full lg:w-1/4 gap-6 md:gap-8 lg:gap-10"> {{-- Lebar sidebar responsif, gap responsif --}}
			<div class="ads flex flex-col gap-3 w-full">
				<a href="{{ $square_ads_1->link }}">
					<img src="{{ Storage::url($square_ads_1->thumbnail) }}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="{{asset('assets//images/icons/message-question.svg')}}" alt="icon" /></a>
				</p>
			</div>
			<div id="More-from-author" class="flex flex-col gap-4">
				<p class="font-bold">More From Author</p>

				@forelse($author_news as $item_news)
				<a href="{{ route('front.details', $item_news->slug) }}" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-3 sm:p-[14px] flex gap-3 sm:gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300"> {{-- Padding card author responsif --}}
						<div class="w-[50px] h-[50px] sm:w-[70px] sm:h-[70px] flex shrink-0 overflow-hidden rounded-2xl"> {{-- Ukuran thumbnail card author responsif --}}
							<img src="{{ Storage::url($item_news->thumbnail) }}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold text-sm sm:text-base">{{ substr($item_news->name, 0, 50)}}{{ strlen($item_news->name) > 50 ? '...' : '' }}</p> {{-- Ukuran font judul card author responsif --}}
							<p class="text-xs leading-[18px] text-[#A3A6AE]">{{ $item_news->created_at->format('M d, Y') }} . {{ $item_news->category->name}}</p>
						</div>
					</div>
				</a>
				@empty
				<p>Artikel belum tersedia</p>
				@endforelse


			</div>
			<div class="ads flex flex-col gap-3 w-full">
				<a href="{{ $square_ads_2->link }}">
					<img src="{{ Storage::url($square_ads_2->thumbnail) }}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="{{asset('assets//images/icons/message-question.svg')}}" alt="icon" /></a>
				</p>
			</div>
		</div>
	</section>
	<section id="Advertisement" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center mt-16 md:mt-20"> {{-- Margin top responsif, padding responsif --}}
		<div class="flex flex-col gap-3 shrink-0 w-full sm:w-fit"> {{-- Lebar wrapper iklan banner responsif --}}
			<a href="{{ $bannerads->link }}">
				<div class="w-full sm:w-[900px] h-[100px] sm:h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden"> {{-- Ukuran banner responsif --}}
					<img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{asset('assets//images/icons/message-question.svg')}}" alt="icon" /></a>
			</p>
		</div>
	</section>
	<section id="Up-to-date" class="w-full flex justify-center mt-16 md:mt-20 py-12 sm:py-[50px] bg-[#F9F9FC]"> {{-- Margin top dan padding vertikal responsif --}}
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-8 md:gap-[30px]"> {{-- Padding responsif, gap responsif --}}
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-xl sm:text-2xl md:text-[26px] leading-tight sm:leading-[39px]"> {{-- Ukuran font judul section responsif --}}
					Other News You <br class="sm:hidden" /> {{-- Break line hanya hilang di mobile --}}
					Might Be Interested
				</h2>
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-[30px]"> {{-- Grid kolom responsif, gap responsif --}}


				@forelse ( $articles as $article )
				<a href="{{ route('front.details', $article->slug) }}" class="card">
					<div
						class="flex flex-col gap-4 p-4 sm:p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white"> {{-- Padding card responsif --}}
						<div class="thumbnail-container h-[150px] sm:h-[200px] relative rounded-[20px] overflow-hidden"> {{-- Tinggi thumbnail responsif --}}
							<div
								class="badge absolute left-3 top-3 bottom-auto right-auto flex p-2 sm:p-[8px_18px] bg-white rounded-[50px]"> {{-- Padding badge responsif --}}
								<p class="text-[10px] sm:text-xs leading-[15px] sm:leading-[18px] font-bold uppercase">{{ $article->category->name }}</p> {{-- Ukuran font badge responsif --}}
							</div>
							<img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo"
								class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">
								{{ $article->name }}
							</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $article->created_at->format('M d, Y') }}</p>
						</div>
					</div>
				</a>
				@empty
				<p>Data artikel belum tersedia</p>
				@endforelse


			</div>
		</div>
	</section>
	<x-footer />
</body>

@endsection
@push('after-styles')
@endpush

@push('after-scripts')
<script src="js/two-lines-text.js"></script>
<script src="htpps://cdn.tailwindcss.com"></script>
@endpush