/**
 * This file is auto generated using 'php artisan typescript:generate'
 *
 * Changes to this file will be lost when the command is run again
 */

declare namespace App.Models {
    export interface Caisse {
        id: number;
        identifiant: string;
        intitule: string;
        date_debut: string;
        date_echeance: string | null;
        solde_actuel: number;
        status: string | null;
        utilisateur_id: number;
        type_caisse_id: number;
        structure_financiere_id: number;
        created_at: string | null;
        updated_at: string | null;
        deleted_at: string | null;
        utilisateur?: App.Models.Utilisateur | null;
        transactions?: Array<App.Models.Transaction> | null;
        type_caisse?: App.Models.TypeCaisse | null;
        frequence?: App.Models.Frequence | null;
        structure_financiere?: App.Models.StructureFinanciere | null;
        transactions_count?: number | null;
    }

    export interface Commune {
        id: number;
        nom: string;
        departement_id: number;
        created_at: string | null;
        updated_at: string | null;
        departement?: App.Models.Departement | null;
        structure_financieres?: Array<App.Models.StructureFinanciere> | null;
        structure_financieres_count?: number | null;
    }

    export interface Departement {
        id: number;
        nom: string;
        created_at: string | null;
        updated_at: string | null;
        communes?: Array<App.Models.Commune> | null;
        communes_count?: number | null;
    }

    export interface Frequence {
        id: number;
        libelle: string;
        heure: number;
        jours: Array<any> | any;
        caisse_id: number;
        created_at: string | null;
        updated_at: string | null;
        caisse?: App.Models.Caisse | null;
    }

    export interface ModePaiement {
        id: number;
        libelle: string;
        numero: string;
        utilisateur_id: number;
        is_confirm: boolean;
        created_at: string | null;
        updated_at: string | null;
        deleted_at: string | null;
        utilisateur?: App.Models.Utilisateur | null;
    }

    export interface StructureFinanciere {
        id: number;
        identifiant: string;
        denomination: string;
        date_creation: string;
        email: string;
        siege_social: string;
        agrement: string;
        site_internet: string | null;
        statut_juridique: string;
        numero_inscription: string;
        boite_postal: string;
        immatriculation: Array<any> | any | null;
        phone: Array<any> | any | null;
        cellulaire: Array<any> | any | null;
        fax: Array<any> | any | null;
        taux_interet: number;
        delai_retrait_fond: string;
        avatar: string | null;
        caisses?: Array<App.Models.Caisse> | null;
        communes?: Array<App.Models.Commune> | null;
        caisses_count?: number | null;
        communes_count?: number | null;
    }

    export interface Transaction {
        id: number;
        montant: number;
        identifiant_transation: string;
        identifiant_paiement: string;
        date_transaction: string;
        status: string | null;
        caisse_id: number;
        created_at: string | null;
        updated_at: string | null;
        caisse?: App.Models.Caisse | null;
    }

    export interface TypeCaisse {
        id: number;
        libelle: string;
        slug: string;
        status: string;
        created_at: string | null;
        updated_at: string | null;
        deleted_at: string | null;
        caisses?: Array<App.Models.Caisse> | null;
        caisses_count?: number | null;
    }

    export interface User {
        id: number;
        name: string;
        email: string;
        email_verified_at: string | null;
        password: string;
        remember_token: string | null;
        created_at: string | null;
        updated_at: string | null;
    }

    export interface Utilisateur {
        id: number;
        nom: string;
        prenom: string;
        email: string;
        email_verified_at: string | null;
        password: string;
        remember_token: string | null;
        lieu_naissance: string;
        profession: string;
        identifiant_perso: string | null;
        avatar: string | null;
        sexe: string;
        ville_residence: string;
        code_parainage: string | null;
        preference: Array<any> | any | null;
        piece_identite: string;
        cni: string | null;
        numero_imatriculation: string | null;
        agence: Array<any> | any | null;
        created_at: string | null;
        updated_at: string | null;
        deleted_at: string | null;
        caisses?: Array<App.Models.Caisse> | null;
        mode_paiements?: Array<App.Models.ModePaiement> | null;
        caisses_count?: number | null;
        mode_paiements_count?: number | null;
    }

}
