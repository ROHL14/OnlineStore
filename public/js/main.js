<<<<<<< HEAD
/*const slider = document.getElementsByClassName("slick-track");
=======
const newProducts = document.getElementById("newProducts");
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
const API = new Api();
const objDatos = {
  records: [],
  recordsFilter: [],
  currentPage: 1,
  filter: "",
};

// Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatos);
}

<<<<<<< HEAD
// Funciones
/*function cargarDatos() {
=======
function cargarDatos() {
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
  API.loadProductos()
    .then((data) => {
      if (data.success) {
        objDatos.records = data.records;
        objDatos.currentPage = 1;
        createCards();
      } else {
        mensaje.textContent = data.msj;
      }
    })
    .catch((error) => {
      console.error("Error msg:", error);
    });
}  */

<<<<<<< HEAD
/*function rellenarCategorias(records) {
  //idCategoria.innerHTML = "";
  records.forEach((item) => {
    const { id_categoria, categoria } = item;
    const optionCategoria = document.createElement("option");
    optionCategoria.value = id_categoria;
    optionCategoria.textContent = categoria;
    //idCategoria.append(optionCategoria);
  });
}

function rellenarMarcas(records) {
  //idMarca.innerHTML = "";
  records.forEach((item) => {
    const { id_marca, marca } = item;
    const optionMarca = document.createElement("option");
    optionMarca.value = id_marca;
    optionMarca.textContent = marca;
    //idMarca.append(optionMarca);
  });
}

=======
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
function createCards() {
  let html = "";

  objDatos.records.forEach((item, index) => {
    const {
      id_producto,
      nombre_producto,
      precio_producto,
      descripcion,
      imagen,
      categoria,
      marca,
    } = item;
    if (index < 3) {
      html += `
      <div class="card">
        <img src="${imagen}" alt="" />
        <a class="product-link" href="/OnlineStore/productos/${id_producto}">
          <h1>${nombre_producto}</h1>
        </a>
        <p class="price">$${precio_producto}</p>
        <p>${descripcion}</p>
        <p>${marca}</p>
        <p>${categoria}</p>
        <p><button>Agregar al carro</button></p>
      </div>
      `;
    }
  });
<<<<<<< HEAD
  slider[0].innerHTML += html;
  //slider.appendChild(node);
  //crearPagination();
}*/
=======
  newProducts.innerHTML = html;
}
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
