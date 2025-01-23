document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("buscadorModal");
  const modalContent = document.getElementById("desktopSearch");
  const btnBuscar = document.getElementById("btnBuscar");
  const buscadorHeader = document.getElementById("buscador");
  const btnFilterHeader = document.getElementById("btnFilterHeader");
  const closeMobileSearch = document.getElementById("closeMobileSearch");
  const closeMobileSeachClass = document.querySelectorAll(".closeMobileSearch");
  const btnBuscadorMobile = document.querySelectorAll(".btnBuscadorMobile");
  const mobileSearch = document.getElementById("mobileSearch");

  function closeModal(event) {
    if (modalContent) {
      if (
        !modalContent.contains(event.target) &&
        !modal.contains(event.target)
      ) {
        modal.classList.add("hidden");

        btnFilterHeader.classList.remove("translateBuscador");
        buscadorHeader.classList.remove("translateBuscador");
        if (btnFilterHeader.classList.contains("translateBuscadorToBack")) {
          buscadorHeader.classList.add("animationBuscadorToBack");
        }

        if (btnFilterHeader.classList.contains("translateBuscador")) {
          modal.classList.add("translateBuscadorToBack");
        }
      }
    }

    event.stopPropagation();
  }

  document.addEventListener("click", closeModal);

  if (buscadorHeader) {
    buscadorHeader.addEventListener("click", function (event) {
      btnFilterHeader.classList.add("translateBuscador");
      buscadorHeader.classList.add("translateBuscador");

      if (innerWidth < 1024) {
        mobileSearch.classList.remove("hidden");
        btnFilterHeader.classList.remove("translateBuscador");
        buscadorHeader.classList.remove("translateBuscador");
      }

      setTimeout(() => {
        modal.classList.remove("hidden");
      }, 229);

      event.stopPropagation();
    });
  }

  if (btnBuscadorMobile) {
    btnBuscadorMobile.forEach((element) => {
      element.addEventListener("click", function (event) {
        mobileSearch.classList.remove("hidden");
      });
    });
  }
  closeMobileSeachClass.forEach((element) => {
    element.addEventListener("click", function (event) {
      mobileSearch.classList.add("hidden");
    });
  });
});
