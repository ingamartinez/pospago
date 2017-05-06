@extends('layouts.app')

@section('contenido')


<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Referidos Ingresados." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Referidos</div>
            <div>Ingresados 0</div>
            <span class="notification">Meta 0</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Planes Activados." class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Planes</div>
            <div>Activados 0</div>
            <span class="notification green">Meta 0</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Puntos Entrenados ." class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div>Puntos PDA/PDV</div>
            <div>Entrenados 0</div>
            <span class="notification yellow">Meta 0</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Devoluciones." class="well top-block" href="#">
            <i class="glyphicon glyphicon-envelope red"></i>

            <div>Devoluciones</div>
            <div>Gestionadas 0</div>
            <span class="notification red">Total devoluciones 0</span>
        </a>
    </div>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i>Plataforma Web</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h1>PROMOTORES<br>
                        <small>Bienvenido a la plataforma</small>
                    </h1>
                    <p>Aqui tendras la información para que puedas gestionar tus KPI</p>

                    <p><b>Puedes Gestionar tus referidos</b></p>
					<p><b>Puedes consultar tus devoluciones</b></p>

                    <p class="center-block download-buttons">
                        <a href="http://gobusiness.com.co/agotados/agotados.php" class="btn btn-primary btn-lg"><i
                                class="glyphicon glyphicon-chevron-right glyphicon-white"></i>Consultar Punto PDA/PDV</a>
                        <a href="http://gobusiness.com.co/devoluciones/devoluciones.php" class="btn btn-success  btn-lg"><i
                                class="glyphicon glyphicon-chevron-right  glyphicon-white"></i>Consultar tus devoluciones</a>
                    </p>
                </div>
      

            </div>
        </div>
    </div>
</div>


@endsection

