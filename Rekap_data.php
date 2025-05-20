<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Data Siswa SMP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DataTables CSS & Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- Bootstrap CSS (optional if you want to style more) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Rekap Data Siswa SMP</h2>
        <table id="rekapTable" class="display nowrap table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Nadia Izzatunnisa</td><td>7 Ar-Rahman</td><td>Perempuan</td><td>SD TUNCEN</td><td>2025/2026</td></tr>
                <tr><td>Clara Herti Belbina</td><td>7 Ar-Rahman</td><td>Perempuan</td><td>SDN 03 OKU</td><td>2025/2026</td></tr>
                <tr><td>Kiara Azzahraa</td><td>7 Ar-Rahman</td><td>Perempuan</td><td>SD TUNCEN</td><td>2025/2026</td></tr>
                <tr><td>Lutfhia Nisrina Izzatunnisa</td><td>7 Ar-Rahman</td><td>Perempuan</td><td>SD 4 OKU</td><td>2025/2026</td></tr>
                <tr><td>Gavin Fabian Agha Rafello</td><td>7 Ar-Rahman</td><td>Laki-Laki</td><td>SD IA 70 Bta</td><td>2025/2026</td></tr>
                <tr><td>Alisya Humaira Alkhanza</td><td>7 Ar-Rahman</td><td>Perempuan</td><td></td><td>2025/2026</td></tr>
                <tr><td>Almira Ardeka Tiobara</td><td>7 Ar-Rahman</td><td>Perempuan</td><td></td><td>2025/2026</td></tr>
                <tr><td>Anggi Shalfina</td><td>7 Ar-Rahman</td><td>Perempuan</td><td></td><td>2025/2026</td></tr>
                <tr><td>Nayla Syifa Ardini</td><td>7 Ar-Rahman</td><td>Perempuan</td><td></td><td>2025/2026</td></tr>
                <tr><td>Rafa Defriendra</td><td>7 Ar-Rahman</td><td>Laki-Laki</td><td></td><td>2025/2026</td></tr>
                <tr><td>Velia Al Zahra</td><td>7 Ar-Rahman</td><td>Perempuan</td><td></td><td>2025/2026</td></tr>
                <tr><td>Keysha Najwa Wirendra</td><td>7 Ar-Rahman</td><td>Perempuan</td><td></td><td>2025/2026</td></tr>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables & Buttons JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function () {
            $('#rekapTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Rekap Data Siswa SMP'
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        title: 'Rekap Data Siswa SMP'
                    }
                ],
                responsive: true
            });
        });
    </script>
</body>
</html>
