// 1. Data Produk Array Object
const dataProduk = [
  {
    nama: "Laptop Pro 15 inch",
    harga: 15000000,
    deskripsi:
      "Laptop performa tinggi cocok untuk programmer dan desainer grafis.",
    kategori: "Elektronik",
    gambar:
      "https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&auto=format&fit=crop&w=1351&q=80",
  },
  {
    nama: "Kaos Polos Premium",
    harga: 75000,
    deskripsi:
      "Kaos berbahan katun lembut yang menyerap keringat. Nyaman seharian.",
    kategori: "Pakaian",
    gambar:
      "https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
  },
  {
    nama: "Smartwatch Seri X",
    harga: 2500000,
    deskripsi: "Jam tangan pintar dengan fitur pemantau detak jantung dan GPS.",
    kategori: "Elektronik",
    gambar:
      "https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
  },
  {
    nama: "Kacamata Aviator",
    harga: 150000,
    deskripsi: "Kacamata gaya anti-UV untuk melindungi mata saat cuaca terik.",
    kategori: "Aksesoris",
    gambar:
      "https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
  },
  {
    nama: "Jaket Hoodie Pria",
    harga: 200000,
    deskripsi: "Jaket hangat cocok untuk cuaca dingin dan berkendara motor.",
    kategori: "Pakaian",
    gambar:
      "https://images.unsplash.com/photo-1556821840-3a63f95609a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
  },
  {
    nama: "Tas Ransel Kanvas",
    harga: 300000,
    deskripsi:
      "Tas ransel kuat muat laptop untuk keperluan kuliah atau bekerja.",
    kategori: "Aksesoris",
    gambar:
      "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
  },
];

// 2. Fungsi Render HTML dengan Looping
function tampilkanProduk(arrayProduk) {
  const wadahProduk = document.getElementById("daftar-produk");
  wadahProduk.innerHTML = ""; // Bersihkan kontainer

  for (let i = 0; i < arrayProduk.length; i++) {
    let produk = arrayProduk[i];
    let hargaFormat = "Rp " + produk.harga.toLocaleString("id-ID");

    // String Template Literal menggunakan Backtick (`)
    let kartuHTML = `
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 d-flex flex-column bg-white">
                    <img src="${produk.gambar}" class="card-img-top project-img" alt="${produk.nama}">
                    <div class="card-body d-flex flex-column p-4">
                        <span class="kategori-badge mb-2" style="width: fit-content;">${produk.kategori}</span>
                        <h5 class="card-title fw-bold font-montserrat">${produk.nama}</h5>
                        <p class="harga-produk">${hargaFormat}</p>
                        <p class="card-text text-muted mb-4">${produk.deskripsi}</p>
                        
                        <button class="btn btn-accent mt-auto w-100">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        `;

    wadahProduk.innerHTML += kartuHTML;
  }
}

// 3. Fungsi Logika Filter Kategori
function filterProduk(kategoriPilihan) {
  // A. Ubah styling tombol filter (hapus class 'active' dari semua, tambah ke yang diklik)
  let tombolBanyak = document.getElementById("filter-buttons").children;
  for (let btn of tombolBanyak) {
    btn.classList.remove("active");
    if (btn.innerText === kategoriPilihan) {
      btn.classList.add("active");
    }
  }

  // B. Lakukan penyaringan array
  if (kategoriPilihan === "Semua") {
    tampilkanProduk(dataProduk);
  } else {
    const dataDisaring = dataProduk.filter(function (produk) {
      return produk.kategori === kategoriPilihan;
    });
    tampilkanProduk(dataDisaring);
  }
}

// 4. Inisialisasi Pertama Kali Muncul
tampilkanProduk(dataProduk);

// --- FITUR NAVBAR AUTO-HIDE SAAT DIAM ---
let timerScroll;
const navbar = document.getElementById("mainNavbar");

// Event listener saat halaman di-scroll
window.addEventListener(
  "scroll",
  function () {
    // 1. Saat digulir, pastikan navbar muncul
    navbar.classList.remove("navbar-hidden");

    // 2. Bersihkan timer lama agar tidak tumpang tindih
    window.clearTimeout(timerScroll);

    // 3. Buat timer baru: Jika 2 detik tidak ada aktivitas scroll, jalankan perintah di dalam
    timerScroll = setTimeout(function () {
      // Jangan sembunyikan jika posisi masih di paling atas halaman
      if (window.scrollY > 80) {
        navbar.classList.add("navbar-hidden");
      }
    }, 2000); // 2000 milidetik = 2 detik (bisa Anda ubah sesuai selera)
  },
  false,
);

// Tambahan UX: Munculkan navbar kembali jika mouse disentuh ke area paling atas layar
document.addEventListener("mousemove", function (e) {
  if (e.clientY <= 80) {
    // Jika kursor berada di 80px paling atas
    navbar.classList.remove("navbar-hidden");
    window.clearTimeout(timerScroll); // Batalkan timer menghilang
  }
});
