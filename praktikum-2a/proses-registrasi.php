<?php 

require_once "data-form-regis.php";

// Validate and sanitize input
$nim = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
$jk = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_SANITIZE_STRING);
$prodi = filter_input(INPUT_POST, 'program_studi', FILTER_SANITIZE_STRING);
$skill_pilihan = filter_input(INPUT_POST, 'skills', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$domisili = filter_input(INPUT_POST, 'domisili', FILTER_SANITIZE_STRING);

// Check for required fields
if (empty($nim) || empty($nama) || empty($email) || empty($skill_pilihan)) {
    die("Error: All fields are required.");
}

if (!$email) {
    die("Error: Invalid email format.");
}

// Calculate skill score and category
$skor_skill = skor_skill($skill_pilihan, $ar_skill);
$kategori_skill = kategori_skill($skor_skill);

// Function to calculate skill score
function skor_skill($skill_pilihan, $ar_skill) {
    $skor = 0;
    foreach ($skill_pilihan as $skill) {
        if (isset($ar_skill[$skill])) {
            $skor += $ar_skill[$skill];
        }
    }
    return $skor;
}

// Function to categorize skill score
function kategori_skill($skor_skill = 0) {
    if ($skor_skill == 0) {
        return "Tidak Ada";
    } elseif ($skor_skill <= 40) {
        return "Kurang";
    } elseif ($skor_skill <= 60) {
        return "Cukup";
    } elseif ($skor_skill <= 100) {
        return "Baik";
    } elseif ($skor_skill <= 150) {
        return "Sangat Baik";
    } else {
        return "Tidak Terkategori";
    }
}