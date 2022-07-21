showData();
function showData(){
    const url = 'http://localhost/pizzaria-hi-tech2/montar.php';
    fetch(url,{
        method:"GET"        
    }).then(response => response.text())
    .then(response => results.innerHTML=response)
    .catch(err => console.log(err))
}