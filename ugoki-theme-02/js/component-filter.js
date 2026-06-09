document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab");
  const items = document.querySelectorAll(".component-item");
  const input = document.querySelector(".component-search-input");
  const noResults = document.querySelector(".no-results");

  let currentFilter = "all";

  function showNoResults(state) {
    if (!noResults) return;
    noResults.style.display = state ? "block" : "none";
  }

  function updateItems() {
    if (!input) return;

    let visibleCount = 0;
    const query = input.value.toLowerCase().trim();

    items.forEach((item) => {
      const title = item.dataset.title || "";
      const classes = item.className.toLowerCase();

      const matchesSearch = title.includes(query) || classes.includes(query);
      const matchesCategory =
        currentFilter === "all" ||
        item.classList.contains("cat-" + currentFilter);

      const show = matchesSearch && matchesCategory;

      item.style.display = show ? "block" : "none";

      if (show) visibleCount++;
    });

    showNoResults(visibleCount === 0);
  }

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      currentFilter = this.dataset.filter;

      tabs.forEach((t) => t.classList.remove("active"));
      this.classList.add("active");

      updateItems();
    });
  });

  if (input) {
    input.addEventListener("input", updateItems);
    input.addEventListener("keydown", function (e) {
      if (e.key === "Enter") {
        updateItems();
      }
    });
  }
});
