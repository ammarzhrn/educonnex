<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed w-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <h1 class="text-2xl font-black text-[#0088CC]">Educonnex</h1>
                    </a>
                </div>
            </div>

            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" :class="request()->routeIs('home') 
                        ? 'text-[#0088CC] border-b-2 border-[#0088CC]' 
                        : 'text-black border-b-2 border-transparent'">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')" :class="request()->routeIs('aboutus') 
                        ? 'text-[#0088CC] border-b-2 border-[#0088CC]' 
                        : 'text-black border-b-2 border-transparent'">
                        {{ __('About us') }}
                    </x-nav-link>
                    <x-nav-link :href="route('program')" :active="request()->routeIs('program')" :class="request()->routeIs('program') 
                        ? 'text-[#0088CC] border-b-2 border-[#0088CC]' 
                        : 'text-black border-b-2 border-transparent'">
                        {{ __('Program') }}
                    </x-nav-link>
                    <x-nav-link :href="route('artikel')" :active="request()->routeIs('artikel')" :class="request()->routeIs('artikel') 
                        ? 'text-[#0088CC] border-b-2 border-[#0088CC]' 
                        : 'text-black border-b-2 border-transparent'">
                        {{ __('Artikel') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <a class="px-3 py-2 bg-[#0088CC] text-white flex flex-row justify-center items-center gap-2 rounded-md"
                    href="">Contact <span><img src="images/arrow.png" width="19px" alt=""></span></a>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')">
                {{ __('About us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('program')" :active="request()->routeIs('program')">
                {{ __('Program') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('artikel')" :active="request()->routeIs('artikel')">
                {{ __('Artikel') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
