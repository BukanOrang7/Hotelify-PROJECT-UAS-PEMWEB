@extends('layouts.app')

@section('title', 'Kebijakan Privasi')

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
                    Kebijakan Privasi
                </h1>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>Terakhir diperbarui: 30 Desember 2025</span>
                </div>
            </div>

            <div class="px-8 py-10 space-y-10 text-gray-600 leading-relaxed text-lg text-justify" style="text-align:justify;">
                
                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">1</span>
                        Pendahuluan
                    </h3>
                    <p class="pl-11">
                        Selamat datang di <strong class="text-gray-900">Hotelify</strong>. Kami berkomitmen untuk melindungi informasi pribadi Anda dan hak Anda atas privasi. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, mengungkapkan, dan melindungi informasi Anda ketika Anda mengunjungi situs web kami dan menggunakan layanan pemesanan kami.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">2</span>
                        Informasi yang Kami Kumpulkan
                    </h3>
                    <div class="pl-11">
                        <p class="mb-4">Kami mengumpulkan informasi yang Anda berikan secara sukarela ketika mendaftar di situs, melakukan pemesanan, atau menghubungi kami. Informasi tersebut meliputi:</p>
                        <ul class="list-disc pl-5 space-y-2 marker:text-blue-500">
                            <li><strong>Data Pribadi:</strong> Nama, alamat email, nomor telepon, dan alamat pengiriman.</li>
                            <li><strong>Data Pemesanan:</strong> Tanggal check-in/check-out, jumlah tamu, dan permintaan khusus.</li>
                            <li><strong>Data Pembayaran:</strong> Nomor kartu kredit dan alamat penagihan (diproses secara aman oleh penyedia pembayaran kami).</li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">3</span>
                        Bagaimana Kami Menggunakan Informasi Anda
                    </h3>
                    <div class="pl-11">
                        <p class="mb-4">Kami menggunakan informasi yang kami kumpulkan untuk:</p>
                        <ul class="list-disc pl-5 space-y-2 marker:text-blue-500">
                            <li>Memproses dan mengelola reservasi serta pembayaran Anda.</li>
                            <li>Mengirimkan konfirmasi pemesanan dan pembaruan kepada Anda.</li>
                            <li>Menanggapi pertanyaan Anda dan memberikan dukungan pelanggan.</li>
                            <li>Meningkatkan pengalaman situs web dan layanan kami.</li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">4</span>
                        Keamanan Data &amp; Cookie
                    </h3>
                    <div class="pl-11 space-y-6">
                        <p>
                            Kami menggunakan langkah-langkah keamanan administratif, teknis, dan fisik untuk membantu melindungi informasi pribadi Anda. Meskipun kami telah mengambil langkah wajar untuk mengamankan informasi pribadi yang Anda berikan, harap diingat bahwa tidak ada tindakan keamanan yang sempurna atau tidak dapat ditembus.
                        </p>
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-5 rounded-r-lg">
                            <p class="text-base text-blue-800">
                                <strong>Cookie:</strong> Kami menggunakan cookie untuk meningkatkan pengalaman Anda. Cookie adalah file kecil yang disimpan di perangkat Anda yang membantu kami mengingat preferensi Anda dan memahami bagaimana Anda menggunakan situs kami.
                            </p>
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-sm font-bold">5</span>
                        Hubungi Kami
                    </h3>
                    <p class="pl-11">
                        Jika Anda memiliki pertanyaan atau komentar tentang kebijakan ini, Anda dapat menghubungi kami melalui email di <a href="mailto:support@hotelify.com" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">support@hotelify.com</a>.
                    </p>
                </section>
            </div>

            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Privasi Anda penting bagi kami. Baca lebih lanjut di <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Kebijakan Cookie</a>.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection