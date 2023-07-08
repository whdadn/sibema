
    $(document).ready(function() {
        // Mendeteksi perubahan pada dropdown
        $('.dropdown-item').on('click', function() {
            var status = $(this).text();

            // Memfilter data berdasarkan status yang dipilih
            if (status === 'Bermasalah' || status === 'Bebas Masalah') {
                $('.clickable-row').hide(); // Sembunyikan semua baris data

                // Tampilkan baris data yang sesuai dengan status yang dipilih
                $('.clickable-row').each(function() {
                    var statusAkademik = $(this).find('td:nth-child(5)').text();

                    if (status === 'Bermasalah' && statusAkademik === 'Bermasalah') {
                        $(this).show();
                    } else if (status === 'Bebas Masalah' && statusAkademik === 'Bebas Masalah') {
                        $(this).show();
                    }
                });
            } else {
                $('.clickable-row').show(); // Tampilkan semua baris data jika status tidak dipilih
            }
        });
    });

