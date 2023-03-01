<table class="table table-striped table-bordered">
    <thead>
        <tr>

             <th width="1%">Peringkat</th>
			<th>Nama</th>
            <th>Total Point</th>
        </tr>
    </thead>
    <tbody>
        <?php

        include "ajax/db_connection.php";
    $no= 1;
        $keyword="";
        if (isset($_POST['search'])) {
            $keyword = $_POST['search'];
        }

        $query = mysqli_query($koneksi,"SELECT username, SUM(point) as jumlah FROM scratch_code  WHERE username LIKE '%".$keyword."%' group by username order by jumlah desc");
        $hitung_data = mysqli_num_rows($query);
        if ($hitung_data > 0) {
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>

                     <td><?php echo $no++; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                </tr>
            <?php } } else { ?>
                <tr>
                    <td colspan='4' class="text-center">Tidak ada data ditemukan</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
