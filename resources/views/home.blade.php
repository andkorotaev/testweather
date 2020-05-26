@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Weather</div>

                <div class="card-body">
                    {!! $weatherHtml !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    {!! $weatherStyles !!}

    <style>
        .widget__row {
            height: 50px !important;
        }
        .tab .chart .value {
            margin-top: 0 !important;
        }
    </style>
@endpush
