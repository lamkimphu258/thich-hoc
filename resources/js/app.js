import "./bootstrap";

import Alpine from "alpinejs";

import.meta.glob(["../images/**"]);

window.Alpine = Alpine;

Alpine.data("navbar", () => ({
  handleOnClickMenu() {
    const mainNavbar = document.getElementById("main-navbar");
    mainNavbar.classList.toggle("hidden");
  },
}));

Alpine.start();
