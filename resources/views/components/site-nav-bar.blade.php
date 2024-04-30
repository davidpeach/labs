<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div>

    <nav x-data="{ open: false }" class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex px-2 lg:px-0">
                    <div class="flex flex-shrink-0 items-center">
                        <!-- image was here -->
                    </div>
                    <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
                        <x-partials.nav-item label="Home" route="home" to="home" mode="wide" />
                        <x-partials.nav-item label="Now" route="now" to="now" mode="wide" />
                        <x-partials.nav-item label="Notes" route="note" to="note.index" mode="wide" />
                        <x-partials.nav-item label="Articles" route="article" to="article.index" mode="wide" />
                        <x-partials.nav-item label="Photos" route="photo" to="photo.index" mode="wide" />
                        <x-partials.nav-item label="Jams" route="jam" to="jam.index" mode="wide" />
                    </div>
                </div>
                <div class="flex flex-1 items-center justify-center px-2 lg:ml-6 lg:justify-end">
                    <div class="w-full max-w-lg lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="search" name="search"
                                class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Search" type="search">
                        </div>
                    </div>
                </div>
                <div class="flex items-center lg:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                        x-bind:aria-expanded="open.toString()">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- mobile menu closed -->
                        <svg x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                            :class="{ 'hidden': open, 'block': !(open) }" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                        <!-- mobile menu open -->
                        <svg x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                            :class="{ 'block': open, 'hidden': !(open) }" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                    <!-- <button type="button" -->
                    <!--     class="relative flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> -->
                    <!--     <span class="absolute -inset-1.5"></span> -->
                    <!--     <span class="sr-only">View notifications</span> -->
                    <!--     <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" -->
                    <!--         aria-hidden="true"> -->
                    <!--         <path stroke-linecap="round" stroke-linejoin="round" -->
                    <!--             d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"> -->
                    <!--         </path> -->
                    <!--     </svg> -->
                    <!-- </button> -->

                    <!-- Profile dropdown -->
                    <div x-data="{ open: false }" @keydown.escape.stop="open = false;"
                        class="relative ml-4 flex-shrink-0">
                        <div>
                            <button type="button"
                                class="relative flex rounded-full bg-green-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                id="user-menu-button" x-ref="button" @click="open = !open" @click.outside="open = false"
                                @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                                aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                                @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="" alt="">
                            </button>
                        </div>

                        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-red-50 p-4 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state." role="menu"
                            aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()"
                            @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()"
                            @keyup.space.prevent="open = false; focusButton()">
                            <livewire:now-listening-to />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden bg-green-50" id="mobile-menu" x-show="open" x-cloak>
            <div class="space-y-1 pb-3 pt-2">
                <p class="text-2xl px-4 pb-3">Navigation</p>
                <x-partials.nav-item label="Home" route="home" to="home" mode="mobile" />
                <x-partials.nav-item label="Now" route="now" to="now" mode="mobile" />
                <x-partials.nav-item label="Notes" route="note" to="note.index" mode="mobile" />
                <x-partials.nav-item label="Articles" route="article" to="article.index" mode="mobile" />
                <x-partials.nav-item label="Photos" route="photo" to="photo.index" mode="mobile" />
                <x-partials.nav-item label="Jams" route="jam" to="jam.index" mode="mobile" />
            </div>
            <div class="border-t border-gray-200 pb-3 pt-4">
                <div class="flex items-center px-4">
                    <p class="text-2xl">Current Status</p>
                </div>
                <div class="mt-3 space-y-1 p-4">
                    <livewire:now-listening-to />
                </div>
            </div>
        </div>
    </nav>

</div>
