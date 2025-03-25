// Truy xuất sidebar và bảng sản phẩm
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector(".content");
const sidebarToggler = document.querySelector(".sidebar-toggler");

sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
});

// Xử lý sự kiện nhấn nút sidebar-toggler
document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach((button) => {
  button.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
    content.classList.toggle("collapsed");
  });
});

// Tự động thu gọn sidebar trên màn hình nhỏ
window.addEventListener("resize", () => {
  if (window.innerWidth <= 768) {
    sidebar.classList.add("collapsed");
    content.classList.add("collapsed");
  } else {
    sidebar.classList.remove("collapsed");
    content.classList.remove("collapsed");
  }
});

// Khởi tạo trạng thái ban đầu nếu màn hình nhỏ hơn 768px
if (window.innerWidth <= 768) {
  sidebar.classList.add("collapsed");
  content.classList.add("collapsed");
}
