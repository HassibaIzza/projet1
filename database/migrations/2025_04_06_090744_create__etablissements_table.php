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
            $table->string('commune');
            $table->string('mairie');
            $table->string('N°_compt_trisor');
            $table->string('clef');
            $table->string('Systeme');
            $table->string('date_de_construction');
            $table->string('Age');
            $table->string('superficie_totale');
            $table->string('superficie_construite');
            $table->string('nature_construction');
            $table->string('N°_plaideur');
            $table->string('Email');
            $table->string('id_directeur');
            $table->string('id_econome');
            $table->string('id_inspecteur_gestionFH');
            $table->string('id_inspecteur_Administratif');
            $table->string('Nbr_eleves_semi_interne');
            $table->string('Nbr_eleves_béneficiaire');
            $table->string('Nbr_eleves_exterieur');
            $table->string('Total_eleves');
            $table->string('Nbr_eleves_technique');
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
            $table->string('allocation_nutritionnelle');
            $table->string('allocation_intérétsCommuns');
            $table->string('allocation_SuppSection');
            $table->string('allocation_Rénovation');
            $table->string('allocation_gestionSupp');
            $table->string('allocation_Supp_willaya');
            $table->string('allocation_interne/externe');
            $table->string('Equipements');
            $table->string('UDS');
            $table->string('Activite_culturelles');
            $table->string('bibiotheque');
            $table->string('Activité_pédgogique_polysario');
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
