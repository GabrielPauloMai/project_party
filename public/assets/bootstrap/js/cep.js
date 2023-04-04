
function cep(url) {
    let request = new XMLHttpRequest();
    request.open("GET", url, false);
    request.send();
    let data = request['responseText'];
    return data;
}

function select(usuario) {
    let opt = document.createElement("option");
    opt.value = usuario.id;
    opt.innerHTML = usuario.nome;
    // opt.className = "text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9";

    return opt;
}

function api(url) {
    let data = cep(url);
    let usuarios = JSON.parse(data);
    return usuarios;
}

function criaSelect(tag, usuarios) {
    let tabela = document.getElementById(tag);
    usuarios.forEach(element => {
        let linha = select(element);
        tabela.appendChild(linha);
    })

}

function valuer(valor) {
    let idElement = document.getElementById(valor);
    return idElement;
}

function city() {
    let idElement = valuer("state");
    let sv = idElement.options[idElement.selectedIndex].value;
    const api2 = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + sv + "/municipios";
    usuarios = api(api2);

    criaSelect("city", usuarios);

}

function state() {
    const api1 = "https://servicodados.ibge.gov.br/api/v1/localidades/regioes/4/estados";
    usuarios = api(api1);

    criaSelect("state", usuarios);
}



function main() {

    let selec = valuer("state");
    selec.addEventListener("click", x);
    function x() {
        state();
        selec.removeEventListener('click', x);
        
    }



    let selec2 = valuer("city");
    selec2.addEventListener("click", y);
    function y() {
        city();
        selec2.removeEventListener('click', y);
        let idElement = valuer("state");
        if (selec.options[idElement.selectedIndex].value == 42) {
            let idElement = valuer("city");
            return idElement.value = "4204509";

        };
    };


}
main();




