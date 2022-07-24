<?php 

	$id = $_GET['id'];
		
	$hapus = mysqli_query($conn, "DELETE FROM produk WHERE idproduk = '$id' ");

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