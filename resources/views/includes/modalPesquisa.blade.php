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
                <form id="formularioSalvar" method="post">
                    @csrf
                    <p style="color:red">* Selecione um dos campos para efectivar a sua pesquisa.</p>
                  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <div style="margin-left:7px;margin-top:10px" class="radio radio-info form-check-inline">
                                    <input type="radio" value="1" name="tipo" checked>
                                    <label for="inlineRadio1"> Bilhete </label>
                                </div>
                                <div class="radio form-check-inline">
                                    <input type="radio" value="2" name="tipo">
                                    <label for="inlineRadio2"> Nome </label>
                                </div>
                                <div class="radio form-check-inline">
                                    <input type="radio" value="3" name="tipo">
                                    <label for="inlineRadio2"> Telefone </label>
                                </div>
                                <div class="radio form-check-inline">
                                    <input type="radio" value="4" name="tipo">
                                    <label for="inlineRadio2"> Loan Number </label>
                                </div>
                            </div>
                        </div>
                        <div id="show_bi" class="col-12">        
                            <div class="form-group">
                                <label for="name">B.I nº</label>
                                <input id="bilhete" name="bilhete" type="text" class="form-control form-control-sm" placeholder="ex.:00324488LA034">
                            </div>
                        </div>
                        <div id="show_nome" style="display:none" class="col-12">        
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="nome" name="nome" type="text" class="form-control form-control-sm" placeholder="ex.: Manzambi Kadima">
                            </div>
                        </div>
                        <div id="show_telefone" style="display:none" class="col-12">        
                            <div class="form-group">
                                <label for="name">Telefone</label>
                                <input id="telefone" name="telefone" type="number" class="form-control form-control-sm" placeholder="ex.:999 999 999">
                            </div>
                        </div>
                        <div id="show_loan" style="display:none" class="col-12">        
                            <div class="form-group">
                                <label for="name">Loan Number</label>
                                <input id="loan" name="loan" type="text" class="form-control form-control-sm" placeholder="ex.:AC/P/K1234">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-right">
                        <button type="submit" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-search mr-1"></i>Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('input:radio[name=tipo]').change(function() {
            if(this.value == 1){
                document.getElementById("show_bi").style.display = 'block';
                document.getElementById("show_nome").style.display = 'none';
                document.getElementById("show_telefone").style.display = 'none';
                document.getElementById("show_loan").style.display = 'none';
            }
            if(this.value == 2){
                document.getElementById("show_bi").style.display = 'none';
                document.getElementById("show_nome").style.display = 'block';
                document.getElementById("show_telefone").style.display = 'none';
                document.getElementById("show_loan").style.display = 'none';
            }
            if(this.value == 3){
                document.getElementById("show_bi").style.display = 'none';
                document.getElementById("show_nome").style.display = 'none';
                document.getElementById("show_telefone").style.display = 'block';
                document.getElementById("show_loan").style.display = 'none';
            }
            if(this.value == 4){
                document.getElementById("show_bi").style.display = 'none';
                document.getElementById("show_nome").style.display = 'none';
                document.getElementById("show_telefone").style.display = 'none';
                document.getElementById("show_loan").style.display = 'block';
            }
        });
    });
</script>
