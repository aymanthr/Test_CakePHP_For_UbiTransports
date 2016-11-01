
<title>Student</title>
 
<?php 
echo $this->Form->create(null, [
    'url' => ['controller' => 'Etudiant', 'action' => 'update']
]);
?>
	<table class="table">
	<input type="hidden" value="<?= $row->id_etd ?>" name="id_etd">
		<tr>
			<td>Nom<input value="<?= $row->nom ?>" type="text" name="nom"  class="form-control"></td>
		</tr>
		<tr>
        	<td>Prenom<input value="<?= $row->prenom ?>" type="text" name="prenom"  class="form-control"></td>
        </tr>
		<tr>
			<td>Date de naissance<input type="text" value="<?= date("Y-m-d", strtotime($row->date_naiss)) ?>" name="date_naiss" class="form-control"></td>
		</tr>
		<tr>
			<td><input type="submit" class="btn btn-primary" value="Update"></td>
		</tr>
</table>
<?php echo $this->Form->end();?>
