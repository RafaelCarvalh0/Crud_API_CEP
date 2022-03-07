function consultaCep() {
    let $cep = document.querySelector("#cep").value.replace(/\D/g, '');
    let url = 'https://viacep.com.br/ws/' + $cep + '/json';
    let request = new XMLHttpRequest();

    request.open('GET', url);
    request.onerror = function (e) {
        document.querySelector('#return').innerHTML = 'API OFFLINE OU CEP INVÁLIDO';
    }
    
    request.onload = () => {
        let response = JSON.parse(request.responseText);

        if(response.erro === true) {
            document.querySelector('#return').innerHTML = 'CEP NÃO ENCONTRADO';
        }

        else {
            document.querySelector('#return').innerHTML = '<span style="color: #28A745;">CEP</span>: &nbsp;' +response.cep + '<br>' + 
            '<span style="color: #28A745;">Logradouro:</span> &nbsp;' + response.logradouro + '<br>' +
            '<span style="color: #28A745;">Bairro:</span> &nbsp; ' + response.bairro + '<br>' +
            '<span style="color: #28A745;">Cidade:</span> &nbsp;' + response.localidade + ' - ' + response.uf;
        }
    }

    request.send();
}