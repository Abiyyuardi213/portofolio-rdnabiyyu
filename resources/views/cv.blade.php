<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV ATS - R Abiyyu Ardi Lian Permadi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            color: #111111;
            background: #f4f4f7;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* Overlay loader */
        .download-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.96);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            font-family: 'Inter', sans-serif;
        }
        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #e30613;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        .loader-text {
            font-size: 16px;
            font-weight: 700;
            color: #111111;
            margin-bottom: 8px;
        }
        .loader-subtext {
            font-size: 13px;
            color: #666666;
            margin-bottom: 24px;
        }
        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #111111;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border-radius: 6px;
            border: 0;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-action:hover {
            background: #333333;
        }
        .btn-secondary {
            background: transparent;
            color: #111111;
            border: 1px solid #d9d9d4;
            margin-left: 10px;
        }
        .btn-secondary:hover {
            background: #f5f5f1;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* CV Sheet Layout for PDF Conversion */
        .cv-wrapper {
            opacity: 0; /* Hide CV container from UI to keep it clean */
            position: absolute;
            left: -9999px;
            top: -9999px;
        }
        
        .cv-page {
            width: 210mm;
            height: 297mm;
            background: #ffffff;
            padding: 18mm 18mm;
            position: relative;
            box-sizing: border-box;
            overflow: hidden;
        }

        .cv-header {
            display: grid;
            grid-template-columns: 110px 1fr 100px;
            gap: 24px;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-photo {
            width: 106px;
            height: 106px;
            border-radius: 50%;
            background: #e30613;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        .profile-photo img {
            width: 90%;
            height: 95%;
            object-fit: contain;
        }
        .header-info h1 {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #111111;
            margin-bottom: 6px;
            text-transform: uppercase;
        }
        .contact-meta {
            font-size: 11px;
            font-weight: 600;
            color: #444444;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }
        .contact-meta span {
            display: inline-flex;
            align-items: center;
        }
        .contact-meta span:not(:last-child)::after {
            content: "|";
            margin-left: 8px;
            color: #888888;
            font-weight: 400;
        }
        .qr-section {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }
        .qr-section span {
            font-size: 9px;
            font-weight: 700;
            color: #222222;
        }
        .qr-section img {
            width: 72px;
            height: 72px;
        }
        .cv-summary {
            font-size: 10.5px;
            color: #555555;
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .section-title {
            font-size: 13px;
            font-weight: 800;
            text-transform: capitalize;
            color: #111111;
            border-bottom: 1.5px solid #111111;
            padding-bottom: 4px;
            margin-top: 22px;
            margin-bottom: 14px;
            letter-spacing: 0.02em;
        }
        .xp-item {
            margin-bottom: 16px;
        }
        .xp-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 2px;
        }
        .xp-role {
            font-size: 11.5px;
            font-weight: 700;
            color: #111111;
        }
        .xp-period {
            font-size: 11px;
            font-weight: 500;
            color: #222222;
        }
        .xp-company {
            font-size: 10.5px;
            font-weight: 700;
            color: #444444;
            margin-bottom: 5px;
        }
        .xp-desc {
            font-size: 10.5px;
            color: #555555;
            text-align: justify;
            line-height: 1.65;
        }
        .education-item {
            margin-bottom: 14px;
        }
        .education-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 2px;
        }
        .education-school {
            font-size: 11.5px;
            font-weight: 700;
            color: #111111;
        }
        .education-period {
            font-size: 11px;
            font-weight: 500;
            color: #222222;
        }
        .education-details {
            font-size: 10.5px;
            font-weight: 500;
            color: #555555;
        }
        .skills-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .skill-row {
            font-size: 10.5px;
            line-height: 1.6;
            color: #555555;
        }
        .skill-row strong {
            color: #111111;
            font-weight: 700;
        }
    </style>
</head>
<body>

    <!-- Overlay Loader -->
    <div class="download-overlay" id="loaderOverlay">
        <div class="loader-spinner" id="spinner"></div>
        <div class="loader-text" id="statusTitle">Menyiapkan PDF CV ATS...</div>
        <div class="loader-subtext" id="statusMessage">CV Anda akan terunduh otomatis dalam beberapa detik.</div>
        <div id="actionRow">
            <button onclick="generatePDF()" class="btn-action"><i class="fas fa-redo"></i> Coba Lagi</button>
            <a href="{{ url('/') }}" class="btn-action btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </div>

    <!-- Hidden Printable Area for html2pdf -->
    <div class="cv-wrapper" id="cvContent">
        
        <!-- PAGE 1 -->
        <div class="cv-page">
            <!-- Header -->
            <header class="cv-header">
                <div class="profile-photo">
                    <img src="{{ asset('image/profiles/r-abiyyu-ardi-lian-permadi-cropped-1781080034.png') }}" alt="Profile Photo">
                </div>
                <div class="header-info">
                    <h1>R Abiyyu Ardi Lian Permadi</h1>
                    <div class="contact-meta">
                        <span>Kota Surabaya</span>
                        <span>abiyyuardilian213@gmail.com</span>
                        <span>+62895397043901</span>
                    </div>
                </div>
                <div class="qr-section">
                    <span>Scan Profile Saya</span>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://portofolio.rdnabiyyu.my.id/" alt="QR Code Portfolio">
                </div>
            </header>

            <!-- Summary -->
            <div class="cv-summary">
                <strong>Visi</strong> Menjadi web developer dan mobile developer profesional yang inovatif, adaptif terhadap perkembangan teknologi, serta mampu menciptakan solusi digital lintas platform yang bermanfaat dan berdampak luas bagi masyarakat dan industri. <strong>Misi</strong> Mengembangkan keterampilan teknis secara berkelanjutan melalui pembelajaran formal dan proyek-proyek mandiri, baik di bidang web maupun mobile. Menguasai berbagai bahasa pemrograman dan framework modern yang relevan dengan pengembangan web (frontend &amp; backend) serta pengembangan aplikasi Android. Berkontribusi dalam tim dan komunitas teknologi untuk berbagi pengetahuan serta memperluas wawasan industri. Menerapkan prinsip clean code dan best practices dalam setiap pengembangan perangkat lunak, baik untuk aplikasi web maupun mobile. <strong>Minat Karier</strong> Web Development: Frontend dan backend development dengan fokus pada performa, keamanan, dan user experience. Frontend Developer: Merancang antarmuka pengguna yang responsif, interaktif, dan intuitif menggunakan framework modern seperti React, Vue, Backend Developer: Membangun sistem sisi server yang efisien, aman, dan scalable. Full-Stack Development: Mengintegrasikan teknologi frontend dan backend untuk menciptakan aplikasi web yang komprehensif dan fungsional. Mobile Developer (Android): Merancang dan mengembangkan aplikasi Android yang fungsional, responsif, dan user-friendly menggunakan Kotlin/Java.
            </div>

            <!-- Section: Pengalaman (Page 1) -->
            <section>
                <h2 class="section-title">Pengalaman</h2>
                
                <div class="xp-item">
                    <div class="xp-header">
                        <span class="xp-role">Teknisi</span>
                        <span class="xp-period">Oktober 2025–Januari 2021</span>
                    </div>
                    <div class="xp-company">PT Trans-Pacific Petrochemical Indotama &bull; Full Time</div>
                    <div class="xp-desc">
                        Melakukan instalasi, perawatan, dan perbaikan sistem perpipaan industri sesuai standar keselamatan dan operasional, serta memastikan kelancaran distribusi material dalam proses produksi perminyakan lepas pantai.
                    </div>
                </div>

                <div class="xp-item">
                    <div class="xp-header">
                        <span class="xp-role">Staff Teknologi dan Informasi</span>
                        <span class="xp-period">Januari 2025 - Sampai Saat Ini</span>
                    </div>
                    <div class="xp-company">PT Kereta Api Indonesia (Persero) &bull; Part Time</div>
                    <div class="xp-desc">
                        Bertugas mengembangkan, memelihara, dan mengoptimalkan aplikasi berbasis web untuk mendukung kebutuhan operasional dan layanan perusahaan, serta memastikan sistem berjalan aman, efisien, dan sesuai standar teknologi informasi PT Kereta Api Indonesia.
                    </div>
                </div>

                <div class="xp-item">
                    <div class="xp-header">
                        <span class="xp-role">Asisten Kepala Operasional DAOP 8</span>
                        <span class="xp-period">Januari 2024–Januari 2025</span>
                    </div>
                    <div class="xp-company">PT Kereta Api Indonesia (Persero) &bull; Part Time</div>
                    <div class="xp-desc">
                        Mendukung Kepala Operasional dalam perencanaan, koordinasi, dan pengawasan seluruh aktivitas operasional kereta api di wilayah DAOP 8, memastikan kelancaran layanan, kepatuhan terhadap regulasi, serta peningkatan efisiensi dan keselamatan operasional.
                    </div>
                </div>

                <div class="xp-item">
                    <div class="xp-header">
                        <span class="xp-role">Staff Operasional</span>
                        <span class="xp-period">Oktober 2022–Desember 2023</span>
                    </div>
                    <div class="xp-company">PT Kereta Api Indonesia (Persero) &bull; Part Time</div>
                    <div class="xp-desc">
                        Melaksanakan dan mengawasi kegiatan operasional harian perkeretaapian, termasuk pengaturan jadwal, koordinasi perjalanan kereta, serta memastikan kelancaran dan keselamatan operasional sesuai prosedur dan standar yang berlaku.
                    </div>
                </div>
            </section>
        </div>

        <!-- PAGE 2 -->
        <div class="cv-page">
            <!-- Section: Pengalaman Lanjutan (Page 2) -->
            <section>
                <div class="xp-item" style="margin-top: 0;">
                    <div class="xp-header">
                        <span class="xp-role">Public Relation</span>
                        <span class="xp-period">Desember 2021–Oktober 2022</span>
                    </div>
                    <div class="xp-company">PT Kereta Api Indonesia (Persero) &bull; Part Time</div>
                    <div class="xp-desc">
                        Bertanggung jawab dalam membangun dan menjaga citra perusahaan melalui media komunikasi eksternal dan internal, menangani hubungan dengan media, serta mendukung kegiatan promosi, publikasi, dan event perusahaan untuk meningkatkan kepercayaan publik terhadap PT Kereta Api Indonesia.
                    </div>
                </div>
            </section>

            <!-- Section: Pendidikan -->
            <section>
                <h2 class="section-title">Pendidikan</h2>
                
                <div class="education-item">
                    <div class="education-header">
                        <span class="education-school">Institut Teknologi Adhi Tama Surabaya</span>
                        <span class="education-period"></span>
                    </div>
                    <div class="education-details">S1 &bull; Teknik Informatika &bull; IPK 3.67</div>
                </div>

                <div class="education-item">
                    <div class="education-header">
                        <span class="education-school">SMKN 3 SURABAYA</span>
                        <span class="education-period">Juni 2019</span>
                    </div>
                    <div class="education-details">SMA/SMK &bull; Teknik Gambar Bangunan &bull; Nilai rata-rata: 89.6</div>
                </div>
            </section>

            <!-- Section: Keahlian -->
            <section>
                <h2 class="section-title">Keahlian</h2>
                <div class="skills-list">
                    <div class="skill-row">
                        <strong>Hard Skills :</strong> Desain Basis Data, Pengembangan Aplikasi Mobile, Desain Web, Pengembangan Web, Manajemen basis data, Perangkat lunak manajemen program, Basis data SQL dan NoSQL
                    </div>
                    <div class="skill-row">
                        <strong>Soft Skills :</strong> Adaptabilitas, Problem-solving, Kepemimpinan, Kesabaran, Komunikasi yang efektif, Pengambilan keputusan, Kemampuan komunikasi, Keterampilan manajemen waktu, Multitasking, Kerjasama Tim, Etiket tempat kerja
                    </div>
                </div>
            </section>
        </div>

    </div>

    <!-- html2pdf Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF() {
            const overlay = document.getElementById('loaderOverlay');
            const spinner = document.getElementById('spinner');
            const title = document.getElementById('statusTitle');
            const message = document.getElementById('statusMessage');

            // Reset UI
            spinner.style.display = 'block';
            title.innerText = 'Menyiapkan PDF CV ATS...';
            message.innerText = 'CV Anda akan terunduh otomatis dalam beberapa detik.';

            const element = document.getElementById('cvContent');
            const opt = {
                margin:       0,
                filename:     'CV_R_Abiyyu_Ardi_Lian_Permadi.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true, logging: false },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            // Generate and Save PDF
            html2pdf().set(opt).from(element).save().then(() => {
                // Update UI on success
                spinner.style.display = 'none';
                title.innerText = 'CV ATS Berhasil Diunduh!';
                message.innerText = 'File PDF Anda telah disimpan ke folder Download Anda.';
            }).catch((err) => {
                // Update UI on error
                spinner.style.display = 'none';
                title.innerText = 'Gagal Mengunduh PDF';
                message.innerText = 'Terjadi kesalahan saat memproses PDF. Silakan klik Coba Lagi.';
                console.error(err);
            });
        }

        // Run automatically on load
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(generatePDF, 1000); // 1s delay to ensure assets/fonts loaded
        });
    </script>
</body>
</html>
