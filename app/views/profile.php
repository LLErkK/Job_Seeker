<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Container Profil -->
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <!-- Header dengan Background Gradient -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 h-24 rounded-t-lg relative">
            <!-- Foto Profil -->
            <img src="/uploads/profile_photos/<?= htmlspecialchars($profile['photo'] ?? 'avatar-3814049_1280.png') ?>" 
                 alt="Profile Photo" 
                 class="w-32 h-32 rounded-full border-4 border-white object-cover absolute -bottom-16 left-1/2 transform -translate-x-1/2">
        </div>

        <!-- Konten Profil -->
        <div class="pt-20 pb-8 px-6 text-center">
            <!-- Nama dan Jabatan -->
            <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($profile['name'] ?? 'Tidak tersedia') ?></h2>
            <p class="text-gray-500">Professional | Job Seeker</p>

            <!-- Detail Profil -->
            <div class="mt-6 text-left space-y-4">
                <p class="flex items-center text-gray-700"><span class="font-bold w-32">Umur:</span> <?= htmlspecialchars($profile['umur'] ?? 'Tidak tersedia') ?> tahun</p>
                <p class="flex items-center text-gray-700"><span class="font-bold w-32">Gender:</span> <?= htmlspecialchars($profile['gender'] ?? 'Tidak tersedia') ?></p>
                <p class="flex items-center text-gray-700"><span class="font-bold w-32">Alamat:</span> <?= htmlspecialchars($profile['alamat'] ?? 'Tidak tersedia') ?></p>
                <p class="flex items-center text-gray-700"><span class="font-bold w-32">Pendidikan:</span> <?= htmlspecialchars($profile['riwayat_pendidikan'] ?? 'Tidak tersedia') ?></p>
                <p class="flex items-center text-gray-700"><span class="font-bold w-32">Riwayat Pekerjaan:</span> <?= htmlspecialchars($profile['riwayat_pekerjaan'] ?? 'Tidak tersedia') ?></p>
                <p class="flex items-center text-gray-700"><span class="font-bold w-32">Deskripsi:</span> <?= htmlspecialchars($profile['deskripsi'] ?? 'Tidak tersedia') ?></p>
            </div>

            <!-- Tombol Back -->
            <div class="mt-8">
                <a href="javascript:history.back()" 
                   class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                    Back
                </a>
            </div>
        </div>
    </div>
</body>

</html>
