<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('fights.index') }}"
                    class="{{ request()->is('dashboard/fights*') ? 'bg-gray-800 text-white hover:text-gray-900' : 'bg-white text-gray-900' }} flex items-center py-2 px-3 text-base font-medium rounded-lg hover:bg-gray-100">
                    <i
                        class="fa-solid fa-calendar-days {{ request()->is('dashboard/fights*') ? 'text-gray-300' : 'text-gray-500' }} w-1/12"></i>
                    <span class="ml-3">Pertandingan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('players.index') }}"
                    class="{{ request()->is('dashboard/players*') ? 'bg-gray-800 text-white hover:text-gray-900' : 'bg-white text-gray-900' }} flex items-center py-2 px-3 text-base font-medium rounded-lg hover:bg-gray-100">
                    <i
                        class="fa-solid fa-user-group {{ request()->is('dashboard/players*') ? 'text-gray-300' : 'text-gray-500' }} w-1/12"></i>
                    <span class="ml-3">Pemain</span>
                </a>
            </li>
            <li>
                <a href="{{ route('skors.index') }}"
                    class="{{ request()->is('dashboard/skors*') ? 'bg-gray-800 text-white hover:text-gray-900' : 'bg-white text-gray-900' }} flex items-center py-2 px-3 text-base font-medium rounded-lg hover:bg-gray-100">
                    <i
                        class="fa-solid fa-gamepad {{ request()->is('dashboard/skors*') ? 'text-gray-300' : 'text-gray-500' }} w-1/12"></i>
                    <span class="ml-3">Skor</span>
                </a>
            </li>
            <li>
                <a href="{{ route('galleries.index') }}"
                    class="{{ request()->is('dashboard/galleries*') ? 'bg-gray-800 text-white hover:text-gray-900' : 'bg-white text-gray-900' }} flex items-center py-2 px-3 text-base font-medium rounded-lg hover:bg-gray-100">
                    <i
                        class="fa-solid fa-image {{ request()->is('dashboard/galleries*') ? 'text-gray-300' : 'text-gray-500' }} w-1/12"></i>
                    <span class="ml-3">Foto</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
