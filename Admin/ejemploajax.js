var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
    if(objXMLHttpRequest.readyState === 4){
        if(objXMLHttpRequest.status === 200){
            alert(objXMLHttpRequest.responseText);
        }else{
            alert('Error code: ' + objXMLHttpRequest.status);
            alert('Error Message: ' + objXMLHttpRequest.statusText);
        }
    }
}
objXMLHttpRequest.open('GET', 'URLDESTINO.PHP');
objXMLHttpRequest.send();

$.ajax({
    type: "POST",
    url: 'URLDESTINO.PHP',
    data: $('#form').serialize(),
    success:function(response){
        var jsonData = JSON.parse(response);
        if(jsonData.success == "1"){
            console.log('exito');
        }else{
            alert('Habido un error intente nuevamente.');
        }
    }

});

