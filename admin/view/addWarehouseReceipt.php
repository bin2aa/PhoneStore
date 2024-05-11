<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phiếu nhập kho</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-vkA4tf+gfRnJlz9+L0V5kiYcG7Bi4JF3x04fX5uU5fWVJ+u9PwIZgecokFm5P1C5" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="addWareHouseReceipt">
            <h2>Thêm phiếu nhập kho</h2>

            <form class="warehouseReceiptSubmitAdd" action="index.php?ctrl=warehouseController&action=addWarehouseReceipt" method="post">

                <div class="mb-3">
                    <label for="id_nha_cung_cap" class="form-label">Chọn nhà cung cấp:</label>
                    <select name="id_nha_cung_cap" class="form-select" required>
                        <?php foreach ($suppliers as $supplier) : ?>
                            <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['ten']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ngay" class="form-label">Ngày nhập kho:</label>
                    <input type="datetime-local" name="ngay" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ghi_chu" class="form-label">Ghi chú:</label>
                    <textarea name="ghi_chu" rows="5" class="form-control"></textarea>
                </div>

                <h3>Chi tiết đơn nhập kho</h3>

                <div id="chi-tiet">
                    <div class="hang">
                        <label for="id_san_pham_1" class="form-label">(ID) - Chọn sản phẩm:</label>
                        <select name="id_san_pham_1" class="form-select" required>
                            <?php foreach ($products as $product) : ?>
                                <option value="<?php echo $product['id']; ?>"><?php echo '(' . $product['id'] . ') - ' . $product['ten']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="so_luong_1" class="form-label">Số lượng:</label>
                        <input type="number" name="so_luong_1" class="form-control" required>

                        <label for="gia_nhap_1" class="form-label">Giá nhập:</label>
                        <input type="number" step="0.01" name="gia_nhap_1" class="form-control" required>

                        <button type="button" class="btn btn-danger" onclick="xoaHang(this)">Xóa hàng</button>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" onclick="themHang()">Thêm hàng</button>

                <button type="submit" class="btn btn-success">Lưu phiếu nhập kho</button>
            </form>

            <script>
                // Hàm thêm hàng cho biểu mẫu
                function themHang() {
                    var chiTiet = document.getElementById("chi-tiet");
                    var soHang = chiTiet.childElementCount + 1;
                    var hangMoi = document.createElement("div");
                    hangMoi.classList.add("hang", "mb-3");

                    var labelSanPham = document.createElement("label");
                    labelSanPham.setAttribute("for", "id_san_pham_" + soHang);
                    labelSanPham.classList.add("form-label");
                    labelSanPham.textContent = "(ID) - Chọn sản phẩm: ";
                    hangMoi.appendChild(labelSanPham);

                    var selectSanPham = document.createElement("select");
                    selectSanPham.setAttribute("name", "id_san_pham_" + soHang);
                    selectSanPham.classList.add("form-select");
                    selectSanPham.setAttribute("required", "required");
                    <?php foreach ($products as $product) : ?>
                        var option = document.createElement("option");
                        option.value = "<?php echo $product['id']; ?>";
                        option.textContent = "<?php echo '(' . $product['id'] . ') - ' . $product['ten']; ?>";
                        selectSanPham.appendChild(option);
                    <?php endforeach; ?>
                    hangMoi.appendChild(selectSanPham);

                    var labelSoLuong = document.createElement("label");
                    labelSoLuong.setAttribute("for", "so_luong_" + soHang);
                    labelSoLuong.classList.add("form-label");
                    labelSoLuong.textContent = " Số lượng: ";
                    hangMoi.appendChild(labelSoLuong);

                    var inputSoLuong = document.createElement("input");
                    inputSoLuong.setAttribute("type", "number");
                    inputSoLuong.setAttribute("name", "so_luong_" + soHang);
                    inputSoLuong.classList.add("form-control");
                    inputSoLuong.setAttribute("required", "required");
                    hangMoi.appendChild(inputSoLuong);

                    var labelGiaNhap = document.createElement("label");
                    labelGiaNhap.setAttribute("for", "gia_nhap_" + soHang);
                    labelGiaNhap.classList.add("form-label");
                    labelGiaNhap.textContent = " Giá nhập: ";
                    hangMoi.appendChild(labelGiaNhap);

                    var inputGiaNhap = document.createElement("input");
                    inputGiaNhap.setAttribute("type", "number");
                    inputGiaNhap.setAttribute("step", "0.01");
                    inputGiaNhap.setAttribute("name", "gia_nhap_" + soHang);
                    inputGiaNhap.classList.add("form-control");
                    inputGiaNhap.setAttribute("required", "required");
                    hangMoi.appendChild(inputGiaNhap);

                    var nutXoa = document.createElement("button");
                    nutXoa.setAttribute("type", "button");
                    nutXoa.classList.add("btn", "btn-danger");
                    nutXoa.textContent = "Xóa hàng";
                    nutXoa.onclick = function() {
                        xoaHang(this);
                    };

                    hangMoi.appendChild(nutXoa);

                    chiTiet.appendChild(hangMoi);
                }

                function xoaHang(button) {
                    event.stopPropagation();
                    var hang = button.parentNode;
                    hang.parentNode.removeChild(hang);
                }
            </script>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-NV2DWb1Wti8OY8T4O8wc4OJ1sGJ/Ocp3kiS8BRceP8OVR0sN3gkNDISPDgaFwhB3" crossorigin="anonymous"></script>
</body>

</html>