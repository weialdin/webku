<footer class="bg-white rounded-lg shadow-sm dark:bg-gray-900 m-4">
	<div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
		<div class="sm:flex sm:items-center sm:justify-between">
			<a href="{{route('front.index')}}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
				<img src="{{ asset('assets/images/logos/logos.png') }}" class="h-8" alt="Flowbite Logo" />
				<span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Aldin<span style="color: #ff4d00;">codes</span></span>
			</a>
			<ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
				<li>
					<a href="{{route('front.about')}}" class="hover:underline me-4 md:me-6">Tentang Saya</a>
				</li>
				<li>
					<a href="{{route('front.contact')}}" class="hover:underline">Kontak</a>
				</li>
			</ul>
		</div>
		<hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
		<div class="flex justify-center items-center space-x-5 mb-4">
			<a href="https://web.facebook.com/ahmadaminudin07" class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank">
				<i class="fab fa-facebook-f text-xl"></i>
				<span class="sr-only">Facebook page</span>
			</a>
			<a href="https://www.instagram.com/aldincodes/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank">
				<i class="fab fa-instagram text-xl"></i>
				<span class="sr-only">Instagram page</span>
			</a>
			<a href="https://www.youtube.com/@WonderfullAIUniverse" class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank">
				<i class="fab fa-youtube text-xl"></i>
				<span class="sr-only">YouTube channel</span>
			</a>
		</div>
		<span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="{{route('front.index')}}" class="hover:underline">Aldincodes</a>. All Rights Reserved.</span>
	</div>
</footer>