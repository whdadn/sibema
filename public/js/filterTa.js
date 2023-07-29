$(document).ready(function() {
    $('.status-filter').click(function(e) {
        e.preventDefault();
        var status = $(this).data('status');
        
        // Tambahkan logika di sini untuk memfilter berdasarkan status
        if (status === 'bermasalah') {
            // Lakukan sesuatu jika dipilih "Bermasalah"
        } else if (status === 'bebas-masalah') {
            // Lakukan sesuatu jika dipilih "Bebas Masalah"
        }
    });
});
