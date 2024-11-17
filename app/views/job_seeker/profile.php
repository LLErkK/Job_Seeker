<?php include __DIR__ . '/layouts/header.php'; ?>

    <main class="container mx-auto p-8 flex-1">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">UPDATE PROFILE</h2>

        <!-- Form Update Profile -->
        <form action="/job_seeker/update-profile" method="POST" enctype="multipart/form-data" 
              class="bg-white p-8 rounded-2xl shadow-xl space-y-6 max-w-lg mx-auto border border-gray-200">
              
            <!-- Foto Profil -->
            <div class="flex flex-col items-center">
                <label for="photo" class="block text-gray-700 font-semibold">Foto Profil</label>
                <?php if (!empty($profile['photo'])): ?>
                    <img src="/uploads/profile_photos/<?= htmlspecialchars($profile['photo']) ?>" alt="Profile Photo"
                         class="w-32 h-32 object-cover rounded-full mt-4 mb-4 border-4 border-gray-200 shadow-lg">
                <?php endif; ?>
                <input type="file" id="photo" name="photo" accept="image/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold">Name:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($profile['name'] ?? '') ?>" required
                       class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Enter your name">
            </div>

            <!-- Umur -->
            <div>
                <label for="umur" class="block text-gray-700 font-semibold">Umur:</label>
                <input type="number" id="umur" name="umur" value="<?= htmlspecialchars($profile['umur'] ?? '') ?>" min="1" max="100"
                       class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Gender -->
            <div>
                <label for="gender" class="block text-gray-700 font-semibold">Gender:</label>
                <select id="gender" name="gender"
                        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="pria" <?= isset($profile['gender']) && $profile['gender'] == 'pria' ? 'selected' : '' ?>>Male</option>
                    <option value="wanita" <?= isset($profile['gender']) && $profile['gender'] == 'wanita' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-gray-700 font-semibold">Alamat:</label>
                <textarea id="alamat" name="alamat" rows="2"
                          class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                          placeholder="Enter your address"><?= htmlspecialchars($profile['alamat'] ?? '') ?></textarea>
            </div>

            <!-- Riwayat Pendidikan -->
            <div>
                <label for="riwayat_pendidikan" class="block text-gray-700 font-semibold">Riwayat Pendidikan:</label>
                <textarea id="riwayat_pendidikan" name="riwayat_pendidikan" rows="4"
                          class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                          placeholder="Enter your education history"><?= htmlspecialchars($profile['riwayat_pendidikan'] ?? '') ?></textarea>
            </div>

            <!-- Riwayat Pekerjaan -->
            <div>
                <label for="riwayat_pekerjaan" class="block text-gray-700 font-semibold">Riwayat Pekerjaan:</label>
                <textarea id="riwayat_pekerjaan" name="riwayat_pekerjaan" rows="4"
                          class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                          placeholder="Enter your work experience"><?= htmlspecialchars($profile['riwayat_pekerjaan'] ?? '') ?></textarea>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-gray-700 font-semibold">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                          class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                          placeholder="Describe yourself"><?= htmlspecialchars($profile['deskripsi'] ?? '') ?></textarea>
            </div>

            <!-- Button Update -->
            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                Update Profile
            </button>
        </form>

        <!-- Delete Profile Section -->
        <div class="mt-10 p-4 bg-white rounded-xl shadow-lg max-w-lg mx-auto">
            <h2 class="text-xl font-bold text-red-600 mb-4 text-center">Delete Profile</h2>
            <form action="/job_seeker/delete-profile" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile? This action cannot be undone!');">
                <button type="submit" class="w-full py-3 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">
                    Delete Profile
                </button>
            </form>
        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
    <div class="inline-block bg-blue-400 px-3 py-2 rounded hover:bg-blue-300 transition duration-300">
        <a href="/job_seeker" class="text-blue-800 hover:text-blue-900">Back to Dashboard</a>
    </div>
</div>
    </main>

    <?php include __DIR__ . '/layouts/footer.php'; ?>
</body>
