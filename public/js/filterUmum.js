
    $(document).ready(function() {
        // Mendeteksi perubahan pada dropdown
        $('.dropdown-item').on('click', function() {
            var status = $(this).data('status');

            // Memfilter data berdasarkan status yang dipilih
            if (status === 'bebas masalah' || status === 'bermasalah') {
                $('.clickable-row').hide(); // Sembunyikan semua baris data

                // Tampilkan baris data yang sesuai dengan status yang dipilih
                $('.clickable-row').each(function() {
                    var statusBebasMasalah = $(this).find('td:nth-child(9)').text();

                    if (status === 'bebas masalah' && statusBebasMasalah === 'Bebas Masalah') {
                        $(this).show();
                    } else if (status === 'bermasalah' && statusBebasMasalah === 'Bermasalah') {
                        $(this).show();
                    }
                });
            } else {
                $('.clickable-row').show(); // Tampilkan semua baris data jika status tidak dipilih
            }
        });
    });

