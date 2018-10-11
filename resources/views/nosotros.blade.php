    @extends('layout')

    @section('title', "Quienes somos - Forum")

    @section('content')
    <!-- Cuerpo de Página -->
    <div id="main" class="container">
      <div class="aboutus-header">
        <img class="img-fluid aboutus-bg" src="../img/aboutus-header.jpg">
        <div class="aboutus-bg-text">
          <h1>Una mirada actual</h1>
        </div>
      </div>
      <div class="aboutus">
        <div class="row">
          <div class="col-sm-12 col-md-6 aboutus-container">
            <h3>Quienes somos</h3>
            <p>REVISTA FORUM, es una revista de actualidad, orientada a las empresas,
              profesionales y emprendedores de hoy, en los principales grupos de negocios,
              sociales y empresariales de la provincia de Ñuble, Los Ángeles, Concepción, Temuco  y Pucón.</p>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="aboutus-info">
              <div class="aboutus-info-div">
                <h5>Grupo objetivo</h5>
                <ul>
                  <li>Hombres y mujeres mayores de 20 años.</li>
                  <li>Pertenecientes al grupo Socio Económico Medio Alto.</li>
                  <li>Profesionales, personas de negocios, docentes, ejecutivos.</li>
                </ul>
                <hr>
                <h5>Equipo Forum</h5>
                <ul>
                  <li>Director: Sergio Romero.</li>
                  <li>Periodista: Marcelo Apellido.</li>
                  <li>Desarrollo web: Matías Fuentes, Felipe Rosales.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
