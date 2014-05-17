<?php include_once ('includes/header.php');?>
<?php
$id="";
$first_name= "";
$last_name= "";
$email= "";
$alamat= "";
$umur= "";
$contact= "";

if($data->num_rows()!=0)
{
	$hasil =$data->row();

$first_name	= $hasil->first_name;
$last_name	= $hasil->last_name;
$email     	= $hasil->email;
$alamat 	= $hasil->alamat;
$umur 		= $hasil->umur;
$contact	= $hasil->contact;
}

?>


<form name="edit_user" action="<?php echo $action; ?>" method="post">
<center>
<div class="span12">
<table width="500" align="center" cellpadding="5">
<legend>FORM EDIT BIODATA</legend>
<tr>
<th align="right">First Name : </th>
<td><input type="text" name="first_name" value="<?php echo $first_name; ?>"></td>
</tr>

<tr>
<th align="right">Last Name : </th>
<td><input type="text" name="last_name" value="<?php echo $last_name; ?>"></td>
</tr>

<tr>
<th align="right">Email : </th>
<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
</tr>

<tr>
<th align="right">Alamat : </th>
<td><textarea name="alamat"><?php echo $alamat; ?></textarea></td>
</tr>

<tr>
<th align="right">Umur : </th>
<td><input type="text" name="umur" value="<?php echo $umur; ?>"></td>
</tr>

<tr>
<th align="right">No Hp : </th>
<td><input type="text" name="contact" value="<?php echo $contact; ?>"></td>
</tr>

<tr>
<th align="right"></th>
<td><input class="btn btn-primary" type="submit" name="submit" value="UBAH" onclick="return confirm('Anda Akan Mengubah Biodata ?')">
<a href="<?php echo base_url('index.php/welcome/tambah_user') ?>">KEMBALI</a>
</td>
</tr>
</table>
<?php echo validation_errors(); ?>
</div>
</form>
</center>

<?php include_once ('includes/footer.php'); ?>