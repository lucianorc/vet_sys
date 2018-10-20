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
            <button class="btn btn-sm btn-success" action="pets" customer-id="{{ $customer->id }}" data-toggle="modal" data-target="#showPets">
              <i class="fas fa-paw"></i>
            </button>
            <button type="button" class="btn btn-sm btn-warning" action="view" customer-id="{{ $customer->id }}" data-toggle="modal" data-target="#showCustomer">
              <i class="fas fa-eye"></i>
            </button>
            <a href="{{ route('customers.update', $customer->id) }}">
              <button class="btn btn-sm btn-primary">
                <i class="fas fa-pen"></i>
              </button>
            </a>
            <button class="btn btn-sm btn-danger" action="delete" customer-id="{{ $customer->id }}">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('customers._showCustomer')
@include('customers._showPets')
@endsection

@section('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/common/action_handler.js') }}"></script>
<script>

  const table = document.querySelector('tbody')

  table.addEventListener('click', e => {
    e.preventDefault
    const button = e.target

    if (button.classList.value.includes('warning')) {
      handleAction(button).then(customer => {
        Object.entries(customer).forEach( (data, index) => {
          document.getElementById('customer-' + data[0]).innerHTML = data[1]
        })
      })
    } else if (button.classList.value.includes('success')) {
      const customer = button.attributes['customer-id'].nodeValue
      handleAction(button).then(customer => {
        document.querySelector('h5#showPetsLabel>span').innerHTML = customer.name

        if (customer.pets.length === 0) {
          document.getElementById('no-pet').style.display = 'block'
          document.querySelector('#pet-list>tbody').innerHTML = ''
        } else {
          document.getElementById('no-pet').style.display = 'none'

          customer.pets.forEach(pet => {
            console.log(pet)
            document.querySelector('#pet-list>tbody').innerHTML = `
              <tr>
                <td>${pet.name}</td>
                <td>${pet.specie}</td>
                <td>${pet.race}</td>
              </tr>
            `
          })
        }
      })
    }
  })

</script>
@endsection