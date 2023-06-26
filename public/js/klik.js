var table = document.getElementById('data-table');
    var rows = table.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
      var currentRow = rows[i];
      currentRow.addEventListener('click', function() {
        var id = this.getAttribute('data-id');
        // Lakukan operasi lain dengan ID yang dipilih
      });
    }


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
    });

    var addDataButton = document.getElementById('add-button');
    var table = document.getElementById('data-table');
    var rows = table.getElementsByTagName('tr');

    if (rows.length > 1) {
        addDataButton.disabled = true;
        addDataButton.classList.add('disabled');
    }


