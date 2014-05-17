<?php include_once ('includes/header.php');?>

<form name="tambah_data" action="<?php echo base_url('index.php/welcome/save_user'); ?>" method="post">

<div class="span4">
<div class="well">
<table align="center" cellpadding="5">
<legend>TAMBAHKAN BIODATA BARU</legend>
<?php echo validation_errors(); ?>
<tr>
<th><small>First Name :</small></th>
<td><input class="span2" type="text" name="first_name"></td>
</tr>

<tr>
<th><small>Last Name :</small></th>
<td><input class="span2" type="text" name="last_name"></td>
</tr>

<tr>
<th align="right"><small>Email :</small></th>
<td><input class="span2" type="text" name="email"></td>
</tr>

<tr>
<th align="right"><small>Alamat :</small></th>
<td><textarea class="span2" name="alamat"></textarea></td>
</tr>

<tr>
<th align="right"><small>Umur :</small></th>
<td><input class="span2" type="text" name="umur"></td>
</tr>

<tr>
<th align="right"><small>No Hp :</small></th>
<td><input class="span2" type="text" name="contact"></td>
</tr>

<tr>
<th align="right"></th>
<td><input class="btn btn-primary" type="submit" name="submit" value="SAVE"></td>
</tr>

</table>
</div>
</div>
</form>


<div class="span8">
		<table class="table table-hover">
		<legend>BIODATA</legend>
		<tr>
		<th align="center">No</th>
		<th align="center">First name</th>
		<th align="center">Last name</th>
		<th align="center">Email</th>
		<th align="center">Address</th>
		<th align="center">Age</th>
		<th align="center">Contact</th>
		<th align="center">Action</th>
		</tr>
<?php $i=1; foreach($hasil->result() as $data) { ?>
		<tr>
		<td align="center"><?php echo $i++ ?></td>
		<td align="center"><?php echo $data->first_name ?></td>
		<td align="center"><?php echo $data->last_name ?></td>
		<td align="center"><?php echo $data->email ?></td>
		<td align="center"><?php echo $data->alamat ?></td>
		<td align="center"><?php echo $data->umur ?></td>
		<td align="center"><?php echo $data->contact ?></td>
		<td align="center"><a href="<?php echo base_url('index.php/welcome/edit_user/'.$data->id)?>"><i class="icon-pencil"></i></a> | <a href="<?php echo base_url('index.php/welcome/remove_user/'.$data->id)?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus ?')"><i class="icon-remove"></i></a></td>
		</tr>
<?php } ?>
		</table>
</div>

<?php include_once ('includes/footer.php'); ?>