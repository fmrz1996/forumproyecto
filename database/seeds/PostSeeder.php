<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Post::create([
        'title' => 'Las 4 nuevas rutas turísticas Valle del Itata',
        'body' => '“Viñas y Observación de aves”, “Aventura campo y mar”, “Alma del Valle” y “Ruta Agroecológica patrimonial” son los nombres de las nuevas rutas disponibles para los turistas en el Valle del Itata con alto valor identitario y patrimonial. “El desafío fue realizar rutas turísticas comercializables en la zona considerando la oferta de las nueve comunas que integran el Valle. Para esto, lo primero que realizamos fue un diagnostico desde nuestra mirada comercial integrando visitas  en terreno, estudios, valorización. Gracias a este trabajo hoy las rutas están tarificadas, dirigidas a un tipo específico de segmento y ahora disponibles para la venta”, señala Alejandra Arias, gerente comercial Esquerré Tour Operador quien entregó los resultados del proyecto a los empresarios de la zona en el marco de una licitación de la Dirección Regional de Turismo del Biobío y el programa Zona de Oportunidades.',
        'slug' => 'las-4-nuevas-rutas-turísticas-valle-del-itata',
        'category_id' => 1,
        'user_id' => 1,
        'background' => 'valle-itata.jpg',
      ]);

      Post::create([
        'title' => 'Chillán suma 18 nuevos puntos verdes',
        'body' => '<p>Chill&aacute;n agregar&aacute; durante octubre a 18 nuevos puntos de almacenamientos de residuos en la comuna y sumar&aacute; en total 47 puntos verdes de distintos sectores urbanos y rurales de Chill&aacute;n, inform&oacute; la encargada del &aacute;rea de la Direcci&oacute;n de Medio Ambiente Aseo y Ornato, Marta Sol&iacute;s. &ldquo;Queremos seguir promoviendo la sustentabilidad ambiental en la comuna&rdquo;, se&ntilde;ala la <em>profesional</em>.</p>
                  <p>Los nuevos puntos son el Cesfam Los Alpes, la Posta de Cato, el Cecosf Do&ntilde;a Isabel, las juntas de vecinos Los Laureles, Los &Aacute;lamos, Brisas del Bicentenario, Oriente Futuro, La Victoria, Villa Don Martin, el Hospital Herminda Martin y en el municipio.</p>
                  <p>A esto se a&ntilde;aden los puntos verdes en los jardines infantiles Mi Casita, El Caracol y San Jos&eacute;, adem&aacute;s de la Escuela El Libertador, el Liceo Rep&uacute;blica de Italia, y la Escuela Parvularia Federico Fr&ouml;ebel. &ldquo;Nuestro municipio est&aacute; certificado ambientalmente.</p>
                  <p>Cada vez que se instala un punto de reciclaje siempre va de la mano de una campa&ntilde;a educativa en cada sector de Chill&aacute;n&rdquo;, sostuvo. A la fecha, a los 47 puntos verdes en la comuna destinados al almacenamiento de Pl&aacute;sticos PET1, Papeles y cartones, Latas y aluminios y Pilas, hay 1.800 adultos capacitados en gesti&oacute;n integral de los residuos para reciclar de mejor manera y m&aacute;s de 300 estudiantes empoderados en esta tem&aacute;tica.</p>
                  <p>&ldquo;Tenemos muchas tareas que enfrentar. No solo la contaminaci&oacute;n del aire en los mes de invierto, sino el tema del reciclaje que es de todos los d&iacute;as del a&ntilde;o&rdquo;, comenta el alcalde <strong>Sergio Zarzar</strong>.</p>',
        'slug' => 'chillan-suma-18-nuevos-puntos-verdes',
        'category_id' => 3,
        'user_id' => 3,
        'background' => 'img-placeholder.jpg',
      ]);

      Post::create([
        'title' => 'Liberación monitos del monte',
        'header' => 'En un bosque nativo, con un matorral extenso de quilas, del sector cordillerano de la comuna de Yungay, fueron liberados cinco monitos del monte (Dromiciops gliroides).',
        'body' => '<p>&ldquo;En este caso, al igual que en otros, podemos ver como el trabajo conjunto de los vecinos, Carabineros de Chile, el Centro de Rescate y el SAG ha concluido con la devoluci&oacute;n a su h&aacute;bitat natural de estos ejemplares, los que esperamos se reinserten de la mejor manera a su medio natural&rdquo;, destac&oacute; Jorge Vargas P&eacute;rez, Jefe (s) de la Oficina SAG de Bulnes.</p>
                  <p>Por su parte, Daniel Gonz&aacute;lez, Director del Centro de Rescate de Fauna Silvestre de la UdeC, destac&oacute; que &ldquo;estos monitos del monte fueron encontrados en un tronco, se encontraban en estado de hibernaci&oacute;n, con un buen estado corporal, por lo cual la preocupaci&oacute;n fue mantener esa condici&oacute;n, cuidarlos y alimentarlos para que al momento de la liberaci&oacute;n pudieran enfrentar de mejor forma el proceso de reinserci&oacute;n&rdquo;.</p>
                  <p>Sobre la <em>importancia</em> del aviso oportuno de la detecci&oacute;n de ejemplares de fauna silvestre heridos o fuera de su h&aacute;bitat, el directivo del SAG se&ntilde;al&oacute; que gracias a &eacute;stos se pueden realizar estos rescates y liberaciones, por lo que llam&oacute; a la ciudadan&iacute;a a no mantener aves y animales silvestres en cautiverio sin autorizaci&oacute;n del SAG y a entregarlos inmediatamente para su evaluaci&oacute;n y retorno a su medio natural, ya que la manipulaci&oacute;n inadecuada y el cautiverio, le provoca un grave da&ntilde;o a estas especies. En caso de avistamientos de ejemplares de fauna silvestre llam&oacute; a la comunidad a dejarlos retornar a su h&aacute;bitat.</p>
                  <p>El <a href="https://es.wikipedia.org/wiki/Dromiciops_gliroides"><strong>monito del monte</strong></a> es una especie end&eacute;mica y &uacute;nico representante viviente del orden Microbiotheria, un orden ancestral de los marsupiales, que est&aacute; catalogada como rara y beneficiosa para la actividad silvoagropecuaria. Se distingue f&aacute;cilmente, por un pelaje muy denso y suave, con colores pardos sobre la frente. Alrededor de los ojos se dispone una m&aacute;scara de pelos muy oscuros, casi negruzcos y una densa cubierta de pelos en la cola. Nacen en camadas y tienen de 1 a 4 cr&iacute;as al a&ntilde;o.</p>
                  <p>Las hembras alcanzan su madurez sexual al segundo a&ntilde;o de vida. Se alimenta principalmente de larvas de insectos y cris&aacute;lidas de polillas y mariposas. Se distribuyen geogr&aacute;ficamente desde la Regi&oacute;n de &Ntilde;uble hasta Chilo&eacute;, desde la selva costera hasta unos 1.000 m de altura sobre el nivel del mar en la cordillera de <strong>Los Andes</strong>.</p>',
        'slug' => 'liberacion-monitos-del-monte',
        'category_id' => 3,
        'user_id' => 4,
        'background' => 'img-placeholder.jpg',
      ]);

      Post::create([
        'title' => 'Proyectos en seguridad ciudadana, infraestructura y capacitaciones son parte de los Fondeve 2018',
        'body' => '<p>&ldquo;Como municipio seguiremos apoyando a los vecinos de Chill&aacute;n para que puedan tener una vida m&aacute;s satisfactoria en cada uno de sus sectores&rdquo;, sostuvo el alcalde Sergio Zarzar en la ceremonia en la que 63 organizaciones, juntas de vecinos y comit&eacute;s urbanos y rurales recibieron los recursos del Fondo de Desarrollo Vecinal (Fondeve) para concretar sus proyectos.</p>
                  <p>La autoridad comunal destac&oacute; el gran inter&eacute;s que despierta cada a&ntilde;o en la comunidad este fondo gestionado por la Secretar&iacute;a Comunal de Planificaci&oacute;n Municipal (Secpla) y que en el 2018 llev&oacute; a incrementar las postulaciones en un 27% respecto a la versi&oacute;n anterior. En esta oportunidad se seleccionaron 39 proyectos en la l&iacute;nea de Seguridad Ciudadana, 32 iniciativas en Infraestructura Comunitaria y 2 en Capacitaci&oacute;n.</p>
                  <p>En entre ellos destacan construcci&oacute;n de juegos infantiles, luminarias LED, cierres perimetrales de sedes, parque y m&aacute;quinas de ejercicios, containers para bodegas y mejoramiento de sedes sociales. Al monto inicial de fondo, se a&ntilde;adi&oacute; otra cantidad a trav&eacute;s de una modificaci&oacute;n presupuestaria aprobada por los integrantes del Concejo Municipal.</p>
                  <p>En total son $168 millones, de los cuales $152 millones los aport&oacute; el Fondeve y el resto las propias organizaciones beneficiados de sectores urbanos y rurales.</p>',
        'slug' => 'proyecto-en-seguridad-ciudad-infraestructura-capacitaciones-fondeve-2018',
        'category_id' => 2,
        'user_id' => 2,
        'background' => 'img-placeholder.jpg',
      ]);

      Post::create([
        'title' => 'Masiva participación de vecinos de Sarita Gajardo por inicio de Programa “Quiero Mi Barrio”',
        'header' => 'Más de un centenar de vecinos de la Población Sarita Gajardo, integrantes de tres juntas vecinales y  de diferentes organizaciones comunitarias del sector se congregaron para dar inicio al programa Quiero Mi barrio que impulsa el Ministerio de Vivienda y Urbanismo (Minvu).',
        'body' => '<p>El programa considera un periodo de ejecuci&oacute;n de 42 meses (casi cuatro a&ntilde;os) y una inversi&oacute;n de <strong>$838.676.642</strong>, de los cuales <strong>$66,6</strong> millones los aporta la municipalidad y <strong>$6,6</strong> millones los vecinos (puesto por el municipio).</p>
                  <p>&ldquo;En los &uacute;ltimos a&ntilde;os Chill&aacute;n fue una de las comunas con mayor cantidad de proyectos en Biob&iacute;o que se adjudic&oacute; el programa Quiero Mi Barrio del Minvu y ahora como nueva regi&oacute;n vamos a partir con uno nuevo&rdquo;, dijo el alcalde Sergio Zarzar acompa&ntilde;ado de la Gobernadora de Punilla, Paola Becker y el equipo de Secpla.</p>
                  <p>Por su parte, la jefa de Barrio, Doris Rivas, detall&oacute; que en este caso se incluye a las juntas de vecinos Sarita Gajardo y Ampliaciones, Marta Brunet y Sarita Gajardo y Ampliaciones II. La primera fase, de ocho meses de duraci&oacute;n, contempla la instalaci&oacute;n del programa en el barrio y la elaboraci&oacute;n de un diagn&oacute;stico compartido que generar&aacute; los insumos para la elecci&oacute;n de iniciativas urbanas y sociales, adem&aacute;s de la conformaci&oacute;n de la organizaci&oacute;n territorial de los vecinos en un Consejo Vecinal de Desarrollo, y la definici&oacute;n de un Plan Maestro que incluye obras e iniciativas sociales.</p>
                  <p>En la siguiente fase, de treinta meses de duraci&oacute;n, se dise&ntilde;ar&aacute;n y se ejecutar&aacute;n los Planes de Gesti&oacute;n de Obras y de Gesti&oacute;n Social, basado en los ejes transversales del programa que son<em> &ldquo;Identidad y patrimonio, Seguridad y Medio Ambiente&rdquo;</em>. La &uacute;ltima fase es de evaluaci&oacute;n y cierre, que tendr&aacute; una duraci&oacute;n de cuatro meses.</p>',
        'slug' => 'masiva-participacion-de-vecinos-de-sarita-gajardo',
        'category_id' => 2,
        'user_id' => 4,
        'background' => 'img-placeholder.jpg',
      ]);

      Post::create([
        'title' => 'Ofensiva legal de Corbiobío se traslada a La Moneda para defender el presupuesto regional 2019',
        'header' => 'Este miércoles 24 de octubre la Corporación Privada de Desarrollo de la Región del Bío Bío, Corbiobío, ejerció el Derecho de Petición Constitucional.',
        'body' =>
            '<p>Este Derecho de Petici&oacute;n est&aacute; establecido en el art&iacute;culo 19, N&ordm; 14, de la Constituci&oacute;n Pol&iacute;tica de la Rep&uacute;blica de Chile, por intermedio del cual se pide a los ministros de Hacienda y del Interior su urgente intervenci&oacute;n y reconsideraci&oacute;n, ante la disminuci&oacute;n del presupuesto regional 2019 de la Regi&oacute;n del B&iacute;o B&iacute;o, siendo la &uacute;nica del pa&iacute;s que present&oacute; una reducci&oacute;n del 39% de los recursos en t&eacute;rminos reales, ubic&aacute;ndose en el s&eacute;ptimo lugar a nivel nacional, con esta nueva distribuci&oacute;n.</p>
            <p>Esta ofensiva es la primera instancia legal que pretende sentar un precedente a nivel nacional, al ratificar que en la distribuci&oacute;n del presupuesto 2019 la Regi&oacute;n del B&iacute;o B&iacute;o fue perjudicada, tras la separaci&oacute;n de &Ntilde;uble, d&eacute;ficit que se apela a suplir con fondos adicionales del nivel central. La presentaci&oacute;n del Derecho de Petici&oacute;n fue formalizada por los directores de Corbiob&iacute;o.</p>
            <p>Con todos los antecedentes expuestos anteriormente, el Vicepresidente de Corbiob&iacute;o, Miguel &Aacute;ngel Ruiz-Tagle, se&ntilde;al&oacute; que se solicita, en lo concreto, a los ministros de Hacienda y del Interior lo siguiente:</p>
              <ol>
              	<li>Reconstruir la f&oacute;rmula de asignaci&oacute;n que el sistema utiliza para repartir el Fondo Nacional de Desarrollo Regional, FNDR, 2019, para la Regi&oacute;n del B&iacute;o B&iacute;o, adoptando todas las medidas y realizando todas las indicaciones que sean pertinentes para tal objetivo.</li>
              	<li>Que se suplemente el presupuesto de la Regi&oacute;n del B&iacute;o B&iacute;o en 17.841.000 millones de pesos, lo que implica un incremento real del 25% sobre lo presupuestado originalmente. Lo anterior para que la Regi&oacute;n del B&iacute;o B&iacute;o no tenga una p&eacute;rdida significativa de presupuesto de inversi&oacute;n p&uacute;blica regional (partida 5, capitulo 68, programa 02), en desmedro del bienestar futuro de los habitantes que viven en las 33 comunas, por cuanto el habitante de la Regi&oacute;n del B&iacute;o B&iacute;o en promedio pas&oacute;, producto de la aplicaci&oacute;n del polinomio, de 56,985 pesos por habitante a&ntilde;o a 45,524 por habitante a&ntilde;o. Este castigo impacta en el futuro de la Regi&oacute;n e implica una ca&iacute;da del 20% de inversi&oacute;n per c&aacute;pita.</li>
              	<li>Que en adelante se tome en consideraci&oacute;n y se recoja en t&eacute;rminos efectivos los planteamientos de los habitantes de regiones, para evitar que a futuro, se vean afectados por decisiones que pueden ser interpretadas como injustificadas, arbitrarias y discriminatorias, poniendo en riesgo el progreso no s&oacute;lo de esta regi&oacute;n, sino que de todo el pa&iacute;s, por la inequidad en la distribuci&oacute;n de los recursos. Asimismo, Corbiob&iacute;o conf&iacute;a en lograr un amplio respaldo de los parlamentarios de la Regi&oacute;n, en el marco de la presentaci&oacute;n del Derecho de Petici&oacute;n Constitucional.</li>
              </ol>
            <p>Finalmente, Corbiob&iacute;o evaluar&aacute; otros cursos a seguir, dependiendo de los resultados de la ofensiva legal.</p>',
        'slug' => 'ofensiva-legal-de-corbiobio-se-traslada-a-la-moneda',
        'category_id' => 7,
        'user_id' => 1,
        'background' => 'img-placeholder.jpg',
          ]);

          Post::create([
            'title' => 'Intendente Arrau anuncia a director regional de Corfo',
            'header' => 'El Intendente Martín Arrau anunció esta tarde el nombre del director regional de Corfo en la Región de Ñuble, organismo dependiente del Ministerio de Economía, Fomento y Turismo y que tiene por misión apoyar el emprendimiento, la innovación y la competitividad.',
            'body' =>
                '<p>Se trata del Contador Auditor y diplomado en Planificaci&oacute;n Estrat&eacute;gica, Daniel Sep&uacute;lveda Andrade, que asume tras un proceso de selecci&oacute;n en la Alta Direcci&oacute;n P&uacute;blica.</p>
                <p>Sep&uacute;lveda es contador auditor de la Universidad de Concepci&oacute;n, Diplomado en Planificaci&oacute;n Estrat&eacute;gica de la misma casa de estudios. Actualmente, cursa un diplomado en Control de Gesti&oacute;n en la Universidad Adolfo Ib&aacute;&ntilde;ez.</p>
                <p>Hasta la fecha, Daniel Sep&uacute;lveda, que asume oficialmente el 5 de noviembre, se desempe&ntilde;aba como director del Departamento de Salud de la Municipalidad de San Fabi&aacute;n. Asimismo, fue Jefe de Planificaci&oacute;n y Proyectos de la Gobernaci&oacute;n Provincial de &Ntilde;uble, donde adem&aacute;s asumi&oacute; funciones como Encargado Provincial de Emergencias, Encargado de Estadio Seguro y de Gobierno en Terreno.&nbsp; Previo a ello, fue concejal por Coihueco y Administrador Municipal de la misma comuna.</p>
                <p>El Intendente Mart&iacute;n Arrau, junto con desear el mayor de los &eacute;xitos al nuevo director regional, indic&oacute; que Corfo es uno de los servicios m&aacute;s potentes en la regi&oacute;n, ya que &ldquo;impulsa la competitividad y permite visibilizar nuevos focos productivos, a trav&eacute;s del fomento a la inversi&oacute;n y la innovaci&oacute;n. Asimismo, se centra en el capital humano y las potencialidades de cada rubro para alcanzar el desarrollo sostenible de &Ntilde;uble&rdquo;.</p>
                <p>Sep&uacute;lveda se&ntilde;al&oacute; &ldquo;asumir la direcci&oacute;n de Corfo &Ntilde;uble impone m&uacute;ltiples desaf&iacute;os, como&nbsp; establecer lazos con universidades, gremios, organizaciones productivas, Gobierno Regional&nbsp; y&nbsp; Municipios para mejorar la competitividad de la regi&oacute;n, adem&aacute;s de fomentar proyectos que permitan un alto potencial de crecimiento, enmarcado en Estrategia Regional de Desarrollo</p>',
            'slug' => 'intendente-arrau-anuncia-a-director-regional-de-corfo.',
            'category_id' => 7,
            'user_id' => 3,
            'background' => 'img-placeholder.jpg',
              ]);
        }
    }
