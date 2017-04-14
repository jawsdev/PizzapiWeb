@extends('layouts.dashboard-template')
@section("title", "Manage User Roles")
@section('content')
    <table class="table table-bordered">
        <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail</th>
        <th>Customer</th>
        <th>Pizzaiolo</th>
        <th>Manager</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{ route('manager.assign') }}" method="post">
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Customer') ? 'checked' : '' }} name="role_customer"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Pizzaiolo') ? 'checked' : '' }} name="role_pizzaiolo"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Manager') ? 'checked' : '' }} name="role_manager"></td>
                    {{ csrf_field() }}
                    <td><button type="submit" class="btn btn-primary" type="submit">Assign Roles</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')

@endsection