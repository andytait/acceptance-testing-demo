<fieldset class="form-group {{ $errors->has($name) ? 'has-danger' :'' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <?php $classes = $errors->has($name) ? 'form-control form-control-danger' : 'form-control c-select' ?>
    {{ Form::select($name, $list, $value = null, $attributes = ['id' => $name, 'class' => $classes]) }}
    {!! $errors->first($name,'<span class="help-block">:message</span>') !!}
</fieldset>