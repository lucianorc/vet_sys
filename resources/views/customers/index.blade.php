@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row justify-content-end">
    <a href="{{ route('customers.create') }}">
      <button type="button" class="btn btn-dark">
        Criar cliente
      </button>
    </a>
  </div>
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $customer)
      <tr>
        <td scope="row">{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->phone }}</td>
        <td>
          <div class="btn-group pull-right" role="group">
            <button type="button" class="btn btn-sm btn-warning pull-right actions" action="view" customer-id="{{ $customer->id }}" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-sm btn-primary pull-right actions">
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-sm btn-danger pull-right actions">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informações do cliente #<span id="customer-id"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nome:</strong> <span id="customer-name"></span></p>
        <p><strong>Endereço:</strong> <span id="customer-address"></span></p>
        <p><strong>Data de Nascimento:</strong> <span id="customer-birthday"></span></p>
        <p><strong>Fone:</strong> <span id="customer-phone"></span></p>
        <p><strong>Email:</strong> <span id="customer-email"></span></p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/common/action_handler.js') }}"></script>
<script>

  const button = document.querySelector('tbody')

  button.addEventListener('click', e => {
    e.preventDefault
    if (e.target.localName.includes('button')) {
      handleAction(e.target).then(customer => {
        Object.entries(customer).forEach( (data, index) => {
          document.getElementById('customer-' + data[0]).innerHTML = data[1]
        })
      })
    }
  })

</script>
@endsection