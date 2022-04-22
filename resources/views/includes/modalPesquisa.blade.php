<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div id="cabeca-modal" class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle"><i class="fas fa-search mr-1"></i>Pesquisar Cliente</h4>
                <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="validarForm">
                    @csrf
                    <p style="color:red">* Preencha um dos campos para efectivar a sua pesquisa.</p>
                    <br>
                    <div class="row">
                        <div class="col-6">        
                            <div class="form-group">
                                <label for="name">Loan Number</label>
                                <input id="loan" name="loan" type="text" class="form-control" placeholder="ex.:AC/P/K1234">
                            </div>
                        </div>
                        <div class="col-6">        
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="nome" name="nome" type="text" class="form-control" placeholder="ex.: Manzambi Kadima">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">        
                            <div class="form-group">
                                <label for="name">B.I nº</label>
                                <input id="bilhete" name="bilhete" type="text" class="form-control" placeholder="ex.:00324488LA034">
                            </div>
                        </div>
                        <div class="col-6">        
                            <div class="form-group">
                                <label for="name">Telefone</label>
                                <input id="telefone" name="telefone" type="number" class="form-control" placeholder="ex.:999 999 999">
                            </div>
                        </div>
                    </div>
                   
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-search mr-1"></i>Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>