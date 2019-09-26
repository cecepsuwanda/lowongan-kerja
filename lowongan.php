
<div class="content_right">
<h2>&#187; Info Pekerjaan Terbaru</h2>
<table border='0' width='700'>

<?php

   $per_laman = 5;
   $laman_sekarang = 1;
   if(isset($_GET['laman'])){
       $laman_sekarang = $_GET['laman'];
       $laman_sekarang = ($laman_sekarang > 1) ? $laman_sekarang : 1;
   }

   $total_data = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan ORDER BY id_lowongan DESC"));
   $total_laman = ceil($total_data/$per_laman);
   
   $awal = ($laman_sekarang - 1) * $per_laman;
   
   $sql = "SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan  ORDER BY id_lowongan DESC limit $per_laman OFFSET $awal";
   
   $tampil=mysqli_query($connect,$sql);
   $no=5;
   while ($r=mysqli_fetch_array($tampil)){
       $tgl=tgl_indo($r['tgl_lowongan']);
?>
       <tr>
       	  <td>
              <img src="foto_lowongan/<?php echo $r['foto'];?>" width='130' height='130' />
              <div class='title_perusahaan1'><b><? echo $r['nama_p'];?></b></div>
              <?php echo $tgl;?> - <?php echo $r['alamat'];?>
              <p>
              	<?php echo substr($r['deskripsi'],0,350);?> 
              	<a href="?page=detail_lowongan&id=<?php echo$r['id_lowongan'];?>&idp=<?php echo$r['id_perusahaan'];?>"> Lihat Selengkapnya >> </a></p>
          </td>
       </tr>
<?php
  }
?>
</table>

</div>


  <?php if($total_laman > 1) { ?>
    <nav class="text-center">
      <ul class="pagination">
        <?php if($laman_sekarang > 1) {?>
          <li>
            <a href="?page=lowongan&laman=<?php echo $laman_sekarang - 1 ?>" aria-label="Sebelumnya">
              <span aria-hidden="true">Sebelumnya</span>
            </a>
          </li>
        <?php }else { ?>
          <li class="disabled">
          <a>
            <span aria-hidden="true">Sebelumnya</span>
          </li>
          </a>
        <?php } ?>
        <?php if($laman_sekarang < $total_laman) {?>
          <li>
            <a href="?page=lowongan&laman=<?php echo $laman_sekarang + 1 ?>" aria-label="Selanjutnya">
              <span aria-hidden="true">Selanjutnya</span>
            </a>
          </li>
        <?php }else {?>
          <li class="disabled">
            <a>
            <span aria-hidden="true">Selanjutnya</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  <?php } ?>

