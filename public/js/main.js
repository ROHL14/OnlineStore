/*const slider = document.getElementsByClassName("slick-track");
const API = new Api();
const objDatos = {
  records: [],
  recordsFilter: [],
  currentPage: 1,
  filter: "",
};
const marcas = {
  records: [],
};
const categorias = {
  records: [],
};

// Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatos);
}

// Funciones
/*function cargarDatos() {
  API.loadProductos()
    .then((data) => {
      if (data.success) {
        objDatos.records = data.records;
        objDatos.currentPage = 1;
        createCards();
        console.log(objDatos);
        return API.loadCategorias();
      } else {
        //mensaje.textContent = data.msj;
      }
    })
    .then((data) => {
      //rellenarCategorias(data.records);
      categorias.records = data.records;
      console.log(categorias);
      return API.loadMarcas();
    })
    .then((data) => {
      //rellenarMarcas(data.records);
      marcas.records = data.records;
      console.log(marcas);
    })
    .catch((error) => {
      console.error("Error msg:", error);
    });
}  */

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

function createCards() {
  console.log(slider[0]);
  let html = "";
  var node = document.createElement("div");
  objDatos.records.forEach((item, index) => {
    const {
      nombre_producto,
      precio_producto,
      descripcion,
      imagen,
      id_categoria,
      id_marca,
    } = item;
    html += `
      <div class="product slick-slide slick-cloned">
        <div class="product-img">
          <img src="${imagen}" alt="" />
          <div class="product-label">
            <span class="sale">-30%</span>
            <span class="new">NUEVO</span>
          </div>
        </div>
        <div class="product-body">
          <h3 class="product-name">
            <a href="product.html">${nombre_producto}</a>
          </h3>
          <h4 class="product-price">
            $ <del class="product-old-price">$${precio_producto}</del>
          </h4>
          <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <div class="product-btns">
            <button class="quick-view">
              <i class="fa fa-eye"></i><span class="tooltipp">Ver</span>
            </button>
          </div>
        </div>
        <div class="add-to-cart">
          <button class="add-to-cart-btn">
            <i class="fa fa-shopping-cart"></i> Agregar al carro
          </button>
        </div>
      </div>`;
  });
  slider[0].innerHTML += html;
  //slider.appendChild(node);
  //crearPagination();
}*/
