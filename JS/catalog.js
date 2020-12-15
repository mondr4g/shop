function imaxPrice(){
    document.getElementById('imaxPrice').innerHTML = "$" + document.getElementById('iprice').value;    
}

function fmaxPrice(){
    document.getElementById('fmaxPrice').innerHTML = "$" + document.getElementById('fprice').value;    
}

function getFilter() {
    let playera = document.getElementById('playera');
    let pantalon = document.getElementById('pantalon');
    let chamarra = document.getElementById('chamarra');
    let sudadera = document.getElementById('sudadera');
    let abrigo = document.getElementById('abrigo');
    let xs = document.getElementById('xs');
    let s = document.getElementById('s');
    let m = document.getElementById('m');
    let l = document.getElementById('l');
    let xl = document.getElementById('xl');
    let iprice = document.getElementById('iprice').value;
    let fprice = document.getElementById('fprice').value;

    let filter = '{';
    let all = false;

    if(playera.checked || pantalon.checked || chamarra.checked || sudadera.checked || abrigo.checked || xs.checked || s.checked || m.checked || l.checked || xl.checked)
        all = true;

    if(playera.checked) 
        filter += ' "playera" : "true", ';
    else
        filter += ' "playera" : "false", ';

    if(pantalon.checked) 
        filter += ' "pantalon" : "true", ';
    else
        filter += ' "pantalon" : "false", ';

    if(chamarra.checked) 
        filter += ' "chamarra" : "true", ';
    else
        filter += ' "chamarra" : "false", ';
        
    if(sudadera.checked) 
        filter += ' "sudadera" : "true", ';
    else
        filter += ' "accesorio" : "false", ';
    
    if(abrigo.checked) 
        filter += ' "abrigo" : "true", ';
    else
        filter += ' "abrigo" : "false", ';

    if(xs.checked) 
        filter += ' "xs" : "true", ';
    else
        filter += ' "xs" : "false", ';

    if(s.checked) 
        filter += ' "s" : "true", ';
    else
        filter += ' "s" : "false", ';
        
    if(m.checked) 
        filter += ' "m" : "true", ';
    else
        filter += ' "m" : "false", ';
        
    if(l.checked) 
        filter += ' "l" : "true", ';
    else
        filter += ' "l" : "false", ';
        
    if(xl.checked) 
        filter += ' "xl" : "true", ';
    else
        filter += ' "xl" : "false", ';
        
    filter += ' "minPrice" : ' + iprice + ', ';
    filter += ' "maxPrice" : ' + fprice + ', ';
    filter += ' "band" : ' + all + ' }';
    let obj = JSON.parse(filter);

    getRequest(obj);
}

function getRequest(data) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "recarga_productos.php");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);    
        }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("json=" + JSON.stringify(data));
}

function masCant() {
    let value = parseInt(document.getElementById('cant').innerHTML);
    console.log(value);
    
    if(value < 10){
        value++;
        document.getElementById('msgCant').innerHTML = ""; 
    }
    else
        document.getElementById('msgCant').innerHTML = "Max 10 articulos por compra";

    document.getElementById('cant').innerHTML = value;    
}

function menosCant() {
    let value = parseInt(document.getElementById('cant').innerHTML);
    console.log(value);
    
    if(value > 1){
        value--;
        document.getElementById('msgCant').innerHTML = ""; 
    }
    else
        document.getElementById('msgCant').innerHTML = "Min 1 articulos por compra";

    document.getElementById('cant').innerHTML = value;      
}

