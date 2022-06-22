const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
const btnNewEmpleado = document.getElementById("btn-newEmpleado");
const DivAgregarEmpleado = document.getElementById("new-empleado");
const DivModiProducto = document.getElementById("modificacion-producto");

//FUNCIONES BOTONES

const urlEliminarEmpleado = "../controllers/EliminarEmpleado.php?id=";
function btnEliminarEmpleado(id) {
  Swal.fire({
    title: "¿Desea eliminar el empleado?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(() => {
        window.location = urlEliminarEmpleado + id;
      }, "1300");
    }
  });
}

function btnGuardarModificacion() {
  var urlEmpleados = "../controllers/Empleados.php";
  const formulario = document.getElementById("formulario_modificacion");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    Swal.fire({
      title: "¿Quieres guardar los cambios?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Modificaciones hechas!",
          icon: "success",
          showConfirmButton: false,
        });
        fetch("../controllers/ModificarEmpleado.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = urlEmpleados;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = urlEmpleados;
        }, "1300");
      }
    });
  });
}

function btnCancelarModificacion() {
  var urlEmpleados = "../controllers/Empleados.php";
  window.location = urlEmpleados;
}

function confirmarAltaAdelanto() {
  var urlAdelantos = "../controllers/Adelantos.php";
  const formulario = document.getElementById("formulario_altaAdelanto");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    Swal.fire({
      title: "¿Confirmar alta de adelanto?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Adelanto confirmado!",
          icon: "success",
          showConfirmButton: false,
        });
        fetch("../controllers/DarAltaAdelantos.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = urlAdelantos;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = urlAdelantos;
        }, "1300");
      }
    });
  });
}

function btnModificarEmpleado(
  id,
  nombre,
  apellido,
  dni,
  sueldo,
  direccion,
  altura,
  telefono
) {
  DivModiProducto.style.display = "block";
  btnNewEmpleado.style.display = "none";

  const lista_empleados = document.getElementById("lista_empleados");
  lista_empleados.style.display = "none";

  document.getElementById("mod-id").value = id;
  document.getElementById("mod-nombre").value = nombre;
  document.getElementById("mod-apellido").value = apellido;
  document.getElementById("mod-dni").value = dni;
  document.getElementById("mod-sueldo").value = sueldo;
  document.getElementById("mod-direccion").value = direccion;
  document.getElementById("mod-altura").value = altura;
  document.getElementById("mod-telefono").value = telefono;
}

//PROVEEDOR

const urlEliminarProveedor = "../controllers/EliminarProveedor.php?id=";
function btnEliminarProveedor(id) {
  Swal.fire({
    title: "¿Desea eliminar el proveedor?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(() => {
        window.location = urlEliminarProveedor + id;
      }, "1300");
    }
  });
}

function btnModificarProveedor(
  id,
  nombre_empresa,
  razon_social,
  cuit,
  direccion,
  altura,
  telefono
) {
  DivModiProducto.style.display = "block";
  btnNewEmpleado.style.display = "none";

  const lista_empleados = document.getElementById("lista_empleados");
  lista_empleados.style.display = "none";

  document.getElementById("mod-id-proveedor").value = id;
  document.getElementById("nombre_empresa-mod").value = nombre_empresa;
  document.getElementById("razon_social-mod").value = razon_social;
  document.getElementById("cuit-mod").value = cuit;
  document.getElementById("direccion-mod").value = direccion;
  document.getElementById("altura-mod").value = altura;
  document.getElementById("telefono-mod").value = telefono;
}

function btnGuardarModificacionProveedor() {
  const utlProveedor = "../controllers/Proveedor.php";
  const formulario = document.getElementById(
    "formulario_modificacionProveedor"
  );

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    Swal.fire({
      title: "¿Quieres guardar los cambios?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Modificaciones hechas!",
          icon: "success",
          showConfirmButton: false,
        });
        fetch("../controllers/ModificarProveedor.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = utlProveedor;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = utlProveedor;
        }, "1300");
      }
    });
  });
}

function btnCancelarModificacionProveedor() {
  const utlProveedor = "../controllers/Proveedor.php";
  window.location = utlProveedor;
}

//VENTAS
function btnEliminarVenta(id) {
  const urlEliminarVenta = "../controllers/EliminarVenta.php?id=";
  Swal.fire({
    title: "¿Desea eliminar el producto?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(() => {
        window.location = urlEliminarVenta + id;
      }, "1300");
    }
  });
}

function btnModificarVenta(fecha, cantidad, codigo_venta, codigo_producto) {
  const listaVentas = document.getElementById("product-list");
  DivModiProducto.style.display = "block";
  listaVentas.style.display = "none";

  const lista_empleados = document.getElementById("lista_empleados");
  lista_empleados.style.display = "none";

  document.getElementById("id-venta").value = codigo_venta;
  document.getElementById("mod_fecha_venta").value = fecha;
  document.getElementById("codigo_producto").value = codigo_producto;
  document.getElementById("mod_cantidad_venta").value = cantidad;

  console.log(codigo_producto, codigo_venta, fecha, cantidad);
}

function btnGuardarModificacionVenta() {
  const urlVentas = "../controllers/Ventas.php";
  const formulario = document.getElementById("formulario_modificacionVenta");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    Swal.fire({
      title: "¿Quieres guardar los cambios?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Modificaciones hechas!",
          icon: "success",
          showConfirmButton: false,
        });
        fetch("../controllers/ModificarVenta.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = urlVentas;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = urlVentas;
        }, "1300");
      }
    });
  });
}

function btnCancelarModificacionProducto() {
  const utlProveedor = "../controllers/Productos.php";
  window.location = utlProveedor;
}

//PRODUCTO

function btnEliminarProducto(id) {
  const urlEliminarProducto = "../controllers/EliminarProducto.php?id=";
  Swal.fire({
    title: "¿Desea eliminar el producto?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(() => {
        window.location = urlEliminarProducto + id;
      }, "1300");
    }
  });
}

function btnModificarProducto(
  id,
  descripcion,
  precio_costo,
  precio_venta,
  stock
) {
  DivModiProducto.style.display = "block";
  btnNewEmpleado.style.display = "none";

  const lista_empleados = document.getElementById("lista_empleados");
  lista_empleados.style.display = "none";

  document.getElementById("id-producto").value = id;
  document.getElementById("descripcion-producto").value = descripcion;
  document.getElementById("precio_costo-producto").value = precio_costo;
  document.getElementById("precio_venta-producto").value = precio_venta;
  document.getElementById("stock-producto").value = stock;
}

function btnGuardarModificacionProducto() {
  const urlProductos = "../controllers/Productos.php";
  const formulario = document.getElementById("formulario_modificacionProducto");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    Swal.fire({
      title: "¿Quieres guardar los cambios?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Modificaciones hechas!",
          icon: "success",
          showConfirmButton: false,
        });
        fetch("../controllers/ModificarProducto.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = urlProductos;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = urlProductos;
        }, "1300");
      }
    });
  });
}

function btnCancelarModificacionProducto() {
  const utlProveedor = "../controllers/Productos.php";
  window.location = utlProveedor;
}

// ADELANTOS
function btnEliminarAdelanto(id) {
  const urlEliminarAdelanto = "../controllers/EliminarAdelanto.php?id=";
  Swal.fire({
    title: "¿Desea eliminar el adelanto?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(() => {
        window.location = urlEliminarAdelanto + id;
      }, "1300");
    }
  });
}

function btnModificarAdelanto(id, empleado, fecha, cantidad) {
  DivModiProducto.style.display = "block";
  btnNewEmpleado.style.display = "none";

  const lista_empleados = document.getElementById("lista_empleados");
  lista_empleados.style.display = "none";

  document.getElementById("id-adelanto").value = id;
  document.getElementById("empleado").value = empleado;
  document.getElementById("mod-fecha").value = fecha;
  document.getElementById("mod-cantidad").value = cantidad;
}

function btnGuardarModificacionAdelanto() {
  const urlAdelantos = "../controllers/Adelantos.php";
  const formulario = document.getElementById("formulario_modificacionAdelanto");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    let datos = new FormData(formulario);

    for (var value of datos.values()) {
      console.log(value);
    }
    Swal.fire({
      title: "¿Quieres guardar los cambios?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => { 
      if (result.isConfirmed) {
        Swal.fire({
          title: "Modificaciones hechas!",
          icon: "success",
          showConfirmButton: false,
        });
        console.log(datos);
        fetch("../controllers/ModificarAdelanto.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = urlAdelantos;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = urlAdelantos;
        }, "1300");
      }
    });
  });
}

function btnCancelarModificacionAdelanto() {
  const urlAdelantos = "../controllers/Adelantos.php";
  window.location = urlAdelantos;
}

//ALERTA DNI CUIT O TELEFONO REPETIDO
function alertaDniRepetido() {
  const urlListaEmpleados = "../controllers/Empleados.php";
  Swal.fire({
    title: "ERROR!",
    text: "El dni ingresado ya existe!",
    icon: "error",
    showCancelButton: false,
    showConfirmButton: false,
  });
  setTimeout(() => {
    window.location = urlListaEmpleados;
  }, "2000");
}

function alertaTelefonoRepetido() {
  const urlListaEmpleados = "../controllers/Empleados.php";
  Swal.fire({
    title: "ERROR!",
    text: "El telefono ingresado ya existe!",
    icon: "error",
    showCancelButton: false,
    showConfirmButton: false,
  });
  setTimeout(() => {
    window.location = urlListaEmpleados;
  }, "2000");
}

function alertaTelefonoRepetidoProveedor() {
  const urlProveedor = "../controllers/Proveedor.php";
  Swal.fire({
    title: "ERROR!",
    text: "El telefono ingresado ya existe!",
    icon: "error",
    showCancelButton: false,
    showConfirmButton: false,
  });
  setTimeout(() => {
    window.location = urlProveedor;
  }, "2000");
}

function alertaCuitRepetido() {
  const urlProveedor = "../controllers/Proveedor.php";
  Swal.fire({
    title: "ERROR!",
    text: "El cuit ingresado ya existe!",
    icon: "error",
    showCancelButton: false,
    showConfirmButton: false,
  });
  setTimeout(() => {
    window.location = urlProveedor;
  }, "2000");
}

//---------------------

function pedidoProveedor() {
  const urlCompraInsumos = "../controllers/CompraInsumos.php";
  Swal.fire({
    title: "Pedido enviado!",
    icon: "success",
    showConfirmButton: false,
  });
  setTimeout(() => {
    window.location = urlCompraInsumos;
  }, "1500");
}

menuBtn.onclick = () => {
  navbar.classList.add("show");
  menuBtn.classList.add("hide");
  body.classList.add("disabled");
};
cancelBtn.onclick = () => {
  body.classList.remove("disabled");
  navbar.classList.remove("show");
  menuBtn.classList.remove("hide");
};
window.onscroll = () => {
  this.scrollY > 20
    ? navbar.classList.add("sticky")
    : navbar.classList.remove("sticky");
};

function mostrarAgregarEmpleado() {
  DivAgregarEmpleado.style.display = "block";
  btnNewEmpleado.style.display = "none";
}

function agregarVenta() {
  document.getElementById("producto").value = "";
  document.getElementById("fecha").value = "";
  document.getElementById("cantidad").value = "";
  document.getElementById("total").value = "";
}

function mostrarInputPorcentaje() {
  const input = document.getElementById("contenedorPorcentaje");
  const contenedorButton = document.getElementById("my-buttons");
  input.style.display = "block";
  contenedorButton.style.display = "none";
}

function cancelarPorcentaje() {
  const input = document.getElementById("contenedorPorcentaje");
  const contenedorButton = document.getElementById("my-buttons");
  input.style.display = "none";
  contenedorButton.style.display = "block";
}

function enviarPorcentaje() {
  const urlProductos = "../controllers/Productos.php";
  const formulario = document.getElementById("formularioPorcentaje");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    Swal.fire({
      title: "¿Quieres guardar los cambios?",
      text: "Al ingresar el porcentaje cambiaras el precio de todos los productos!",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Guardar",
      denyButtonText: `No guardar`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Modificaciones hechas!",
          icon: "success",
          showConfirmButton: false,
        });
        fetch("../controllers/ModificacionProductoPorcentaje.php", {
          method: "post",
          body: datos,
        });
        setTimeout(() => {
          window.location = urlProductos;
        }, "1300");
      } else if (result.isDenied) {
        Swal.fire({
          title: "Los datos no se guardaran!",
          icon: "info",
          showConfirmButton: false,
        });
        setTimeout(() => {
          window.location = urlProductos;
        }, "1300");
      }
    });
  });
}
