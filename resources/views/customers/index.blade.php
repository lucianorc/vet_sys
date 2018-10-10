@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row justify-content-end">
    <a href="/customers/create">
      <button type="button" class="btn btn-dark">
        Criar cliente
      </button>
    </a>
  </div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $customer)
      <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->phone }}</td>
        <td>
          <div class="btn-group pull-right" role="group">
            <button class="btn btn-warning pull-right">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-primary pull-right">
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-danger pull-right">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection