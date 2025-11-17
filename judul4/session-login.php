<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);

    if ($user === "" || $pass === "") {
        $error = "Semua field harus diisi.";
    } elseif ($user == "admin" && $pass == "123456") {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $user;
        header("Location: index.php");
        exit;
    } else {
        $error = "Login gagal!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 h-screen flex justify-center items-center">

<div class="bg-white/40 backdrop-blur-xl p-10 rounded-3xl shadow-xl w-[380px] border border-white/50">

    <h2 class="text-3xl font-extrabold text-center text-blue-800 mb-8 tracking-wide">
        Login Sistem Kontak 🔐
    </h2>

    <?php if ($error): ?>
        <div class="bg-red-100 border border-red-200 text-red-700 p-3 rounded mb-4 text-sm">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-6">

        <div>
            <label class="font-semibold">Username</label>
            <input name="username"
                class="w-full mt-1 p-3 rounded-xl bg-white/70 border focus:ring-2 
                       focus:ring-blue-400 outline-none shadow-sm" placeholder="admin">
        </div>

        <div>
            <label class="font-semibold">Password</label>
            <input name="password" type="password"
                class="w-full mt-1 p-3 rounded-xl bg-white/70 border focus:ring-2 
                       focus:ring-blue-400 outline-none shadow-sm" placeholder="123456">
        </div>

        <button
            class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold shadow-lg 
                   hover:bg-blue-700 transition">
            Login
        </button>

    </form>
</div>

</body>
</html>
