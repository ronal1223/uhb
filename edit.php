<?php
include('db.php');

// Cek jika ada ID yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pegawai berdasarkan ID
    $result = $conn->query("SELECT * FROM employees WHERE id = $id");
    $employee = $result->fetch_assoc();

    // Ambil data departemen untuk dropdown
    $departemen_result = $conn->query("SELECT * FROM departments");

    // Jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $department_id = $_POST['department_id'];

        $query = "UPDATE employees SET name = '$name', position = '$position', salary = '$salary', department_id = '$department_id' WHERE id = $id";
        
        if ($conn->query($query)) {
            header('Location: index.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
</head>
<body>
    <h1>Edit Pegawai</h1>
    <form action="edit.php?id=<?php echo $employee['id']; ?>" method="post">
        <label for="name">Nama:</label>
        <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br>

        <label for="position">Jabatan:</label>
        <select name="position" required>
            <option value="manager" <?php echo ($employee['position'] == 'manager') ? 'selected' : ''; ?>>Manager</option>
            <option value="staff" <?php echo ($employee['position'] == 'staff') ? 'selected' : ''; ?>>Staff</option>
            <option value="admin" <?php echo ($employee['position'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
        </select><br>

        <label for="salary">Gaji:</label>
        <input type="number" name="salary" value="<?php echo $employee['salary']; ?>" required><br>

        <label for="department_id">Departemen:</label>
        <select name="department_id" required>
            <?php
            while ($departemen = $departemen_result->fetch_assoc()) {
                $selected = ($departemen['id'] == $employee['department_id']) ? 'selected' : '';
                echo "<option value='{$departemen['id']}' $selected>{$departemen['name']}</option>";
            }
            ?>
        </select><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
