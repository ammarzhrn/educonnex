<x-app-layout>
    {{-- Header Thumbnail Artikel --}}
    <div class="w-full pt-16 bg-cover h-[600px]" style="background-image: url('/images/thumbnail_content.png');"></div>

    <div class="h-auto w-screen flex justify-center items-center max-md:px-5 bg-white py-16">
        <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
            <div class="w-full h-auto grid grid-cols-2 max-md:grid-cols-1">
                {{-- Judul --}}
                <div class="w-full py-7 flex justify-center items-start flex-col gap-6 pr-5">
                    <h1 class="text-4xl font-bold">Program Pelatihan Mengelola
                        Sekolah yang Anti-Mainstream!</h1>
                    <h1 class="text-base text-[#0088CC] font-medium w-full flex flex-row gap-4">
                        <span><img src="images/main_logo.png" class="h-5" alt=""></span>
                        <span class="text-neutral-500">18 November 2024</span>
                        Education Category
                        <span class="text-neutral-500">10 min read</span>
                    </h1>
                </div>

                {{-- Search Artikel --}}
                <div class="w-full pt-16 flex-col justify-end items-end gap-4 max-md:py-5 pl-24 max-md:pl-0">
                    <div class="flex items-center space-x-2">
                        <!-- Input Pencarian -->
                        <div class="relative flex items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 w-5 h-5 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 4a8 8 0 106.32 12.906l4.387 4.387a1 1 0 001.414-1.414l-4.387-4.387A8 8 0 008 4z" />
                            </svg>
                            <input type="text" placeholder="Cari Artikel..."
                                class="w-full pl-10 pr-4 py-2 text-gray-700 bg-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white border border-gray-200" />
                        </div>

                        <!-- Dropdown Kategori -->
                        <div class="relative">
                            <button id="dropdownButton"
                                class="flex items-center px-4 py-2 bg-white rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 border border-gray-200">
                                Kategori
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Menu Dropdown -->
                            <div id="dropdownMenu"
                                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Teknologi
                                </a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Bisnis
                                </a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Pendidikan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- About Us --}}
            <div class=" w-screen bg-white flex justify-center items-center max-md:pt-16 max-md:px-5 py-20">
                <div class="max-w-7xl mx-auto w-full h-full flex justify-center items-center flex-col">
                    <div class="w-full pb-7 flex justify-between items-center flex-row gap-10 max-md:flex-col">
                        <div
                            class="w-2/3 h-[420px] flex justify-center items-start flex-col gap-10 max-md:w-full max-md:h-auto max-md:pl-0">
                            <h1 class="text-2xl text-gray-500 text-justify font-normal">
                                School design adalah program komprehensif yang disusun untuk mewujudkan desain sekolah
                                impian Anda, karena sekolah terbaik adalah sekolah yang bisa mewujudkan impian para
                                pendirinya. 

                                Siapkan tim sekolah Anda mulai dari sekarang dengan memperkuat karakter sesuai jatidiri
                                sekolah plus formula kekinian tanpa FOMO apalagi copycat. ~deskripsi masih
                                sementara.  School design adalah program komprehensif yang disusun untuk mewujudkan
                                desain sekolah impian Anda, karena sekolah terbaik adalah sekolah yang bisa mewujudkan
                                impian para pendirinya. 

                                Siapkan tim sekolah Anda mulai dari sekarang dengan memperkuat karakter sesuai jatidiri
                                sekolah plus formula kekinian tanpa FOMO apalagi copycat. ~deskripsi masih
                                sementara.  School design adalah program komprehensif yang disusun untuk mewujudkan
                                desain sekolah impian Anda, karena sekolah terbaik adalah sekolah yang bisa mewujudkan
                                impian para pendirinya. 

                                Siapkan tim sekolah Anda mulai dari sekarang dengan memperkuat karakter sesuai jatidiri
                                sekolah plus formula kekinian tanpa FOMO apalagi copycat. ~deskripsi masih sementara.

                                School design adalah program komprehensif yang disusun untuk mewujudkan desain sekolah
                                impian Anda.
                            </h1>
                        </div>
                        <div class="w-1/3 flex flex-col justify-start items-start overflow-hidden max-md:w-full gap-5">

                            <h1 class="text-2xl text-gray-600 font-semibold">Artikel Lainnya</h1>

                            <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
                                <a href="{{route('detailartikel')}}">
                                    <img class="rounded-t-lg" src="images/bg_artikel.png" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="{{route('detailartikel')}}">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Program
                                            Pelatihan Mengelola
                                            Sekolah yang Anti-Mainstream!</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700">Laporan dan cerita seputar program
                                        pelatihan mengelola
                                        sekolah yang anti mainstream yang baru saja dilaksanakan.</p>
                                    <a class="mb-3 font-medium text-[#0088CC] text-lg"
                                        href="{{route('detailartikel')}}">Lihat Selengkapnya</a>
                                </div>
                                <hr>
                                <h1 class="text-neutral-500 p-5">10 November 2024</h1>
                            </div>

                        </div>
                    </div>
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
