<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()

{
    // variabel global
    global $conn;

    // Silakan buat variabel di bawah dengan data yang diambil dari form
    $studentName = $_POST["stuname"];
    $nimStudent = $_POST["stuid"];
    $jurusanStudent = $_POST["stuclass"];
    $angkatanStudent = $_POST["stuangkatan"];
    echo $studentName;
    // Periksa apakah NIM sudah ada
    $ret = mysqli_query($conn, "SELECT * FROM student WHERE nim = '$nimStudent'");

    if (mysqli_num_rows($ret) == 0) {
        // Masukkan data ke tabel tb_student
        $query = "INSERT INTO tb_student (nama, nim, jurusan, angkatan)
                    VALUES ('$studentName', '$nimStudent', '$jurusanStudent', '$angkatanStudent')";
        $result = mysqli_query($conn, $query);

        /**
         * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
         * 
         * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
         * dan mengarahkan pengguna ke halaman 'add-students.php'.
         * Jika operasi gagal, menampilkan pesan kesalahan.
         * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
         */
        if (mysqli_affected_rows($conn) > 0){
            echo "<script>alert('Berhasil menambahkan data Mahasiswa')</script>";
        }else{
            echo "<script>alert('Gagal menambahkan data Mahasiswa')</script>";
        }
     }
}

function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel
    

    // Update data mahasiswa berdasarkan ID
    $query = "UPDATE tb_student SET 
            nama = '$studentName',
            nim = '$nimStudent',
            jurusan = '$jurusanStudent',
            angkatan = '$angkatanStudent'
            WHERE id = '$id'";
        
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>