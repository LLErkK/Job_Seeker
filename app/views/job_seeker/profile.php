<?php include __DIR__ . '/layouts/header.php'; ?>
<body>
    <main>
        <h2>Update Profile</h2>
<form action="/job_seeker/update-profile" method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= $profile['name'] ?? '' ?>" required><br>

    <label for="umur">Umur:</label>
    <input type="number" id="umur" name="umur" value="<?= $profile['umur'] ?? '' ?>"><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="pria" <?= isset($profile['gender']) && $profile['gender'] == 'pria' ? 'selected' : '' ?>>Male</option>
        <option value="wanita" <?= isset($profile['gender']) && $profile['gender'] == 'wanita' ? 'selected' : '' ?>>Female</option>
    </select><br>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" rows="2" cols="50"><?= $profile['alamat'] ?? '' ?></textarea><br>

    <label for="riwayat_pendidikan">Riwayat Pendidikan:</label>
    <textarea id="riwayat_pendidikan" name="riwayat_pendidikan" rows="4" cols="50"><?= $profile['riwayat_pendidikan'] ?? '' ?></textarea><br>

    <label for="riwayat_pekerjaan">Riwayat Pekerjaan:</label>
    <textarea id="riwayat_pekerjaan" name="riwayat_pekerjaan" rows="4" cols="50"><?= $profile['riwayat_pekerjaan'] ?? '' ?></textarea><br>

    <label for="deskripsi">Deskripsi:</label>
    <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"><?= $profile['deskripsi'] ?? '' ?></textarea><br>
    <label for="photo">Foto Profil:</label>
    <?php if (!empty($profile['photo'])): ?>
        <img src="/uploads/profile_photos/<?= htmlspecialchars($profile['photo']) ?>" alt="Profile Photo" style="max-width: 100px;"><br>
    <?php endif; ?>
    <input type="file" id="photo" name="photo" accept="image/*"><br>

    <button type="submit">Update Profile</button>
</form>


        <h2>Delete Profile</h2>
        <form action="/job_seeker/delete-profile" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile? This action cannot be undone!');">
            <button type="submit" style="color: red;">Delete Profile</button>
        </form>

        <a href="/job_seeker" style="display: inline-block; margin-top: 20px;">Back</a>
    </main>
    <?php include __DIR__ . '/layouts/footer.php'; ?>
</body>
