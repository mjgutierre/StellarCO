<div>
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <a 
          href="{{ route('product.show', ['id'=> $product->getId()]) }}" 
          class="btn bg-primary text-white"
        >
          {{ $product->getName() }}
        </a>
        <p>{{ $product->getDescription() }}</p>
        <p>{{ $product->getPrice() }}</p>
        <p>{{ $product->getQuantity() }}</p>
        <p>{{ $product->getLocation() }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>