<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('N°_micanographique')->unique();
            $table->string('Nom_etablissement');
            $table->string('N°_compt_trisor');
            $table->string('clef');
            $table->string('N°_plaideur');
            $table->string('Email');
            $table->string('id_directeur');
            $table->string('id_econome');
            $table->string('id_inspecteur');
            $table->string('Nbr_eleves_semi_interne');
            $table->string('Nbr_eleves_exterieur');
            $table->string('Total_eleves');
            $table->string('Nbr_eleves_etranger');
            $table->string('Nbr_classes');
            $table->string('Nbr_climatiseurs');
            $table->string('Nbr_equipements_informatique');
            $table->string('id_parking');
            $table->string('Revenu');
            $table->string('chapitre1');
            $table->string('chapitre2');
            $table->string('chapitre3');
            $table->string('Totale_depenses');
            $table->string('Pourcentage_budget');
            $table->string('UDS');
            $table->string('Activite_culturelles');
            $table->string('bibiotheque');
            $table->string('Activité_pédgogique');
            $table->string('Equipements');
            $table->string('aide_financiére');
            $table->string('montant_rejeté');
            $table->string('montant_en_attent');
            $table->string('Activité_culturelles-etud');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Etablissements');
    }
};
