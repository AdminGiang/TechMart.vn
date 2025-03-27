const toggleDropdown = (dropdown, menu , isOpen) => {
    dropdown.classList.toggle("open" , isOpen);
    menu.style.height = isOpen? `${menu.scrollHeight}px`: 0;
}

const closeAllDropdowns = () => {
    document.querySelectorAll(".dropdown-container.open").forEach(openDropdown => {
        toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
    });
}

document.querySelectorAll(".dropdown-toggle").forEach(dropdownToggle => {
    dropdownToggle.addEventListener("click", e => {
        e.preventDefault();

        const dropdown = e.target.closest(".dropdown-container");
        const menu = dropdown.querySelector(".dropdown-menu");
        const isOpen = dropdown.classList.contains("open");

        closeAllDropdowns();

        toggleDropdown(dropdown, menu , !isOpen);
    });
});

document.querySelectorAll(".sidebar-toggler,.sidebar-menu-button").forEach(button => {
    button.addEventListener("click", () => {
       closeAllDropdowns();

        // Toggle collapsed class on sidebar
        document.querySelector(".sidebar").classList.toggle("collapsed");
    });
});

if(window.innerWidth <= 1024) document.querySelector(".sidebar").classList.toggle("collapsed");


// Truy xuất các phần tử sidebar và nội dung chính
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector(".content");
const togglerButtons = document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button");

// Hàm đóng tất cả dropdowns
// const toggleDropdown = (dropdown, menu, isOpen) => {
//     dropdown.classList.toggle("open", isOpen);
//     menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
// };

// const closeAllDropdowns = () => {
//     document.querySelectorAll(".dropdown-container.open").forEach(openDropdown => {
//         toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
//     });
// };

// Xử lý sự kiện click để thu gọn/mở rộng sidebar
// togglerButtons.forEach(button => {
//     button.addEventListener("click", () => {
//         //closeAllDropdowns(); // Đóng tất cả dropdowns

//         // Toggle trạng thái thu gọn/mở rộng
//         sidebar.classList.toggle("collapsed");
//         content.classList.toggle("collapsed");
//     });
// });

// Thiết lập sidebar thu gọn mặc định khi tải trang
document.addEventListener("DOMContentLoaded", () => {
    sidebar.classList.add("collapsed");
    content.classList.add("collapsed");
});

// Tự động điều chỉnh sidebar theo kích thước màn hình
window.addEventListener("resize", () => {
    if (window.innerWidth <= 1024) {
        sidebar.classList.add("collapsed");
        content.classList.add("collapsed");
    } else {
        sidebar.classList.remove("collapsed");
        content.classList.remove("collapsed");
    }
});

// Đảm bảo trạng thái thu gọn được áp dụng khi cửa sổ nhỏ hơn 1024px tại lần tải đầu tiên
if (window.innerWidth <= 1024) {
    sidebar.classList.add("collapsed");
    content.classList.add("collapsed");
}
