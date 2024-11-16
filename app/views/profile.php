<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px;
            text-align: center;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #4CAF50;
        }

        h2 {
            color: #333;
            margin-top: 15px;
        }

        p {
            margin: 8px 0;
            color: #555;
        }

        .profile-details {
            text-align: left;
            margin-top: 20px;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Menampilkan Foto Profil -->
        <img src="/uploads/profile_photos/<?= htmlspecialchars($profile['photo'] ?? 'default-photo.jpg') ?>" alt="Profile Photo" class="profile-photo">
        
        <!-- Menampilkan Nama -->
        <h2><?= htmlspecialchars($profile['name'] ?? 'Tidak tersedia') ?></h2>

        <!-- Menampilkan Detail Profil -->
        <div class="profile-details">
            <p><strong>Umur:</strong> <?= htmlspecialchars($profile['umur'] ?? 'Tidak tersedia') ?> tahun</p>
            <p><strong>Gender:</strong> <?= htmlspecialchars($profile['gender'] ?? 'Tidak tersedia') ?></p>
            <p><strong>Alamat:</strong> <?= htmlspecialchars($profile['alamat'] ?? 'Tidak tersedia') ?></p>
            <p><strong>Riwayat Pendidikan:</strong> <?= htmlspecialchars($profile['riwayat_pendidikan'] ?? 'Tidak tersedia') ?></p>
            <p><strong>Riwayat Pekerjaan:</strong> <?= htmlspecialchars($profile['riwayat_pekerjaan'] ?? 'Tidak tersedia') ?></p>
            <p><strong>Deskripsi:</strong> <?= htmlspecialchars($profile['deskripsi'] ?? 'Tidak tersedia') ?></p>
        </div>

        <!-- Tombol Back -->
        <a href="javascript:history.back()" class="back-button">Back</a>
    </div>
</body>

</html>
