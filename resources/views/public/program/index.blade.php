<x-app-layout>

    {{-- Program Educonnex --}}
    <div class="h-auto w-screen flex justify-center items-center max-md:px-5 bg-white py-24">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-xl text-gray-600 font-medium">LAYANAN EDUCONNEX</h1>
                <h1 class="text-4xl font-bold">Layanan yang disediakan pada Educonnex</h1>
                <h1 class="text-xl text-[#0088CC] font-medium">Beberapa layanan yang kami sediakan untuk anda.</h1>
            </div>
            <div class="w-full pb-7 gap-6 grid grid-cols-3 h-auto max-md:h-auto max-md:grid-cols-1">

                {{-- Item Program --}}
                <a href="{{route('content')}}">
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3">
                    <img class="size-24" src="images/nilai_1.png" alt="">
                    <h1 class="text-2xl font-bold">Become and Industry Leader</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Become a leader in the service industry by providing innovative, high-quality solutions to customers.</h1>
                </div>
                </a>
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3">
                    <img class="size-24" src="images/nilai_2.png" alt="">
                    <h1 class="text-2xl font-bold">Operational Excellence</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Achieve exceptional operational excellence to provide fast, efficient and reliable service.</h1>
                </div>
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3">
                    <img class="size-24" src="images/nilai_3.png" alt="">
                    <h1 class="text-2xl font-bold">Creative Long-term Value</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Become a strategic partner for customers with a focus on long-term value creation and mutual growth.</h1>
                </div>
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3">
                    <img class="size-24" src="images/nilai_1.png" alt="">
                    <h1 class="text-2xl font-bold">Become and Industry Leader</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Become a leader in the service industry by providing innovative, high-quality solutions to customers.</h1>
                </div>
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3">
                    <img class="size-24" src="images/nilai_2.png" alt="">
                    <h1 class="text-2xl font-bold">Operational Excellence</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Achieve exceptional operational excellence to provide fast, efficient and reliable service.</h1>
                </div>
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-3">
                    <img class="size-24" src="images/nilai_3.png" alt="">
                    <h1 class="text-2xl font-bold">Creative Long-term Value</h1>
                    <h1 class="text-lg font-normal text-zinc-700">Become a strategic partner for customers with a focus on long-term value creation and mutual growth.</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Visi Misi Educonnex --}}
    <div class="h-auto w-screen bg-white flex justify-center items-center max-md:px-5 py-20 border-t">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col gap-4">
                <h1 class="text-xl text-gray-600 font-medium">VISI & MISI MENDALAM</h1>
                <h1 class="text-4xl font-bold">Kenali Visi & Misi Kami Lebih Lanjut</h1>
                <h1 class="text-xl text-[#0088CC] font-medium">Educonnex. The number 1 Training Platform.</h1>
            </div>
            <div class="w-full pb-7 gap-6 grid grid-cols-2 h-[500px] max-md:grid-cols-1 max-md:h-auto">

                {{-- Visi --}}
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-8">
                    <h1 class="text-3xl font-bold">Visi Educonnex</h1>
                    <ul class="list-disc space-y-5">
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari visi</li>
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari visi</li>
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari visi</li>
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari visi</li>
                    </ul>
                </div>

                {{-- Misi --}}
                <div class="w-full h-full border bg-white rounded-xl flex justify-center items-center flex-col text-center p-9 gap-8">
                    <h1 class="text-3xl font-bold">Misi Educonnex</h1>
                    <ul class="list-disc space-y-5">
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari misi</li>
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari misi</li>
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari misi</li>
                        <li class="text-2xl font-normal text-zinc-700 list-item">Poin poin dari misi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
