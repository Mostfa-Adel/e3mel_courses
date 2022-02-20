<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'course name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 350]) !!}
    @if ($errors->has('name')) <p class="help-block text-danger">{{ $errors->first('name') }}</p> @endif

</div>
<div class="form-group col-sm-6">
    {!! Form::label('views_count', 'views count:') !!}
    {!! Form::number('views_count', null, ['class' => 'form-control', 'min'=>0]) !!}
    @if ($errors->has('views_count')) <p class="help-block text-danger">{{ $errors->first('views_count') }}</p> @endif

</div>
<div class="form-group col-sm-6">
    {!! Form::label('hours', 'hours:') !!}
    {!! Form::number('hours', null, ['class' => 'form-control', 'min'=>0]) !!}
    @if ($errors->has('hours')) <p class="help-block text-danger">{{ $errors->first('hours') }}</p> @endif

</div>

<div id="colfrom" class="form-group col-sm-6">
    <label for="active">activate :</label>
    {!! Form::select('active', ['deactivated', 'activated'], null, ['class' => 'form-control', 'placeholder' => 'choose..']) !!}
    @error('active') <p class="help-block text-danger">{{ $errors->first('active') }}</p> @enderror

</div>
<div id="colfrom" class="form-group col-sm-6">
    <label for="levels">level :</label>
    {!! Form::select('levels', App\Models\Course::getTypes(), null, ['class' => 'form-control', 'placeholder' => 'choose..']) !!}
    @error('levels') <p class="help-block text-danger">{{ $errors->first('levels') }}</p> @enderror

</div>

<!-- description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if ($errors->has('description')) <p class="help-block text-danger">{{ $errors->first('description') }}</p> @endif

</div>
