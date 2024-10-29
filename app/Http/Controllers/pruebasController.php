<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use App\Dependencia;
use App\Http\Requests\UpdateContactoBDT;
use App\sincontacto;
use App\contactoefectivo;
use Illuminate\Http\Request;

class pruebasController extends Controller
{
    public function index(){
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);
        return view('Pruebas.index',compact('bibliotecas'));
    }

    public function FormularioActualizarContacto($id){

        $biblioteca = Dependencia::get()->where('id_biblioteca',$id);

        // Adiciones
        $id_biblioteca = $id - 1;//-1 para coincidencias con el [index]
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);

        return view('Tutor.Actualizar.contactos',compact('bibliotecas','biblioteca','id_biblioteca'));

    }

    public function formularioTelegram(){
        return view('Pruebas.form');
    }

    public function StoreTelegram(Request $request){
        $request()->all();
    }


    public function datoss(){
        $data = Biblioteca::select('clavebdt', 'nombreMatutino')->where('pertenencia', 'EXTERNA')->where('estatus_temporal','abierta')->get();
        $arreglo_base = [];

        foreach ($data as $item) {
            // Genera números aleatorios
            $pcc = rand(0, 900); // Número aleatorio para 'Pcc'
            $hombres = rand(1, 50); // Número aleatorio para 'Usuarios Hombres'
            $talleres = rand(1, 50); // Número aleatorio para 'Mujeres'
            $visitas = rand(1, 1000); // Número aleatorio para 'Visitas'

            // Arreglo de talleres
            $talleres = [
                'Estrategias de enseñanza para preescolar', 'Técnicas de motivación en el aula',
                'Psicomotricidad en la educación básica', 'Educación emocional en niños',
                'Uso de juegos didácticos en el aprendizaje', 'Manejo de conflictos en el aula',
                'Integración de la música en la enseñanza', 'Fomento de la lectura en la primaria',
                'Matemáticas lúdicas para docentes', 'Diseño de proyectos educativos',
                'Tecnología educativa en preescolar', 'Desarrollo de habilidades sociales en niños',
                'Enseñanza de ciencias naturales en primaria', 'Implementación de la robótica en educación básica',
                'Programación para niños', 'Educación artística y creativa',
                'Estrategias de inclusión educativa', 'Lenguaje y comunicación en primaria',
                'Elaboración de materiales didácticos', 'Gestión del tiempo en el aula',
                'Metodologías innovadoras para la enseñanza', 'Evaluación por competencias',
                'Uso de plataformas digitales en educación básica', 'Aprendizaje basado en proyectos',
                'Creación de ambientes de aprendizaje', 'Educación ambiental en la escuela',
                'Desarrollo de habilidades del pensamiento crítico', 'Estimulación temprana en educación infantil',
                'Juegos de simulación en el aula', 'Educación y género en la escuela',
                'Pedagogía del juego', 'Desarrollo de la inteligencia emocional',
                'Educación en valores para niños', 'Técnicas de relajación y concentración para el aula',
                'Fomento del pensamiento lógico-matemático', 'Educación física en preescolar',
                'Taller de títeres y teatro para docentes', 'Creación de recursos digitales interactivos',
                'Educación intercultural', 'Formación en tutorías educativas',
                'Metodologías de enseñanza bilingüe', 'Desarrollo de habilidades cognitivas',
                'Atención a la diversidad en el aula', 'Estrategias de lectura comprensiva',
                'Fomento del trabajo en equipo en el aula', 'Educación socioemocional en primaria',
                'Diseño de unidades didácticas', 'Taller de arte y cultura en la escuela',
                'Educación cívica y ética', 'Gamificación en la enseñanza',
                'Uso de recursos multimedia en el aula', 'Estrategias de enseñanza para secundaria',
                'Educación para la paz', 'Desarrollo del pensamiento creativo',
                'Aplicación de metodologías STEM en educación básica', 'Aprendizaje cooperativo en el aula',
                'Taller de ortografía y gramática para docentes', 'Elaboración de portafolios de aprendizaje',
                'Habilidades para la vida en la escuela', 'Uso de la inteligencia artificial en la educación',
                'Proyectos transversales en la enseñanza', 'Educación y tecnología: desafíos y oportunidades',
                'Enseñanza de habilidades digitales en primaria', 'Taller de storytelling para docentes',
                'Educación en el medio rural', 'Taller de cine y medios audiovisuales en el aula',
                'Prevención del acoso escolar', 'Atención a niños con altas capacidades',
                'Taller de escritura creativa para docentes', 'Educación integral de la sexualidad',
                'Prevención de la violencia en la escuela', 'Fomento del emprendimiento en educación básica',
                'Educación en derechos humanos para niños', 'Metodologías para el aprendizaje autodirigido',
                'Educación para la salud en el aula', 'Taller de expresión corporal en la educación',
                'Educación financiera para docentes', 'Taller de inteligencia emocional para docentes',
                'Diseño de espacios educativos innovadores', 'Aprendizaje basado en retos en la educación básica',
                'Educación inclusiva para estudiantes con discapacidad', 'Desarrollo de competencias ciudadanas',
                'Innovación en la evaluación educativa', 'Taller de mindfulness en el aula',
                'Educación para el desarrollo sostenible', 'Desarrollo de habilidades blandas en la escuela',
                'Taller de periodismo escolar', 'Educación para el bienestar emocional',
                'Alfabetización mediática e informacional', 'Formación en liderazgo educativo',
                'Gestión de proyectos educativos', 'Taller de nuevas tecnologías para docentes',
                'Desarrollo del pensamiento científico en niños', 'Taller de educación en línea para docentes',
                'Fomento del aprendizaje autónomo', 'Pedagogía del juego en la educación infantil',
                'Creación de comunidades de aprendizaje', 'Educación para la resiliencia en la escuela',
                'Taller de resolución de problemas en el aula', 'Formación en competencias digitales para docentes',
            ];

            // Selecciona aleatoriamente entre 10 y 30 talleres
            $cantidad_talleres = rand(10, 30);
            $talleres_seleccionados = array_intersect_key($talleres, array_flip(array_rand($talleres, $cantidad_talleres)));

            // Agrega al arreglo base
            $arreglo_base[] = [
                'clavebdt' => $item->clavebdt,
                'nombreMatutino' => $item->nombreMatutino,
                'Mes' => 'AGOSTO',
                'Pcc' => $pcc,
                //'Talleres '=>$talleres,


            ];
        }

        return response()->json($arreglo_base);
    }



    public function datos(){
        $data = Biblioteca::select('clavebdt', 'nombreMatutino')->where('pertenencia', '!=', 'EXTERNA')->get();
        $arreglo_base = [];

        foreach ($data as $item) {
            // Genera números aleatorios
            $pcc = rand(1, 900); // Número aleatorio para 'Pcc'
            $hombres = rand(1, 50); // Número aleatorio para 'Usuarios Hombres'
            $mujeres = rand(1, 50); // Número aleatorio para 'Mujeres'
            $visitas = rand(1, 1000); // Número aleatorio para 'Visitas'

            // Arreglo de talleres
            $talleres = [
                'Estrategias de enseñanza para preescolar', 'Técnicas de motivación en el aula',
                'Psicomotricidad en la educación básica', 'Educación emocional en niños',
                'Uso de juegos didácticos en el aprendizaje', 'Manejo de conflictos en el aula',
                'Integración de la música en la enseñanza', 'Fomento de la lectura en la primaria',
                'Matemáticas lúdicas para docentes', 'Diseño de proyectos educativos',
                'Tecnología educativa en preescolar', 'Desarrollo de habilidades sociales en niños',
                'Enseñanza de ciencias naturales en primaria', 'Implementación de la robótica en educación básica',
                'Programación para niños', 'Educación artística y creativa',
                'Estrategias de inclusión educativa', 'Lenguaje y comunicación en primaria',
                'Elaboración de materiales didácticos', 'Gestión del tiempo en el aula',
                'Metodologías innovadoras para la enseñanza', 'Evaluación por competencias',
                'Uso de plataformas digitales en educación básica', 'Aprendizaje basado en proyectos',
                'Creación de ambientes de aprendizaje', 'Educación ambiental en la escuela',
                'Desarrollo de habilidades del pensamiento crítico', 'Estimulación temprana en educación infantil',
                'Juegos de simulación en el aula', 'Educación y género en la escuela',
                'Pedagogía del juego', 'Desarrollo de la inteligencia emocional',
                'Educación en valores para niños', 'Técnicas de relajación y concentración para el aula',
                'Fomento del pensamiento lógico-matemático', 'Educación física en preescolar',
                'Taller de títeres y teatro para docentes', 'Creación de recursos digitales interactivos',
                'Educación intercultural', 'Formación en tutorías educativas',
                'Metodologías de enseñanza bilingüe', 'Desarrollo de habilidades cognitivas',
                'Atención a la diversidad en el aula', 'Estrategias de lectura comprensiva',
                'Fomento del trabajo en equipo en el aula', 'Educación socioemocional en primaria',
                'Diseño de unidades didácticas', 'Taller de arte y cultura en la escuela',
                'Educación cívica y ética', 'Gamificación en la enseñanza',
                'Uso de recursos multimedia en el aula', 'Estrategias de enseñanza para secundaria',
                'Educación para la paz', 'Desarrollo del pensamiento creativo',
                'Aplicación de metodologías STEM en educación básica', 'Aprendizaje cooperativo en el aula',
                'Taller de ortografía y gramática para docentes', 'Elaboración de portafolios de aprendizaje',
                'Habilidades para la vida en la escuela', 'Uso de la inteligencia artificial en la educación',
                'Proyectos transversales en la enseñanza', 'Educación y tecnología: desafíos y oportunidades',
                'Enseñanza de habilidades digitales en primaria', 'Taller de storytelling para docentes',
                'Educación en el medio rural', 'Taller de cine y medios audiovisuales en el aula',
                'Prevención del acoso escolar', 'Atención a niños con altas capacidades',
                'Taller de escritura creativa para docentes', 'Educación integral de la sexualidad',
                'Prevención de la violencia en la escuela', 'Fomento del emprendimiento en educación básica',
                'Educación en derechos humanos para niños', 'Metodologías para el aprendizaje autodirigido',
                'Educación para la salud en el aula', 'Taller de expresión corporal en la educación',
                'Educación financiera para docentes', 'Taller de inteligencia emocional para docentes',
                'Diseño de espacios educativos innovadores', 'Aprendizaje basado en retos en la educación básica',
                'Educación inclusiva para estudiantes con discapacidad', 'Desarrollo de competencias ciudadanas',
                'Innovación en la evaluación educativa', 'Taller de mindfulness en el aula',
                'Educación para el desarrollo sostenible', 'Desarrollo de habilidades blandas en la escuela',
                'Taller de periodismo escolar', 'Educación para el bienestar emocional',
                'Alfabetización mediática e informacional', 'Formación en liderazgo educativo',
                'Gestión de proyectos educativos', 'Taller de nuevas tecnologías para docentes',
                'Desarrollo del pensamiento científico en niños', 'Taller de educación en línea para docentes',
                'Fomento del aprendizaje autónomo', 'Pedagogía del juego en la educación infantil',
                'Creación de comunidades de aprendizaje', 'Educación para la resiliencia en la escuela',
                'Taller de resolución de problemas en el aula', 'Formación en competencias digitales para docentes',
            ];

            // Selecciona aleatoriamente entre 10 y 30 talleres
            $cantidad_talleres = rand(10, 30);
            $talleres_seleccionados = array_intersect_key($talleres, array_flip(array_rand($talleres, $cantidad_talleres)));

            // Agrega al arreglo base
            $arreglo_base[] = [
                'clavebdt' => $item->clavebdt,
                'nombreMatutino' => $item->nombreMatutino,
                'Mes' => 'Julio',
                'Pcc' => $pcc,
                'Visitas' => $visitas,

                'Talleres' => $talleres_seleccionados,
            ];
        }

        return response()->json($arreglo_base);
    }




    public function reporte(){
        return view('reporte');
    }
}
