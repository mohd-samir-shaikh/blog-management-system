<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ url('/') }}">

                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

                    </a>

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>
                    @endauth

                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        Home
                    </x-nav-link>

                    @auth
                    <x-nav-link :href="url('/blogs')" :active="request()->is('blogs')">
                        All Blogs
                    </x-nav-link>

                    <x-nav-link :href="url('/blogs/create')" :active="request()->is('blogs/create')">
                        Create Blog
                    </x-nav-link>
                    @endauth

                </div>

            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">

                @auth

                <span class="text-dark fw-semibold">
                    {{ Auth::user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}"
                    class="btn btn-outline-secondary btn-sm">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="btn btn-danger btn-sm">
                        Logout
                    </button>
                </form>

                @else

                <a href="{{ route('login') }}"
                    class="btn btn-outline-primary btn-sm">
                    Login
                </a>

                <a href="{{ route('register') }}"
                    class="btn btn-primary btn-sm">
                    Register
                </a>

                @endauth

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">

                    <svg class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            @auth
            <x-responsive-nav-link :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>
            @endauth

            <x-responsive-nav-link :href="url('/')">
                Home
            </x-responsive-nav-link>

            @auth
            <x-responsive-nav-link :href="url('/blogs')">
                All Blogs
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/blogs/create')">
                Create Blog
            </x-responsive-nav-link>
            @endauth

        </div>

        <!-- Responsive User Info -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                @auth
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
                @endauth

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                                 this.closest('form').submit();">

                        Logout

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>
        @endauth

    </div>

</nav>
