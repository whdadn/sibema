
    document.addEventListener('DOMContentLoaded', function() {
        var tableRows = document.getElementsByClassName('clickable-row');

        Array.prototype.forEach.call(tableRows, function(row) {
            row.addEventListener('click', function(event) {
                // Menghapus semua penanda pada baris lain
                var allRows = document.getElementsByClassName('clickable-row');
                Array.prototype.forEach.call(allRows, function(row) {
                    row.classList.remove('clicked-row');
                });

                // Menambahkan penanda pada baris yang diklik
                this.classList.add('clicked-row');
            });
        });

        var deleteButton = document.querySelector('.delete-button');
        deleteButton.addEventListener('click', function(event) {
            var clickedRow = document.querySelector('.clicked-row');
            if (clickedRow) {
                var id = clickedRow.getAttribute('data-id');
                console.log('Hapus Data ID:', id); // Anda dapat mengganti ini dengan aksi penghapusan data di database

                // Hapus baris dari tabel
                clickedRow.parentNode.removeChild(clickedRow);
            }
        });
    });

