@csrf

<div class="form-group">
  <label for="customer_name">Nome</label>
  <input type="text" name="name" id="customer_name" class="form-control" value="{{ isset($customer) ? $customer->name : '' }}">
</div>

<div class="form-group">
  <label for="customer_phone">Telefone</label>
  <input type="text" name="phone" id="customer_phone" class="form-control" value="{{ isset($customer) ? $customer->phone : '' }}">
</div>

<div class="form-group">
  <label for="customer_address">Endereço</label>
  <input type="text" name="address" id="customer_address" class="form-control" value="{{ isset($customer) ? $customer->address : '' }}">
</div>

<div class="form-group">
  <label for="customer_birthday">Data de Nascimento</label>
  <input type="text" name="birthday" id="customer_birthday" class="form-control" value="{{ isset($customer) ? $customer->birthday : '' }}">
</div>

<div class="form-group">
  <label for="customer_email">Email</label>
  <input type="text" name="email" id="customer_email" class="form-control" value="{{ isset($customer) ? $customer->email : '' }}">
</div>

<button type="submit" class="btn btn-sm btn-primary">Enviar</button>