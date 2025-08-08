<!-- Alpine.js for submenu toggle -->
<div class="w-full bg-gray-800 text-white relative">
    <!-- Logo Section -->
    <div class="p-4 flex items-center space-x-2">
        <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
        <h1 class="text-xl font-bold">DashPanel</h1>
    </div>

    <!-- Navigation Menu -->
    <div class="mt-6 space-y-1">
        <x-nav-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
            <i data-lucide="gauge" class="w-5 h-5"></i>
            <span>Dashboard</span>
        </x-nav-link-left>

        <x-nav-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
            <i data-lucide="users" class="w-5 h-5"></i>
            <span>Users</span>
        </x-nav-link-left>

        <x-nav-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
            <i data-lucide="shopping-cart" class="w-5 h-5"></i>
            <span>Products</span>
        </x-nav-link-left>

        <x-nav-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
            <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
            <span>Analytics</span>
        </x-nav-link-left>

        <x-nav-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
            <i data-lucide="file-text" class="w-5 h-5"></i>
            <span>Orders</span>
        </x-nav-link-left>


        <!-- Settings with submenu using Alpine.js -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-gray-700 transition">

                <div class="flex items-center space-x-2">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span>Settings</span>
                </div>

                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200"
                    :class="{ 'rotate-180': open }"></i>
            </button>

            <div x-show="open" x-transition class="ml-8 mt-1 space-y-1">
                <x-nav-sub-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
                    <span>Orders</span>
                </x-nav-sub-link-left>

                <x-nav-sub-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
                    <span>Profile</span>
                </x-nav-sub-link-left>

                <x-nav-sub-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
                    <span>Security</span>
                </x-nav-sub-link-left>

                <x-nav-sub-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
                    <span>Preferences</span>
                </x-nav-sub-link-left>
            </div>
        </div>

        <x-nav-link-left :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full ">
            <i data-lucide="file-text" class="w-5 h-5"></i>
            <span>Orders</span>
        </x-nav-link-left>

    </div>
</div>
