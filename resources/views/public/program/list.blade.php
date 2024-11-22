<x-app-layout>
    
    <div class="h-auto w-screen flex justify-center items-center max-md:px-5 bg-white py-24 border-t">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full py-7 flex justify-center items-start flex-col">
                <div class="w-full flex justify-center items-start flex-col gap-4">
                    <h1 class="text-xl text-gray-600 font-medium">PELAJARI PROGRAM</h1>
                    <h1 class="text-4xl font-bold">Pelajari Program Educonnex dari Sektor {{$sectors->name}} di Sini.</h1>
                    <h1 class="text-xl text-[#0088CC] font-medium">Beberapa layanan program yang kami sediakan.</h1>
                </div>
            </div>

            <div class="w-full gap-6 grid grid-cols-1 h-auto max-md:h-auto max-md:grid-cols-1">
                @foreach ($programs as $program)
                <div class="w-full h-full border bg-white rounded-xl flex justify-between items-center flex-row text-center p-9 max-md:flex-col">
                    <div class="flex justify-center items-start gap-10 max-md:flex-col max-md:w-full">
                        <img src="{{ Storage::url($program->thumbnail) }}"
                            class="h-72 w-72 object-cover rounded-lg" alt="">
                        <div class="flex justify-center items-start flex-col h-full gap-5">
                            <h1 class="text-3xl font-bold">{{$program->title}}</h1>
                            <h1 class="text-xl text-zinc-500 font-medium text-left max-md:text-justify">{{$program->description}} </h1>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-center items-center gap-4 w-1/5 max-md:w-full max-md:flex-row max-md:mt-5 max-md:justify-start">
                        <a class="w-28 py-2 bg-[#0088CC] text-white rounded-lg" href="{{$program->contact}}">Contact Us</a>
                        <a class="w-28 py-2 border border-[#0088CC] text-[#0088CC] rounded-lg" href="{{$program->proposal}}">Proposal</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
</x-app-layout>
