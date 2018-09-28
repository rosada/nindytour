<?php 
		
	$id_bus= $_GET ['id_bus'];
    $sql="DELETE FROM bu WHERE id_bus = $id_bus";
    $result = mysqli_query($kon, $sql);
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
			window.alert('Data Berhasil Disimpan');
			window.location.href='index.php?page=bus_tampil';
			</script>");
    }else {
        echo "alert('Error!')";
    }
?>