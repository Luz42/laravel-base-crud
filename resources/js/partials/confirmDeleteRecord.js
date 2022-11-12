window.sayHello = function(id){
    if(confirm('Eliminare l\elemento?')){
        document.getElementById('deleteElement' + id).submit();
    }
}
