<nav
    class="relative z-10 flex flex-wrap items-center justify-between px-6 py-4 bg-white shadow-xl md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-64">
    <div
        class="flex flex-wrap items-center justify-between w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
        <button
            class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase md:block md:pb-2 text-blueGray-600 whitespace-nowrap"
            href="{{ route('admin.index') }}">
            Website
        </a>
        <ul class="flex flex-wrap items-center list-none md:hidden">
            <li class="relative inline-block">
                <a class="block px-3 py-1 text-blueGray-500"
                    href="javascript:void(0);"
                    onclick="openDropdown(event,'notification-dropdown')">
                    <i class="fas fa-bell"></i>
                </a>
                <div class="z-50 hidden float-left py-2 text-base text-left list-none bg-white rounded shadow-lg min-w-48"
                    id="notification-dropdown">
                    <a href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Action</a><a
                        href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Another
                        action</a><a href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Something
                        else here</a>
                    <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <a href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Seprated
                        link</a>
                </div>
            </li>
            <li class="relative inline-block">
                <a class="block text-blueGray-500"
                    href="javascript:void(0);"
                    onclick="openDropdown(event,'user-responsive-dropdown')">
                    <div class="flex items-center">
                        <span
                            class="inline-flex items-center justify-center w-12 h-12 text-sm text-white rounded-full bg-blueGray-200">
                            <img alt="..."
                                class="w-full align-middle border-none rounded-full shadow-lg"
                                src="{{ asset('theme/assets/img/team-1-800x800.jpg') }}" />
                        </span>
                    </div>
                </a>
                <div class="z-50 hidden float-left py-2 text-base text-left list-none bg-white rounded shadow-lg min-w-48"
                    id="user-responsive-dropdown">
                    <a href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Action</a><a
                        href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Another
                        action</a><a href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Something
                        else here</a>
                    <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <a href="{{ route('admin.index') }}"
                        class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-blueGray-700">Seprated
                        link</a>
                </div>
            </li>
        </ul>
        <div class="absolute top-0 left-0 right-0 z-40 items-center flex-1 hidden h-auto overflow-x-hidden overflow-y-auto rounded shadow md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none"
            id="example-collapse-sidebar">
            <div class="block pb-4 mb-4 border-b border-solid md:min-w-full md:hidden border-blueGray-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase md:block md:pb-2 text-blueGray-600 whitespace-nowrap"
                            href="{{ route('admin.index') }}">
                            Which link
                        </a>
                    </div>
                    <div class="flex justify-end w-6/12">
                        <button type="button"
                            class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
                            onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <form class="mt-6 mb-4 md:hidden">
                <div class="pt-0 mb-3">
                    <input type="text"
                        placeholder="Search"
                        class="w-full h-12 px-3 py-2 text-base font-normal leading-snug bg-white border border-solid rounded shadow-none outline-none border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 focus:outline-none" />
                </div>
            </form>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="block pt-1 pb-4 text-xs font-bold no-underline uppercase md:min-w-full text-blueGray-500">
                Admin Layout Pages
            </h6>
            <!-- Navigation -->

            <ul class="flex flex-col list-none md:flex-col md:min-w-full">
                @role(['admin'])
                @foreach ($backendSidebarTree as $item)
                    <li class="items-center">
                        <a href="{{ route("admin.{$item->as}") }}"
                            class="block py-3 text-xs font-bold uppercase {{ $currentRouteName === "admin.{$item->as}" || \Illuminate\Support\Str::contains(request()->path(), $item->module) ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
                            <i class="mr-2 text-sm opacity-75 {{ $item->icon ?? 'fas fa-tv' }}"></i>
                            {{ $item->display_name }}
                        </a>
                    </li>
                @endforeach
                @endrole

                @role(['supervisor'])
                @foreach ($backendSidebarTree as $item)
                    @permission($item->name)
                        <li class="items-center">
                            <a href="{{ route("admin.{$item->as}") }}"
                                class="block py-3 text-xs font-bold uppercase {{ $currentRouteName === "admin.{$item->as}" || \Illuminate\Support\Str::contains(request()->path(), $item->module) ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-700 hover:text-blueGray-500' }}">
                                <i class="mr-2 text-sm opacity-75 {{ $item->icon ?? 'fas fa-tv' }}"></i>
                                {{ $item->display_name }}
                            </a>
                        </li>
                        @endpermission
                    @endforeach
                    @endrole

                    {{-- <li class="items-center">
                    <a href="{{ route('admin.index') }}"
                        class="block py-3 text-xs font-bold text-pink-500 uppercase hover:text-pink-600">
                        <i class="mr-2 text-sm opacity-75 fas fa-tv"></i>
                        Dashboard
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('admin.settings') }}"
                        class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                        <i class="mr-2 text-sm fas fa-tools text-blueGray-300"></i>
                        Settings
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('admin.tables') }}"
                        class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                        <i class="mr-2 text-sm fas fa-table text-blueGray-300"></i>
                        Tables
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('admin.maps') }}"
                        class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                        <i class="mr-2 text-sm fas fa-map-marked text-blueGray-300"></i>
                        Maps
                    </a>
                </li> --}}
                </ul>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6 class="block pt-1 pb-4 text-xs font-bold no-underline uppercase md:min-w-full text-blueGray-500">
                    Auth Layout Pages
                </h6>
                <!-- Navigation -->

                <ul class="flex flex-col list-none md:flex-col md:min-w-full md:mb-4">
                    <li class="items-center">
                        <a href="{{ route('admin.index') }}"
                            class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                            <i class="mr-2 text-sm fas fa-fingerprint text-blueGray-300"></i>
                            Login
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="{{ route('admin.index') }}"
                            class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                            <i class="mr-2 text-sm fas fa-clipboard-list text-blueGray-300"></i>
                            Register
                        </a>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6 class="block pt-1 pb-4 text-xs font-bold no-underline uppercase md:min-w-full text-blueGray-500">
                    No Layout Pages
                </h6>
                <!-- Navigation -->

                <ul class="flex flex-col list-none md:flex-col md:min-w-full md:mb-4">
                    <li class="items-center">
                        <a href="{{ route('index') }}"
                            class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                            <i class="mr-2 text-sm fas fa-newspaper text-blueGray-300"></i>
                            Landing Page
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="{{ route('profile') }}"
                            class="block py-3 text-xs font-bold uppercase text-blueGray-700 hover:text-blueGray-500">
                            <i class="mr-2 text-sm fas fa-user-circle text-blueGray-300"></i>
                            Profile Page
                        </a>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
            </div>
        </div>
    </nav>
