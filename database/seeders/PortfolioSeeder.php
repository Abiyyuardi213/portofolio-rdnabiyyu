<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Profile
        Profile::create([
            'name' => 'R. Abiyyu Ardi Lian P',
            'role' => 'IT Support & Web Developer',
            'bio' => 'Nama lengkap saya R. Abiyyu Ardi Lian Permadi. Saya adalah mahasiswa Teknik Informatika dari ITATS yang passionate dalam web development dan IT support. Fokus karir saya adalah sebagai Web Developer dengan keahlian di Laravel, Code Igniter, dan PHP Native. Saya juga aktif sebagai Asisten Laboratorium di kampus.',
            'phone' => '+62 811 3017 176',
            'whatsapp' => '0895 3970 43901',
            'email' => 'abiyyuardilian213@gmail.com',
            'location' => 'Surabaya, Jawa Timur',
            'github' => 'https://github.com/Abiyyuardi213',
            'linkedin' => 'https://www.linkedin.com/in/abiyyu-ardilian-b87b42190/',
            'instagram' => 'https://www.instagram.com/rdnabiyyu/',
        ]);

        // Experiences
        Experience::create([
            'company' => 'PT. TPPI',
            'role' => 'Maintenance Technician',
            'period' => 'Nov 2019 - Jan 2021',
            'description' => json_encode([
                'Sebagai operator teknisi perpipaan',
                'Teknisi Legal Senior proyek pengeboran minyak',
                'Teknisi perpipaan tingkat 2 Distrik 44 laut jawa'
            ]),
            'logo' => 'image/tppi.png'
        ]);

        Experience::create([
            'company' => 'PT. KAI',
            'role' => 'Public Relation',
            'period' => 'Des 2021 - Sept 2022',
            'description' => json_encode([
                'Pembicara rapat kerja tahunan PT. KAI',
                'Pembicara rapat kerja tahunan BUMN',
                'Pembicara agenda tahunan PT. KAI Daop 8'
            ]),
            'logo' => 'image/kai.png'
        ]);

        Experience::create([
            'company' => 'PT. KAI',
            'role' => 'Operation Staff',
            'period' => 'Oct 2022 - Jun 2024',
            'description' => json_encode([
                'Penyelia operasi UPT Crew KA Sidotopo',
                'Perancang Grafik Perjalanan KA Gapeka 2023'
            ]),
            'logo' => 'image/kai.png'
        ]);

        Experience::create([
            'company' => 'PT. KAI',
            'role' => 'Assistant Chief Operating Officer',
            'period' => 'Jun 2024 - Des 2024',
            'description' => json_encode([
                'Asisten Kepala Operasional EVP Daop 8',
                'Perancang Grafik Perjalanan KA Gapeka 2025'
            ]),
            'logo' => 'image/kai.png'
        ]);

        Experience::create([
            'company' => 'PT. KAI',
            'role' => 'Web Developer & Front Dev',
            'period' => 'Des 2024 - April 2025',
            'description' => json_encode([
                'Develop Sistem Manajemen Pegawai Daop 8',
                'Develop Official Landing Page PT. KAI',
                'Develop Sistem Absensi & Keuangan'
            ]),
            'logo' => 'image/kai.png'
        ]);

        Experience::create([
            'company' => 'ITATS',
            'role' => 'Administration & Web Dev',
            'period' => 'Sept 2024 - Current',
            'description' => json_encode([
                'Frontliner Administration',
                'Develop Sistem Peminjaman Ruangan'
            ]),
            'logo' => 'image/itats.png'
        ]);

        Experience::create([
            'company' => 'PT. Garuda Fiber',
            'role' => 'Fullstack Programmer (Remote)',
            'period' => 'May 2025 - Current',
            'description' => json_encode([
                'Develop Sistem Informasi Manajemen Logistik',
                'Develop Sistem Manajemen Pegawai',
                'Develop Sistem Manajemen Keuangan'
            ]),
            'logo' => 'image/gfi.png'
        ]);

        Experience::create([
            'company' => 'PT. KAI',
            'role' => 'IT Project Manager (Remote)',
            'period' => 'April 2025 - July 2025',
            'description' => json_encode([
                'Lead Team for Develop E-Recruitment KAI'
            ]),
            'logo' => 'image/kai.png'
        ]);

        Experience::create([
            'company' => 'PT. KAI',
            'role' => 'Head of Planning and Development Division (Remote)',
            'period' => 'July 2025 - Current',
            'description' => json_encode([
                'Lead Team for Rewrite Operational System'
            ]),
            'logo' => 'image/kai.png'
        ]);

        // Projects
        Project::create([
            'title' => 'Employee Management System',
            'description' => 'Sistem manajemen pegawai terintegrasi untuk PT. KAI Daop 8 dengan fitur attendance dan payroll.',
            'image' => 'image/ss1.png',
            'tags' => 'Code Igniter 3, MySQL, Bootstrap'
        ]);

        Project::create([
            'title' => 'PT. KAI Official Landing Page',
            'description' => 'Landing page modern dan responsive untuk meningkatkan brand awareness PT. Kereta Api Indonesia.',
            'image' => 'image/ss2.png',
            'tags' => 'Code Igniter 3, MySQL, JavaScript, Bootstrap'
        ]);

        Project::create([
            'title' => 'Garuda Fiber Marketing System',
            'description' => 'Sistem terintegrasi untuk marketing dan penjualan produk.',
            'image' => 'image/ss3.png',
            'tags' => 'Laravel 12, MySQL, jQuery, Bootstrap'
        ]);

        Project::create([
            'title' => 'Warehouse & Logistics Information System',
            'description' => 'Sistem untuk manajemen pergudangan dan logistik PT. Garuda Fiber',
            'image' => 'image/ss4.png',
            'tags' => 'Laravel 12, MySQL, jQuery, Bootstrap'
        ]);

        Project::create([
            'title' => 'Official Landing Page HMIF ITATS',
            'description' => 'Dashboard profesional untuk marketing dan transparansi Himpunan Teknik Informatika ITATS',
            'image' => 'image/ss5.png',
            'tags' => 'React JS, Firebase Database, Shadcn Template'
        ]);

        Project::create([
            'title' => 'Informatics Event Official Website',
            'description' => 'Portal dukungan HMIF ITATS untuk seluruh kegiatan Himpunan dan Program Studi Teknik Informatika ITATS.',
            'image' => 'image/ss6.png',
            'tags' => 'Laravel 12, Tailwind, MySQL'
        ]);

        // Skills
        Skill::create([
            'category' => 'Web Development',
            'items' => 'HTML, CSS, JavaScript, Bootstrap',
            'icon' => 'fas fa-code'
        ]);

        Skill::create([
            'category' => 'Backend Development',
            'items' => 'Laravel, Code Igniter, PHP Native',
            'icon' => 'fas fa-cogs'
        ]);

        Skill::create([
            'category' => 'Management',
            'items' => 'Word, Excel, Power Point, Project Planning',
            'icon' => 'fas fa-chart-line'
        ]);

        // Education
        Education::create([
            'institution' => 'SMK Negeri 3 Surabaya',
            'degree' => 'Teknik Gambar Bangunan',
            'period' => '2015 - 2016',
            'achievements' => json_encode(['NIHIL Prestasi dan Kegiatan'])
        ]);

        Education::create([
            'institution' => 'SMA Terpadu Krida Nusantara Bandung',
            'degree' => 'MIPA',
            'period' => '2016 - 2019',
            'achievements' => json_encode([
                'Komandan Resimen Korps KN 2018-2019',
                'Paskibra Kota Bandung 2018',
                'Juara 1 Cabor Lari Marathon Kota Bandung 2019'
            ])
        ]);

        Education::create([
            'institution' => 'Institut Teknologi Adhi Tama Surabaya',
            'degree' => 'Teknik Informatika',
            'period' => '2023 - Sekarang',
            'achievements' => json_encode([
                'Asisten Laboratorium Rekayasa Perangkat Lunak',
                'Anggota divisi Kewirausahaan Himpunan Mahasiswa Teknik Informatika',
                'Wakil Ketua Himpunan Mahasiswa Teknik Informatika',
                'Tata Usaha (CSR) Bidang Akademik WR 1',
                'Koordinator Laboratorium Rekayasa Perangkat Lunak',
                'Ketua Himpunan Mahasiswa Teknik Informatika'
            ])
        ]);
    }
}
