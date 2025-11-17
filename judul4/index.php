<?php
require "data.php";
require "layout.php";

ob_start();
?>

<a href="tambah.php"
   class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-3 rounded-xl 
          font-semibold shadow hover:bg-blue-700 transition mb-6">
    ➕ Tambah Kontak
</a>

<div class="bg-white/70 backdrop-blur border border-white/50 shadow-xl rounded-xl overflow-hidden">

    <table class="w-full text-left">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="p-4 font-semibold">👤 Nama</th>
                <th class="p-4 font-semibold">📧 Email</th>
                <th class="p-4 font-semibold">📱 Telepon</th>
                <th class="p-4 font-semibold">⚙️ Aksi</th>
            </tr>
        </thead>

        <tbody class="text-gray-700">
            <?php foreach ($_SESSION["kontak"] as $id => $k): ?>
            <tr class="border-b hover:bg-gray-100 transition">
                <td class="p-4"><?= htmlspecialchars($k['nama']) ?></td>
                <td class="p-4"><?= htmlspecialchars($k['email']) ?></td>
                <td class="p-4"><?= htmlspecialchars($k['telepon']) ?></td>
                <td class="p-4 flex gap-4">
                    <a href="edit.php?id=<?= $id ?>" 
                        class="text-blue-700 font-semibold hover:underline">✏️ Edit</a>

                    <a href="hapus.php?id=<?= $id ?>"
                        class="text-red-600 font-semibold hover:underline">
                        🗑️ Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
layout("Dashboard", $content);
?>
