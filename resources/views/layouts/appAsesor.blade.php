
@section('menu')

<li><a class="ajax-link" href="{{url()}}/inicio">
	<i class="glyphicon glyphicon-home"></i>
	<span> Inicio</span></a>
</li>



<li>
	<a class="ajax-link" href="{{url()}}/referido/create">
		<i class="glyphicon glyphicon-user"></i>
		<span>Ingresar</span>
	</a>
</li>

<li>
	<a class="ajax-link" href="{{url()}}/referido">
		<i class="glyphicon glyphicon-pencil"></i>
		<span>Actualizar</span>
	</a>
</li>

<li>
	<a class="ajax-link" href="{{url()}}/rutero">
		<i class="glyphicon glyphicon-print"></i>
		<span>Rutero</span>
	</a>
</li>
<li>
	<a class="ajax-link" href="{{url()}}/ingresados">
		<i class="glyphicon glyphicon-list-alt"></i>
		<span>Referidos ingresados</span>
	</a>
</li>
<li>
	<a class="ajax-link" href="{{url()}}/logout">
		<i class="glyphicon glyphicon-log-out"></i>
		<span>Salir</span>
	</a>
</li>

