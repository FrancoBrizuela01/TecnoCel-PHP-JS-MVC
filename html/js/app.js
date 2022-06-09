const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");

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

//---------------------

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

const btnNewEmpleado = document.getElementById("btn-newEmpleado");
const DivAgregarEmpleado = document.getElementById("new-empleado");

const DivModiProducto = document.getElementById("modificacion-producto");

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
