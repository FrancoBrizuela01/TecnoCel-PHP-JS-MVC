const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");

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

// const btnModificar = document.getElementById("btn-modificar");
// const ModEmpleados = document.getElementById("mod-empleados");
const btnNewEmpleado = document.getElementById("btn-newEmpleado");
const DivAgregarEmpleado = document.getElementById("new-empleado");

const DivModiProducto = document.getElementById("modificacion-producto");

// function mostrarModificarEmpleados() {
//   if ((ModEmpleados.style.display = "none")) {
//     ModEmpleados.style.display = "block";
//     btnNewEmpleado.style.display = "none";
//   }
//   var mediaqueryList = window.matchMedia("(max-width: 600px)");
//   if (mediaqueryList.matches) {
//     ModEmpleados.style.display = "table-row-group";
//   }
// }

// function ocultarModificarEmpleados() {
//   if ((ModEmpleados.style.display = "block")) {
//     ModEmpleados.style.display = "none";
//     btnNewEmpleado.style.display = "block";
//   }
//   if ((DivAgregarEmpleado.style.display = "block")) {
//     DivAgregarEmpleado.style.display = "none";
//     btnNewEmpleado.style.display = "block";
//   }
// }

function mostrarAgregarEmpleado() {
  DivAgregarEmpleado.style.display = "block";
  btnNewEmpleado.style.display = "none";
}

function mostrarModificarProducto() {
  DivModiProducto.style.display = "block";
  btnNewEmpleado.style.display = "none";
}

function agregarVenta() {
  //   const DivlistaProductos = document.getElementById("product-list");
  //   const productList = document.getElementById("product-list");
  //   const element = document.createElement("div");
  //   DivlistaProductos.style.display = "block";

  //   element.innerHTML = `
  //             <div class="">
  //                     <table>
  //                         <tr>
  //                             <tr>
  //                                 <td></td>
  //                                 <td></td>
  //                                 <td></td>
  //                                 <td></td>
  //                         </tr>
  //                             </tr>
  //             </table>
  //             <div>
  //         `;
  //   productList.appendChild(element);

  document.getElementById("producto").value = "";
  document.getElementById("fecha").value = "";
  document.getElementById("cantidad").value = "";
  document.getElementById("total").value = "";
}
