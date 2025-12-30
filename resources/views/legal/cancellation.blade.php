@extends('layouts.app')

@section('title', 'Cancellation Policy')

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
                    Cancellation Policy
                </h1>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Last updated: December 30, 2025</span>
                </div>
            </div>

            <div class="px-8 py-10 space-y-10 text-gray-600 leading-relaxed text-lg text-justify" style="text-align:justify;">
                
                <div class="bg-blue-50 border-l-4 border-blue-500 p-5 rounded-r-lg mb-8">
                    <p class="text-base text-blue-800 font-medium">
                        Please read our cancellation policy carefully before finalizing your booking. These rules apply to all reservations made through Hotelify.
                    </p>
                </div>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">1</span>
                        Standard Cancellation
                    </h3>
                    <div class="pl-11">
                        <p class="mb-4">We understand that plans can change. Our standard policy allows for:</p>
                        <ul class="list-disc pl-5 space-y-2 marker:text-blue-500">
                            <li><strong>Free Cancellation:</strong> You may cancel your booking free of charge up to <strong>48 hours</strong> before your scheduled check-in time.</li>
                            <li><strong>Late Cancellation:</strong> Cancellations made within 48 hours of arrival will incur a charge equivalent to the <strong>first night's stay</strong>.</li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">2</span>
                        Non-Refundable Rates
                    </h3>
                    <p class="pl-11">
                        Some bookings are designated as "Non-Refundable" at the time of purchase (usually offered at a discounted rate). For these bookings, no refund will be issued upon cancellation or modification at any time.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">3</span>
                        No-Show Policy
                    </h3>
                    <p class="pl-11">
                        If you do not check in on the scheduled arrival date ("No-Show"), you will be charged the full amount of the reservation, and the remaining nights of your booking will be cancelled automatically.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">4</span>
                        Refund Process
                    </h3>
                    <p class="pl-11">
                        Eligible refunds will be processed back to the original payment method used for booking. Please allow <strong>7-14 business days</strong> for the refund to appear on your bank statement, depending on your bank's processing time.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">5</span>
                        Force Majeure
                    </h3>
                    <p class="pl-11">
                        In the event of natural disasters, government restrictions, or other force majeure events that prevent the hotel from operating, a full refund or credit for future stay will be offered at the discretion of Hotelify management.
                    </p>
                </section>
            </div>

            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Need to cancel or modify a booking? <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Manage My Booking</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection