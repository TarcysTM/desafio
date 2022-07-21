showData();
function showData(){
    const url = 'http://localhost/pizzaria-hi-tech2/read.php';
    fetch(url,{
        method:"GET"        
    }).then(response => response.text())
    .then(response => results.innerHTML=response)
    .catch(err => console.log(err))
}

function createIngredient(){
    const name = document.getElementById('name').value
    const valor = document.getElementById('valor').value

    const form = new FormData()

    form.append('name', name);
    form.append('valor', valor);

    const url = 'http://localhost/pizzaria-hi-tech2/cadastro.php';

    fetch(url,{
        method:'POST', 
        body: form
    }).then(response =>{
        response.json().then(result =>{
            Swal.fire(result.message); 

            document.getElementById('name').value = "";
            document.getElementById('valor').value = "";
            
        })
    }).catch(err => console.log(err))
}

function remove(id){
    const form = new FormData();
    form.append('id_ingr', id);

    const url = 'http://localhost/pizzaria-hi-tech2/remove.php';

    Swal.fire({
        title: 'TEM CERTEZA QUE DESEJA EXCLUIR ESSE INGREDIENTE?',
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
    form.append('id_ingr', id);
    const url = 'http://localhost/pizzaria-hi-tech2/get_id.php';

    fetch(url,{
        method:"POST",
        body:form
    }).then(response=>{
        response.json().then(data=>{
            window.localStorage.setItem('user',JSON.stringify(data));
            window.location.href="update.html";
        })
    })
}
userData();
function userData(){
    const data = JSON.parse(localStorage.getItem('user'));
    const user = data[0];

    document.getElementById('id').value = user.id_ingr;
    document.getElementById('name-1').value = user.nome_ingr;
    document.getElementById('valor-1').value = user.valor_ingr;
}

function updateIngredient(){
    const id = document.getElementById('id').value;
    const name = document.getElementById('name-1').value;
    const valor = document.getElementById('valor-1').value;

    const form = new FormData();

    form.append('id', id);
    form.append('name', name);
    form.append('valor', valor);

    const url = 'http://localhost/pizzaria-hi-tech2/update.php';

    fetch(url,{
        method:"POST",
        body:form
    }).then(response =>{
        response.json().then(data =>{
            Swal.fire(data.message).then(isConfirmed =>{
                if(isConfirmed){
                    window.location.href = 'index.html';
                    window.localStorage.removeItem('user');
                }
            });
        })
    })


}



