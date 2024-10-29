<section id="categories" class="padding-large pt-0">
    <div class="container">
        <div class="section-title overflow-hidden mb-4">
            <h3 class="d-flex align-items-center">Categories</h3>
        </div>
        <div class="row">
            @foreach($categorias as $categoria)
            <div class="col-md-4">
                <div class="card mb-4 border-0 rounded-3 position-relative">
                    <a href="{{ route('categorias.show', $categoria->cat_id) }}">
                        <img src="{{ asset('images/' . $categoria->imagem) }}" class="img-fluid rounded-3" alt="{{ $categoria->nome }}">
                        <h6 class="position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3">
                            <span class="text-white">{{ $categoria->nome }}</span>
                        </h6>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Botão para redirecionar ao CRUD de categorias -->
      
</section>
