@extends('layouts.app')

@section('title', 'Terms of Service')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <button onclick="history.back()" class="mb-8 inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 font-medium group">
            <span class="p-1 rounded-full group-hover:bg-blue-100 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
            </span>
            Kembali
        </button>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            
            <div class="px-8 py-10 border-b border-gray-100 bg-gradient-to-r from-blue-50 via-white to-white">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-3 text-left">
                    Terms of Service
                </h1>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Last updated: December 30, 2025</span>
                </div>
            </div>

            <div class="px-8 py-10 space-y-10 text-gray-600 leading-relaxed text-lg text-justify" style="text-align:justify;">
                
                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">1</span>
                        Agreement to Terms
                    </h3>
                    <p class="pl-11">
                        By accessing or using <strong class="text-gray-900">Hotelify</strong>, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access the service.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">2</span>
                        User Responsibilities
                    </h3>
                    <div class="pl-11">
                        <p class="mb-4">
                            You agree to use our site only for lawful purposes. You agree not to take any action that might:
                        </p>
                        <ul class="list-disc pl-5 space-y-2 marker:text-blue-500">
                            <li>Compromise the security of the website.</li>
                            <li>Render the website inaccessible to others.</li>
                            <li>Cause damage to the site or the content.</li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">3</span>
                        Booking and Payments
                    </h3>
                    <p class="pl-11">
                        When you make a reservation through Hotelify, you agree to provide accurate, current, and complete information. You agree to pay all charges incurred by you or any users of your account and credit card at the prices in effect when such charges are incurred.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">4</span>
                        Intellectual Property
                    </h3>
                    <p class="pl-11">
                        The content, organization, graphics, design, compilation, and other matters related to the Site are protected under applicable copyrights and other proprietary (including but not limited to intellectual property) rights. The copying, redistribution, use, or publication by you of any such matters or any part of the Site is strictly prohibited.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">5</span>
                        Limitation of Liability
                    </h3>
                    <p class="pl-11">
                        Hotelify shall not be liable for any direct, indirect, incidental, special, or consequential damages that result from the use of, or the inability to use, the site or materials on the site.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">6</span>
                        Changes to Terms
                    </h3>
                    <div class="ml-11 bg-yellow-50 border-l-4 border-yellow-400 p-5 rounded-r-lg">
                        <p class="text-base text-yellow-800 font-medium">
                            We reserve the right to modify these terms at any time. You should check this page regularly. Your continued use of the Site following any changes to this Agreement constitutes your acceptance of those changes.
                        </p>
                    </div>
                </section>
            </div>

            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Have questions about our terms? <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection