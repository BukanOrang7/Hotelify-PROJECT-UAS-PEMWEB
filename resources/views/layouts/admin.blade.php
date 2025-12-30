<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Hotelify</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <!-- jQuery CDN for DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .sidebar-mobile {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 50;
                transform: translateX(-100%);
            }
            
            .sidebar-mobile.open {
                transform: translateX(0);
            }
            
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
                display: none;
            }
            
            .overlay.active {
                display: block;
            }
        }
        
        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px 0;
            background-color: #4b5563;
            transition: 0.3s;
            border-radius: 2px;
        }
        
        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }
        
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        
        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Overlay for mobile sidebar -->
<div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

<div class="min-h-screen flex flex-col md:flex-row">
    <!-- Mobile Header with Hamburger -->
    <div class="md:hidden bg-white border-b px-4 py-3 flex items-center justify-between sticky top-0 z-40">
        <div class="flex items-center gap-3">
            <!-- Hamburger Button -->
            <button id="hamburger" class="hamburger focus:outline-none" onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <!-- Logo/Title -->
            <div class="text-lg font-bold text-blue-600">
                Hotelify Admin
            </div>
        </div>
        
        <!-- User Info -->
        <div class="text-sm text-gray-600">
            {{ auth()->user()->name }}
        </div>
    </div>

    <!-- SIDEBAR - Mobile Hidden -->
    <aside id="sidebar" class="sidebar-mobile sidebar-transition w-64 bg-white border-r border-gray-200 md:relative md:transform-none md:flex-shrink-0">
        <!-- Desktop Logo -->
        <div class="hidden md:block p-6 text-xl font-bold text-blue-600 border-b">
            Hotelify Admin
        </div>

        <!-- Close Button (Mobile Only) -->
        <div class="md:hidden p-4 border-b flex justify-between items-center">
            <div class="text-lg font-bold text-blue-600">Menu</div>
            <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-1">
            <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                </svg>
                Dashboard
            </a>
            
            <a href="/admin/services" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                </svg>
                Layanan
            </a>
            
            <a href="/admin/bookings" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Reservasi
            </a>
            
            <a href="/admin/cancellations" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                Pembatalan
            </a>
            
            <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                Pengguna
            </a>
            
            <a href="/admin/blog" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                </svg>
                Blog
            </a>
            
            <a href="/admin/logs" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-50 transition-colors text-gray-700 font-medium hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                </svg>
                Log Aktivitas
            </a>
            
            <!-- Logout Button in Sidebar (Mobile Only) -->
            <div class="md:hidden pt-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-50 transition-colors text-gray-700 font-medium hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col min-h-0">
        <!-- Desktop Topbar -->
        <header class="hidden md:flex bg-white border-b px-8 py-4 justify-between items-center sticky top-0 z-30">
            <div class="text-gray-600">
                Login sebagai: <strong class="text-gray-800">{{ auth()->user()->name }}</strong>
            </div>

            <!-- Desktop Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm">
                    Logout
                </button>
            </form>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8 overflow-auto bg-gray-50">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-800 border border-red-300 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-6 p-4 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ session('warning') }}
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <!-- DataTables & jQuery (loaded here so page-level scripts can rely on them) -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 min-h-[calc(100vh-200px)]">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<!-- DataTables & jQuery moved above into Page Content area to ensure page scripts can use them -->

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- SweetAlert2 (for toasts & confirmations) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Sidebar Toggle Script -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const hamburger = document.getElementById('hamburger');
        
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
        hamburger.classList.toggle('active');
    }
    
    // Close sidebar when clicking on a link (mobile only)
    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                toggleSidebar();
            }
        });
    });
    
    // Close sidebar when pressing Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('open')) {
                toggleSidebar();
            }
        }
    });
</script>

<!-- DataTables CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>

<!-- SweetAlert2 Toast integration (global) -->
<script>
    // Create reusable Toast mixin
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    // Show session messages automatically as toast
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: {!! json_encode(session('success')) !!}
        });
    @endif

    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: {!! json_encode(session('error')) !!}
        });
    @endif

    @if(session('warning'))
        Toast.fire({
            icon: 'warning',
            title: {!! json_encode(session('warning')) !!}
        });
    @endif

    // Utility: show a confirmation dialog and return a Promise
    function confirmAction({ title = 'Apakah anda yakin?', text = '', icon = 'warning', confirmButtonText = 'Ya, Lanjutkan', cancelButtonText = 'Batal' } = {}) {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
            reverseButtons: true
        });
    }
</script>

</body>
</html>