</div>
    <!-- /#wrapper -->

    <script>

    let inputKode   = document.querySelector('[name = kode_barang]')
    let inputMasuk  = document.querySelector('[name = jumlah_barang_masuk]')
    let inputKeluar = document.querySelector('[name = jumlah_barang_keluar]')
    let inputTotal  = document.querySelector('[name = total_barang]')
    inputKode.addEventListener('change', (e) => {
        e.preventDefault()
        let kode = inputKode.value
        
        let totalMasuk = 
        fetch("<?php echo base_url('api/jumlah_masuk/'); ?>" + kode)
            .then( result => result.json() )
            .catch( err => console.log(err) )
        let totalKeluar = 
        fetch("<?php echo base_url('api/jumlah_keluar/'); ?>" + kode)
            .then( result => result.json() )
            .catch( err => console.log(err) )

        Promise.all([totalMasuk, totalKeluar])
        .then( responses => {
            inputMasuk.value  = responses[0].total_masuk
            inputKeluar.value = responses[1].total_keluar
        })
        .then( () => inputTotal.value = inputMasuk.value - inputKeluar.value )
        .catch( err => console.error(err) )
    })
    
    </script>
    <!-- jQuery -->
    <script src="<?= base_url('public/assets/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('public/assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('public/assets/metisMenu/metisMenu.min.js') ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('public/assets/js/sb-admin-2.js') ?>"></script>
    <!-- Custom Javascript -->
    <script src="<?= base_url('public/assets/js/dom.js') ?>"></script>

</body>

</html>