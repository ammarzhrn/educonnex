<x-app-layout>

    {{-- Welcome --}}
    <div class="w-screen bg-white flex justify-center items-center py-56 max-md:py-28">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-between items-center max-md:justify-center max-md:flex-col max-md:px-5">
            <div class="flex justify-start items-start flex-col gap-6">
                <img class="h-7" src="images/main_logo.png" alt="">
                <h1 class="text-7xl font-bold max-md:text-6xl">Dimulai Dengan <br> Salam Pembuka</h1>
                <h1 class="text-xl text-gray-500">Educonnex. Website Pelatihan nomor 1. di Indonesia 🇮🇩 </h1>
                <div class="flex justify-between items-center gap-3 mt-4 max-md:mt-0">
                    <a class="w-44 py-3 bg-[#0088CC] text-white rounded-md hover:bg-[#0088ccbf] flex justify-center items-center"
                        href="">Pelajari Sekarang</a>
                    <a class="w-44 py-3 bg-white text-[#0088CC] border border-[#0088CC] rounded-md hover:bg-[#0088ccbf] hover:text-white flex justify-center items-center"
                        href="">Read More</a>
                </div>
            </div>
            <div class="flex justify-center items-center max-md:mt-6">
                <img class="w-[550px]" src="images/landing1.png" alt="">
            </div>
        </div>
    </div>

    {{-- About Us --}}
    <div class="w-screen bg-white flex justify-center items-center max-md:py-10 max-md:px-5 border-t py-24">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-xl text-gray-600 font-medium">TENTANG KAMI</h1>
                <h1 class="text-4xl font-bold">Apa Itu Educonnex?</h1>
                <h1 class="text-xl text-[#0088CC] font-medium">Website Pelatihan nomor 1. di Indonesia 🇮🇩 </h1>
            </div>
            <div class="w-full pb-7 flex justify-between items-center flex-row gap-4 max-md:flex-col">
                <div class="w-1/2 h-[420px] flex justify-center items-center rounded-xl border-2 overflow-hidden max-md:w-full">
                    <img class="w-full h-full object-cover" src="images/thumbnail.png" alt="">
                </div>
                <div class="w-1/2 h-[420px] flex justify-center items-start flex-col gap-10 pl-5 max-md:p-0 max-md:w-full">
                    <h1 class="text-2xl text-gray-500 font-medium text-justify">
                        Educonnex adalah konsultan tempat kami berkolaborasi dengan mitra kami untuk memberikan pendidikan yang lebih baik dengan inovasi.
                    </h1>
                    <a href="{{route('aboutus')}}" class="text-2xl text-[#0088CC] font-bold flex justify-center items-center gap-3">Baca Selengkapnya <span><img src="images/arrow_blue.png" width="19px" alt=""></span></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Visi Misi --}}
    <div class="w-screen bg-gray-100 flex justify-center items-center max-md:h-auto max-md:py-5 max-md:px-5 py-28">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-5xl font-bold">Visi & Misi Educonnex</h1>
                <h1 class="text-xl text-[#0088CC] font-medium">Website Pelatihan nomor 1. di Indonesia 🇮🇩 </h1>
            </div>
            <div class="w-full pb-7 gap-6 grid grid-cols-2 max-md:grid-cols-1">
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3 py-16">
                    <img class="size-24" src="images/nilai_3.png" alt="">
                    <h1 class="text-2xl font-bold">Visi Kami</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Visi kami adalah menjadi mitra pendidikan yang diakui secara global, terkenal karena kreativitas, keahlian, dan komitmen teguh kami terhadap kesuksesan klien kami
                    </h1>
                </div>
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3 py-16">
                    <img class="size-24" src="images/nilai_2.png" alt="">
                    <h1 class="text-2xl font-bold">Misi Kami</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Misi kami adalah memberdayakan pendidikan dengan solusi inovatif dan luar biasa yang mendorong pertumbuhan berkelanjutan

                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Program --}}
    <div class="w-screen bg-white flex justify-center items-center max-md:h-auto max-md:px-5 max-md:py-5 py-28">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-xl text-gray-600 font-medium">PROGRAM UNGGULAN KAMI</h1>
                <h1 class="text-4xl font-bold">Apa Saja Program Unggulan Educonnex?</h1>
                <h1 class="text-xl text-[#0088CC] font-medium">Website Pelatihan nomor 1. di Indonesia 🇮🇩 </h1>
            </div>
            <div class="w-full gap-6 grid grid-cols-3 max-md:grid-cols-1">
                @foreach ($program as $item)
                    <div class="w-full h-[450px] flex justify-start items-center flex-col rounded-xl border-2 p-4 bg-white gap-3">
                        <img class="w-full h-72 rounded object-cover" src="{{ $item->thumbnail ? asset('storage/thumbnails/' . $item->thumbnail) : asset('images/thumbnail.png') }}" alt="">
                        <div class="w-full h-auto flex justify-start items-start flex-col ga">
                            <h1 class="text-2xl font-bold">{{Str::limit($item->title, 30, '...')}}</h1>
                            <h1 class="text-lg text-gray-700">{{ Str::limit($item->description, 75, '...') }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full flex justify-center items-start flex-col gap-4 pt-5">
                <a href="{{route('program.index')}}" class="text-2xl text-[#0088CC] hover:text-[#0088ccbf] font-semibold">Selengkapnya...</a>
            </div>
        </div>
    </div>

</x-app-layout>
