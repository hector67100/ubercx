const btnMenuToggle = document.getElementById("btn-menu-toggle");
const menuResponsive = document.getElementById("menu-responsive");
const buscador = document.getElementById("buscador");
const optionsDesktop = document.getElementById("options-desktop");
const textBanner = document.getElementById("text-banner");
const imgBanner = document.getElementById("img-banner");
const btnPre = document.getElementById("btnPre");
const btnSig = document.getElementById("btnSig");
const arrowPre = document.getElementById("arrowPre");
const arrowSig = document.getElementById("arrowSig");
const modalFilter = document.getElementById("modalFilter");
const closeModal = document.getElementById("closeModal");
const btnFilter = document.getElementById("btnFilter");
const escortUnoImagenExtra = document.getElementById("escortUnoImagenExtra");
const ciudadSelect = document.getElementById("ciudadSelect");
const btnFilterHeader = document.getElementById("btnFilterHeader");
document.addEventListener("DOMContentLoaded", function () {
  if (btnMenuToggle) {
    btnMenuToggle.addEventListener("click", () => {
      menuResponsive.classList.remove("hidden");

      if (menuResponsive.classList.contains("slideDown")) {
        menuResponsive.classList.remove("slideDown");
        menuResponsive.classList.add("slideUp");
        setTimeout(() => {
          menuResponsive.classList.add("hidden");
        }, 559);
      } else {
        menuResponsive.classList.remove("slideUp");
        menuResponsive.classList.add("slideDown");
      }
    });
  }

  window.addEventListener("resize", () => {
    if (innerWidth < 768) {
      if (textBanner) {
        textBanner.classList.add("absolute");
        textBanner.classList.add("bottom-12");
      }
      if (menuResponsive) {
        menuResponsive.classList.add("hidden");
      }
      if (btnMenuToggle) {
        btnMenuToggle.classList.remove("hidden");
      }
      optionsDesktop.classList.add("hidden");
    } else {
      if (textBanner) {
        textBanner.classList.remove("absolute");
        textBanner.classList.remove("bottom-12");
      }
      optionsDesktop.classList.remove("hidden");
      if (btnMenuToggle) {
        btnMenuToggle.classList.add("hidden");
      }
    }
  });

  if (btnFilter) {
    btnFilter.addEventListener("click", () => {
      console.log("click");
      modalFilter.classList.remove("hidden");
    });
  }

  if(btnFilterHeader){
    btnFilterHeader.addEventListener("click", () => {
      console.log("click");
      modalFilter.classList.remove("hidden");
    });
  }

  if (closeModal) {
    closeModal.addEventListener("click", () => {
      modalFilter.classList.add("hidden");
    });
  }

  if (btnPre) {
    btnPre.addEventListener("mouseover", () => {
      arrowPre.classList.add("arrowAnimation");
    });
    btnPre.addEventListener("mouseout", () => {
      arrowPre.classList.remove("arrowAnimation");
    });
  }
  if (btnSig) {
    btnSig.addEventListener("mouseover", () => {
      arrowSig.classList.add("arrowAnimationRight");
    });
    btnSig.addEventListener("mouseout", () => {
      arrowSig.classList.remove("arrowAnimationRight");
    });
  }
});

function doSomething() {
  const paisSelect = document.getElementById("paisSelect").value;

  buscador.classList.add("buscadorActive");
  ciudadSelect.classList.remove("hidden");

  if (paisSelect == 0) {
    buscador.classList.add("remove");
    setTimeout(() => {
      buscador.classList.remove("buscadorActive");
      ciudadSelect.classList.add("hidden");
    }, 259);
  }
}
function openSelectLocationModal() {
  const menuSelector = document.querySelectorAll(".menuSelector");

  menuSelector.forEach((element) => {
    if (!element.classList.contains("hidden")) {
      element.classList.add("hidden");
    } else {
      element.classList.remove("hidden");
    }
  });
}
