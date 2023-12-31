<?php 
include "header.php";
$petugas = array();
$ambil_petugas = $koneksi -> query("SELECT * FROM user WHERE level_user='petugas'");
while ($tiap_petugas = $ambil_petugas -> fetch_assoc()){
  $petugas[]=$tiap_petugas;
}
?>
<div class="row">
  <div class="card mt-4" >
    <h4 class="card-title mt-3 ms-3">Daftar Data Petugas</h4>
    <p class="card-category ms-3">Data Petugas</p>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <a href="petugas_tambah.php" class="btn btn-success " type="button">
          <i class="bi bi-plus"></i>Tambah Petugas</a>
        </div>
        <div class="table table-responsive">
          <table id="datatabel" class="table table-bordered table-striped table-sm table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>No Hp</th>
                <th>Level</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($petugas as $key => $value): ?>

                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $value["nama_user"]; ?></td>
                  <td><?php echo $value["no_hp_user"]; ?> </td>
                  <td><?php echo $value["level_user"] ?></td>
                  <td><?php echo $value["status_user"] ?></td>
                  <td>
                    <img src="../assets/img/<?php echo $value["foto_user"]; ?>" width="100">
                  </td>
                  <td>
                    <a href="petugas_detail.php?id=<?php echo $value["id_user"]; ?>" class="btn-sm btn btn-info text-white" data-bs-toggle="tooltip" title="Detail">
                        <span class="bi bi-clipboard-fill"></span>
                      </a>
                    <a href="petugas_ubah.php?id=<?php echo $value["id_user"]; ?>" class="btn-sm btn btn-primary text-white" data-bs-toggle="tooltip" title="Ubah">
                      <span class="bi bi-pencil-square"></span>
                    </a>
                    <a href="petugas_hapus.php?id=<?php echo $value["id_user"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger" data-bs-toggle="tooltip" title="Hapus">
                      <span class="bi bi-trash-fill"></span>
                    </a>
                  </td>
                </tr>
                
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php 
  include "footer.php";
?>