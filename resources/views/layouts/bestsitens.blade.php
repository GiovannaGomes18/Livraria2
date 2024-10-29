<section id="best-selling-items" class="position-relative padding-large">
  <div class="container">
      <div class="section-title d-md-flex justify-content-between align-items-center mb-4">
          <h3 class="d-flex align-items-center">Best Selling Items</h3>
          <a href="#" class="btn">View All</a>
      </div>
      <div class="position-absolute top-50 end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next product-slider-button-next">
          <svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
              <use xlink:href="#alt-arrow-right-outline"></use>
          </svg>
      </div>
      <div class="position-absolute top-50 start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev product-slider-button-prev">
          <svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
              <use xlink:href="#alt-arrow-left-outline"></use>
          </svg>
      </div>
      <div class="swiper product-swiper">
          <div class="swiper-wrapper">
              @foreach ($livros as $livro)
                  <div class="swiper-slide">
                      <div class="card position-relative p-4 border rounded-3">
                          @if ($livro->desconto)
                              <div class="position-absolute">
                                  <p class="bg-primary py-1 px-3 fs-6 text-white rounded-2">{{ $livro->desconto }}% off</p>
                              </div>
                          @endif
                          <img src="{{ asset('images/' . $livro->imagem) }}" class="img-fluid shadow-sm" alt="product item">
                          <h6 class="mt-4 mb-0 fw-bold"><a href="#">{{ $livro->titulo }}</a></h6>
                          <div class="review-content d-flex">
                              <p class="my-2 me-2 fs-6 text-black-50">{{ $livro->autor }}</p>
                              <div class="rating text-warning d-flex align-items-center">
                                  @for ($i = 0; $i < 5; $i++)
                                      <svg class="star {{ $i < $livro->rating ? 'star-fill' : '' }}">
                                          <use xlink:href="#star-fill"></use>
                                      </svg>
                                  @endfor
                              </div>
                          </div>
                          <span class="price text-primary fw-bold mb-2 fs-5">${{ $livro->preco }}</span>
                          <div class="card-concern position-absolute start-0 end-0 d-flex justify-content-end gap-2" style="bottom: 10px; margin-right: 10px;">
                              <button type="button" class="btn btn-dark btn-sm" onclick="addToCart('{{ $livro->livro_id }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to cart">
                                  <svg class="cart" width="20" height="20">
                                      <use xlink:href="#cart"></use>
                                  </svg>
                              </button>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
</section>

<script>
function addToCart(livro_id) {
    fetch(`/cart/add/${livro_id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ quantity: 1 }) // Exemplo: adicionando 1 unidade
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message); // Mensagem de sucesso
        } else {
            alert('Erro: ' + data.message); // Mensagem de erro
        }
    })
    .catch(error => console.error('Erro:', error));
}

</script>
