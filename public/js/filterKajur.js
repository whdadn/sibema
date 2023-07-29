// Mengambil elemen dropdown menu
const dropdownMenu = document.querySelector('.dropdown-menu');

// Mengambil semua dropdown item
const dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');

// Mengubah status saat dropdown item diklik
dropdownItems.forEach(item => {
    item.addEventListener('click', function() {
        const status = this.getAttribute('data-status');
        filterPerpus(status);
    });
});

// Fungsi untuk melakukan filter berdasarkan status
function filterPerpus(status) {
    // Mengambil semua perpustakaan
    const perpusItems = document.querySelectorAll('.perpustakaan-item');

    // Memeriksa status setiap perpustakaan
    perpusItems.forEach(item => {
        const perpusStatus = item.getAttribute('data-status');

        // Menampilkan atau menyembunyikan perpustakaan berdasarkan status
        if (status === 'all' || perpusStatus === status) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}