 
//Verificar se o tipo de utilizador do departamento é estudante e mostrar o curso
document.getElementById("nivel").style.display = 'none';
document.getElementById("tipo").onchange = function() {
    ocultar();
};
function ocultar() {
    var dado = document.getElementById("tipo");
    var itemSelecionado = dado.options[dado.selectedIndex].value;
        if (itemSelecionado==="Estudante") {
            document.getElementById("curso").style.display = 'block';
            document.getElementById("numero_mecanografico").style.display = 'block';
            document.getElementById("nivel").style.display = 'none';
        }else{
            document.getElementById("curso").style.display = 'none';
            document.getElementById("numero_mecanografico").style.display = 'none';
            document.getElementById("nivel").style.display = 'block';
        }
}
 