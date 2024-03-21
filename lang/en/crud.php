<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'utilisateurs' => [
        'name' => 'Utilisateurs',
        'index_title' => 'Utilisateurs List',
        'new_title' => 'New Utilisateur',
        'create_title' => 'Create Utilisateur',
        'edit_title' => 'Edit Utilisateur',
        'show_title' => 'Show Utilisateur',
        'inputs' => [
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'email' => 'Email',
            'password' => 'Password',
            'lieu_naissance' => 'Lieu Naissance',
            'profession' => 'Profession',
            'identifiant_perso' => 'Identifiant Perso',
            'avatar' => 'Avatar',
            'sexe' => 'Sexe',
            'ville_residence' => 'Ville Residence',
            'code_parainage' => 'Code Parainage',
            'preference' => 'Preference',
            'piece_identite' => 'Piece Identite',
            'cni' => 'Cni',
            'numero_imatriculation' => 'Numero Imatriculation',
        ],
    ],

    'caisses' => [
        'name' => 'Caisses',
        'index_title' => 'Caisses List',
        'new_title' => 'New Caisse',
        'create_title' => 'Create Caisse',
        'edit_title' => 'Edit Caisse',
        'show_title' => 'Show Caisse',
        'inputs' => [
            'identifiant' => 'Identifiant',
            'intitule' => 'Intitule',
            'date_debut' => 'Date Debut',
            'date_echeance' => 'Date Echeance',
            'solde_actuel' => 'Solde Actuel',
            'status' => 'Status',
            'utilisateur_id' => 'Utilisateur',
            'type_caisse_id' => 'Type Caisse',
            'structure_financiere_id' => 'Structure Financiere',
        ],
    ],

    'mode_paiements' => [
        'name' => 'Mode Paiements',
        'index_title' => 'ModePaiements List',
        'new_title' => 'New Mode paiement',
        'create_title' => 'Create ModePaiement',
        'edit_title' => 'Edit ModePaiement',
        'show_title' => 'Show ModePaiement',
        'inputs' => [
            'libelle' => 'Libelle',
            'numero' => 'Numero',
            'utilisateur_id' => 'Utilisateur',
        ],
    ],

    'transactions' => [
        'name' => 'Transactions',
        'index_title' => 'Transactions List',
        'new_title' => 'New Transaction',
        'create_title' => 'Create Transaction',
        'edit_title' => 'Edit Transaction',
        'show_title' => 'Show Transaction',
        'inputs' => [
            'montant' => 'Montant',
            'identifiant_transation' => 'Identifiant Transation',
            'identifiant_paiement' => 'Identifiant Paiement',
            'date_transaction' => 'Date Transaction',
            'status' => 'Status',
            'caisse_id' => 'Caisse',
        ],
    ],

    'frequences' => [
        'name' => 'Frequences',
        'index_title' => 'Frequences List',
        'new_title' => 'New Frequence',
        'create_title' => 'Create Frequence',
        'edit_title' => 'Edit Frequence',
        'show_title' => 'Show Frequence',
        'inputs' => [
            'libelle' => 'Libelle',
            'heure' => 'Heure',
            'jours' => 'Jours',
            'caisse_id' => 'Caisse',
        ],
    ],

    'structure_financieres' => [
        'name' => 'Structure Financieres',
        'index_title' => 'StructureFinancieres List',
        'new_title' => 'New Structure financiere',
        'create_title' => 'Create StructureFinanciere',
        'edit_title' => 'Edit StructureFinanciere',
        'show_title' => 'Show StructureFinanciere',
        'inputs' => [
            'identifiant' => 'Identifiant',
            'denomination' => 'Denomination',
            'date_creation' => 'Date Creation',
            'immatriculation' => 'Immatriculation',
            'email' => 'Email',
            'siege_social' => 'Siege Social',
            'agrement' => 'Agrement',
            'site_internet' => 'Site Internet',
            'statut_juridique' => 'Statut Juridique',
            'numero_inscription' => 'Numero Inscription',
            'boite_postal' => 'Boite Postal',
            'phone' => 'Phone',
            'cellulaire' => 'Cellulaire',
            'fax' => 'Fax',
            'taux_interet' => 'Taux Interet',
            'delai_retrait_fond' => 'Delai Retrait Fond',
            'avatar' => 'Avatar',
        ],
    ],

    'type_caisses' => [
        'name' => 'Type Caisses',
        'index_title' => 'TypeCaisses List',
        'new_title' => 'New Type caisse',
        'create_title' => 'Create TypeCaisse',
        'edit_title' => 'Edit TypeCaisse',
        'show_title' => 'Show TypeCaisse',
        'inputs' => [
            'libelle' => 'Libelle',
            'slug' => 'Slug',
            'status' => 'Status',
        ],
    ],

    'communes' => [
        'name' => 'Communes',
        'index_title' => 'Communes List',
        'new_title' => 'New Commune',
        'create_title' => 'Create Commune',
        'edit_title' => 'Edit Commune',
        'show_title' => 'Show Commune',
        'inputs' => [
            'nom' => 'Nom',
            'departement_id' => 'Departement',
        ],
    ],

    'departements' => [
        'name' => 'Departements',
        'index_title' => 'Departements List',
        'new_title' => 'New Departement',
        'create_title' => 'Create Departement',
        'edit_title' => 'Edit Departement',
        'show_title' => 'Show Departement',
        'inputs' => [
            'nom' => 'Nom',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];