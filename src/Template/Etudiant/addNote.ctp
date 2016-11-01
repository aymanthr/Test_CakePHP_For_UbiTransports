

<title>Student</title>

	<table class="table">
		<tr>
			<th>Libelle matiere</th>
			<th>Note</th>
		</tr>
			<?php
			         foreach($notes as $key=> $value){
                         ?>
                         <tr>
                         <td><?php echo $libelle_matiere[$key]  ?></td>
                         <td><?php echo $value['note']; ?> </td>
                         </tr>
                    <?php } ?>
</table>



