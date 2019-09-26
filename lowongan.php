
<div class="content_right">
<h2>&#187; Info Pekerjaan Terbaru</h2>
<table border='0' width='700'>

<?php
$tampil=mysqli_query($connect,"SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan  ORDER BY id_lowongan DESC limit 0,5");
$no=1;
while ($r=mysqli_fetch_array($tampil)){
$tgl=tgl_indo($r['tgl_lowongan']);
?>
<tr><td>
<img src="foto_lowongan/<?php echo $r['foto'];?>" width='130' height='130' />
<div class='title_perusahaan1'><b><?php echo $r['nama_p'];?></b></div>
<?php echo $tgl;?> - <?php echo $r['alamat'];?>
<p><?php echo substr($r['deskripsi'],0,350);?> <a href="?page=detail_lowongan&id=<?php echo$r['id_lowongan'];?>&idp=<?php echo$r['id_perusahaan'];?>"> Lihat Selengkapnya >> </a></p>
</td></tr>
<?php
}
?>
</table>
</div>