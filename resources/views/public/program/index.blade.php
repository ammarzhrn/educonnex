<x-app-layout>

    {{-- Header Program Konten --}}
    <div class="w-full pt-16 bg-cover h-96" style="background-image: url('/images/thumbnail_content.png');">
        <div
            class="max-w-7xl mx-auto w-full h-full flex justify-between items-center flex-row max-md:px-5 max-md:flex-col-reverse">
            <div class="h-full w-1/2 flex justify-center items-start flex-col gap-6 max-md:w-full max-md:h-3/5">
                <h1 class="text-5xl font-bold text-white">Program</h1>
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

    {{-- Deskripsi Program --}}
    <div class="h-auto w-screen flex justify-center items-center max-md:px-5 bg-white py-24">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-xl text-gray-600 font-medium">DESKRIPSI PROGRAM</h1>
                <h1 class="text-4xl font-bold">Kenali Program Educonnex Lebih Lanjut</h1>
                <h1 class="text-xl text-[#0088CC] font-medium">Beberapa layanan program yang kami sediakan.</h1>
            </div>
            <div class="w-full pb-7 gap-6 grid grid-cols-1 h-auto max-md:h-auto max-md:grid-cols-1">
                <div
                    class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-6 py-16">
                    <h1 class="text-3xl font-bold">Program Educonnex</h1>
                    <div class="w-36 h-1 bg-[#0088CC]"></div>
                    <h1 class="text-lg font-normal text-zinc-700">School design adalah program komprehensif yang disusun
                        untuk mewujudkan desain sekolah impian Anda, karena sekolah terbaik adalah sekolah yang bisa
                        mewujudkan impian para pendirinya. Siapkan tim sekolah Anda mulai dari sekarang dengan
                        memperkuat karakter sesuai jatidiri sekolah plus formula kekinian tanpa FOMO apalagi copycat.
                        ~deskripsi masih sementara..</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Sektor --}}
    <div class="w-screen bg-gray-100 flex justify-center items-center max-md:h-auto max-md:px-5 max-md:py-5 py-20">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col gap-6">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-xl text-gray-600 font-medium">SEKTOR PROGRAM</h1>
                <h1 class="text-4xl font-bold">Program Kami Terbagi Menjadi Beberapa Sektor</h1>
            </div>
            <div class="w-full pb-7 gap-6 grid grid-cols-3 max-md:grid-cols-1">
                @foreach ($sectors as $sector)
                <a href="{{ route('programs.bySector', $sector->id) }}">
                    <div class="w-full rounded-xl border-2 h-full flex flex-col justify-start items-center overflow-hidden gap-3 hover:bg-gray-100 bg-white">
                        <img class="h-56 object-cover w-full" src="{{ $sector->thumbnail ? asset('storage/images/thumbnails/' . $sector->thumbnail) : asset('images/thumbnail.png') }}" alt="">
                        <div class="w-full pb-3 px-3">
                        <h1 class="text-2xl text-[#0088CC] font-bold">Sektor {{$sector->name}}</h1>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    

</x-app-layout>
