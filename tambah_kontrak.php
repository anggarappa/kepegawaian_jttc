<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id_kontrak']) && !empty($_POST['id_kontrak']) && $_POST['id_kontrak'] != 'auto' ? $_POST['id_kontrak'] : NULL;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jk = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $lama_jabatan = isset($POST['lama_jabatan']) ? $_POST['lama_jabatan'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO kontrak VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $jk, $lama_jabatan]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="tambah_kontrak.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin">
        <label for="lama_jabatan">Lama Jabatan</label>
        <input type="text" name="lama_jabatan" id="lama_jabatan">
        <input type="submit" value="Tambah">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <a href="kontrak.php" class="create-contact">Kembali ke halaman Kontrak</a>
    <?php endif; ?>
</div>

<?=template_footer()?>