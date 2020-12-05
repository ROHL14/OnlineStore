const newProducts = document.getElementById("newProducts");
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

function cargarDatos() {
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
}

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
  newProducts.innerHTML = html;
}
