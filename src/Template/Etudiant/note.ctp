

<title>Student</title>

	<table class="table">
		<tr>
			<th>Libelle matiere</th>
			<th>Note</th>
		</tr>
			<?php
                if($notes != null){
			         foreach($notes as $key=> $value){
                         ?>
                         <tr>
                         <td><?= $libelle_matiere[$key]  ?></td>
                         <td><?= $value['note']; ?> </td>
                         </tr>
                    <?php }} ?>

                  <?php
                  echo $this->Form->create(null, [
                      'url' => ['controller' => 'Etudiant', 'action' => 'AddNote']
                  ]);
                  ?>
                  	<table class="table">
                  	   <h2> Ajouter une note  </h2>
                  	<input type="hidden" value="<?= $id_etd ?>" name="id_etd">
                  		<tr>
                  			<td> Matiere
                  			    <SELECT name="matiere" size="1">

                  			<?php
                            	 foreach($list_matiere as $key=> $value){ ?>
                                  <OPTION><?=  $value; } ?>
                              </SELECT>
                             </td>
                  		</tr>
                  		<tr>
                          	<td>Note <input type="number"  min="0" max="20" name="note"  class="form-control"></td>
                          </tr>

                  		<tr>
                  			<td><input type="submit" class="btn btn-primary" value="Ajouter"></td>
                  		</tr>
                  </table>
                  <?php echo $this->Form->end();?>


                  <?= $this->Html->link('Accueil',array('controller'=>'etudiant','action'=>'index'))?></td>


</table>



