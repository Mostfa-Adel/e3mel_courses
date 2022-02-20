@extends('dashboard.master')

@section('content')
    @include('flash::message')

    <div class="card-body pt-6">

        <a class="mb-2 d-flex card col-sm-2 col-md-2 col-lg-2 col-xl-1 btn btn-outline-primary text-center rounded back pe-4 pe-xl-4 pe-lg-5 pe-sm-3"
            href="{{ route('courses.create') }}">
            <span style="white-space:nowrap" class="d-flex">
                New Course

            </span>
        </a>
        <!--begin::Table-->
        {{ $dataTable->table() }}
        <!--end::Table-->

        {{-- Inject Scripts --}}
        {{-- @push('scripts')
            {{ $dataTable->scripts() }}
        @endpush --}}
        @push('scripts')

            <script src="{{ asset('js/courses-index.js') }}"></script>
        @endpush

    </div>
@endsection
