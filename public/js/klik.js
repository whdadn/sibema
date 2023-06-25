
    document.addEventListener('DOMContentLoaded', function() {
        var tableRows = document.getElementsByClassName('clickable-row');
        var deleteButton = document.querySelector('.delete-button');
        var clickedRow = null;

        Array.prototype.forEach.call(tableRows, function(row) {
            row.addEventListener('click', function(event) {
                // Menghapus penanda pada baris sebelumnya
                if (clickedRow) {
                    clickedRow.classList.remove('clicked-row');
                }

                // Menambahkan penanda pada baris yang diklik
                this.classList.add('clicked-row');
                clickedRow = this;
            });
        });

        deleteButton.addEventListener('click', function(event) {
            if (clickedRow) {
                var id = clickedRow.getAttribute('data-id');
                console.log('Hapus Item ID:', id); // Anda dapat mengganti ini dengan aksi penghapusan item di database

                // Hapus baris dari tabel
                clickedRow.parentNode.removeChild(clickedRow);
                clickedRow = null;
            }
        });

        document.addEventListener('click', function(event) {
            var target = event.target;
            if (!target.closest('table') && target !== deleteButton) {
                // Menghapus penanda pada baris jika bagian di luar tabel diklik
                if (clickedRow) {
                    clickedRow.classList.remove('clicked-row');
                    clickedRow = null;
                }
            }
        });
    });

