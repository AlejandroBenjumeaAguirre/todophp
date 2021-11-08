listarTareas();

let formulario = document.getElementById('formulario');
let respuesta = document.getElementById('respuesta');
let tarea = document.getElementById('tarea');
let eliminada = document.getElementById('eliminada');

function listarTareas() {
    fetch("listar.php", {
        method: "POST"
    }).then((res) => {
        return res.text() 
    })
    .catch(err => console.log(err))
    .then((res) => {
            tarea.innerHTML = res;
        }
    );
}

formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    
    var data = new FormData(formulario);
    

    fetch('post.php', {
        method: "POST",
        body: data,
    }).then((res) => {
        return res.text() 
    })
    .catch(err => console.log(err))
    .then((res) => {
        if(res==="ok") {
            listarTareas();
            respuesta.innerHTML = `
            <div class="alert alert-dismissible alert-success" id="alertacreated">
                <p>Tarea guardada satisfactoriamente</p>
            </div> 
            `
            formulario.reset();
        }else{
            console.log(res);
            listarTareas();
            respuesta.innerHTML = `
            <div class="alert alert-dismissible alert-success" id="alertaupdate">
                <p>Tarea Actualizada satisfactoriamente</p>
            </div> 
            `
            formulario.reset();
        }
    });

    setTimeout(() => {
        var element = document.getElementById('alertacreated');
        var element2 = document.getElementById('alertaupdate');
        element.parentNode.removeChild(element);
        element2.parentNode.removeChild(element2);
    }, 1000);
});

function eliminar(id, nombre) {
    fetch("eliminar.php", {
        method: "POST",
        body: id
    }).then(res => res.text())
    .then(res => {
        if(res === 'ok'){
            eliminada.innerHTML = `
            <div class="alert alert-danger" role="alert" id="alerta">
                La tarea ${nombre} fue eliminada.
            </div>
        `
        listarTareas();
        }
    
    });
   
   setTimeout(() => {
    var element = document.getElementById('alerta');
    element.parentNode.removeChild(element);
   }, 1000);
}

function actualizar(id) {
    fetch("./actualizar.php", {
        method: "POST",
        body: id
    }).then(res => res.json())
    .then((res) => {
        formulario.innerHTML = `
        <div class = "form-group">
            <input type="hidden" name="idt" id="idt" value"">
            <label for="nombre">Nombre de la tarea</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
        </div>
        
        <div class = "form-group">
            <label for="descripcion">descripcion de la tarea</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion">
        </div>
        <fieldset class="form-group">
            <legend class="mt-4">Estado</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="realizada" name="realizada" id="realizada" ${(res.id_estado==='2')?'checked': ''}>
                <label class="form-check-label" for="flexCheckDefault">
                    Realizada
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="cancelada" name="cancelada" id="cancelada" ${(res.id_estado==='3')?'checked':''}> 
                <label class="form-check-label" for="flexCheckChecked">
                    Cancelada
                </label>
            </div>
        </fieldset>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        `

        idt.value = res.id;
        nombre.value = res.nombre;
        descripcion.value = res.descripcion;

    });
}