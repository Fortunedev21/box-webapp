import "momentum-trail";

declare module "momentum-trail" {
    export interface RouterGlobal {
        url: "http://localhost";
        port: null;
        defaults: [];
        routes: {
            "sanctum.csrf-cookie": {
                uri: "sanctum/csrf-cookie";
                methods: ["GET", "HEAD"];
            };
            "livewire.message": {
                uri: "livewire/message/{name}";
                methods: ["POST"];
                parameters: ["name"];
            };
            "livewire.message-localized": {
                uri: "{locale}/livewire/message/{name}";
                methods: ["POST"];
                parameters: ["locale", "name"];
            };
            "livewire.upload-file": {
                uri: "livewire/upload-file";
                methods: ["POST"];
            };
            "livewire.preview-file": {
                uri: "livewire/preview-file/{filename}";
                methods: ["GET", "HEAD"];
                parameters: ["filename"];
            };
            "api.login": { uri: "api/login"; methods: ["POST"] };
            "api.user": { uri: "api/user"; methods: ["GET", "HEAD"] };
            "api.roles.index": { uri: "api/roles"; methods: ["GET", "HEAD"] };
            "api.roles.store": { uri: "api/roles"; methods: ["POST"] };
            "api.roles.show": {
                uri: "api/roles/{role}";
                methods: ["GET", "HEAD"];
                parameters: ["role"];
                bindings: { role: "id" };
            };
            "api.roles.update": {
                uri: "api/roles/{role}";
                methods: ["PUT", "PATCH"];
                parameters: ["role"];
                bindings: { role: "id" };
            };
            "api.roles.destroy": {
                uri: "api/roles/{role}";
                methods: ["DELETE"];
                parameters: ["role"];
                bindings: { role: "id" };
            };
            "api.permissions.index": {
                uri: "api/permissions";
                methods: ["GET", "HEAD"];
            };
            "api.permissions.store": {
                uri: "api/permissions";
                methods: ["POST"];
            };
            "api.permissions.show": {
                uri: "api/permissions/{permission}";
                methods: ["GET", "HEAD"];
                parameters: ["permission"];
                bindings: { permission: "id" };
            };
            "api.permissions.update": {
                uri: "api/permissions/{permission}";
                methods: ["PUT", "PATCH"];
                parameters: ["permission"];
                bindings: { permission: "id" };
            };
            "api.permissions.destroy": {
                uri: "api/permissions/{permission}";
                methods: ["DELETE"];
                parameters: ["permission"];
                bindings: { permission: "id" };
            };
            "api.utilisateurs.index": {
                uri: "api/utilisateurs";
                methods: ["GET", "HEAD"];
            };
            "api.utilisateurs.store": {
                uri: "api/utilisateurs";
                methods: ["POST"];
            };
            "api.utilisateurs.show": {
                uri: "api/utilisateurs/{utilisateur}";
                methods: ["GET", "HEAD"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.utilisateurs.update": {
                uri: "api/utilisateurs/{utilisateur}";
                methods: ["PUT", "PATCH"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.utilisateurs.destroy": {
                uri: "api/utilisateurs/{utilisateur}";
                methods: ["DELETE"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.utilisateurs.caisses.index": {
                uri: "api/utilisateurs/{utilisateur}/caisses";
                methods: ["GET", "HEAD"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.utilisateurs.caisses.store": {
                uri: "api/utilisateurs/{utilisateur}/caisses";
                methods: ["POST"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.utilisateurs.mode-paiements.index": {
                uri: "api/utilisateurs/{utilisateur}/mode-paiements";
                methods: ["GET", "HEAD"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.utilisateurs.mode-paiements.store": {
                uri: "api/utilisateurs/{utilisateur}/mode-paiements";
                methods: ["POST"];
                parameters: ["utilisateur"];
                bindings: { utilisateur: "id" };
            };
            "api.caisses.index": {
                uri: "api/caisses";
                methods: ["GET", "HEAD"];
            };
            "api.caisses.store": { uri: "api/caisses"; methods: ["POST"] };
            "api.caisses.show": {
                uri: "api/caisses/{caiss}";
                methods: ["GET", "HEAD"];
                parameters: ["caiss"];
            };
            "api.caisses.update": {
                uri: "api/caisses/{caiss}";
                methods: ["PUT", "PATCH"];
                parameters: ["caiss"];
            };
            "api.caisses.destroy": {
                uri: "api/caisses/{caiss}";
                methods: ["DELETE"];
                parameters: ["caiss"];
            };
            "api.caisses.transactions.index": {
                uri: "api/caisses/{caisse}/transactions";
                methods: ["GET", "HEAD"];
                parameters: ["caisse"];
                bindings: { caisse: "id" };
            };
            "api.caisses.transactions.store": {
                uri: "api/caisses/{caisse}/transactions";
                methods: ["POST"];
                parameters: ["caisse"];
                bindings: { caisse: "id" };
            };
            "api.mode-paiements.index": {
                uri: "api/mode-paiements";
                methods: ["GET", "HEAD"];
            };
            "api.mode-paiements.store": {
                uri: "api/mode-paiements";
                methods: ["POST"];
            };
            "api.mode-paiements.show": {
                uri: "api/mode-paiements/{mode_paiement}";
                methods: ["GET", "HEAD"];
                parameters: ["mode_paiement"];
            };
            "api.mode-paiements.update": {
                uri: "api/mode-paiements/{mode_paiement}";
                methods: ["PUT", "PATCH"];
                parameters: ["mode_paiement"];
            };
            "api.mode-paiements.destroy": {
                uri: "api/mode-paiements/{mode_paiement}";
                methods: ["DELETE"];
                parameters: ["mode_paiement"];
            };
            "api.transactions.index": {
                uri: "api/transactions";
                methods: ["GET", "HEAD"];
            };
            "api.transactions.store": {
                uri: "api/transactions";
                methods: ["POST"];
            };
            "api.transactions.show": {
                uri: "api/transactions/{transaction}";
                methods: ["GET", "HEAD"];
                parameters: ["transaction"];
                bindings: { transaction: "id" };
            };
            "api.transactions.update": {
                uri: "api/transactions/{transaction}";
                methods: ["PUT", "PATCH"];
                parameters: ["transaction"];
                bindings: { transaction: "id" };
            };
            "api.transactions.destroy": {
                uri: "api/transactions/{transaction}";
                methods: ["DELETE"];
                parameters: ["transaction"];
                bindings: { transaction: "id" };
            };
            "api.frequences.index": {
                uri: "api/frequences";
                methods: ["GET", "HEAD"];
            };
            "api.frequences.store": {
                uri: "api/frequences";
                methods: ["POST"];
            };
            "api.frequences.show": {
                uri: "api/frequences/{frequence}";
                methods: ["GET", "HEAD"];
                parameters: ["frequence"];
                bindings: { frequence: "id" };
            };
            "api.frequences.update": {
                uri: "api/frequences/{frequence}";
                methods: ["PUT", "PATCH"];
                parameters: ["frequence"];
                bindings: { frequence: "id" };
            };
            "api.frequences.destroy": {
                uri: "api/frequences/{frequence}";
                methods: ["DELETE"];
                parameters: ["frequence"];
                bindings: { frequence: "id" };
            };
            "api.communes.index": {
                uri: "api/communes";
                methods: ["GET", "HEAD"];
            };
            "api.communes.store": { uri: "api/communes"; methods: ["POST"] };
            "api.communes.show": {
                uri: "api/communes/{commune}";
                methods: ["GET", "HEAD"];
                parameters: ["commune"];
                bindings: { commune: "id" };
            };
            "api.communes.update": {
                uri: "api/communes/{commune}";
                methods: ["PUT", "PATCH"];
                parameters: ["commune"];
                bindings: { commune: "id" };
            };
            "api.communes.destroy": {
                uri: "api/communes/{commune}";
                methods: ["DELETE"];
                parameters: ["commune"];
                bindings: { commune: "id" };
            };
            "api.communes.structure-financieres.index": {
                uri: "api/communes/{commune}/structure-financieres";
                methods: ["GET", "HEAD"];
                parameters: ["commune"];
                bindings: { commune: "id" };
            };
            "api.communes.structure-financieres.store": {
                uri: "api/communes/{commune}/structure-financieres/{structureFinanciere}";
                methods: ["POST"];
                parameters: ["commune", "structureFinanciere"];
                bindings: { commune: "id"; structureFinanciere: "id" };
            };
            "api.communes.structure-financieres.destroy": {
                uri: "api/communes/{commune}/structure-financieres/{structureFinanciere}";
                methods: ["DELETE"];
                parameters: ["commune", "structureFinanciere"];
                bindings: { commune: "id"; structureFinanciere: "id" };
            };
            "api.departements.index": {
                uri: "api/departements";
                methods: ["GET", "HEAD"];
            };
            "api.departements.store": {
                uri: "api/departements";
                methods: ["POST"];
            };
            "api.departements.show": {
                uri: "api/departements/{departement}";
                methods: ["GET", "HEAD"];
                parameters: ["departement"];
                bindings: { departement: "id" };
            };
            "api.departements.update": {
                uri: "api/departements/{departement}";
                methods: ["PUT", "PATCH"];
                parameters: ["departement"];
                bindings: { departement: "id" };
            };
            "api.departements.destroy": {
                uri: "api/departements/{departement}";
                methods: ["DELETE"];
                parameters: ["departement"];
                bindings: { departement: "id" };
            };
            "api.departements.communes.index": {
                uri: "api/departements/{departement}/communes";
                methods: ["GET", "HEAD"];
                parameters: ["departement"];
                bindings: { departement: "id" };
            };
            "api.departements.communes.store": {
                uri: "api/departements/{departement}/communes";
                methods: ["POST"];
                parameters: ["departement"];
                bindings: { departement: "id" };
            };
            dashboard: { uri: "dashboard"; methods: ["GET", "HEAD"] };
            "profile.edit": { uri: "profile"; methods: ["GET", "HEAD"] };
            "profile.update": { uri: "profile"; methods: ["PATCH"] };
            "profile.destroy": { uri: "profile"; methods: ["DELETE"] };
            register: { uri: "register"; methods: ["GET", "HEAD"] };
            login: { uri: "login"; methods: ["GET", "HEAD"] };
            "password.request": {
                uri: "forgot-password";
                methods: ["GET", "HEAD"];
            };
            "password.email": { uri: "forgot-password"; methods: ["POST"] };
            "password.reset": {
                uri: "reset-password/{token}";
                methods: ["GET", "HEAD"];
                parameters: ["token"];
            };
            "password.store": { uri: "reset-password"; methods: ["POST"] };
            "verification.notice": {
                uri: "verify-email";
                methods: ["GET", "HEAD"];
            };
            "verification.verify": {
                uri: "verify-email/{id}/{hash}";
                methods: ["GET", "HEAD"];
                parameters: ["id", "hash"];
            };
            "verification.send": {
                uri: "email/verification-notification";
                methods: ["POST"];
            };
            "password.confirm": {
                uri: "confirm-password";
                methods: ["GET", "HEAD"];
            };
            "password.update": { uri: "password"; methods: ["PUT"] };
            logout: { uri: "logout"; methods: ["POST"] };
        };
        wildcards: {
            "sanctum.*": [];
            "livewire.*": [];
            "api.*": [];
            "api.roles.*": [];
            "api.permissions.*": [];
            "api.utilisateurs.*": [];
            "api.utilisateurs.caisses.*": [];
            "api.utilisateurs.mode-paiements.*": [];
            "api.caisses.*": [];
            "api.caisses.transactions.*": [];
            "api.mode-paiements.*": [];
            "api.transactions.*": [];
            "api.frequences.*": [];
            "api.communes.*": [];
            "api.communes.structure-financieres.*": [];
            "api.departements.*": [];
            "api.departements.communes.*": [];
            "profile.*": [];
            "password.*": [];
            "verification.*": [];
        };
    }
}
