<?php
include('db.php');

// Ambil data departemen untuk dropdown
$departemen_result = $conn->query("SELECT * FROM departments");

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $department_id = $_POST['department_id'];

    $query = "INSERT INTO employees (name, position, salary, department_id) 
              VALUES ('$name', '$position', '$salary', '$department_id')";
    
    if ($conn->query($query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
</head>
<body>
    <h1>Tambah Pegawai</h1>
    <form action="tambah.php" method="post">
        <label for="name">Nama:</label>
        <input type="text" name="name" required><br>

        <label for="position">Jabatan:</label>
        <select name="position" required>
            <option value="manager">Manager</option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select><br>

        <label for="salary">Gaji:</label>
        <input type="number" name="salary" required><br>

        <label for="department_id">Departemen:</label>
        <select name="department_id" required>
            <option value="">Pilih Departemen</option>
            <?php while ($departemen = $departemen_result->fetch_assoc()): ?>
                <option value="<?php echo $departemen['id']; ?>"><?php echo $departemen['name']; ?></option>
            <?php endwhile; ?>
        </select><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
