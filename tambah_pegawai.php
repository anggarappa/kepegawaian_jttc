<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jk = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $tlp = isset($_POST['telepon']) ? $_POST['telepon'] : '';
    $id_jabatan = isset($_POST['id_jabatan']) ? $_POST['id_jabatan'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO pegawai VALUES (?, ?, ?,?,?)');
    $stmt->execute([$id, $nama, $jk, $tlp, $id_jabatan]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="tambah_pegawai.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <label for="jk">Jenis kelamin</label>
        <input type="text" name="jk" id="jk">
        <label for="tlp">Telepon</label>
        <input type="text" name="tlp" id="tlp">
        <label for="id_jabatan">ID Jabatan</label>
        <input type="text" name="id_jabatan" id="id_jabatan">
        <input type="submit" value="Tambah">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <a href="jabatan.php" class="create-contact">Kembali ke halaman Pegawai</a>
    <?php endif; ?>
</div>

<?=template_footer()?>