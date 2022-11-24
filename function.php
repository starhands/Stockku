<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");

//menambah barang baru
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $addtotable = mysqli_query($conn,"insert into stock (namabarang,deskripsi) values('$namabarang','$deskripsi')");
    if($addtotable){
        header('location:index.php');
    }else{
        header('location:index.php');
    }
}

//manambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $hargasatuan = $_POST['hargasatuan'];

    $jumlahharga = $qty*$hargasatuan;

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

    $persediaansekarang = $ambildatanya['persediaan'];
    $tambahnilaipersediaan = $persediaansekarang+$jumlahharga;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang,keterangan,qty,hargasatuan,totalharga) values('$barangnya','$penerima','$qty','$hargasatuan','$jumlahharga')");
    $updatestockmasuk =mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang='$barangnya'");
    $updatenilaipersediaan = mysqli_query($conn,"update stock set persediaan='$tambahnilaipersediaan'where idbarang='$barangnya'");
    if($addtomasuk&&$updatestockmasuk&&$updatenilaipersediaan){
        header('location:masuk.php');
    } else {
        header('location:masuk.php');
    }

}


//manambah barang keluar
if(isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['keterangan'];
    $qty = $_POST['qty'];
    $hargajual = $_POST['hargajual'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $kurangistocksekarangdenganquantity = $stocksekarang-$qty;

    $cekhargasatuan = mysqli_query($conn,"select * from masuk where idbarang='$barangnya'");
    $ambilhargasatuan = mysqli_fetch_array($cekhargasatuan);
    $hargasatuanbarang = $ambilhargasatuan['hargasatuan'];
    $jumlahharga = $qty*$hargasatuanbarang;

    $persediaansekarang = $ambildatanya['persediaan'];
    $kurangnilaipersediaan = $persediaansekarang-$jumlahharga;

    $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang,penerima,qty,hargajual) values('$barangnya','$penerima','$qty','$hargajual')");
    $updatestockkeluar = mysqli_query($conn, "update stock set stock='$kurangistocksekarangdenganquantity'where idbarang='$barangnya'");
    $updatenilaipersediaan = mysqli_query($conn,"update stock set persediaan='$kurangnilaipersediaan'where idbarang='$barangnya'");
    if($addtokeluar&&$updatestockkeluar&&$updatenilaipersediaan){
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    }
}

//mengedit barang
if(isset($_POST['editbarang'])){
    header('location;masuk.php');
}else{
    header('location;keluar.php');
}

