
<div class="form-group">
	<label for="{{{ isset($name) ? $name : ''}}}" class="col-lg-2 control-label">{{{ isset($label) ? $label : ''}}}</label>
	<div class="col-lg-5">
{!! Form::text($name, null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Clic para escojer la fecha', 'id' => 'datepicker4'))  !!}

	</div>
</div>


