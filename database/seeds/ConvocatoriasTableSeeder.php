<?php

use Illuminate\Database\Seeder;
use App\Convocatoria;
use App\Requerimiento;
use App\Requisito;
use App\Documento;
use App\Fecha;
use App\Merito;

class ConvocatoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convocatoria::create([
            'titulo'            => 'CONVOCATORIA A CONCURSO DE MÉRITOS Y PRUEBAS DE CONOCIMIENTOS PARA OPTAR A AUXILIATURAS DE DOCENCIA',
            'description'       => 'El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing.
                                De Sistemas de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y
                                examen de competencia para la provisión de Auxiliares del Departamento, tomando como
                                base los requerimientos que se tienen programados para la gestión 2020.',
            'fechaIni'          => '2020-07-07',
            'fechaFin'          => '2020-08-08'
        ]);
        Requerimiento::create([
            'items'            => '1',
            'cantidad'       => '2',
            'hrsAcademic'          => '8',
            'materia_id'          => '1',
            'convocatoria_id'          => '1'
        ]);
        Requerimiento::create([
            'items'            => '2',
            'cantidad'       => '2',
            'hrsAcademic'          => '8',
            'materia_id'          => '2',
            'convocatoria_id'          => '1'
        ]);
        Requisito::create([
            'detalle'            => 'Ser estudiante regular y con rendimiento académico de las carreras de
                                    Licenciatura en Ingeniería Informática o Licenciatura en Ingeniería de Sistemas,
                                    que cursa regularmente en la Universidad. Para las materias de Introducción a la
                                    Programación y Elementos de Programación y Estructura de Datos, podrán
                                    presentarse además estudiantes de Ing. Electrónica.',
            'convocatoria_id'       => '1'
        ]);
        Requisito::create([
            'detalle'            => 'O haber concluido el pensum con la totalidad de materias, teniendo pendiente
                                    tan solo la aprobación de la Modalidad de Graduación, pudiendo postular a la
                                    Auxiliatura Universitaria dentro del siguiente periodo académico (dos años o
                                    cuatro semestres), a partir de la fecha de conclusión de pensum de materias.
                                    Este periodo de dos años adicionales a los que contempla la conclusión del
                                    pensum de materias no podrá ampliarse bajo circunstancia alguna, aún en caso
                                    de encontrarse cursando otra carrera.',
            'convocatoria_id'       => '1'
        ]);
        Documento::create([
            'descripcion'            => 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
                                        a la Jefatura de Departamento.',
            'importancia'       => 'Obligatorio',
            'convocatoria_id'       => '1'
        ]);
        Documento::create([
            'descripcion'            => 'Presentar certificado de condición de estudiante expedido por el Departamento
                                        de Registros e Inscripciones.',
            'importancia'       => 'Obligatorio',
            'convocatoria_id'       => '1'
        ]);
        Fecha::create([
            'evento'            => 'Publicación de convocatoria',
            'horaIni'       => '02:59',
            'horaFin'          => '02:59',
            'fechaIni'          => '2020-07-08',
            'fechaFin'          => '2020-08-08',
            'convocatoria_id'          => '1'
        ]);
        Merito::create([
            'indice'            => '1',
            'tipo'            => 'Rendimiento Academico',
            'puntos'          => '5',
            'convocatoria_id'          => '1'
        ]);


        Convocatoria::create([
            'titulo'            => 'CONVOCATORIA A CONCURSO DE MÉRITOS OPTAR A AUXILIATURAS DE DOCENCIA',
            'description'       => 'El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing.
                                De Sistemas de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y
                                examen de competencia para la provisión de Auxiliares del Departamento, tomando como
                                base los requerimientos que se tienen programados para la gestión 2020.',
            'fechaIni'          => '2020-07-07',
            'fechaFin'          => '2020-08-08'
        ]);
        Requerimiento::create([
            'items'            => '1',
            'cantidad'       => '2',
            'hrsAcademic'          => '8',
            'materia_id'          => '1',
            'convocatoria_id'          => '2'
        ]);
        Requerimiento::create([
            'items'            => '2',
            'cantidad'       => '2',
            'hrsAcademic'          => '8',
            'materia_id'          => '2',
            'convocatoria_id'          => '2'
        ]);
        Requisito::create([
            'detalle'            => 'Ser estudiante regular y con rendimiento académico de las carreras de
                                    Licenciatura en Ingeniería Informática o Licenciatura en Ingeniería de Sistemas,
                                    que cursa regularmente en la Universidad. Para las materias de Introducción a la
                                    Programación y Elementos de Programación y Estructura de Datos, podrán
                                    presentarse además estudiantes de Ing. Electrónica.',
            'convocatoria_id'       => '2'
        ]);
        Requisito::create([
            'detalle'            => 'O haber concluido el pensum con la totalidad de materias, teniendo pendiente
                                    tan solo la aprobación de la Modalidad de Graduación, pudiendo postular a la
                                    Auxiliatura Universitaria dentro del siguiente periodo académico (dos años o
                                    cuatro semestres), a partir de la fecha de conclusión de pensum de materias.
                                    Este periodo de dos años adicionales a los que contempla la conclusión del
                                    pensum de materias no podrá ampliarse bajo circunstancia alguna, aún en caso
                                    de encontrarse cursando otra carrera.',
            'convocatoria_id'       => '2'
        ]);
        Documento::create([
            'descripcion'            => 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
                                        a la Jefatura de Departamento.',
            'importancia'       => 'Obligatorio',
            'convocatoria_id'       => '2'
        ]);
        Documento::create([
            'descripcion'            => 'Presentar certificado de condición de estudiante expedido por el Departamento
                                        de Registros e Inscripciones.',
            'importancia'       => 'Obligatorio',
            'convocatoria_id'       => '2'
        ]);
        Fecha::create([
            'evento'            => 'Publicación de convocatoria',
            'horaIni'       => '02:59',
            'horaFin'          => '02:59',
            'fechaIni'          => '2020-07-08',
            'fechaFin'          => '2020-08-08',
            'convocatoria_id'          => '2'
        ]);
        Merito::create([
            'indice'            => '1',
            'tipo'            => 'Rendimiento Academico',
            'puntos'          => '5',
            'convocatoria_id'          => '2'
        ]);
    }
}
