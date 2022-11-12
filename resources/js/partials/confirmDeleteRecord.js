console.log('JS OK!');

//le funzioni vanno dichiarate in questo modo per essere utilizzate
window.askConfirm = function(id){
    if(confirm('Eliminare l\elemento?')){
        document.getElementById('deleteElement' + id).submit();
    }
}
