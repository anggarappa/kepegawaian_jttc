<?php
include 'functions.php';
$pdo = pdo_connect_mysql();


$stmt = $pdo->prepare('SELECT * FROM jabatan ORDER BY id_jabatan');
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?=template_header('Read')?>

<div class="content read">
	<h2>Read Data</h2>
	<a href="tambah_jabatan.php" class="create-contact">Tambah jabatan</a>
	<table>
        <thead>
            <tr>
                <td>id</td>
                <td>Nama Jabatan</td>
                <td>Gaji</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id_jabatan']?></td>
                <td><?=$contact['nama_jabatan']?></td>
                <td><?=$contact['gaji']?></td>
                <td class="actions">
                    <a href="update_jabatan.php?id_jabatan=<?=$contact['id_jabatan']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_jabatan.php?id_jabatan=<?=$contact['id_jabatan']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=template_footer()?>