document.addEventListener('DOMContentLoaded',async(e)=>{
    const tabla= document.querySelector('.campers');
    const options = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    };
    let res= await fetch('http://localhost/ApolT01-032/Incentivo/uploads/camper' ,options);
    res= await res.json();

    res.forEach(camper => {
        tabla.innerHTML+=`<tr>
        <th scope="row">${camper['idCamper']}</th>
        <td>${camper['nombreCamper']}</td>
        <td>${camper['apellidoCamper']}</td>
        <td>${camper['nombrePais']}</td>
        <td>${camper['nombreDep']}</td>
        <td>${camper['nombreReg']}</td>
        <td>${camper['fechaNac']}</td>
        <td><div class="contenedor-iconos"><button class="btn btn-primary btn-editar" data-id="${camper['idCamper']}">Editar</button>
        <button class="btn btn-danger btn-eliminar" data-id="${camper['idCamper']}">X</button></div></td>
      </tr>`;
    });

    const botonesELiminar=document.querySelectorAll('.btn-eliminar');

    async function eliminarCamper(options) {

        console.log(options);
        let res= await fetch("http://localhost/ApolT01-032/Incentivo/uploads/camper",options);

        res= await res.json();

        location.reload();
    }

    botonesELiminar.forEach( boton=>{
        boton.addEventListener('click', async e=>{
            options.method="DELETE";
            options.body=JSON.stringify({
                "id":e.target.dataset.id
            })

            eliminarCamper(options)

            
        });
    });

    const paises= document.querySelector('#pais');

    async function cargarPaises(){
        
        options.method="GET";
        let res= await fetch("http://localhost/ApolT01-032/Incentivo/uploads/camper/paises",options);

        res= await res.json();

        res.forEach(pais=>{
            paises.innerHTML+=`
            <option value="${pais['idPais']}" selected>${pais['nombrePais']}</option>
            `;
        })
        
    }

    paises.addEventListener('input',async (e) =>{
        options.method="GET";
        console.log("hola");
        let id = e.target;
        console.log(id);
        let res= await fetch(`http://localhost/ApolT01-032/Incentivo/uploads/camper/departamento/${id}`,options);
        res= await res.json();
    })

  

    cargarPaises();
    
})





