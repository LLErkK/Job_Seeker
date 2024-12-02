<?php include_once __DIR__ . '/../admin/layouts/header.php'; ?>

<main class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">History Records</h2>

    <?php if (!empty($data)): ?>
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Perusahaan</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <tr class="hover:bg-gray-100 transition">
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['nama_perusahaan']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['action']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['tanggal']))) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-500 text-center">No history records available.</p>
    <?php endif; ?>
</main>

<?php include_once __DIR__ . '/../admin/layouts/footer.php'; ?>
