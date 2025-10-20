// 🌙 DARK MODE TOGGLE
const toggleBtn = document.getElementById("themeToggle");
toggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
  toggleBtn.textContent = document.body.classList.contains("dark-mode")
    ? "☀️ Light Mode"
    : "🌙 Dark Mode";
});

// ⬆️ BACK TO TOP BUTTON
const backToTopBtn = document.getElementById("backToTop");
window.onscroll = function() {
  if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
    backToTopBtn.style.display = "block";
  } else {
    backToTopBtn.style.display = "none";
  }
};
backToTopBtn.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

// 📅 AUTO YEAR IN FOOTER
document.getElementById("year").textContent = new Date().getFullYear();

// ✅ Console log
console.log("CV loaded successfully!");
