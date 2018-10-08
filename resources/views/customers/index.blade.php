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
      <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>(98) 98888-8888</td>
        <td>
          <div class="btn-group pull-left" role="group">
            <button class="btn btn-primary pull-left">
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-danger pull-left">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection