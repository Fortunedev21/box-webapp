<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\CaisseController;
use App\Http\Controllers\Api\CommuneController;
use App\Http\Controllers\Api\FrequenceController;
use App\Http\Controllers\Api\TypeCaisseController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UtilisateurController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\DepartementController;
use App\Http\Controllers\Api\ModePaiementController;
use App\Http\Controllers\Api\UtilisateurCaissesController;
use App\Http\Controllers\Api\CaisseTransactionsController;
use App\Http\Controllers\Api\StructureFinanciereController;
use App\Http\Controllers\Api\DepartementCommunesController;
use App\Http\Controllers\Api\UtilisateurModePaiementsController;
use App\Http\Controllers\Api\CommuneStructureFinancieresController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
   ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('utilisateurs', UtilisateurController::class);

        // Utilisateur Caisses
        Route::get('/utilisateurs/{utilisateur}/caisses', [
            UtilisateurCaissesController::class,
            'index',
        ])->name('utilisateurs.caisses.index');
        Route::post('/utilisateurs/{utilisateur}/caisses', [
            UtilisateurCaissesController::class,
            'store',
        ])->name('utilisateurs.caisses.store');

        // Utilisateur Mode Paiements
        Route::get('/utilisateurs/{utilisateur}/mode-paiements', [
            UtilisateurModePaiementsController::class,
            'index',
        ])->name('utilisateurs.mode-paiements.index');
        Route::post('/utilisateurs/{utilisateur}/mode-paiements', [
            UtilisateurModePaiementsController::class,
            'store',
        ])->name('utilisateurs.mode-paiements.store');

        Route::apiResource('caisses', CaisseController::class);

        // Caisse Transactions
        Route::get('/caisses/{caisse}/transactions', [
            CaisseTransactionsController::class,
            'index',
        ])->name('caisses.transactions.index');
        Route::post('/caisses/{caisse}/transactions', [
            CaisseTransactionsController::class,
            'store',
        ])->name('caisses.transactions.store');

        Route::apiResource('mode-paiements', ModePaiementController::class);

        Route::apiResource('transactions', TransactionController::class);

        Route::apiResource('frequences', FrequenceController::class);

        Route::apiResource('communes', CommuneController::class);

        // Commune Structure Financieres
        Route::get('/communes/{commune}/structure-financieres', [
            CommuneStructureFinancieresController::class,
            'index',
        ])->name('communes.structure-financieres.index');
        Route::post(
            '/communes/{commune}/structure-financieres/{structureFinanciere}',
            [CommuneStructureFinancieresController::class, 'store']
        )->name('communes.structure-financieres.store');
        Route::delete(
            '/communes/{commune}/structure-financieres/{structureFinanciere}',
            [CommuneStructureFinancieresController::class, 'destroy']
        )->name('communes.structure-financieres.destroy');

        Route::apiResource('departements', DepartementController::class);

        // Departement Communes
        Route::get('/departements/{departement}/communes', [
            DepartementCommunesController::class,
            'index',
        ])->name('departements.communes.index');
        Route::post('/departements/{departement}/communes', [
            DepartementCommunesController::class,
            'store',
        ])->name('departements.communes.store');
    });
