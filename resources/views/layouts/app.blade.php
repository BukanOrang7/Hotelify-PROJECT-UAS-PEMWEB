<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelify - Luxury Stays</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <!-- Font Inter untuk tampilan luxury -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        /* Semi-opaque navbar to ensure visibility on any background */
        .glass-nav {
            background: rgba(2,6,23,0.28); /* subtle dark tint */
            backdrop-filter: blur(6px) saturate(120%);
            border-bottom: 1px solid rgba(255,255,255,0.03);
            box-shadow: 0 4px 30px rgba(2,6,23,0.25);
        }

        /* Default (over hero): keep links/logo white */
        header.glass-nav .nav-link,
        header.glass-nav .logo,
        header.glass-nav .sign-btn {
            color: #fff !important;
        }

        /* Scrolled (light) */
        .glass-nav-scrolled {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.04);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
        }

        /* Link and logo colors when scrolled */
        header.glass-nav-scrolled .nav-link,
        header.glass-nav-scrolled .logo {
            color: #0f172a !important;
        }

        /* Sign in button variations */
        header .sign-btn {
            background: transparent;
            border-color: rgba(255,255,255,0.25);
            color: #fff;
        }
        header.glass-nav-scrolled .sign-btn {
            background: #eff6ff;
            color: #1e3a8a;
            border-color: transparent;
        }

        /* Mobile menu button color when over hero */
        header.glass-nav #menuButton { color: #fff; }
        header.glass-nav-scrolled #menuButton { color: #0f172a; }

        /* FIXED: Mobile menu dropdown text colors */
        /* When navbar is transparent (glass-nav), dropdown text should be dark */
        header.glass-nav #mobileMenu .nav-link {
            color: #1f2937 !important; /* Dark gray text */
        }
        
        header.glass-nav #mobileMenu .sign-btn {
            color: #1f2937 !important; /* Dark gray text */
            border-color: rgba(15, 23, 42, 0.1) !important; /* Light border */
            background: rgba(255, 255, 255, 0.9) !important;
        }
        
        header.glass-nav #mobileMenu .sign-btn:hover {
            background: rgba(255, 255, 255, 1) !important;
        }
        
        /* When navbar is scrolled (glass-nav-scrolled), keep original dark text */
        header.glass-nav-scrolled #mobileMenu .nav-link {
            color: #1f2937 !important;
        }

        /* Hamburger Button Animations - FIXED */
        .hamburger-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .hamburger-line {
            width: 24px;
            height: 2px;
            background-color: currentColor;
            margin: 3px 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-origin: center;
            border-radius: 2px;
        }

        /* Hamburger to X Animation */
        #menuButton.active .hamburger-line:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        #menuButton.active .hamburger-line:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        #menuButton.active .hamburger-line:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        /* Reusable glossy styles */
        .glass-section {
            background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02));
            border: 1px solid rgba(255,255,255,0.08);
            backdrop-filter: blur(8px);
            border-radius: 1rem;
        }

        .glass-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            box-shadow: 0 8px 30px rgba(2,6,23,0.35);
            backdrop-filter: blur(10px) saturate(120%);
        }

        /* Section spacing utilities */
        .section-padding { padding-top: 5rem; padding-bottom: 5rem; }
        .container-sm { max-width: 900px; margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem; }

        /* Responsive hero headings */
        .hero-title { font-size: 2rem; }
        @media (min-width: 640px) { .hero-title { font-size: 2.5rem; } }
        @media (min-width: 1024px) { .hero-title { font-size: 3.75rem; } }

        /* Form and container spacing to avoid overlap with fixed header */
        main { padding-top: 4.5rem; }
        @media (min-width: 768px) { main { padding-top: 4rem; } }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            const header = document.querySelector('header');
            const isHome = {{ request()->routeIs('home') ? 'true' : 'false' }}; // used to decide scroll behavior
            
            // Mobile menu toggle - FIXED
            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    this.classList.toggle('active');
                    
                    // Prevent body scroll when menu is open
                    if (!mobileMenu.classList.contains('hidden')) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenu.classList.contains('hidden') && 
                        !menuButton.contains(event.target) && 
                        !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                        menuButton.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            }
            
            if (isHome) {
                // Navbar scroll effect only on home where header sits on top of hero
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        header.classList.add('glass-nav-scrolled');
                        header.classList.remove('glass-nav');
                    } else {
                        header.classList.add('glass-nav');
                        header.classList.remove('glass-nav-scrolled');
                    }
                });
                
                // Initialize scroll effect
                if (window.scrollY > 50) {
                    header.classList.add('glass-nav-scrolled');
                } else {
                    header.classList.add('glass-nav');
                }
            } else {
                // On non-home pages, default to scrolled (dark-on-light) so header is visible on white backgrounds
                header.classList.add('glass-nav-scrolled');
                header.classList.remove('glass-nav');
            }
        });
    </script>
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col antialiased">

<!-- NAVBAR LUXURY MINIMALIST -->
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 {{ request()->routeIs('home') ? 'glass-nav' : 'glass-nav-scrolled' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo Luxury -->
            <a href="/" class="text-2xl font-bold logo hover:text-blue-600 transition-colors tracking-tight">
                Hotelify<span class="text-blue-500">.</span>
            </a>

            <!-- Desktop Navigation - Minimalist -->
            <nav class="hidden md:flex items-center space-x-1 text-sm">
                <a href="/" class="nav-link hover:text-blue-600 px-4 py-2 rounded-lg transition-colors duration-200 font-medium">
                    Home
                </a>
                <a href="/booking" class="nav-link hover:text-blue-600 px-4 py-2 rounded-lg transition-colors duration-200 font-medium">
                    Booking
                </a>
                <a href="/blog" class="nav-link hover:text-blue-600 px-4 py-2 rounded-lg transition-colors duration-200 font-medium">
                    Blog
                </a>
                <a href="/checkin" class="nav-link hover:text-blue-600 px-4 py-2 rounded-lg transition-colors duration-200 font-medium">
                    Check-in
                </a>

                @auth
                    <div class="flex items-center gap-3 ml-4">
                        <a href="/profil" class="font-medium text-slate-900 hover:text-blue-700 px-4 py-2 bg-slate-100 hover:bg-slate-200 rounded-lg transition-all duration-200">
                            {{ auth()->user()->name }}
                        </a>
                    </div>
                @else
                    <a href="/login" class="font-medium sign-btn px-4 py-2 border rounded-lg transition-all duration-200 ml-4">
                        Sign In
                    </a>
                @endauth
            </nav>

            <!-- Mobile menu button - FIXED -->
            <button 
                id="menuButton" 
                class="md:hidden focus:outline-none hover:opacity-80 transition-opacity duration-200"
                aria-label="Toggle mobile menu"
            >
                <div class="hamburger-container">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </div>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4 bg-white rounded-lg shadow-xl mt-2 border border-slate-100">
            <div class="flex flex-col space-y-1 pt-2">
                <a href="/" class="nav-link hover:text-blue-600 hover:bg-slate-50 px-4 py-3 rounded-lg transition-colors font-medium border-b border-slate-100">
                    Home
                </a>
                <a href="/booking" class="nav-link hover:text-blue-600 hover:bg-slate-50 px-4 py-3 rounded-lg transition-colors font-medium border-b border-slate-100">
                    Booking
                </a>
                <a href="/blog" class="nav-link hover:text-blue-600 hover:bg-slate-50 px-4 py-3 rounded-lg transition-colors font-medium border-b border-slate-100">
                    Blog
                </a>
                <a href="/checkin" class="nav-link hover:text-blue-600 hover:bg-slate-50 px-4 py-3 rounded-lg transition-colors font-medium border-b border-slate-100">
                    Check-in
                </a>

                @auth
                    <div class="pt-4 border-t border-slate-100">
                        <a href="/profil" class="font-medium text-slate-900 hover:text-blue-700 px-4 py-3 rounded-lg bg-slate-100 block text-center">
                            {{ auth()->user()->name }}
                        </a>
                    </div>
                @else
                    <div class="pt-4 border-t border-slate-100">
                        <a href="/login" class="font-medium sign-btn px-4 py-3 rounded-lg border block text-center bg-slate-50 hover:bg-slate-100 transition-colors">
                            Sign In
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- CONTENT -->
<main class="flex-grow pt-16">
    @yield('content')
</main>

<!-- FOOTER MINIMALIST (tidied) -->
<footer class="bg-slate-900 text-white">
    <div class="container-sm py-12">
        <div class="grid md:grid-cols-4 gap-8 items-start">
            <!-- Brand -->
            <div>
                <a href="/" class="text-2xl font-bold text-white mb-4 block">
                    Hotelify<span class="text-blue-400">.</span>
                </a>
                <p class="text-slate-400 text-sm mb-6">
                    Luxury stays, unforgettable experiences.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors text-sm">Terms</a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors text-sm">Privacy</a>
                </div>
            </div>

            <!-- Explore -->
            <div>
                <h3 class="font-semibold text-white mb-4">Explore</h3>
                <ul class="space-y-2 text-sm text-slate-300">
                    <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="/booking" class="hover:text-white transition-colors">Book Now</a></li>
                    <li><a href="/blog" class="hover:text-white transition-colors">Blog</a></li>
                    <li><a href="/checkin" class="hover:text-white transition-colors">Check-in</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h3 class="font-semibold text-white mb-4">Legal</h3>
                <ul class="space-y-2 text-sm text-slate-300">
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="{{ route('cancellation') }}" class="hover:text-white transition-colors">Cancellation Policy</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="font-semibold text-white mb-4">Contact Us</h3>
                <p class="text-sm text-slate-300 mb-4">
                    support@hotelify.com<br>
                    +62 21 1234 5678
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="mt-8 pt-8 border-t border-slate-800 text-center text-sm text-slate-500">
            <p>© {{ date('Y') }} Hotelify. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>