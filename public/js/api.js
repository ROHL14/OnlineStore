const BASE_API = "/OnlineStore/";

class Api {
  async validarLogin(form) {
    const query = await fetch(`${BASE_API}login/validar`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  // Usuarios
  async loadData() {
    const query = await fetch(`${BASE_API}usuarios/getAll`);
    const data = await query.json();
    return data;
  }

  async saveUser(form) {
    const query = await fetch(`${BASE_API}usuarios/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  async getOneUser(id) {
    const query = await fetch(`${BASE_API}usuarios/getOneUser/?id=${id}`);
    const data = await query.json();
    return data;
  }

  async deleteUser(id) {
    const query = await fetch(`${BASE_API}usuarios/deleteUser/?id=${id}`);
    const data = await query.json();
    return data;
  }

  // Productos
  async loadProductos() {
    const query = await fetch(`${BASE_API}productos/getAll`);
    const data = await query.json();
    return data;
  }

  async saveProducto(form) {
    const query = await fetch(`${BASE_API}productos/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  async getOneProducto(id) {
    const query = await fetch(`${BASE_API}productos/getOneProducto?id=${id}`);
    const data = await query.json();
    return data;
  }

  async getOneProductoJoin(id) {
    const query = await fetch(
      `${BASE_API}productos/getOneProductoJoin?id=${id}`
    );
    const data = await query.json();
    return data;
  }

  async deleteProducto(id) {
    const query = await fetch(`${BASE_API}productos/deleteProducto?id=${id}`);
    const data = await query.json();
    return data;
  }

  async loadCategorias() {
    const query = await fetch(`${BASE_API}productos/getAllCategorias`);
    const data = await query.json();
    return data;
  }

  // Carrito
  async loadCarrito() {
    const query = await fetch(`${BASE_API}carrito/getAll`);
    const data = await query.json();
    return data;
  }

  async saveCarrito(form) {
    const query = await fetch(`${BASE_API}carrito/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  async getOneCarrito(id) {
    const query = await fetch(`${BASE_API}carrito/getOneCarrito?id=${id}`);
    const data = await query.json();
    return data;
  }

  async deleteCarrito(id) {
    const query = await fetch(`${BASE_API}carrito/deleteCarrito?id=${id}`);
    const data = await query.json();
    return data;
  }

  // Categorias
  async loadCategoriasData() {
    const query = await fetch(`${BASE_API}categorias/getAll`);
    const data = await query.json();
    return data;
  }

  async saveCategoria(form) {
    const query = await fetch(`${BASE_API}categorias/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  async getOneCategoria(id) {
    const query = await fetch(`${BASE_API}categorias/getOneCategoria?id=${id}`);
    const data = await query.json();
    return data;
  }

  async deleteCategoria(id) {
    const query = await fetch(`${BASE_API}categorias/deleteCategoria?id=${id}`);
    const data = await query.json();
    return data;
  }

  // Marcas
  async loadMarcasData() {
    const query = await fetch(`${BASE_API}marcas/getAll`);
    const data = await query.json();
    return data;
  }

  async saveMarca(form) {
    const query = await fetch(`${BASE_API}marcas/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  async getOneMarca(id) {
    const query = await fetch(`${BASE_API}marcas/getOneMarca?id=${id}`);
    const data = await query.json();
    return data;
  }

  async deleteMarca(id) {
    const query = await fetch(`${BASE_API}marcas/deleteMarca?id=${id}`);
    const data = await query.json();
    return data;
  }
}
