<?php
/*
 * Ayman TAHIRI
 * UbiTransports
 * Test CakePhp
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;


class EtudiantController extends AppController
{


    public $paginate = [
        'limit' => 5,
        'order' => [
            'etudiant.id_etd' => 'asc'
        ]
    ];


    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    // la page d'accueil
    public function index()
    {
        $student = TableRegistry::get('etudiant');
        $query = $student->find();
        $this->set(array('data' => $query));
        $this->set('etudiant', $this->paginate($query));
        $this->render('index');

    }

// Supprimer un étudiant
    public function delete($id)
    {

        $student = TableRegistry::get('etudiant');
        $query = $student->query();
        $query->delete()
            ->where(['id_etd' => $id])
            ->execute();
        if($query){
            $this->Flash->error(__('Delete Successfully.'));
            $this->redirect(['controller'=>'etudiant','action' => 'index']);
        }
    }

// La mis a jour des informations
    public function update()
    {
        $student = TableRegistry::get('etudiant');
        $nom = $this->request->data('nom');
        $prenom = $this->request->data('prenom');
        $date_naiss = $this->request->data('date_naiss');
        $id  =  $this->request->data('id_etd');


        $query = $student->query();
        $query->update()
            ->set(
                [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'date_naiss' => $date_naiss,
                ]
            )
            ->where(['id_etd' => $id])
            ->execute();
        if($query){
            $this->Flash->success('This Information have been update successfully.');
            $this->redirect(['controller'=>'etudiant','action' => 'index']);
        }
    }
// La modification
    public function edit($id)
    {
        $student = TableRegistry::get('etudiant');
        $query = $student->query();
        $r   = $student
            ->find()
            ->where(['id_etd' => $id])
            ->first();
        $this->set(array('row' => $r));
        $this->render('edit');
    }

 // Ajouter un nouveau étudiant
    public function save()
    {
        $student = TableRegistry::get('etudiant');
        $nom = $this->request->data('nom');
        $prenom = $this->request->data('prenom');
        $date_naiss = $this->request->data('date_naiss');



        $query = $student->query();
        $query->insert(['nom', 'prenom','date_naiss'])
            ->values([
                'nom' => $nom,
                'prenom' => $prenom,
                'date_naiss' => $date_naiss
            ])
            ->execute();

        if($query){
            $this->Flash->success('This Information "Etudiant" have been save successfully.');
            $this->redirect(['controller'=>'etudiant','action' => 'index']);
        }
    }
// Récuperer la liste des notes pour un étudiant
    public function note($id)
    {
        $notes = TableRegistry::get('note_mat_etd');

        $query = $notes->find()
            ->where(['id_etd' => $id]);

        $results = $query->toArray();

        //var_dump(Empty($results));
        $matiere = TableRegistry::get('matiere');
        if(Empty($results)){
            $results=null;
            $this->set('notes', $results);
        }
        else {
            foreach ($results as $value) {
                $query = $matiere->find()
                    ->where(['id_matiere' => $value['id_matiere']]);
                $result = $query->toArray();
                $libelle_matiere[] = $result[0]['libelle_matiere'];
            }
            $this->set('libelle_matiere', $libelle_matiere);
            $this->set('notes', $results);
        }

        $query = $matiere->find();
        $listMatieres = $query->toArray();


        foreach($listMatieres as $key => $value){

            $list_matiere[]=$listMatieres[$key]['libelle_matiere'];
        }

        $this->set('list_matiere', $list_matiere);
        $this->set('id_etd', $id);
        $this->render('note');


    }

  // Ajouter une note d'une matiere pour un étudiant
    public function addNote()
    {
        $student = TableRegistry::get('note_mat_etd');

        $note = $this->request->data('note');
        $mat = $this->request->data('matiere');
        $id_etd= $this->request->data('id_etd');


        $matiere = TableRegistry::get('matiere');

        $query=$matiere->find();

        $query = $matiere->find()
            ->select(['id_matiere'])
            ->where(['libelle_matiere' => $mat]);

        $id = $query->toArray();

        $id=$id[0]['id_matiere'];

        $notes = TableRegistry::get('note_mat_etd');

       $query = $notes->query();
        $query->insert(['id_etd', 'id_matiere','note'])
            ->values([
                'id_etd' => $id_etd,
                'id_matiere' => $id,
                'note' => $note
            ])
            ->execute();

        if($query){
            $this->Flash->success('This Information "Note" have been save successfully.');
            $this->redirect(['controller'=>'etudiant','action' => 'note',$id_etd]);
        }

    }

}
