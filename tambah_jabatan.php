<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $nama_jabatan = isset($_POST['nama_jabatan']) ? $_POST['nama_jabatan'] : '';
    $gaji = isset($_POST['gaji']) ? $_POST['gaji'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO jabatan VALUES (?, ?, ?)');
    $stmt->execute([$id, $nama_jabatan, $gaji]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="tambah_jabatan.php" method="post">
        <!-- <label for="id">ID</label> -->
        <label for="nama_jabatan">Nama Jabatan</label>
        <!-- <input type="text" name="id" value="auto" id="id"> -->
        <input type="text" name="nama_jabatan" id="nama_jabatan">
        <label for="gaji">Gaji</label>
        <input type="text" name="gaji" id="gaji">
        <input type="submit" value="Tambah">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <a href="jabatan.php" class="create-contact">Kembali ke halaman Jabatan</a>
    <?php endif; ?>
</div>

<?=template_footer()?>