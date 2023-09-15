<?php
// Aqui definimos la logica para obtener los datos y pasarlos a la vista
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaisesController extends Controller
{
//Definimos esta funcion para albergar nuestro arreglo asociativo de paises
    public function index()
    {
        // Datos de los países
        $paises = [
            'Colombia' => [
                'capital' => 'Bogotá',
                'moneda' => 'COP',
                'poblacion' => 50880000,
                'descripcion' => 'Colombia es un país del extremo norte de Sudamérica.
                Su paisaje cuenta con bosques tropicales,  las montañas de los Andes y varias
                plantaciones de café. En Bogotá, su capital a gran altura,
                el distrito Zona Rosa es famoso por sus restaurantes y tiendas',
            ],
            'Mexico' => [
                'capital' => 'Ciudad de México',
                'moneda' => 'MXN',
                'poblacion' => 128900000,
                'descripcion' => 'México es un país entre los Estados Unidos y América Central, conocido por las playas
                 en el Pacífico y el golfo de México, y su diverso paisaje de montañas, desiertos y selvas
                . Las ruinas antiguas, como Teotihuacán y la ciudad maya de Chichén Itzá, se distribuyen por el país,
                  al igual que las ciudades de la época colonial española. En la capital Ciudad de México,
                 las elegantes tiendas, los famosos museos y los restaurantes gourmet son parte de la vida moderna',
            ],
            'Estados Unidos'=> [
                'capital'=>'Washington D.C',
                'moneda'=>'USD',
                'poblacion'=> 329500000,
                'descripcion'=>'Estados Unidos es un país de 50 estados que ocupa una extensa franja de América del
                 Norte,con Alaska en el noroeste y Hawái que extiende la presencia del país en el océano Pacífico.
                Entre las principales ciudade de la costa del Atlántico, se encuentran Nueva York,
                un centro global financiero y cultural, y la capital Washington D. C. Chicago, metrópolis del
                medio oeste, es famosa por su influencia arquitectónica y, en la costa oeste,
                Hollywood, Los Ángeles, es famosa por la industria cinematográfica.',
            ],
            'Peru' => [
                'capital' => 'Lima',
                'moneda' => 'PEN',
                'poblacion' => 32800000,
                'descripcion' => 'Perú es un país en la costa oeste de América del Sur, conocido por su
                 diversidad geográfica que incluye majestuosas montañas de los Andes, playas de arena
                  dorada en la costa del Pacífico y vastas selvas tropicales en la región amazónica. Lima,
                   la capital, es famosa por su gastronomía de clase mundial y su rica historia colonial.'
            ],
            'Brasil' => [
                'capital' => 'Brasilia',
                'moneda' => 'BRL',
                'poblacion' => 211000000,
                'descripcion' => 'Brasil es el país más grande de América del Sur y se caracteriza por su inmensa
                 selva amazónica, famosas playas como Copacabana e Ipanema, y la icónica ciudad de Río de Janeiro
                  con su estatua del Cristo Redentor. Además de su belleza natural,
                  Brasil es conocido por su pasión por el fútbol y su animada cultura.'
            ],
            'Argentina' => [
                'capital' => 'Buenos Aires',
                'moneda' => 'ARS',
                'poblacion' => 45195777,
                'descripcion' => 'Argentina es un país de contrastes y diversidad, desde las majestuosas cumbres
                 de la cordillera de los Andes en el oeste hasta las vastas llanuras de las pampas en el este.
                 Buenos Aires, la capital, es conocida por su arquitectura de inspiración europea,
                  su vibrante escena artística y su pasión por el tango. El país también es famoso
                  por su carne de res y su deliciosa comida.'
            ]

            
        ];

        // Coontrolamos que se vera en la vista con las condiciones para que los paises se puedan mostrar
        $registrosAMostrar = 2;
        $poblacionMinima = 100000000;
        $ordenarPor = 'moneda';
        $orden = 'ASC';
        /**1 ASC, -1 DESC */

        // Filtrar y ordenar los países según lo que se pide
        $paisesFiltrados = collect($paises) //Haremos una coleccion de paises filtrados para ser mostrados
        ->where('poblacion', '>=', $poblacionMinima) //condicion de poblacion
        ->when($orden === 'ASC', function ($collection) use ($ordenarPor) { //condicionamos el orden segun lo requerido
            return $collection->sortBy($ordenarPor, SORT_REGULAR, 1); // Orden ascendente
        }, function ($collection) use ($ordenarPor) {
            return $collection->sortBy($ordenarPor, SORT_REGULAR, -1); // Orden descendente
        })
        ->take($registrosAMostrar); //limitar paises a mostrar

        //Devolvemos la vista paises ' con los $paisesFiltrados
        //return view('paises', ['paises' => $paisesFiltrados]);
        return view('paises', [
            'paises' => $paisesFiltrados,
            'registrosAMostrar' => $registrosAMostrar,
            'poblacionMinima' => $poblacionMinima,
            'ordenarPor' => $ordenarPor,
            'orden' => $orden,
        ]);
    }
}
