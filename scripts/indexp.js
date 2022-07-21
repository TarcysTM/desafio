showData();
function showData(){
    const url = 'http://localhost/pizzaria-hi-tech2/readp.php';
    fetch(url,{
        method:"GET"        
    }).then(response => response.text())
    .then(response => results.innerHTML=response)
    .catch(err => console.log(err))
}

function createPizza(){
    const name = document.getElementById('namep').value
    const valor = document.getElementById('ingredientesp').value

    const form = new FormData()

    form.append('namep', name);
    form.append('ingredientesp', valor);

    const url = 'http://localhost/pizzaria-hi-tech2/cadastrop.php';

    fetch(url,{
        method:'POST', 
        body: form
    }).then(response =>{
        response.json().then(result =>{
            Swal.fire(result.message); 

            document.getElementById('namep').value = "";
            document.getElementById('ingredientesp').value = "";
            
        })
    }).catch(err => console.log(err))
    $i=1;
}

function remove(id){
    const form = new FormData();
    form.append('id_pizza', id);

    const url = 'http://localhost/pizzaria-hi-tech2/removep.php';

    Swal.fire({
        title: 'TEM CERTEZA QUE DESEJA EXCLUIR A PIZZA?',
        text: "NAO PODERA SER DESFEITO",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'EXCLUIR!',
        cancelButtonText: 'CANCELAR!'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
            method: "POST",
            body: form
        }).then(response =>{
            response.json().then(data =>{
                Swal.fire(data.message);
                showData();
                })
            }).catch(err => console.log(err))
        }
      })
}

function getId(id){
    const form = new FormData();
    form.append('id_pizza', id);
    const url = 'http://localhost/pizzaria-hi-tech2/get_idp.php';

    fetch(url,{
        method:"POST",
        body:form
    }).then(response=>{
        response.json().then(data=>{
            window.localStorage.setItem('user',JSON.stringify(data));
            window.location.href="updatep.html";
        })
    })
}


userData();
function userData(){
    const data = JSON.parse(localStorage.getItem('user'));
    const user = data[0];

    document.getElementById('id').value = user.id_pizza;
    document.getElementById('namep-1').value = user.nome_pizza;
    document.getElementById('ingredientesp-1').value = user.ingredientes_pizza;
}

function updatePizza(){
    const id = document.getElementById('id').value;
    const name = document.getElementById('namep-1').value;
    const ingredientes = document.getElementById('ingredientesp-1').value;

    const form = new FormData();

    form.append('id', id);
    form.append('namep', name);
    form.append('ingredientesp-1', ingredientes);

    const url = 'http://localhost/pizzaria-hi-tech2/updatep.php';

    fetch(url,{
        method:"POST",
        body:form
    }).then(response =>{
        response.json().then(data =>{
            Swal.fire(data.message).then(isConfirmed =>{
                if(isConfirmed){
                    window.location.href = 'indexp.html';
                    window.localStorage.removeItem('user');
                }
            });
        })
    })


}