
<title>Student</title>
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'Etudiant', 'action' => 'save']
]);
?>
	<table class="table">
		<tr>
			<td>Nom<input type="text" name="nom"  class="form-control"></td>
		</tr>
		<tr>
			<td>Prenom<input type="text" name="prenom" class="form-control"></td>
		</tr>
		<tr>
			<td>Date de naissance<input type="text"  placeholder="YYYY-mm-dd" name="date_naiss" class="form-control"></td>
		</tr>
		<tr>
			<td><input type="submit" class="btn btn-primary" value="Save"></td>
		</tr>
</table>
<?php echo $this->Form->end();?>
<table>
	<thead>
		<tr>
			<th>ID </th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Date de naissance</th>
			<th>Les notes</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($data as $row)
			{
				?>
					<tr>
						<td><?= $row->id_etd ?></td>
						<td><?= $row->nom ?></td>
						<td><?= $row->prenom ?></td>
						<td><?= date("d-m-Y", strtotime($row->date_naiss)) ?></td>
						<td>
						<?= $this->Html->link('Notes',array('controller'=>'etudiant','action'=>'note'.'/'.$row->id_etd))?></td>
						<td><?= $this->Html->link('Modifier',array('controller'=>'etudiant','action'=>'edit'.'/'.$row->id_etd))?>|
						<?= $this->Html->link('Supprimer',array('controller'=>'etudiant','action'=>'delete'.'/'.$row->id_etd))?>
						</td>
					</tr>
				<?php
			}
		?>

	</tbody>
</table>
 <div class="pagination pagination-large">
        <ul class="pagination">
			<?= $this->Paginator->prev('« Previous') ?>
			<?= $this->Paginator->next('Next »') ?>
			<?= $this->Paginator->counter() ?>

		 </ul>
		</div>
<style>
.pagination ul > li.myclass {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #ffffff;
    border: 1px solid #dddddd;
    border-left-width: 0;
    color: #999999;
    cursor: default;
    background-color: transparent;
}

.pagination ul > li.myclass:first-child {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}

.pagination ul > li.myclass:last-child {
    -webkit-border-top-right-radius: 4px;
    border-top-right-radius: 4px;
    -webkit-border-bottom-right-radius: 4px;
    border-bottom-right-radius: 4px;
    -moz-border-radius-topright: 4px;
    -moz-border-radius-bottomright: 4px;
}
</style>