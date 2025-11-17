<?php
// layout.php
function layout($title, $content) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $title ?></title>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex font-sans">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white/40 backdrop-blur-xl border-r border-white/50 shadow-xl min-h-screen p-6">

        <h2 class="text-2xl font-extrabold mb-8 text-blue-800 tracking-wide">
            Sistem Kontak 📇
        </h2>

        <nav class="space-y-4">
            <a href="index.php"
                class="flex items-center gap-3 text-gray-800 font-semibold hover:text-blue-700 transition">
                <span>🏠</span> Dashboard
            </a>

            <a href="tambah.php"
                class="flex items-center gap-3 text-gray-800 font-semibold hover:text-blue-700 transition">
                <span>➕</span> Tambah Kontak
            </a>

            <a href="logout.php"
                class="flex items-center gap-3 text-red-600 font-semibold hover:text-red-700 transition">
                <span>🚪</span> Logout
            </a>
        </nav>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">

        <!-- NAVBAR -->
        <div class="w-full bg-white/50 backdrop-blur-xl border border-white/40 
                    shadow-md rounded-xl p-4 mb-8 flex justify-between items-center">

            <h1 class="text-2xl font-bold text-gray-700"><?= $title ?></h1>

            <div class="text-gray-700 font-semibold">
                👋 Halo, <?= $_SESSION["username"] ?? "User" ?>
            </div>
        </div>

        <!-- PAGE CONTENT -->
        <?= $content ?>
    </main>

</body>
</html>
<?php } ?>
