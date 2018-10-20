@extends('layouts.default')

@section('content')
  <form action="{{ route('customers.update', $customer->id) }}" method="POST" autocomplete="off">
    @method('PUT')
    @include('customers._form')
  </form>
@endsection