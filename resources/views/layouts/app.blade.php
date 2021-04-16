<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Head --}}
    @include('partials.head')
    @yield('head')
    {{-- Head --}}
</head>

<body id="page-top">
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('partials.sidebar')
        {{-- Sidebar --}}

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                {{-- Topbar --}}
                @include('partials.topbar')
                {{-- Topbar --}}

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            {{-- Footer --}}
            @include('partials.footer')
            {{-- Footer --}}
        </div>
    </div>

    {{-- Scripts --}}
    @include('partials.scripts')
    @yield('scripts')
    {{-- Scripts --}}
</body>

</html>
