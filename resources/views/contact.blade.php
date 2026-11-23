@extends('layouts.app')

@section('title', 'Konfirmasi Kontak WhatsApp - Abiyyu Dev')

@section('content')
{{-- Container dengan tinggi min-h-[calc(100vh-80px)] agar kartu langsung pas di tengah layar tanpa scroll --}}
<div class="min-h-[calc(100vh-80px)] flex items-center justify-center py-6 sm:py-10 bg-white relative overflow-hidden">
    {{-- Background Accent --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-blue-50/70 rounded-full blur-3xl -z-10 pointer-events-none"></div>

    <div class="w-full max-w-xl mx-auto px-4 sm:px-6 text-center">
        
        {{-- Card Container Compact & Pas di Viewport --}}
        <div class="p-6 sm:p-9 rounded-3xl border border-slate-200/90 bg-white shadow-xl shadow-slate-200/50">
            
            {{-- WhatsApp Icon Highlight --}}
            <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-50 border border-emerald-200/60 text-emerald-600 flex items-center justify-center text-2xl mb-4 shadow-sm">
                <i class="fab fa-whatsapp"></i>
            </div>

            {{-- Title & Subtitle --}}
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-[11px] font-semibold mb-3">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Konfirmasi Pengalihan Komunikasi
            </div>

            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight leading-snug">
                Terhubung Langsung Melalui WhatsApp
            </h1>

            <p class="mt-2.5 text-xs sm:text-sm text-slate-600 leading-relaxed max-w-md mx-auto">
                Anda akan dialihkan ke nomor WhatsApp resmi saya (<strong class="text-slate-900">+62 895 3970 43901</strong>) untuk berdiskusi seputar peluang kerja, proyek, maupun konsultasi.
            </p>

            {{-- Info Box Ringkas --}}
            <div class="mt-5 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 text-left space-y-1.5 text-xs text-slate-600">
                <div class="flex items-center gap-2">
                    <i class="fas fa-user-check text-blue-600 text-xs"></i>
                    <span>Penerima: <strong>R. Abiyyu Ardi Lian Permadi</strong> (Abiyyu Dev)</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-clock text-blue-600 text-xs"></i>
                    <span>Waktu Respon Cepat: <strong>Senin - Minggu (08:00 - 21:00 WIB)</strong></span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-shield-halved text-blue-600 text-xs"></i>
                    <span>Kerahasiaan data dan pesan diskusi Anda terjamin aman.</span>
                </div>
            </div>

            {{-- Action Buttons (Langsung terlihat tanpa scroll) --}}
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-2.5">
                <a href="https://wa.me/62895397043901?text=Halo%20Abiyyu,%20saya%20tertarik%20dengan%20portofolio%20Anda%20dan%20ingin%20berdiskusi." target="_blank"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-bold transition-all shadow-md shadow-emerald-600/20">
                    <i class="fab fa-whatsapp text-base"></i> Ya, Lanjutkan ke WhatsApp
                </a>
                <a href="{{ url('/') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-xs sm:text-sm font-semibold transition-all">
                    <i class="fas fa-arrow-left text-xs text-slate-400"></i> Batal / Kembali
                </a>
            </div>

            {{-- Alternatif Email --}}
            <p class="mt-5 pt-4 border-t border-slate-100 text-[11px] text-slate-500">
                Lebih memilih komunikasi formal via email?
                <a href="mailto:abiyyuardilian213@gmail.com" class="text-blue-600 font-bold hover:underline ml-1">abiyyuardilian213@gmail.com</a>
            </p>

        </div>

    </div>
</div>
@endsection
