<div>
  <p>{{ $viewData['product']->getName()}}</p>
  <p>{{ $viewData['product']->getDescription()}}</p>
  <p>{{ $viewData['product']->getPrice()}}</p>
  <p>{{ $viewData['product']->getQuantity()}}</p>
  <p>{{ $viewData['product']->getLocation()}}</p>
</div>
<form action="{{ route('admin.product.destroy', $viewData['product']->getId()) }}" method="POST">
  @csrf
  @method('DELETE')
  <h2>Delete Product</h2>
  <button type="submit" class="btn btn-danger">Delete</button>
</form>
<div>
  <form action="{{ route('admin.product.update', $viewData['product']->getId()) }}" method="POST">
    @csrf
    @method('PUT')
    <h2>Update Product</h2>
      <input type="text" name="name" class="form-control" value="{{ $viewData['product']->getName() }}" required>
      <input type="text" name="description" class="form-control" value="{{ $viewData['product']->getDescription() }}" required>
      <input type="number" name="price" class="form-control" value="{{ $viewData['product']->getPrice() }}" required>
      <input type="number" name="quantity" class="form-control" value="{{ $viewData['product']->getQuantity() }}" required>
      <input type="text" name="location" class="form-control" value="{{ $viewData['product']->getLocation() }}" required>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
  