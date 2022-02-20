@extends('dashboard.master')

@section('content')
    <section class="create-form-style pt-3">

        {!! Form::open( ['route' => ['courses.store'], 'method' => 'post']) !!}
        <div class="row cards py-1">
            <h5 class="d-flex col-sm-10 col-md-10 col-lg-10 col-xl-11 align-items-center third-color">
                <span class="material-icons">
                    edit
                </span>
                @lang("edit course")
            </h5>
            <a class="d-flex card col-sm-2 col-md-2 col-lg-2 col-xl-1 btn btn-outline-primary text-center rounded pe-4 pe-xl-4 pe-lg-5 pe-sm-3"
                href="{{ route('courses.index') }}" class="btn btn-default">
                <span class="d-flex">
                    @lang('flash.cancel')
                    <span class="material-icons pt-1">
                        chevron_left
                    </span>
                </span>
            </a>
        </div>

        <div class="card row">


            <div class="card-body">
                <div class="row">
                    @include('dashboard.courses.fields')
                </div>
            </div>

            <div class="card-footer justify-content-end">
                <button class="d-flex btn btn-primary justify-content-center col-lg-3 col-xl-3 col-sm-12 master-bgcolor"
                    type="submit">
                    <span class="material-icons text-white pt-1 px-2" style="font-size:20px;">
                        save
                    </span>
                    {!! __('flash.save') !!}
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
