 <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Tanggal</th>
      <th scope="col">jumlah pcs</th>
      <th scope="col">jumlah return</th>
      <th scope="col">jumlah debit</th>
    </tr>
  </thead>
  <tbody>

    <?php $i=1; foreach($los_dol as $remix) :?>
    <tr>

      <th scope="row"><?=$i++?></th>
      <td><?=$remix['nama_produk']?></td>
       <td><?=$remix['tanggal']?></td>
      <td><?=$remix['jumlah_pcs']?></td>
      <td><?=$remix['return_produk']?></td>
      <td>Rp. <?=$remix['jumlah_debit']?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
  <tr>

      <th scope="row">Jumlah</th>
      <td></td>
      <td></td>
      <td><?=$hitung_dol[0 ]['queen']?> Pcs </td>
      <td></td>
      <td>Rp. <?=$hitung_dol[0]['king']?></td>
      
    </tr>
</table>