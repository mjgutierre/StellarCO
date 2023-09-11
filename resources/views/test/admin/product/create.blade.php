<form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
  @csrf
  <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" />
  <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" />
  <input type="number" class="form-control mb-2" placeholder="Enter price" name="price" />
  <input type="number" class="form-control mb-2" placeholder="Enter quantity" name="quantity" />
  <input type="text" class="form-control mb-2" placeholder="Enter location" name="location" />
  <input class="form-control" type="file" name="image">
  &nbsp;
  <input type="submit" class="btn btn-primary" value="Send" />
</form>