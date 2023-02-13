
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





function main() {

    const api1 = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios/" + val;
    usuarios = api(api1);
   


}
main();




