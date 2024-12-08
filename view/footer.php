<!-- <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Đăng Kí Nhận Thông Tin Từ Chúng Tôi </h4>
            <p>Nhận thông tin cập nhật qua email về cửa hàng mới nhất của chúng tôi và<span> ưu đãi đặc biệt.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Email của bạn ">
            <button class="normal">Đăng Ký </button>
        </div>
</section> -->
<footer class="section-p1">
    <div class="col">
        <img class="logo" src="layout/img/logo3.png" alt="">
        <p><strong>Địa chỉ:</strong> 562 Đường Wellington, Phố 32, San Francisco</p>
        <p><strong>Điện thoại:</strong> +01 2222 365 /(+91) 01 2345 6789</p>
        <p><strong>Giờ làm việc:</strong> 10:00 - 18:00, Thứ Hai - Thứ Bảy</p>
        <div class="follow">
            <h4>Theo dõi chúng tôi</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>Giới thiệu</h4>
        <a href="#">Về chúng tôi</a>
        <a href="#">Thông tin giao hàng</a>
        <a href="#">Chính sách bảo mật</a>
        <a href="#">Điều khoản và điều kiện</a>
        <a href="#">Liên hệ</a>
    </div>

    <div class="col">
        <h4>Tài khoản của tôi</h4>
        <a href="#">Đăng nhập</a>
        <a href="#">Xem giỏ hàng</a>
        <a href="#">Danh sách mong muốn của tôi</a>
        <a href="#">Theo dõi đơn hàng</a>
        <a href="#">Trợ giúp</a>
    </div>

    <div class="col install">
        <h4>Cài đặt ứng dụng</h4>
        <p>Từ App Store hoặc Google Play</p>
        <div class="row">
            <img src="layout/img/pay/app.jpg" alt="">
            <img src="layout/img/pay/play.jpg" alt="">
        </div>
        <p>Cổng thanh toán an toàn</p>
        <img src="layout/img/pay/pay.png" alt="">
    </div>

    <div class="copyright">
        <p>© 2023, YAME</p>
    </div>
</footer>

<!-- Custom Scripts -->
<script>
    // Password Toggle
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.querySelector(".eye");
        const togglePasswordSlash = document.querySelector(".eye-none");

        if (togglePassword && togglePasswordSlash) {
            togglePassword.addEventListener("click", function() {
                passwordInput.type = "text";
                togglePassword.style.display = "none";
                togglePasswordSlash.style.display = "block";
            });

            togglePasswordSlash.addEventListener("click", function() {
                passwordInput.type = "password";
                togglePassword.style.display = "block";
                togglePasswordSlash.style.display = "none";
            });
        }
    });

    // Notification
    function showNotification(message, type) {
        var alertDiv = document.createElement("div");
        alertDiv.className = "alert " + type;
        alertDiv.innerHTML = message;
        document.body.appendChild(alertDiv);
        setTimeout(function() {
            alertDiv.style.opacity = "0";
            setTimeout(function() {
                alertDiv.remove();
            }, 500);
        }, 3000);
    }

    // Add to Cart
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');
        if (addToCartForms.length > 0) {
            addToCartForms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    fetch('index.php?pg=cart', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification('Sản phẩm đã được thêm vào giỏ hàng!', 'success');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        }
    });

    // Cancel Order
    function cancelOrder(bill_id) {
        if (confirm("Bạn chắc chắn muốn hủy đơn hàng?")) {
            $.ajax({
                type: "POST",
                url: "index.php?pg=cancel_order",
                data: { bill_id: bill_id },
                success: function(response) {
                    alert("Đơn hàng đã được hủy!");
                    window.location.href = "index.php?pg=profile_user&act=order";
                },
                error: function() {
                    alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
                }
            });
        }
    }
</script>

</body>
</html>