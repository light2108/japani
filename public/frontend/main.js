$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".login-click").click(function() {
        var password = $("#password-login").val();
        var username = $("#username-login").val();
        $.ajax({
            url: "/login",
            type: "POST",
            data: {
                username: username,
                password: password,
            },
            success: function(resp) {
                if (resp["status"] == "-1") {
                    $("#error-login").text(
                        "Số điện thoại/Email hoặc mật khẩu không chính xác"
                    );
                } else if (resp["status"] == "1") {
                    $("#error-login").text(
                        "Số điện thoại/Email hoặc mật khẩu không được để trống"
                    );
                } else {
                    window.location.reload(true);
                }
            },
            error: function(err) {
                alert("ERROR");
            },
        });
    });
    $(".register_frontend").click(function() {
        var name = $("#name");
        var email = $("#email");
        var tel = $("#mobile");
        var pass = $("#password");
        var repass = $("#re_password");

        var flag = 0;
        if (!name.val()) {
            name.css("border", "1px solid red");
            name.focus();
            name.addClass("alert");
            name.attr("placeholder", "Bạn chưa nhập họ tên");
            flag = 1;
        } else {
            name.css("border", "1px solid #ccc");
        }
        if (!tel.val()) {
            tel.css("border", "1px solid red");
            if (flag == 0) {
                tel.focus();
            }

            tel.addClass("alert");
            tel.attr("placeholder", "Bạn chưa nhập số điện thoại");
            flag = 1;
        } else if (tel.val() <= 0 || tel.val().length < 10) {
            alert("Số điện thoại không hợp lệ");
            input.css("border", "1px solid #ccc");
            tel.css("border", "1px solid red");
            if (flag == 0) {
                tel.focus();
            }

            flag = 1;
        } else {
            tel.css("border", "1px solid #ccc");
        }

        if (!pass.val()) {
            pass.css("border", "1px solid red");
            if (flag == 0) {
                pass.focus();
            }

            pass.addClass("alert");
            pass.attr("placeholder", "Bạn chưa nhập mật khẩu");
            flag = 1;
            return false;
        } else {
            pass.css("border", "1px solid #ccc");
        }
        if (pass.val().length < 6) {
            pass.css("border", "1px solid red");
            if (flag == 0) {
                pass.focus();
            }

            pass.addClass("alert");
            pass.attr("placeholder", "Mật khẩu phải lớn hơn 6 ký tự");
            alert("Mật khẩu phải lớn hơn 6 ký tự");
            flag = 1;
            return false;
        } else {
            pass.css("border", "1px solid #ccc");
        }

        if (!repass.val() || pass.val() != repass.val()) {
            repass.css("border", "1px solid red");
            if (flag == 0) {
                repass.focus();
            }
            alert("Mật khẩu nhập lại không đúng");
            repass.addClass("alert");
            repass.attr("placeholder", "Mật khẩu nhập lại không đúng");
            flag = 1;
        } else {
            repass.css("border", "1px solid #ccc");
        }

        if (!$("#check-rule").is(":checked")) {
            alert("Bạn chưa check điều khoản");
            flag = 1;
        }

        if (flag == 0) {
            var info = new Object();
            info.name = $("#name").val();
            info.email = $("#email").val();
            info.mobile = $("#mobile").val();
            info.password = $("#password").val();
            info.password_old = $("#re_password").val();
            $.ajax({
                url: "/register",
                type: "POST",
                data: info,
                cache: false,
                dataType: "html",
                success: function(resp) {
                    if (resp["status"] == "-1") {
                        $("#warning-register").show();
                    } else if (resp["status"] == "-2") {
                        repass.addClass("alert");
                        repass.attr(
                            "placeholder",
                            "Mật khẩu nhập lại không đúng"
                        );
                    } else {
                        alert("Chúc mừng bạn đã đăng ký thành công!!");
                        window.location.reload(true);
                    }
                },
            });
        }
    });
    $(".change-password").click(function() {
        var pwd_cur = $("#pwd_cur").val();
        var pwd_new = $("#pwd_new").val();
        var pwd_confirm = $("#pwd_confirm").val();
        $.ajax({
            url: "/change-password",
            type: "POST",
            data: {
                pwd_cur: pwd_cur,
                pwd_new: pwd_new,
                pwd_confirm: pwd_confirm,
            },
            success: function(resp) {
                if (resp["status"] == 1) {
                    alert("Thay đổi thành công");
                    window.location.reload(true);
                } else if (resp["status"] == -1) {
                    alert(
                        "Chưa nhập đầy đủ thông tin hoặc mật khẩu mới và mật khẩu nhập lại không giống nhau"
                    );
                } else if (resp["status"] == 0) {
                    alert("Mật khẩu hiện tại không đúng");
                }
            },
        });
    });
    $("#push-to-cart-neo").click(function() {
        let __this = $("#push-to-cart");
        let id = __this.attr("data-id");
        let qty = parseInt($(".txtNumPro").val());
        $("#justAddedQuantity").html(qty);

        let image = __this.attr("data-image");
        let name = __this.attr("data-name");
        let price_market = __this.attr("data-price_market");
        let url = __this.attr("data-url");
        let sku = __this.attr("data-sku");
        let kg = __this.attr("data-kg");
        let text_qt = __this.attr("data-text_qt");
        let images_qt = __this.attr("data-images_qt");

        /*add variation*/
        if ($("#tier_variation").length > 0) {
            let data_pro = getDataVariationActive();
            if (data_pro !== false) {
                let price_promotion = data_pro.price_promotion;
                let price_normal = parseInt(data_pro.price);
                if (parseInt(price_promotion) > 0) {
                    price_market = price_promotion;
                } else {
                    price_market = price_normal;
                }
                id = data_pro.id_product_variation;
                name = data_pro.name_vi;
                image = data_pro.image;

                url = data_pro.url;
                sku = data_pro.sku;
                kg = data_pro.kg;
                text_qt = data_pro.text_qt;
                images_qt = data_pro.images_qt;

                $("#justAddedTitle").html(name);
                $("#justAddedPrice").html(formatter.format(price_market));
                $("#price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#neo_price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#price_show #price_normal").html(price_market);
            } else {
                return false;
            }
        }
        /*add variation*/
        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };
        // set total price
        let totalPriceFirst = parseInt($("#totalPrice").val());
        let totalPriceCalculate =
            totalPriceFirst + qty * parseInt(price_market);
        let totalPriceLast = formatter.format(totalPriceCalculate);

        // set total cart
        // let totalCartFirst = parseInt($("#totalCart").val());
        // let totalCartLast = totalCartFirst + 1;

        // set total quantity cart
        let totalQuantity = parseInt($("#totalQuantityCart").val());

        let totalQuantityLast = qty + totalQuantity;
        // set total quantity by product id
        let totalQuantityCartById = parseInt($("#totalQuantityCartById").val());
        let totalQuantityCartByIdLast = qty + totalQuantityCartById;
        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(resp) {
                // if (resp['status'] == 1) {
                //     // show cart popup
                //     $("#cartPopup").show();
                // } else {
                //     alertadditonCart("Đã thêm vào giỏ hàng");
                // }
                $("#cartPopup").show();
                // set total price
                $("#cartTotalPrice").html(totalPriceLast);
                $("#totalPrice").val(totalPriceCalculate);

                // set total cart
                $(".count-giohang").html(totalQuantityLast);
                $("#totalQuantityCart").val(totalQuantityLast);

                // set total quantity by product id
                $("#justAddedQuantity").html(totalQuantityCartByIdLast);
                $("#totalQuantityCartById").val(totalQuantityCartByIdLast);
                window.location.href = "/cart";
            },
            error: function() {
                alert("ERROR");
            },
        });
    });

    $(".close-popup-cart").on("click", function() {
        $("#cartPopup").hide();
    });
    $("#buynow-to-cart").click(function() {
        let __this = $("#buynow-to-cart");
        let id = __this.attr("data-id");
        let qty = parseInt($(".txtNumPro").val());
        $("#justAddedQuantity").html(qty);
        let image = __this.attr("data-image");
        let name = __this.attr("data-name");
        let price_market = __this.attr("data-price_market");
        let url = __this.attr("data-url");
        let sku = __this.attr("data-sku");
        let kg = __this.attr("data-kg");
        let text_qt = __this.attr("data-text_qt");
        let images_qt = __this.attr("data-images_qt");

        /*add variation*/
        if ($("#tier_variation").length > 0) {
            let data_pro = getDataVariationActive();
            if (data_pro !== false) {
                let price_promotion = data_pro.price_promotion;
                let price_normal = parseInt(data_pro.price);
                if (parseInt(price_promotion) > 0) {
                    price_market = price_promotion;
                } else {
                    price_market = price_normal;
                }
                id = data_pro.id_product_variation;
                name = data_pro.name_vi;
                image = data_pro.image;

                url = data_pro.url;
                sku = data_pro.sku;
                kg = data_pro.kg;
                text_qt = data_pro.text_qt;
                images_qt = data_pro.images_qt;

                $("#justAddedTitle").html(name);
                $("#justAddedPrice").html(formatter.format(price_market));
                $("#price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#neo_price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#price_show #price_normal").html(price_market);
            } else {
                return false;
            }
        }
        /*add variation*/
        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };
        // set total price
        let totalPriceFirst = parseInt($("#totalPrice").val());
        let totalPriceCalculate =
            totalPriceFirst + qty * parseInt(price_market);
        let totalPriceLast = formatter.format(totalPriceCalculate);

        // set total cart
        // let totalCartFirst = parseInt($("#totalCart").val());
        // let totalCartLast = totalCartFirst + 1;

        // set total quantity cart
        let totalQuantity = parseInt($("#totalQuantityCart").val());

        let totalQuantityLast = qty + totalQuantity;
        // set total quantity by product id
        let totalQuantityCartById = parseInt($("#totalQuantityCartById").val());
        let totalQuantityCartByIdLast = qty + totalQuantityCartById;
        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(resp) {
                // if (resp['status'] == 1) {
                //     // show cart popup

                // } else {
                //     alertadditonCart("Đã thêm vào giỏ hàng");
                // }
                $("#cartPopup").show();
                // set total price
                $("#cartTotalPrice").html(totalPriceLast);
                $("#totalPrice").val(totalPriceCalculate);

                // set total cart
                $(".count-giohang").html(totalQuantityLast);
                $("#totalQuantityCart").val(totalQuantityLast);

                // set total quantity by product id
                $("#justAddedQuantity").html(totalQuantityCartByIdLast);
                $("#totalQuantityCartById").val(totalQuantityCartByIdLast);
                window.location.href = "/cart";
            },
            error: function() {
                alert("ERROR");
            },
        });
    });
    $("#buynow-to-cart-neo").click(function() {
        let __this = $("#buynow-to-cart-neo");
        let id = __this.attr("data-id");
        let qty = parseInt($(".txtNumPro").val());
        $("#justAddedQuantity").html(qty);
        let image = __this.attr("data-image");
        let name = __this.attr("data-name");
        let price_market = __this.attr("data-price_market");
        let url = __this.attr("data-url");
        let sku = __this.attr("data-sku");
        let kg = __this.attr("data-kg");
        let text_qt = __this.attr("data-text_qt");
        let images_qt = __this.attr("data-images_qt");

        /*add variation*/
        if ($("#tier_variation").length > 0) {
            let data_pro = getDataVariationActive();
            if (data_pro !== false) {
                let price_promotion = data_pro.price_promotion;
                let price_normal = parseInt(data_pro.price);
                if (parseInt(price_promotion) > 0) {
                    price_market = price_promotion;
                } else {
                    price_market = price_normal;
                }
                id = data_pro.id_product_variation;
                name = data_pro.name_vi;
                image = data_pro.image;

                url = data_pro.url;
                sku = data_pro.sku;
                kg = data_pro.kg;
                text_qt = data_pro.text_qt;
                images_qt = data_pro.images_qt;

                $("#justAddedTitle").html(name);
                $("#justAddedPrice").html(formatter.format(price_market));
                $("#price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#neo_price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#price_show #price_normal").html(price_market);
            } else {
                return false;
            }
        }
        /*add variation*/
        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };
        // set total price
        let totalPriceFirst = parseInt($("#totalPrice").val());
        let totalPriceCalculate =
            totalPriceFirst + qty * parseInt(price_market);
        let totalPriceLast = formatter.format(totalPriceCalculate);

        // set total cart
        // let totalCartFirst = parseInt($("#totalCart").val());
        // let totalCartLast = totalCartFirst + 1;

        // set total quantity cart
        let totalQuantity = parseInt($("#totalQuantityCart").val());

        let totalQuantityLast = qty + totalQuantity;
        // set total quantity by product id
        let totalQuantityCartById = parseInt($("#totalQuantityCartById").val());
        let totalQuantityCartByIdLast = qty + totalQuantityCartById;
        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(resp) {
                // if (resp['status'] == 1) {
                //     // show cart popup

                // } else {
                //     alertadditonCart("Đã thêm vào giỏ hàng");
                // }
                $("#cartPopup").show();
                // set total price
                $("#cartTotalPrice").html(totalPriceLast);
                $("#totalPrice").val(totalPriceCalculate);

                // set total cart
                $(".count-giohang").html(totalQuantityLast);
                $("#totalQuantityCart").val(totalQuantityLast);

                // set total quantity by product id
                $("#justAddedQuantity").html(totalQuantityCartByIdLast);
                $("#totalQuantityCartById").val(totalQuantityCartByIdLast);
                window.location.href = "/cart";
            },
            error: function() {
                alert("ERROR");
            },
        });
    });
    $('.addCart').click(function() {
        let __this = $(".addCart");
        let id = __this.attr("data-id");
        let qty = 1;
        let image = __this.attr("data-image");
        let name = __this.attr("data-name");
        let price_market = __this.attr("data-price");
        let url = __this.attr("data-url");
        let sku = __this.attr("data-sku");
        let kg = __this.attr("data-kg");
        let text_qt = __this.attr("data-text_qt");
        let images_qt = __this.attr("data-images_qt");

        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };
        // set total price

        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(resp) {
                // if (resp['status'] == 1) {
                //     // show cart popup

                // } else {
                //     alertadditonCart("Đã thêm vào giỏ hàng");
                // }

                window.location.href = "/cart";
            },
            error: function() {
                alert("ERROR");
            },
        });
    });
    $("#push-to-cart").click(function() {
        let __this = $("#push-to-cart");
        let id = __this.attr("data-id");
        let qty = parseInt($(".txtNumPro").val());
        $("#justAddedQuantity").html(qty);
        let image = __this.attr("data-image");
        let name = __this.attr("data-name");
        let price_market = __this.attr("data-price_market");
        let url = __this.attr("data-url");
        let sku = __this.attr("data-sku");
        let kg = __this.attr("data-kg");
        let text_qt = __this.attr("data-text_qt");
        let images_qt = __this.attr("data-images_qt");

        /*add variation*/
        if ($("#tier_variation").length > 0) {
            let data_pro = getDataVariationActive();
            if (data_pro !== false) {
                let price_promotion = data_pro.price_promotion;
                let price_normal = parseInt(data_pro.price);
                if (parseInt(price_promotion) > 0) {
                    price_market = price_promotion;
                } else {
                    price_market = price_normal;
                }
                id = data_pro.id_product_variation;
                name = data_pro.name_vi;
                image = data_pro.image;

                url = data_pro.url;
                sku = data_pro.sku;
                kg = data_pro.kg;
                text_qt = data_pro.text_qt;
                images_qt = data_pro.images_qt;

                $("#justAddedTitle").html(name);
                $("#justAddedPrice").html(formatter.format(price_market));
                $("#price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#neo_price_show .new-price").html(
                    formatter.format(price_market)
                );
                $("#price_show #price_normal").html(price_market);
            } else {
                return false;
            }
        }
        /*add variation*/
        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };
        // set total price
        let totalPriceFirst = parseInt($("#totalPrice").val());
        let totalPriceCalculate =
            totalPriceFirst + qty * parseInt(price_market);
        let totalPriceLast = formatter.format(totalPriceCalculate);

        // set total cart
        // let totalCartFirst = parseInt($("#totalCart").val());
        // let totalCartLast = totalCartFirst + 1;

        // set total quantity cart
        let totalQuantity = parseInt($("#totalQuantityCart").val());

        let totalQuantityLast = qty + totalQuantity;
        // set total quantity by product id
        let totalQuantityCartById = parseInt($("#totalQuantityCartById").val());
        let totalQuantityCartByIdLast = qty + totalQuantityCartById;
        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(resp) {
                // if (resp['status'] == 1) {
                //     // show cart popup

                // } else {
                //     alertadditonCart("Đã thêm vào giỏ hàng");
                // }
                $("#cartPopup").show();
                // set total price
                $("#cartTotalPrice").html(totalPriceLast);
                $("#totalPrice").val(totalPriceCalculate);

                // set total cart
                $(".count-giohang").html(totalQuantityLast);
                $("#totalQuantityCart").val(totalQuantityLast);

                // set total quantity by product id
                $("#justAddedQuantity").html(totalQuantityCartByIdLast);
                $("#totalQuantityCartById").val(totalQuantityCartByIdLast);
                window.location.href = "/cart";
            },
            error: function() {
                alert("ERROR");
            },
        });
    });
    $("#buy-now-v2").click(function() {
        let id = $(this).attr("data-id");
        let qty = parseInt($(".txtNumProDetail").val());
        $("#justAddedQuantity").html(qty);

        let image = $(this).attr("data-image");
        let name = $(this).attr("data-name");
        let price_market = $(this).attr("data-price_market");
        let url = $(this).attr("data-url");
        let sku = $(this).attr("data-sku");
        let kg = $(this).attr("data-kg");
        let text_qt = $(this).attr("data-text_qt");
        let images_qt = $(this).attr("data-images_qt");

        /*add variation*/
        if ($("#tier_variation").length > 0) {
            let data_pro = getDataVariationActive();
            if (data_pro !== false) {
                let price_promotion = data_pro.price_promotion;
                let price_normal = parseInt(data_pro.price);
                if (parseInt(price_promotion) > 0) {
                    price_market = price_promotion;
                } else {
                    price_market = price_normal;
                }
                id = data_pro.id_product_variation;
                name = data_pro.name_vi;
                image = data_pro.image;
                url = data_pro.url;
                sku = data_pro.sku;
                kg = data_pro.kg;
                text_qt = data_pro.text_qt;
                images_qt = data_pro.images_qt;
            } else {
                return false;
            }
        }
        /*add variation*/

        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };

        // set total price
        let totalPriceFirst = parseInt($("#totalPrice").val());
        let totalPriceCalculate =
            totalPriceFirst + qty * parseInt(price_market);
        let totalPriceLast = formatter.format(totalPriceCalculate);

        // set total cart
        // let totalCartFirst = parseInt($("#totalCart").val());
        // let totalCartLast = totalCartFirst + 1;

        // set total quantity cart
        let totalQuantity = parseInt($("#totalQuantityCart").val());
        let totalQuantityLast = qty + totalQuantity;

        // set total quantity by product id
        let totalQuantityCartById = parseInt($("#totalQuantityCartById").val());
        let totalQuantityCartByIdLast = qty + totalQuantityCartById;
        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(result) {
                // show cart popup

                $("body").addClass("popup-show");
                $("body").addClass("custom-bg-popup");

                // set total price
                $("#cartTotalPrice").html(totalPriceLast);
                $("#totalPrice").val(totalPriceCalculate);
                // set total cart

                $(".count-giohang").html(totalQuantityLast);
                $("#totalQuantityCart").val(totalQuantityLast);

                // set total quantity by product id
                $("#justAddedQuantity").html(totalQuantityCartByIdLast);
                $("#totalQuantityCartById").val(totalQuantityCartByIdLast);
                window.location.href = "/cart";
            },
        });
    });
    $("#push-to-cart-v2").click(function() {
        // alert(1);
        let id = $(this).attr("data-id");
        let qty = parseInt($(".txtNumProDetail").val());
        let image = $(this).attr("data-image");
        let name = $(this).attr("data-name");
        let price_market = $(this).attr("data-price_market");
        let url = $(this).attr("data-url");
        let sku = $(this).attr("data-sku");
        let kg = $(this).attr("data-kg");
        let text_qt = $(this).attr("data-text_qt");
        let images_qt = $(this).attr("data-images_qt");

        /*add variation*/
        if ($("#tier_variation").length > 0) {
            let data_pro = getDataVariationActive();
            if (data_pro !== false) {
                let price_promotion = data_pro.price_promotion;
                let price_normal = parseInt(data_pro.price);
                if (parseInt(price_promotion) > 0) {
                    price_market = price_promotion;
                } else {
                    price_market = price_normal;
                }
                id = data_pro.id_product_variation;
                name = data_pro.name_vi;
                image = data_pro.image;
                url = data_pro.url;
                sku = data_pro.sku;
                kg = data_pro.kg;
                text_qt = data_pro.text_qt;
                images_qt = data_pro.images_qt;
            } else {
                return false;
            }
        }
        /*add variation*/

        $("#justAddedQuantity").html(qty);
        let data = {
            id: parseInt(id),
            sl: qty,
            image: image,
            name: name,
            price_market: price_market,
            url: url,
            sku: sku,
            kg: kg,
            text_qt: text_qt,
            images_qt: images_qt,
        };

        // set total price
        let totalPriceFirst = parseInt($("#totalPrice").val());
        let totalPriceCalculate =
            totalPriceFirst + qty * parseInt(price_market);
        let totalPriceLast = formatter.format(totalPriceCalculate);

        // set total cart
        // let totalCartFirst = parseInt($("#totalCart").val());
        // let totalCartLast = totalCartFirst + 1;

        // set total quantity cart
        let issetCartId = parseInt($("#issetCartId").val());
        let totalQuantityItem = parseInt($("#totalCart").val());

        let totalQuantity = parseInt($("#totalQuantityCart").val());

        let totalQuantityLast = qty + totalQuantity;
        // alert(totalQuantity);        // set total quantity by product id
        let totalQuantityCartById = parseInt($("#totalQuantityCartById").val());
        let totalQuantityCartByIdLast = qty + totalQuantityCartById;

        $.ajax({
            url: "/cart/addcart",
            type: "POST",
            data: data,
            cache: false,
            dataType: "html",
            success: function(result) {
                $("#cartTotalPrice").html(totalPriceLast);
                $("#totalPrice").val(totalPriceCalculate);
                // set total cart
                $("#totalQuantityCart").val(totalQuantityLast);
                console.log(issetCartId, "--", id);
                // if (issetCartId === 0) {
                totalQuantityItem++;
                $(".cart-header .count-item").html(totalQuantityLast);
                $(".bg_icon_count").html(totalQuantityLast);
                $(".count-giohang").html(totalQuantityLast);
                // }
                // set total quantity by product id
                $("#justAddedQuantity").html(totalQuantityCartByIdLast);
                $("#totalQuantityCartById").val(totalQuantityCartByIdLast);
                // $("body").append("<div id='bg-popover' class='bg-web-mask'></div>");
                alertadditonCart();
            },
        });

        flyItemToCart();

        // dataLayer.push({ecommerce: null});
        // dataLayer.push({
        //     event: "add_to_cart",
        //     ecommerce: {
        //         items: [{
        //             item_name: "{{$product['name']}}",
        //             item_id: "{{$product['id']}}",
        //             price: "{{$product['price']}}",
        //             item_brand: "Yukina",
        //             item_category: "{{$product['category']}}",
        //             item_variant: "Black",
        //             item_list_name: "{{$product['name']}}",
        //             item_list_id: "{{$product['id']}}",
        //             index: 1,
        //             quantity: qty
        //         }]
        //     }
        // });
    });

    function flyItemToCart() {
        var cart = $(".cart-header");
        var cart_fixed = $(".nav_cart");
        var imgtodrag = $(".img_fly_cart").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag
                .clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left,
                })
                .css({
                    opacity: "0.5",
                    position: "absolute",
                    height: "50px",
                    width: "50px",
                    "z-index": "9999",
                })
                .appendTo($("body"))
                .animate({
                        top: cart.offset().top + 10,
                        left: cart.offset().left + 10,
                        width: 50,
                        height: 50,
                    },
                    1500,
                    "easeOutQuint"
                );

            setTimeout(function() {
                cart.effect(
                    "shake", {
                        times: 1,
                    },
                    200
                );
                cart_fixed.effect(
                    "shake", {
                        times: 1,
                    },
                    200
                );
            }, 1500);

            imgclone.animate({
                    width: 0,
                    height: 0,
                },
                function() {
                    $(this).detach();
                }
            );
        }
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + "").replace(/[^0-9+\-Ee.]/g, "");
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === "undefined" ? "." : thousands_sep,
            dec = typeof dec_point === "undefined" ? "." : dec_point,
            s = "",
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return "" + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || "").length < prec) {
            s[1] = s[1] || "";
            s[1] += new Array(prec - s[1].length + 1).join("0");
        }
        return s.join(dec);
    }

    function sum_price1(id, price = 0, type = "") {
        var tong = parseInt($("#sum_price").val());
        var t = $("#sum-final-price-" + id).val();
        if (price != 0) {
            if (type == "-") {
                tong = tong - price;
                if (tong > 0) {
                    $("#sum-final-price-" + id).val(
                        parseInt(t) - parseInt(price)
                    );
                }
            } else if (type == "+") {
                tong = tong + price;
                $("#sum-final-price-" + id).val(parseInt(t) + parseInt(price));
            }
            $("#sum_price").val(tong);
            $("#text-sum-price").text(number_format(tong) + " đ");
            $("#text-sum-price-tong").text(number_format(tong) + " đ");
        } else {
            tong = tong - parseInt(t);
            $("#sum_price").val(tong);
            $("#text-sum-price").text(number_format(tong) + " đ");
            $("#text-sum-price-tong").text(number_format(tong) + " đ");
        }

        // set sum price tong
        $(".text-sum-price-tong").text(number_format(tong) + " đ");
    }
    $('.xxxx').click(function() {
        alert('Tính năng đang phát triển');
    })
    $(".edit-quantity").click(function() {
        var cart_id = $(this).data("cart-id");
        var price = $(this).data("price");
        var icon = $(this).data("icon");
        var product_id = $(this).data("product-id");
        var sl = $("#" + product_id).val();

        if (icon == "-") {
            if (sl > 1) {
                sl = sl - 1;
                $("#" + product_id).val(sl);
                $("#total_" + product_id).text(
                    number_format(parseInt(sl) * parseInt(price)) + " đ"
                );
                sum_price1(product_id, price, "-");
            }
        } else if (icon == "+") {
            sl = parseInt(sl) + 1;
            $("#" + product_id).val(sl);
            $("#total_" + product_id).text(
                number_format(parseInt(sl) * parseInt(price)) + " đ"
            );
            sum_price1(product_id, price, "+");
        }
        $.ajax({
            url: "/cart/addcart1",
            type: "POST",
            data: {
                cart_id: cart_id,
                price_market: price,
                sl: sl,
                product_id: product_id,
            },
            success: function(resp) {
                if (resp["status"] == 1) {
                    // if(icon=="+"){
                    //     sum_price1(product_id, price, "+");
                    // }else{
                    //     if(sl>1){
                    //         sum_price1(product_id, price,"-");
                    //     }
                    // }
                }
            },
            error: function() {
                alert(ERROR);
            },
        });
    });
    var totalQuantity = parseInt($("#totalQuantityx").val());
    // alert(totalQuantity);
    var priceTotal = parseInt($("#sum_price").val());
    $(".deleteCart").click(function() {
        var c = confirm("Bạn có muốn xóa sản phẩm này không");
        if (!c) {
            return false;
        }
        var id = $(this).data("id");
        //  alert(id);
        var cart_id = $(this).data("cart-id");
        //  $("#item_"+id).remove();
        // $("#item_qt"+id).remove();
        var sumProductPrice = parseInt($(this).data("sum-product-price"));
        // alert(sumProductPrice);
        priceTotal -= sumProductPrice;
        // set sum price tong
        $("#item_" + id).remove();
        var productQuantity = parseInt($(this).data("product-quantity"));
        // priceTotal=parseInt($("#sum_price").val())-parseInt($('#zzz-'+id).val())*parseInt($('#xxx-'+id).val());
        // alert(priceTotal);
        totalQuantity -= productQuantity;
        // alert(totalQuantity);
        $(".text-sum-price-tong").text(
            number_format(parseInt(priceTotal)) + " đ"
        );
        $(".count-giohang").text(parseInt(totalQuantity));

        //  sum_price1(id);
        $.ajax({
            url: "/cart/delete",
            type: "POST",
            data: {
                id: id,
                cart_id: cart_id,
            },
            dataType: "html",
            cache: false,
            success: function(resp) {
                //  if(resp['status']==1){
                window.location.href = "/cart";
                // alert(priceTotal);

                // }
            },
        });
    });
    $(document).ready(function() {
        initCheckoutValid();
        $(".paymentMethod__hide").click(function() {
            $("#paymentMethod__ck").hide(500);
        });
        $(".paymentMethod__ck").click(function() {
            $("#paymentMethod__ck").show(500);
        });
    });
    initItemSliderNews()
        // dataLayer.push({
        // event: "begin_checkout",
        // ecommerce: {
        // items: [{
        //   item_id: "16229",
        //   item_name: "Bộ trị nám tàn nhang, dưỡng trắng da Yukina Medicated Skincare Nhật Bản",
        //   affiliation: "Google Merchandise Store",
        //   coupon: "SUMMER_FUN",
        //   currency: "VND",
        //   discount: 3000000,
        //   index: 0,
        //   item_brand: "Google",
        //   item_category: "Apparel",
        //   item_list_id: "related_products",
        //   item_list_name: "Related Products",
        //   item_variant: "green",
        //   location_id: "L_12345",
        //   price: 3000000,
        //   quantity: 2        }        ]
        // }
        // });

    function is_phonenumber(phonenumber) {
        var phoneno = /((09|02|01|03|04|06|07|08|05)+([0-9]{8,9})\b)/g;
        if (phonenumber.match(phoneno)) {
            return true;
        } else {
            return false;
        }
    }

    var initCheckoutValid = function() {
        $("#btn_submit").on("click", function() {
            $("body").addClass("loading");
            var name = $("input#fullname").val();
            var email = $("input#email_checkout").val();
            var mobile = $("input#tel").val();
            var city = $("select[id=city]").val();
            var district = $("select[id=district]").val();
            var ward = $("select[id=ward]").val();
            var address = $("input#addr").val();
            var note = $("input#info_notes").val();
            var d =
                /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if ($.trim(a) == "") {
                $("input#fullname").addClass("error-checkout");
                $("input#fullname").removeClass("not-error-checkout");
                $("input#fullname").attr("placeholder", "Bạn chưa nhập họ tên");
                $("body").removeClass("loading");
            } else {
                $("input#fullname").addClass("not-error-checkout");
                $("input#fullname").removeClass("error-checkout");
                $("body").removeClass("loading");
            }
            var phone = is_phonenumber(f);
            if (phone == false) {
                $("input#tel").addClass("error-checkout");
                $("input#tel").removeClass("not-error-checkout");
                alert("Số điện thoại chưa đúng");
                $("input#tel").attr("placeholder", "Số điện thoại chưa đúng");
                $("body").removeClass("loading");
            } else {
                $("input#tel").addClass("not-error-checkout");
                $("input#tel").removeClass("error-checkout");
                $("body").removeClass("loading");
            }
            if ($.trim(i) == "") {
                $("select#city").addClass("error-checkout");
                $("select#city").removeClass("not-error-checkout");
                $("body").removeClass("loading");
            } else {
                $("select#city").addClass("not-error-checkout");
                $("select#city").removeClass("error-checkout");
                $("body").removeClass("loading");
            }
            if ($.trim(b) == "") {
                $("select#district").addClass("error-checkout");
                $("select#district").removeClass("not-error-checkout");
                $("body").removeClass("loading");
            } else {
                $("select#district").addClass("not-error-checkout");
                $("select#district").removeClass("error-checkout");
                $("body").removeClass("loading");
            }

            if ($.trim(e) == "") {
                $("select#ward").addClass("error-checkout");
                $("select#ward").removeClass("not-error-checkout");
                $("body").removeClass("loading");
            } else {
                $("select#ward").addClass("not-error-checkout");
                $("select#ward").removeClass("error-checkout");
                $("body").removeClass("loading");
            }

            if ($.trim(h) == "") {
                $("input#addr").addClass("error-checkout");
                $("input#addr").removeClass("not-error-checkout");
                $("input#addr").attr("placeholder", "Bạn chưa nhập địa chỉ");
                $("body").removeClass("loading");
            } else {
                $("input#addr").addClass("not-error-checkout");
                $("input#addr").removeClass("error-checkout");
                $("body").removeClass("loading");
            }

            if (
                $.trim(a) == "" ||
                phone == false ||
                $.trim(i) == "" ||
                $.trim(b) == "" ||
                $.trim(h) == "" ||
                $.trim(e) == ""
            )
                return false;
            $("body").addClass("loading");
            var c = document.getElementById("frmcheckout");
            $("#btn_submit").prop("disabled", !0);
            c.submit();
            $.ajax({
                url: '/create-order',
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    mobile: mobile,
                    address: address,
                    note: note,
                    city: city,
                    district: district,
                    ward: ward
                },
                success: function(resp) {
                    if (resp['status'] == 1) {
                        window.location.href = "/thanks";
                    }
                },
                error: function() {
                    alert('ERROR');
                }
            })
        });
    };
});

var initItemSliderNews = function() {
    $(".list_slider_new").not(".slick-initialized").slick({
        nextArrow: '<span class="slick-next"><i class="ti ti-angle-right"></i></span>',
        prevArrow: '<span class="slick-prev"><i class="ti ti-angle-left"></i></span>',
    });
};