<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiAssistantController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = trim($request->input('message'));

        // Cek jika ada GEMINI_API_KEY atau OPENAI_API_KEY di environment
        $apiKey = env('GEMINI_API_KEY') ?: env('OPENAI_API_KEY');

        if ($apiKey && env('GEMINI_API_KEY')) {
            try {
                $systemPrompt = "Anda adalah AI Assistant untuk website portofolio R. Abiyyu Ardi Lian Permadi (Abiyyu Dev). Jawablah pertanyaan user secara spesifik, luwes, cerdas, to the point, dan relevan sesuai apa yang ditanyakan user tanpa mengulang template yang sama. Gunakan format markdown bersih.";
                $response = Http::timeout(8)->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $systemPrompt . "\n\nUser: " . $userMessage]
                            ]
                        ]
                    ]
                ]);

                if ($response->successful()) {
                    $reply = $response->json('candidates.0.content.parts.0.text');
                    if (!empty($reply)) {
                        return response()->json(['reply' => $reply]);
                    }
                }
            } catch (\Exception $e) {
                // Lanjut ke Expert Engine lokal
            }
        }

        // Jalankan Expert NLP Semantic Intent Engine
        $reply = $this->expertNlpResponse($userMessage);

        return response()->json([
            'reply' => $reply
        ]);
    }

    private function expertNlpResponse(string $query): string
    {
        $q = strtolower(trim($query));

        // 1. INTENT: Pekerjaan yang Remote / Jarak Jauh
        if (preg_match('/(pekerjaan|kerja|posisi|jabatan|proyek).*remote|remote.*(pekerjaan|kerja|posisi|jabatan|proyek)|apa saja.*remote|mana.*remote/i', $q)) {
            return "Saat ini Abiyyu memegang dan pernah menjalani beberapa posisi dengan skema **Remote (Jarak Jauh)** berikut:\n\n" .
                "1. **Kepala Divisi Teknologi Informasi Daop 8** — PT. Kereta Api Indonesia (Persero) *(Okt 2025 - Sekarang)*\n" .
                "2. **Project Manager** — PT. Garuda Lintas Nusa *(Des 2025 - Sekarang)*\n" .
                "3. **Fullstack Developer** — PT. Cahaya Smelter Indonesia *(Feb 2026 - Sekarang)*\n" .
                "4. **Fullstack Developer** — PT. Surabaya Jersey (SUB Jersey) *(Juni 2026 - Sekarang)*\n" .
                "5. **Staff Teknologi Informasi** — PT. Samudera Indonesia *(Okt 2026 - Sekarang)*\n" .
                "6. **Fullstack Developer** — PT. Garuda Lintas Nusa *(Mei 2025 - Des 2025)*\n" .
                "7. **Staff Divisi Teknologi Informasi** — PT. Kereta Api Indonesia (Persero) *(Jan 2025 - Okt 2025)*\n\n" .
                "💡 *Catatan:* Untuk saat ini, Abiyyu juga secara khusus membuka diri untuk tawaran pekerjaan baru berskema **Remote** (Full-time, Kontrak, atau Freelance).";
        }

        // 2. INTENT: Pekerjaan yang On-Site / Lapangan
        if (preg_match('/(on[\s\-]?site|lapangan|kantor|fisik).*(kerja|pekerjaan|posisi)|(pekerjaan|kerja|posisi).*(on[\s\-]?site|lapangan|kantor)/i', $q)) {
            return "Berikut adalah riwayat pekerjaan Abiyyu yang dijalankan secara **On-Site (Langsung di Lokasi)**:\n\n" .
                "1. **Staff Humas** — ITATS *(Agt 2026 - Sekarang)*\n" .
                "2. **Staff Wakil Rektor 1** — ITATS *(Agt 2024 - Juli 2026)*\n" .
                "3. **Asisten Kepala Daerah Operasi 8 Surabaya** — PT. KAI *(April 2024 - Jan 2025)*\n" .
                "4. **Staff Operasional** — PT. KAI *(Mei 2022 - April 2024)*\n" .
                "5. **Hubungan Masyarakat / PR** — PT. KAI *(Des 2021 - Mei 2022)*\n" .
                "6. **Teknisi Utilitas / Operasi Kilang** — PT. TPPI Tuban *(Des 2020 - Nov 2021)*";
        }

        // 3. INTENT: Menerima Pekerjaan Apa / Posisi yang Dibuka / Skema Kerjasama
        if (preg_match('/(menerima|buka|terbuka|terima|mencari|bisa kerja|bersedia).*pekerjaan|pekerjaan.*(apa saja|berupa apa|seperti apa|yang diterima)|skema.*kerja|hire/i', $q)) {
            return "Abiyyu saat ini siap menerima tawaran pekerjaan dan kolaborasi proyek untuk posisi berikut:\n\n" .
                "🎯 **Peran / Posisi yang Dibuka:**\n" .
                "- **Backend Developer** (PHP, Laravel, RESTful API)\n" .
                "- **Frontend Developer** (Tailwind CSS, Vue.js, Alpine.js, JavaScript)\n" .
                "- **Fullstack Developer** (Web & Mobile System)\n" .
                "- **Mobile Apps Developer** (Flutter & React Native)\n" .
                "- **Database Administrator** (MySQL & PostgreSQL)\n" .
                "- **Project Manager** (Manajemen sprint, alur rilis, & tim developer)\n" .
                "- **Web Developer** (Corporate site, portal, & e-commerce)\n\n" .
                "💼 **Skema Kerja:**\n" .
                "- **Remote Only** (untuk saat ini memprioritaskan sistem kerja jarak jauh)\n" .
                "- Terbuka untuk status **Full-time**, **Kontrak**, maupun **Proyek Lepas (Freelance)**.\n\n" .
                "Tertarik berdiskusi? Anda dapat menghubunginya via [WhatsApp Langsung](/contact).";
        }

        // 4. INTENT: Pekerjaan Saat Ini / Sedang Bekerja Di Mana
        if (preg_match('/(pekerjaan|kerja|posisi|jabatan).*(saat ini|sekarang|aktif|terbaru)|sekarang.*(kerja|sibuk|ngapain|di mana)/i', $q)) {
            return "Saat ini (**status aktif**), Abiyyu memegang beberapa peran strategis lintas bidang teknologi:\n\n" .
                "1. **Kepala Divisi Teknologi Informasi Daop 8** di *PT. Kereta Api Indonesia (Persero)* (Remote)\n" .
                "2. **Project Manager** di *PT. Garuda Lintas Nusa* (Remote)\n" .
                "3. **Fullstack Developer** di *PT. Cahaya Smelter Indonesia* (Remote)\n" .
                "4. **Fullstack Developer** di *PT. Surabaya Jersey (SUB Jersey)* (Remote)\n" .
                "5. **Staff Teknologi Informasi** di *PT. Samudera Indonesia* (Remote)\n" .
                "6. **Staff Hubungan Masyarakat** di *ITATS* (On-site)\n\n" .
                "Selain peran di atas, Abiyyu tetap terbuka untuk proyek pengembangan sistem baru berskema remote.";
        }

        // 5. INTENT: Detail Pekerjaan PT. KAI
        if (preg_match('/(kai|kereta api|daop 8)/i', $q) && !preg_match('/(booking|tiket|hadir)/i', $q)) {
            return "Perjalanan karir Abiyyu di **PT. Kereta Api Indonesia (Persero) Daop 8 Surabaya** berkembang sangat signifikan melalui 5 posisi bertahap:\n\n" .
                "1. **Kepala Divisi Teknologi Informasi Daop 8** *(Okt 2025 - Sekarang, Remote)*: Memimpin strategi arsitektur TI, modernisasi sistem, dan keamanan data 24/7.\n" .
                "2. **Staff Divisi TI** *(Jan 2025 - Okt 2025, Remote)*: Pemeliharaan server/jaringan dan pengembangan modul otomasi pelaporan web.\n" .
                "3. **Asisten Kepala Daop 8 Surabaya** *(April 2024 - Jan 2025, On-Site)*: Koordinasi manajerial lintas divisi dan stakeholder eksternal (Dishub, TNI/Polri, Pemda).\n" .
                "4. **Staff Operasional** *(Mei 2022 - April 2024, On-Site)*: Pengawasan kelancaran alur stasiun, koordinasi PPKA, dan kepatuhan SPM keselamatan KA.\n" .
                "5. **Hubungan Masyarakat / PR** *(Des 2021 - Mei 2022, On-Site)*: Komunikasi publik, penanganan komplain pelanggan, dan publikasi media pers.";
        }

        // 6. INTENT: Detail Pekerjaan PT. Garuda Lintas Nusa (GLN)
        if (preg_match('/(garuda lintas nusa|gln|warehouse|logistik)/i', $q)) {
            return "Di **PT. Garuda Lintas Nusa**, Abiyyu berperan dalam transformasi sistem logistik rantai pasok:\n\n" .
                "- **Project Manager** *(Des 2025 - Sekarang, Remote)*: Memimpin siklus pengembangan sistem ERP pergudangan, alokasi beban kerja sprint tim engineer, serta quality control deliverable.\n" .
                "- **Fullstack Developer** *(Mei 2025 - Des 2025, Remote)*: Mengembangkan sistem informasi tracking kargo web (Laravel, MySQL, Tailwind) dan RESTful API kurir lapangan.";
        }

        // 7. INTENT: Detail Pekerjaan PT. TPPI
        if (preg_match('/(tppi|petrokimia|kilang|utilitas|perpipaan)/i', $q)) {
            return "Di **PT. TPPI (Trans Pacific Petrochemical Indotama)** *(Des 2020 - Nov 2021, On-Site)*:\n\n" .
                "Abiyyu bertugas sebagai **Teknisi Utilitas / Operasi Kilang** yang menangani monitoring operasional unit water treatment, boiler, air compressor, inspeksi kebocoran perpipaan industri, serta disiplin penerapan standar K3 (HSE) di area berisiko tinggi.";
        }

        // 8. INTENT: Proyek / Portfolio Tertentu
        if (preg_match('/(proyek|project|karya|portfolio|portofolio|bikin apa|buat apa|aplikasi yang dibuat)/i', $q)) {
            return "Abiyyu telah merilis **9 sistem & aplikasi nyata** yang dapat diakses langsung:\n\n" .
                "1. **SIM Lab & Praktikum ITATS**: [portal.rpl-itats.site](https://portal.rpl-itats.site/) — Manajemen modul & presensi lab.\n" .
                "2. **Portal HMIF ITATS**: [portal.hmif-itats.site](https://portal.hmif-itats.site/) — Portal organisasi mahasiswa informatika.\n" .
                "3. **Hadir KAI (HRIS)**: [hadir.keretaapiindonesia.site](https://hadir.keretaapiindonesia.site/) — Presensi geolokasi pegawai Daop 8.\n" .
                "4. **SUB Jersey Apparel**: [subjersey.com](https://subjersey.com/) — E-commerce custom order & gateway pembayaran.\n" .
                "5. **SDM PT. Samudera Indonesia**: [sdm.samuderaidn.site](https://sdm.samuderaidn.site/) — Manajemen administrasi armada kapal.\n" .
                "6. **Warehouse ERP PT. GLN**: [warehouse.garudafiber.site](https://warehouse.garudafiber.site/) — Pelacakan inventaris kargo.\n" .
                "7. **Kasir POS PT. GLN**: [warehouse.garudafiber.site/kasir/login](https://warehouse.garudafiber.site/kasir/login) — Point of sales gudang.\n" .
                "8. **Booking Tiket KAI**: [booking.kai.id](https://booking.kai.id/) — Reservasi tiket kereta api.\n" .
                "9. **Portal Resmi KAI**: [www.kai.id](https://www.kai.id/) — Landing page informasi korporat.";
        }

        // 9. INTENT: Pendidikan & Organisasi Kampus
        if (preg_match('/(pendidikan|kuliah|sekolah|kampus|itats|smk|mahasiswa|himpunan|ketua himpunan|lab rpl|organisasi)/i', $q)) {
            return "Latar belakang pendidikan dan kepemimpinan kampus Abiyyu:\n\n" .
                "🎓 **Institut Teknologi Adhi Tama Surabaya (ITATS)** *(2023 - Sekarang)*:\n" .
                "- Jenjang: **S1 Teknik Informatika (Semester 7)**\n" .
                "- Spesialisasi Keahlian: **Kecerdasan Artifisial (Artificial Intelligence)**\n" .
                "- **Ketua Himpunan** Mahasiswa Teknik Informatika (Sept 2025 - Agt 2026)\n" .
                "- **Wakil Ketua Himpunan** HMIF ITATS (Des 2024 - Agt 2025)\n" .
                "- **Koordinator Lab** Rekayasa Perangkat Lunak (Sept 2025 - Sept 2026)\n" .
                "- **Anggota Asisten Lab** Rekayasa Perangkat Lunak (Sept 2024 - Sept 2025)\n\n" .
                "🏫 **SMK Negeri 3 Surabaya** *(2016 - 2019)*:\n" .
                "- Jurusan: Teknik Gambar Bangunan (Pemodelan CAD 2D/3D & Estimasi Anggaran Proyek).";
        }

        // 10. INTENT: Tech Stack & Bahasa Pemrograman
        if (preg_match('/(stack|skill|teknologi|bahasa|framework|laravel|flutter|mysql|php|tools)/i', $q)) {
            return "Keahlian teknologi Abiyyu mencakup **27 stack & tools**, dengan spesialisasi utama:\n\n" .
                "⭐ **Keahlian Inti**: **PHP, Laravel, JavaScript, Flutter, dan MySQL**.\n" .
                "- **Bahasa**: PHP, JavaScript, TypeScript, Python, Java, Kotlin, C++, Golang, RUST, HTML5.\n" .
                "- **Frontend & Mobile**: Laravel Blade, Flutter, React Native, Vue.js, Alpine.js, Tailwind CSS, Bootstrap.\n" .
                "- **Backend & Database**: Laravel Framework, CodeIgniter, MySQL, PostgreSQL, Apache, Nginx.\n" .
                "- **Tools & VCS**: Git/GitHub, GitLab, Postman, Canva, SketchUp.";
        }

        // 11. INTENT: Cara Menghubungi / Kontak
        if (preg_match('/(kontak|hubungi|whatsapp|wa|email|telepon|no hp|nomor|bicara|chat)/i', $q)) {
            return "Anda bisa menghubungi Abiyyu secara langsung melalui kontak berikut:\n\n" .
                "- 📱 **WhatsApp**: [0895 3970 43901](https://wa.me/62895397043901)\n" .
                "- ✉️ **Email**: abiyyuardilian213@gmail.com\n" .
                "- 🌐 **Halaman Konfirmasi**: [Buka Halaman Kontak](/contact)\n" .
                "- 📄 **Resume ATS**: [Unduh CV PDF](/download-cv)\n\n" .
                "Waktu respon aktif: Setiap hari pukul 08:00 - 21:00 WIB.";
        }

        // 12. INTENT: Salam & Sapaan
        if (preg_match('/^(halo|hai|hi|hey|pagi|siang|sore|malam|tes|test|assalamu)/i', $q)) {
            return "Halo! Senang bertemu dengan Anda. Saya **Abiyyu AI Assistant** terminal virtual. Anda dapat menanyakan tentang pengalaman kerja, posisi yang dibuka, tech stack, proyek rilis, atau kontak langsung. Apa yang ingin Anda ketahui?";
        }

        // 13. INTENT Umum: Pertanyaan Apa Pekerjaan Abiyyu secara umum
        if (preg_match('/(apa.*pekerjaan|pekerjaan.*abiyyu|profesi|bidang kerja)/i', $q)) {
            return "Secara profesional, Abiyyu adalah seorang **Fullstack Developer & Project Manager** dengan keahlian mendalam pada pengembangan sistem informasi web, aplikasi mobile (Flutter), dan manajemen basis data.\n\n" .
                "Saat ini Abiyyu menjabat sebagai **Kepala Divisi Teknologi Informasi Daop 8 di PT KAI** serta **Project Manager di PT Garuda Lintas Nusa** (keduanya dijalankan secara Remote). Selain itu, Abiyyu juga aktif mengelola berbagai sistem digital di sektor logistik, smelter, dan e-commerce.";
        }

        // Default Cerdas & Dinamis
        return "Pertanyaan Anda: *\"{$query}\"*\n\n" .
            "Sebagai asisten virtual Abiyyu Dev, berikut ringkasan relevan:\n" .
            "- Abiyyu adalah **Fullstack Developer & Project Manager** (menguasai Laravel, Flutter, PHP, JS, MySQL).\n" .
            "- Berpengalaman di 13 posisi industri (PT KAI, PT Garuda Lintas Nusa, PT Cahaya Smelter, SUB Jersey, PT Samudera Indonesia, ITATS, & PT TPPI).\n" .
            "- Saat ini hanya membuka peluang kerja berskema **Remote** (Full-time, Kontrak, atau Freelance).\n\n" .
            "Silakan ajukan pertanyaan lebih spesifik, seperti:\n" .
            "• *\"Apa saja pekerjaan yang remote?\"*\n" .
            "• *\"Abiyyu menerima pekerjaan berupa apa?\"*\n" .
            "• *\"Teknologi apa yang paling dikuasai?\"*\n" .
            "• *\"Bagaimana cara menghubunginya?\"*";
    }
}
