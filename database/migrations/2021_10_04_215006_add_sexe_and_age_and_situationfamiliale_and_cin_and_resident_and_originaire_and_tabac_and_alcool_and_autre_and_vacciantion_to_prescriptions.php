<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSexeAndAgeAndSituationfamilialeAndCinAndResidentAndOriginaireAndTabacAndAlcoolAndAutreAndVacciantionToPrescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->string('sexe');
            $table->string('age');
            $table->string('situation_familiale');
            $table->string('cin');
            $table->string('resident');
            $table->string('originaire');
            $table->string('tabac');
            $table->string('alcool');
            $table->string('autre');
            $table->string('vaccination');
            $table->string('antfam');
            $table->string('tabagisme_passif');
            $table->string('animaux_domestiques');
            $table->string('poids');
            $table->string('taille');
            $table->string('bloodtype');
            $table->string('info');
            $table->string('avis_neur');
            $table->string('avis_card');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropColumn('sexe');
            $table->dropColumn('age');
            $table->dropColumn('situation_familiale');
            $table->dropColumn('cin');
            $table->dropColumn('resident');
            $table->dropColumn('originaire');
            $table->dropColumn('tabac');
            $table->dropColumn('alcool');
            $table->dropColumn('autre');
            $table->dropColumn('vaccination');
            $table->dropColumn('antfam');
            $table->dropColumn('tabagisme_passif');
            $table->dropColumn('animaux_domestiques');
            $table->dropColumn('poids');
            $table->dropColumn('taille');
            $table->dropColumn('bloodtype');
            $table->dropColumn('info');
            $table->dropColumn('avis_neur');
            $table->dropColumn('avis_card');
        });
    }
}
