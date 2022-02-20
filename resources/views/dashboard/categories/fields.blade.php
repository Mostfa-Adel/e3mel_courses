<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'course name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 350]) !!}
    @if ($errors->has('name')) <p class="help-block text-danger">{{ $errors->first('name') }}</p> @endif

</div>


<div id="colfrom" class="form-group col-sm-6">
    <label for="active">activate :</label>
    {!! Form::select('active', ['deactivated', 'activated'], null, ['class' => 'form-control', 'placeholder' => 'choose..']) !!}
    @error('active') <p class="help-block text-danger">{{ $errors->first('active') }}</p> @enderror

</div>

