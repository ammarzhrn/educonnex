<x-app-layout>

    {{-- Header Berita --}}
    <div class="w-full pt-16 bg-cover h-96" style="background-image: url('/images/thumbnail_content.png');">
        <div
            class="max-w-7xl mx-auto w-full h-full flex justify-between items-center flex-row max-md:px-5 max-md:flex-col-reverse">
            <div class="h-full w-1/2 flex justify-center items-start flex-col gap-6 max-md:w-full max-md:h-3/5">
                <h1 class="text-5xl font-bold text-white">Berita</h1>
                <div class="grid grid-cols-4 gap-3">
                    <img src="images/tiktok_content_logo.png" class="h-10" alt="">
                    <img src="images/fb_content_logo.png" class="h-10" alt="">
                    <img src="images/yt_content_logo.png" class="h-10" alt="">
                    <img src="images/ig_content_logo.png" class="h-10" alt="">
                </div>
            </div>
            <div
                class="h-full w-1/2 flex justify-center items-end flex-col gap-6 max-md:w-full max-md:h-2/5 max-md:items-start">
                <img src="images/content_logo.png" class="h-16" alt="">
            </div>
        </div>
    </div>

    {{-- Berita Educonnex --}}
    <div class="h-auto w-screen flex justify-center items-center max-md:px-5 bg-white py-24">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full h-auto grid grid-cols-2 max-md:grid-cols-1">
                {{-- Judul --}}
                <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                    <h1 class="text-xl text-gray-600 font-medium">BERITA</h1>
                    <h1 class="text-4xl font-bold">Kumpulan Berita Educonnex</h1>
                    <h1 class="text-xl text-[#0088CC] font-medium">Beberapa Berita yang kami sediakan untuk anda.</h1>
                </div>

                {{-- Search Berita --}}
                <div class="w-full pt-16 flex-col justify-end items-end gap-4 max-md:py-5">
                  <div class="w-full>">
                      <!-- Input Pencarian -->
                      <form action="{{ route('berita.index') }}" method="GET">
                          <div class="relative flex items-center w-full">
                              <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 w-5 h-5 text-gray-400"
                                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 4a8 8 0 106.32 12.906l4.387 4.387a1 1 0 001.414-1.414l-4.387-4.387A8 8 0 008 4z" />
                              </svg>
                              <input type="text" name="search" placeholder="Cari Berita..."
                                  class="w-full pl-10 pr-4 py-2 text-gray-700 bg-white rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white border border-gray-200" />
                              <button type="submit" class="px-4 py-2 bg-[#0088CC] text-white rounded-r-lg">Cari</button>
                          </div>
                      </form>
                  </div>
              </div>
              

            </div>

            {{-- List Berita --}}
            <div class="w-full pb-7 gap-6 grid grid-cols-3 h-auto max-md:h-auto max-md:grid-cols-1">

                {{-- Item Berita --}}
                @foreach ($news as $berita)
                @if ($berita->status === "published")
                
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow overflow-hidden">
                    <a href="{{route('berita.show', $berita->id)}}">
                    <img class="w-full h-[230px] object-cover" src="{{ $berita->thumbnail ? asset('storage/images/thumbnails/' . $berita->thumbnail) : asset('images/thumbnail.png') }}"alt="" />
                    <div class="p-5 h-[200px]">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$berita->title}}</h5>
                        <p class="text-justify text-neutral-600">
                            {!! Str::limit($berita->article, 60, '...') !!}
                        </p>
                        <a class="mb-3 font-medium text-[#0088CC] text-lg" href="{{route('berita.show', $berita->id)}}">Lihat Selengkapnya</a>
                    </div>
                    <hr>
                    <div class="flex flex-row p-4 w-full justify-between">
                      <h1 class="text-[#0088CC] font-semibold">{{$berita->created_at->translatedFormat('d F Y')}}</h1>
                      <h1 class="text-neutral-500 font-semibold"> {{$berita->created_at->diffForHumans()}}</h1>
                    </div>
                </a>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </div>

    <script>
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        // Logika untuk toggle dropdown
        dropdownButton.addEventListener("click", () => {
            dropdownMenu.classList.toggle("hidden");
        });

        // Menutup dropdown saat klik di luar
        document.addEventListener("click", (event) => {
            if (
                !dropdownButton.contains(event.target) &&
                !dropdownMenu.contains(event.target)
            ) {
                dropdownMenu.classList.add("hidden");
            }
        });

    </script>

</x-app-layout>
