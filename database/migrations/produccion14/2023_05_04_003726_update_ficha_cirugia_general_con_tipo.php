<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaCirugiaGeneralConTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {

            /** cambio de nombre */
            $table->renameColumn('organo_cg','e_general');	//int(11)
            $table->renameColumn('obs_organo_cg','obs_e_general');	//varchar(255)
            $table->renameColumn('ceg_cg','e_signos_vit');	//int(11)
            $table->renameColumn('obs_ceg_cg','obs_e_signos_vit');	//varchar(255)
            $table->renameColumn('masa_cg','e_dolor_loc');	//int(11)
            $table->renameColumn('obs_masas_cg','obs_e_dolor_loc');	//varchar(255)
            $table->renameColumn('urgencia_cg','masas_pal');	//int(11)
            $table->renameColumn('obs_urgencia_cg','obs_masas_pal');	//varchar(255)
            $table->renameColumn('so_cg','e_piel_fan');	//int(11)
            $table->renameColumn('obs_so_cg','obs_e_piel_fan');	//varchar(255)

            /** e;liminar columan */
            $table->dropColumn('obs_egp_cg');
            $table->dropColumn('obs_gen_ex_esp_cg');

        });

        Schema::table('ficha_cirugia_general_tipo', function (Blueprint $table)
        {

            /** cambio de nombre */
            $table->renameColumn('organo_cg','e_general');	//int(11)
            $table->renameColumn('obs_organo_cg','obs_e_general');	//varchar(255)
            $table->renameColumn('ceg_cg','e_signos_vit');	//int(11)
            $table->renameColumn('obs_ceg_cg','obs_e_signos_vit');	//varchar(255)
            $table->renameColumn('masa_cg','e_dolor_loc');	//int(11)
            $table->renameColumn('obs_masas_cg','obs_e_dolor_loc');	//varchar(255)
            $table->renameColumn('urgencia_cg','masas_pal');	//int(11)
            $table->renameColumn('obs_urgencia_cg','obs_masas_pal');	//varchar(255)
            $table->renameColumn('so_cg','e_piel_fan');	//int(11)
            $table->renameColumn('obs_so_cg','obs_e_piel_fan');	//varchar(255)

            /** e;liminar columan */
            $table->dropColumn('obs_egp_cg');
            $table->dropColumn('obs_gen_ex_esp_cg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
