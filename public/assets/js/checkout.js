// document.querySelector('.apply-coupon-btn').addEventListener('click', function(e) {
//     e.preventDefault();

//     const voucherCode = document.querySelector('#voucher_code').value;

//     // Sử dụng giá trị `totalPrice` và `shipping` đã được truyền từ Blade
//     fetch('/apply-voucher', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
//         },
//         body: JSON.stringify({
//             voucher_code: voucherCode,
//             order_amount: totalPrice,
//         }),
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.error) {
//             alert(data.error);
//         } else if (data.success) {
//             alert(data.success);

//             // Cập nhật tổng tiền thanh toán sau khi áp dụng voucher
//             const newTotal = totalPrice - data.discount + shipping;
//             document.querySelector('.grand-total span:last-child').textContent = `${newTotal.toLocaleString()}đ`;
//         }
//     })
//     .catch(error => console.error('Có lỗi xảy ra:', error));
// });
