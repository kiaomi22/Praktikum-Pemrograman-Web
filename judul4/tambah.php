<?php
require "data.php";

$nama = "";
$email = "";
$telepon = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Ambil input
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $telepon = trim($_POST["telepon"]);

    // VALIDASI NAMA
    if ($nama === "") {
        $errors["nama"] = "Nama wajib diisi.";
    }

    // VALIDASI EMAIL
    if ($email === "") {
        $errors["email"] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Format email tidak valid. Contoh: email@domain.com";
    }

    // VALIDASI TELEPON
    if ($telepon === "") {
        $errors["telepon"] = "Nomor telepon wajib diisi.";
    } elseif (!ctype_digit($telepon)) {
        $errors["telepon"] = "Nomor telepon hanya boleh berisi angka.";
    }

    // JIKA TIDAK ADA ERROR → simpan ke session
    if (empty($errors)) {
        $_SESSION["kontak"][] = [
            "nama" => $nama,
            "email" => $email,
            "telepon" => $telepon
        ];
        header("Location: index.php");
        exit;
    }
}

require "layout.php";
?>

<div class="bg-white/70 backdrop-blur p-10 rounded-2xl shadow-xl border border-white/50">

<form method="POST" class="space-y-6">

    <div>
        <label class="font-semibold">👤 Nama</label>
        <input name="nama" value="<?= htmlspecialchars($nama) ?>"
            class="w-full mt-1 p-3 rounded-xl border bg-gray-50 
                   focus:ring-2 focus:ring-blue-500 outline-none">

        <?php if (isset($errors['nama'])): ?>
            <p class="text-red-600 text-sm mt-1"><?= $errors['nama'] ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label class="font-semibold">📧 Email</label>
        <input name="email" value="<?= htmlspecialchars($email) ?>"
            class="w-full mt-1 p-3 rounded-xl border bg-gray-50 
                   focus:ring-2 focus:ring-blue-500 outline-none">

        <?php if (isset($errors['email'])): ?>
            <p class="text-red-600 text-sm mt-1"><?= $errors['email'] ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label class="font-semibold">📱 Telepon</label>
        <input name="telepon" value="<?= htmlspecialchars($telepon) ?>"
            class="w-full mt-1 p-3 rounded-xl border bg-gray-50 
                   focus:ring-2 focus:ring-blue-500 outline-none">

        <?php if (isset($errors['telepon'])): ?>
            <p class="text-red-600 text-sm mt-1"><?= $errors['telepon'] ?></p>
        <?php endif; ?>
    </div>

    <button
        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold shadow-md hover:bg-blue-700 transition">
        💾 Simpan Kontak
    </button>
</form>

</div>

<?php
$content = ob_get_clean();
layout("Tambah Kontak", $content);
?>
