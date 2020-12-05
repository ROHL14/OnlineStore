const newProducts = document.getElementById("newProducts");
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
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-product">
            <div class="product-thumb">
              <img class="img-scard" src="${imagen}" alt="">
            </div>
            <div class="product-title">
              <h3><a href="#">${nombre_producto}</a></h3>
            </div>
            <div class="product-scard-btns">
              <a href="#" class="a-scard scard-btn-small mr-2">$${precio_producto}</a>
              <a href="#" class="a-scard scard-btn-round mr-2"><i class="fa fa-shopping-cart"></i></a>
            </div>
          </div>
        </div>
      `;
    }
  });
  newProducts.innerHTML = html;
}
