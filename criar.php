<!-- FORM (CRIAR / EDITAR) -->
<div class="card p-3 mb-4" id="formCard" style="display:block;">
            <form id="formUsuario" method="POST" action="salvar.php">

                <input type="hidden" name="id" id="id">

                <div class="mb-2">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                </div>

                <div class="mb-2">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>

                <button class="btn btn-success">Salvar</button>

            </form>
        </div>