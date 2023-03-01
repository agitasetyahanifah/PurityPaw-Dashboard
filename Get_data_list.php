<table class="table table-striped table-bordered">
    <thead>
        <tr>

            <th width="1%">ID</th>
			<th>Name</th>
            <th>Domisili</th>
            <th>email</th>
			<th>phone</th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        include "ajax/db_connection.php";

        $keyword="";
        if (isset($_POST['search'])) {
            $keyword = $_POST['search'];
        }

        $query = mysqli_query($koneksi,"SELECT * FROM members WHERE name LIKE '%".$keyword."%' OR domisili LIKE '%".$keyword."%' ORDER BY member_id ASC");
        $hitung_data = mysqli_num_rows($query);
        if ($hitung_data > 0) {
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>

                    <td><?php echo sprintf('%04d',$data['member_id']); ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['domisili']; ?></td>
					<td><?php echo $data['email']; ?></td>
			    	<td><?php echo $data['phone']; ?></td>
					<td><a href="https://wa.me/<?php echo $data['phone']; ?>?text=Halo%2C%20Selamat%20bergabung%20di%20PurityPaw%C2%A0Club%20%0A%0ABerikut%20detail%20Login%20untuk%20member%20area%20%3A%0Ausername%20%3A%20<?php echo $data['email']; ?>%09%0Apassword%20%3A%20ppcpass%402022%0A%0AURL%20%3A%20https%3A%2F%2Fclub.puritypaw.id%2Fppc-member%2F%0A%0ANOTE%20%3A%0A-%20Di%20member%20area%2C%20member%20dapat%20memasukan%20Kode%20yg%20di%20dapat%20dari%20Scratch%20Code.%0A-%20Untuk%20penukaran%20point%20%28redeem%29%20akan%20kami%20launching%20di%20minggu%20ke%201%20bulan%20November%0A%0AApabila%20ada%20pertanyaan%2C%20dengan%20senang%20hati%20admin%20akan%20membantu%20menjawab..%0A%0ATerima%20kasih%20sudah%20bergabung%20dengan%20PurityPaw%20Club%2C%20dan%20tunggu%20kami%20di%20Kota%20Anda" target="_blank">Send WA</a</td>
                </tr>
            <?php } } else { ?>
                <tr>
                    <td colspan='4' class="text-center">Tidak ada data ditemukan</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
