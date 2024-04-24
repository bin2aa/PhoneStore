// $(document).ready(function () {

//     $(function () {
//         var minPrice = 1; // Giá nhỏ nhất
//         var maxPrice = maxPriceFromPHP; // Giá trị lớn nhất

//         $("#price_slider").slider({
//             range: true,
//             min: minPrice,
//             max: maxPrice,
//             values: [minPrice, maxPrice],
//             slide: function (event, ui) {
//                 $("#price_min_value").text(ui.values[0]);
//                 $("#price_max_value").text(ui.values[1]);
//             },
//             // Sự kiện dừng kéo slider
//             stop: function (event, ui) {
//                 // Gọi hàm ajax khi dừng kéo thanh slider
//                 filterProducts(ui.values[0], ui.values[1]);
//             }
//         });

//         $("#price_min_value").text($("#price_slider").slider("values", 0));
//         $("#price_max_value").text($("#price_slider").slider("values", 1));
//     });

//     function filterProducts(minPrice, maxPrice) {
//         $.ajax({
//             url: 'index.php?ctrl=productControllerUser', // Đường dẫn tới file xử lý ajax
//             type: 'GET',
//             data: {
//                 price_min: minPrice,
//                 price_max: maxPrice
//             },
//             success: function (response) {

//                 console.log(response);
//                 // Hiển thị danh sách sản phẩm đã lọc
//                 // $('#product-list').html(response);
                
//                 $('#product-list').html($(response).find('.product-list').html());
//                 //  $('.pagination').html($(response).find('.pagination').html());
//             },
//             error: function (xhr, status, error) {
//                 // Xử lý lỗi nếu có
//                 console.error(xhr.responseText);
//             }
//         });
//     }
// });