var token = $('input[name="_token"]').val();

$("a.cart_quantity_down").on('click', function(e){

        var total_price = $('[id="total_price"]').val();
        var product_id = $(this).parent().parent().find("input#product_id").val();
        var price = $('[id="price"]').val();
        var quantity = $('[class="quantity"]').val();
        console.log(product_id);
        $.ajax({
            url : urlDecrease,
            method : "POST",
            data : {
                product_id : product_id,
                price : price,
                quantity : quantity,
                total_price : total_price,
                _token : token
            },
            dataType : "json",
            success : function(data){
                $("#quantity").val(data.quantity);
                $("#total_price_show").text(data.total_price);
            },
            error : function(error){
                console.log(error);
            }
        });
    })

$(".cart_quantity_up").on('click', function(e){
            e.preventDefault();
            var product_id = $(this).parent().parent().find("input#product_id").val();
            var price = $('[id="price"]').val();
            var quantity = $('[class="quantity"]').val();
            var total_price = $('[id="total_price"]').val();
        $.ajax({
            url : urlIncrease,
            method : "POST",
            data : {
                product_id : product_id,
                price : price,
                quantity : quantity,
                total_price : total_price,
                _token : token
            },
            dataType : "json",
            success : function(data){
                $("#quantity").val(data.quantity);
                $("#total_price_show").text(data.total_price+"₺");
            },
            error : function(error){
                console.log(error);
            }
        });
    })
