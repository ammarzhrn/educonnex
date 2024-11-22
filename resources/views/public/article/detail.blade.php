<x-app-layout>
    {{-- Header Thumbnail Artikel --}}
    <div class="w-full pt-16 bg-cover h-[600px] bg-center" style="background-image: url('{{ $article->thumbnail ? asset('storage/images/thumbnails/' . $article->thumbnail) : asset('images/thumbnail.png') }}');"></div>

    <div class="h-auto w-screen flex justify-center items-center max-md:px-5 bg-white py-16">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full h-auto grid grid-cols-2 max-md:grid-cols-1">
                {{-- Judul --}}
                <div class="w-full py-7 flex justify-center items-start flex-col gap-6 pr-5">
                    <h1 class="text-4xl font-bold">
                        {{$article->title}}
                    </h1>
                    <h1 class="text-base text-[#0088CC] font-medium w-full flex flex-row gap-4 max-md:flex-col max-md:gap-2">
                        <span class="text-neutral-500">{{$article->created_at->translatedFormat('d F Y')}}</span>
                        {{$article->created_at->diffForHumans()}}
                        @foreach ($article->category as $category)
                            <span class="text-neutral-500 bg-gray-200 px-3 py-1 rounded-lg mr-2 mb-2">{{ $category }}</span>
                        @endforeach
                    </h1>
                </div>
            </div>

            {{-- Artikel --}}
            <div class="w-full pb-7 flex justify-between items-start flex-row gap-10 max-md:flex-col">
                <!-- Artikel Utama -->
                <div class="w-2/3 flex justify-center items-start flex-col gap-10 max-md:w-full max-md:h-auto max-md:pl-0">
                    <h1 class="text-2xl text-gray-500 text-justify font-normal">
                        {!! $article->article !!}
                    </h1>
                </div>
            
                <!-- Artikel Lainnya -->
                <div class="w-1/3 flex flex-col justify-start items-start overflow-hidden max-md:w-full gap-5">
                    <h1 class="text-2xl text-gray-600 font-semibold">Artikel Lainnya</h1>


                    @foreach ($otherArticles as $item)
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{route('articles.show', $item->id)}}">
                            <img class="rounded-t-lg w-full h-[200px] object-cover" src="{{ $item->thumbnail ? asset('storage/images/thumbnails/' . $item->thumbnail) : asset('images/thumbnail.png') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="{{route('articles.show', $item->id)}}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                    {{ $item->title }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700">
                                {!! Str::limit($item->article, 100, '...') !!}
                            </p>
                            <a class="mb-3 font-medium text-[#0088CC] text-lg" href="{{route('articles.show', $item->id)}}">Lihat Selengkapnya</a>
                        </div>
                        <hr>
                        <div class="flex flex-row p-4 w-full justify-between">
                            <h1 class="text-[#0088CC] font-semibold">{{$item->created_at->translatedFormat('d F Y')}}</h1>
                            <h1 class="text-neutral-500 font-semibold"> {{$item->created_at->diffForHumans()}}</h1>
                        </div>
                    </div>
                    @endforeach


                </div>
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
