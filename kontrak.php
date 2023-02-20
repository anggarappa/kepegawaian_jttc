<?php
include 'functions.php';
$pdo = pdo_connect_mysql();


$stmt = $pdo->prepare('SELECT * FROM kontrak ORDER BY id_kontrak');
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?=template_header('Read')?>

<div class="content read">
	<h2>Read Data</h2>
	<a href="tambah_kontrak.php" class="create-contact">Tambah data kontrak</a>
	<table>
        <thead>
            <tr>
                <td>id</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Lama kontrak</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id_kontrak']?></td>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['jenis_kelamin']?></td>
                <td><?=$contact['lama_kontrak']?></td>
                <td class="actions">
                    <a href="update_kontrak.php?id_kontrak=<?=$contact['id_kontrak']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_kontrak.php?id_kontrak=<?=$contact['id_kontrak']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>