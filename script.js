document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formTransaksi');
    const tabelTransaksi = document.getElementById('tabelTransaksi').getElementsByTagName('tbody')[0];
    function tambahBarisTransaksi(transaksi) {
        const row = tabelTransaksi.insertRow();
        row.insertCell(0).innerText = transaksi.jenisBahanBakar;
        row.insertCell(1).innerText = transaksi.jumlah;
        row.insertCell(2).innerText = transaksi.harga;
        row.insertCell(3).innerText = transaksi.total;
        row.insertCell(4).innerText = transaksi.waktu;
    }


    function muatTransaksi() {
        fetch('simpan_transaksi.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(transaksi => {
                    tambahBarisTransaksi(transaksi);
                });
            });
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const jenisBahanBakar = document.getElementById('jenisBahanBakar').value;
        const jumlah = document.getElementById('jumlah').value;
        const harga = document.getElementById('harga').value;
        const total = jumlah * harga;
        const waktu = new Date().toLocaleString();

        const transaksi = {
            jenisBahanBakar: jenisBahanBakar,
            jumlah: jumlah,
            harga: harga,
            total: total,
            waktu: waktu
        };

        fetch('simpan_transaksi.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(transaksi)
        })
        .then(response => response.json())
        .then(response => {
            alert(response.message);
            tambahBarisTransaksi(transaksi);
        });
    });

    muatTransaksi();
});
