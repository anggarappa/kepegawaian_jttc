<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id_kontrak'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id_kontrak']) ? $_POST['id_kontrak'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $jk = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        $lk = isset($_POST['lama_kontrak']) ? $_POST['lama_kontrak'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE kontrak SET id_kontrak = ?, nama = ?, jenis_kelamin = ?, lama_kontrak = ? WHERE id_kontrak = ?');
        $stmt->execute([$id, $nama, $jk, $lk, $_GET['id_kontrak']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM kontrak WHERE id_kontrak = ?');
    $stmt->execute([$_GET['id_kontrak']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id_kontrak']?></h2>
    <form action="update_kontrak.php?id_kontrak=<?=$contact['id_kontrak']?>" method="post">
        <label for="id_kontrak">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id_kontrak" value="<?=$contact['id_kontrak']?>" id="id_kontrak">
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <label for="lama_kontrak">Lama Kontrak</label>
        <input type="text" name="jenis_kelamin" value="<?=$contact['jenis_kelamin']?>" id="jenis_kelamin">
        <input type="text" name="lama_kontrak" value="<?=$contact['lama_kontrak']?>" id="lama_kontrak">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>