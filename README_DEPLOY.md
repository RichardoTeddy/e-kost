# Deploy ke Railway / Render (gratis tier) - langkah singkat

1. Siapkan repository GitHub
   - Inisialisasi repo jika belum: `git init && git add . && git commit -m "init"`
   - Push ke GitHub.

2. Tambahkan `Dockerfile` (sudah disertakan) ke root.

3. Buat service di Railway atau Render
   - Railway: New Project -> Deploy from GitHub -> pilih repo.
   - Render: New -> Web Service -> Connect to GitHub -> pilih repo.

4. Atur build / start
   - Railway biasanya mendeteksi `Dockerfile` otomatis. Jika tidak, pilih Docker deploy.
   - Pastikan PORT environment variable diset oleh platform (Railway/Render). Dockerfile mengekspos 8080; platform akan meng-set `PORT` — jika perlu, ubah `EXPOSE` dan start command.

5. Database
   - Tambahkan plugin MySQL (Railway) atau create PostgreSQL/MySQL di platform.
   - Ambil credentials (HOST, USER, PASSWORD, DB, PORT) dan masukkan ke file `.env` di Railway/Render environment variables (jangan commit kredensial ke repo).

6. Update `.env`
   - Set `app.baseURL` ke URL publik yang diberikan platform.

7. Deploy
   - Mulai deploy di dashboard Railway/Render. Setelah selesai, buka URL publik untuk verifikasi.

Tambahan (local testing sebelum push):

```powershell
cd "e:\SANATA DHARMA\SEMESTER 4\PLATFORM\FILE PROYEK KELOMPOK EKOST"
php -S localhost:8080 -t public
```

Atau build Docker lokal:

```powershell
docker build -t ekost-app .
docker run -p 8080:80 ekost-app
```
