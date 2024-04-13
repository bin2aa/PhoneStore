    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm phiếu nhập kho</title>
    </head>

    <body>

        <h2>Thêm phiếu nhập kho</h2>

        <form action="index.php?ctrl=warehouseController&action=addWarehouseReceipt" method="post">

            <label for="id_nha_cung_cap">Chọn nhà cung cấp:</label>
            <select name="id_nha_cung_cap" required>
                <?php foreach ($suppliers as $supplier) : ?>
                    <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['ten']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="ngay">Ngày nhập kho:</label>
            <input type="datetime-local" name="ngay" required><br>

            <label for="ghi_chu">Ghi chú:</label>
            <textarea name="ghi_chu" rows="5"></textarea><br>

            <h3>Chi tiết đơn nhập kho</h3>

            <!-- Mục nhập chi tiết cho từng mặt hàng -->
            <div id="chi-tiet">
                <div class="hang">
                    <label for="id_san_pham_1">(ID) - Chọn sản phẩm:</label>
                    <select name="id_san_pham_1" required>
                        <?php foreach ($products as $product) : ?>
                            <option value="<?php echo $product['id']; ?>"><?php echo '(' . $product['id'] . ') - ' . $product['ten']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="so_luong_1">Số lượng:</label>
                    <input type="number" name="so_luong_1" required>

                    <label for="gia_nhap_1">Giá nhập:</label>
                    <input type="number" step="0.01" name="gia_nhap_1" required>

                    <button type="button" onclick="xoaHang()">Xóa hàng</button>

                </div>
            </div>

            <button type="button" onclick="themHang()">Thêm hàng</button>

            <button type="submit">Lưu phiếu nhập kho</button>
        </form>

        <script>
            // Hàm thêm hàng cho biểu mẫu
            function themHang() {
                //lấy phần tử chi-tiet id = 'chi-tiet'
                var chiTiet = document.getElementById("chi-tiet");
                var soHang = chiTiet.childElementCount + 1;
                // tạo mới div div class = "hang"
                var hangMoi = document.createElement("div");
                hangMoi.classList.add("hang");

                var labelSanPham = document.createElement("label");
                labelSanPham.setAttribute("for", "id_san_pham_" + soHang);
                labelSanPham.textContent = "(ID) - Chọn sản phẩm: ";
                hangMoi.appendChild(labelSanPham);

                var selectSanPham = document.createElement("select");
                selectSanPham.setAttribute("name", "id_san_pham_" + soHang);
                selectSanPham.setAttribute("required", "required");
                <?php foreach ($products as $product) : ?>
                    var option = document.createElement("option");
                    option.value = "<?php echo $product['id']; ?>";
                    option.textContent = "<?php echo '('. $product['id'] . ') - ' . $product['ten']; ?>"; // Hiển thị id và tên sản phẩm
                    selectSanPham.appendChild(option);
                <?php endforeach; ?>
                hangMoi.appendChild(selectSanPham);

                var labelSoLuong = document.createElement("label");
                labelSoLuong.setAttribute("for", "so_luong_" + soHang);
                labelSoLuong.textContent = " Số lượng: ";
                hangMoi.appendChild(labelSoLuong);

                var inputSoLuong = document.createElement("input");
                inputSoLuong.setAttribute("type", "number");
                inputSoLuong.setAttribute("name", "so_luong_" + soHang);
                inputSoLuong.setAttribute("required", "required");
                hangMoi.appendChild(inputSoLuong);

                var labelGiaNhap = document.createElement("label");
                labelGiaNhap.setAttribute("for", "gia_nhap_" + soHang);
                labelGiaNhap.textContent = " Giá nhập: ";
                hangMoi.appendChild(labelGiaNhap);

                var inputGiaNhap = document.createElement("input");
                inputGiaNhap.setAttribute("type", "number");
                inputGiaNhap.setAttribute("step", "0.01");
                inputGiaNhap.setAttribute("name", "gia_nhap_" + soHang);
                inputGiaNhap.setAttribute("required", "required");

                hangMoi.appendChild(inputGiaNhap);

                var nutXoa = document.createElement("button");
                nutXoa.setAttribute("type", "button");

                nutXoa.textContent = "Xóa hàng";
                nutXoa.onclick = xoaHang;

                hangMoi.appendChild(nutXoa);

                chiTiet.appendChild(hangMoi);
            }

            function xoaHang() {
                var hang = this.parentNode;
                hang.parentNode.removeChild(hang);
            }
        </script>

    </body>

    </html>