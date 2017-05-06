<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER tr_Respuesta_Default AFTER INSERT ON `go_preguntas` FOR EACH ROW
        BEGIN
            IF NEW.tipo_de_respuesta=1 THEN
                INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('Si', NEW.id);
                INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('No', NEW.id);
            ELSE
                IF NEW.tipo_de_respuesta=2 THEN
                    INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('Si', NEW.id);
                    INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('No', NEW.id);
                    INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('Mal Estado', NEW.id);
                ELSE
                    IF NEW.tipo_de_respuesta=3 THEN
                        INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('1', NEW.id);
                        INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('2', NEW.id);
                        INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('3', NEW.id);
                        INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('4', NEW.id);
                        INSERT INTO go_respuestas (`respuesta`, `id_pregunta`) VALUES ('5', NEW.id);
                    END IF;
                END IF;
            END IF;
        END
        ");
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Respuesta_Default`');
    }
}
