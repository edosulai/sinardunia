<?php 

	$id = $_GET['id'];
		
	$hapus = $koneksi->query("DELETE FROM tb_data WHERE id_data = '$id' ");

	if ($hapus == TRUE) {
		echo "<script>
            alert('Data Terhapus')
        	window.location = '?page=c45/data'
       	</script>";
	} else {
		echo "<script>
            alert('Data Terhapus')
        	window.location = '?page=c45/data'
       	</script>";
	}

?>