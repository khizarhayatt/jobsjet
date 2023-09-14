<x-admin>
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('admin.partials.topnav')
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</x-admin>
