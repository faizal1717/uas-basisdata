# UAS BASIS DATA

## Entity dan Struktur Data

Pada proyek ini dibuat beberapa entity utama yang saling berhubungan untuk membangun sistem basis data rumah sakit.  
Entity yang digunakan antara lain:

- Rumah Sakit  
- Poliklinik  
- Dokter  
- Jadwal Praktek  
- Pasien  
- Kunjungan  
- Obat  
- Resep  
- User  

Entity-entity tersebut digunakan untuk merepresentasikan alur dan aktivitas yang terjadi di lingkungan rumah sakit, mulai dari pengelolaan data pasien hingga pelayanan medis.

## Fitur Tambahan (Materi Lanjutan)

### Metabase – Visualisasi Data

Metabase digunakan sebagai tools Business Intelligence untuk menampilkan data dari database dalam bentuk grafik dan dashboard, sehingga data lebih mudah dipahami dan dianalisis.

#### Akun Login Metabase
Email : faizalardi.81@gmail.com
Password : Faizal12345

### Cara Membuat Dashboard di Metabase
1. Akses Metabase melalui browser:
2. Login menggunakan akun yang sudah disediakan
3. Masuk ke menu **Our Analytics**
4. Klik **+ New**
5. Pilih **Dashboard**
6. Tentukan lokasi dashboard (Our Analytics atau Personal)

Di dalam dashboard:
- Tambahkan visualisasi menggunakan fitur **New Question**
- Atau membuat query manual sesuai kebutuhan

Metabase menyediakan berbagai jenis visualisasi seperti:
- Bar Chart  
- Line Chart  
- Pie Chart  
- dan jenis grafik lainnya  

## MinIO – Penyimpanan File

MinIO digunakan sebagai Object Storage untuk menyimpan file, khususnya gambar yang ditampilkan pada aplikasi.

### Akses MinIO
http://localhost:9000/
http://localhost:9001/


## Konfigurasi MinIO

Sebelum MinIO dapat digunakan, perlu dilakukan beberapa tahap konfigurasi.

### Membuat Bucket
Buat satu bucket baru di MinIO dan atur bucket tersebut menjadi **Public**.

### Mengatur Akses Bucket Menjadi Public
Jalankan perintah berikut pada service MinIO:
```bash
mc alias set myminio http://127.0.0.1:9000 minioadmin minioadmin
mc anonymous set download myminio/nama-bucket
mc anonymous set public myminio/nama-bucket
```

### Integrasi MinIO dengan Laravel
Install Dependency
composer require league/flysystem-aws-s3-v3


Setelah itu lakukan publish konfigurasi Livewire dan atur disk default Livewire menjadi local.

Konfigurasi Filesystem

### Tambahkan konfigurasi berikut pada file config/filesystems.php:
```bash
'minio' => [
    'driver' => 's3',
    'key' => env('MINIO_KEY', 'minioadmin'),
    'secret' => env('MINIO_SECRET', 'minioadmin'),
    'endpoint' => env('MINIO_ENDPOINT', 'http://minio:9000'),
    'region' => env('MINIO_REGION', 'us-east-1'),
    'bucket' => env('MINIO_BUCKET', 'uploads'),
    'use_path_style_endpoint' => true,
];
```

### Konfigurasi Environment (.env)
```bash
FILESYSTEM_DISK=minio
MINIO_ACCESS_KEY=minioadmin
MINIO_SECRET_KEY=minioadmin
MINIO_REGION=us-east-1
MINIO_BUCKET=test
MINIO_ENDPOINT=http://minio:9000
MINIO_URL=http://localhost:9000
MINIO_USE_PATH_STYLE_ENDPOINT=true

```
### Studi Kasus: Data Rumah Sakit

Sebagai contoh penerapan, MinIO digunakan untuk menyimpan dan menampilkan gambar Rumah Sakit pada aplikasi.

Migration

Pada tabel rumah sakit ditambahkan kolom berikut:
```bash
$table->string('upload_gambar')->nullable();
```
# Menampilkan Gambar pada Tabel (Filament)
```bash
Tables\Columns\ImageColumn::make('upload_gambar')
    ->disk('minio')
    ->checkFileExistence(false)
    ->height(60)
    ->circular()
    ->defaultImageUrl(asset('images/no-image.png'));
```
# Upload Gambar pada Form
```bash
Forms\Components\FileUpload::make('upload_gambar')
    ->disk('minio')
    ->image()
    ->visibility('public')
    ->imagePreviewHeight('150')
    ->preserveFilenames()
    ->maxSize(2048)
    ->required();
```
### Kesimpulan
Melalui proyek ini, materi lanjutan pada mata kuliah Basis Data berhasil diterapkan, yaitu penggunaan Metabase untuk visualisasi dan pengolahan data serta MinIO untuk penyimpanan dan pengelolaan file gambar.
Proyek ini diharapkan dapat menunjukkan pemahaman terhadap konsep basis data dan penerapannya dalam sistem yang mendekati kondisi nyata.