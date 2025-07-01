## 🚀 Langkah-langkah Menjalankan Project Laravel: `RAWAT INAP`

### 📥 1. Clone Project dari GitHub

```bash
git clone git@github.com:pmyeditz/rawat_inap.git
```
```bash
cd rawat_inap
```

### 🛠️ 2. Salin File `.env`

```bash
cp .env.example .env
```

---

### ⚙️ 3. Konfigurasi Database

#### **A. Jika Menggunakan MAMP (MacOS)**

Edit file `.env` dan sesuaikan:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=puskesmas_db
DB_USERNAME=root
DB_PASSWORD=root
UNIX_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
```

#### **B. Jika Menggunakan XAMPP (Windows/Linux)**

Edit file `.env` dan sesuaikan:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=puskesmas_db
DB_USERNAME=root
DB_PASSWORD=
DB_SOCKET=
```

---

### 📦 4. Install Dependency Laravel

```bash
composer install
```

---

### 🔑 5. Generate Application Key

```bash
php artisan key:generate
```

---

### 🗃️ 6. Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

---

### 🧾 7. Install DomPDF (untuk export PDF)

```bash
composer require barryvdh/laravel-dompdf
```

---

### 🚀 8. Jalankan Laravel

```bash
php artisan serve
```

Buka browser dan akses:
👉 `http://localhost:8000`

---

### 🔐 Login Admin

Diharapkan mengubah email yang aktif stelah login

Username :
```
admin
Password : admin123
```
Password :
```
admin123
```
### 🔐 Login Tenaga Medis

username : 
```
dokter1
password : dokter123
```
password :
```
dokter123
```


## salam hangat RIDHO

