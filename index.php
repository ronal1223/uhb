<?php
include('db.php');

// Ambil data pegawai dan departemen
$result = $conn->query("SELECT employees.id, employees.name, employees.position, employees.salary, departments.name AS department_name
                        FROM employees
                        LEFT JOIN departments ON employees.department_id = departments.id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pegawai</title>
</head>
<body>
    <h1>Data Pegawai</h1>
    <a href="tambah.php">Tambah Pegawai</a> | 
    <a href="tambah_departemen.php">Tambah Departemen</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['department_name']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
