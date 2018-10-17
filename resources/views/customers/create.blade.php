@extends('layouts.default')

@section('content')
  <form action="{{ route('customers.create') }}" method="POST" autocomplete="off">
    @include('customers._form')
  </form>
@endsection