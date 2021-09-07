<?php
return[
  'custom' => [
      'nom' => [
          'required' => 'le champ nom est obligatoire',
      ],
      'prenom' => [
          'required' => 'le champ prenom est obligatoire',
      ],
      'email' => [
          'required' => 'le champ email est obligatoire',
          'unique' => 'Email existe deja'
      ],
      'mdp' => [
          'required' => 'le champ mot de passe est obligatoire',
      ],
  ],
];

?>
