
window.addEventListener("load", inicio);

function inicio() {
    var lastId = 0;
    mostrar();
    document.getElementById("mais").addEventListener("click", mostrarMais);
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function mostrar() {
    var objecto = {"type": "show"};
    onReady(objecto);
}

function mostrarMais() {
    var objecto = {"type": "showMore", "lastid": parseInt(lastId)};
    
    document.getElementById('spinner').style.display = "block";
    
    onReady(objecto);
}

function onReady(objecto) {
    var tbody = document.getElementsByTagName("tbody")[0];
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = async function () {               
        if(this.readyState == 4 && this.status == 200) {
            var array = JSON.parse(this.responseText);
            
            await sleep(1000);
            
            for(x in array) {
                var tr = document.createElement("tr");
                tr.innerHTML = "<td>"+ array[x][0] +"</td>";
                tr.innerHTML += "<td>"+ array[x][1] +"</td>";
                tr.innerHTML += "<td>"+ array[x][2] +"</td>";
                
                lastId = array[x][0];
                
                tbody.appendChild(tr);
            }
            document.getElementById('spinner').style.display = "none";
        }
    }
    var parametros = JSON.stringify(objecto);
    xhr.open("POST", "datas.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("objecto="+parametros);
}
