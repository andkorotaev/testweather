@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Feedback List') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($data) && $data->count())
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->message }}</td>
                                        <td>{{ $value->created_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
