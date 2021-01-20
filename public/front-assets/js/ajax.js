var token = $('input[name="_token"]').val();

$("a.cart_quantity_down").on('click', function(e){

        var total_price = $('[id="total_price"]').val();
        var product_id = $(this).parent().parent().find("input#product_id").val();
        var price = $(this).parent().parent().find('input#price').val();
        var quantity = $(this).parent().parent().find('input#quantity').val();
        var $t = $(this)
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
                $t.parent().parent().find('td#total-pr').text(data.quantity*data.price+"₺");
                $t.parent().parent().find('input#quantity').val(data.quantity);
                $("#total_price_show").text(data.total_price+"₺");
            },
            error : function(error){
                console.log(error);
            }
        });
    })

$(".cart_quantity_up").on('click', function(e){
            e.preventDefault();
            var product_id = $(this).parent().parent().find("input#product_id").val();
            var price = $(this).parent().parent().find('input#price').val();
            var quantity = $(this).parent().parent().find('input#quantity').val();
            var total_price = $('[id="total_price"]').val();
            var $t = $(this)

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
                $t.parent().parent().find('td#total-pr').text(data.quantity*data.price+"₺");
                $t.parent().parent().find('input#quantity').val(data.quantity);
                $("#total_price_show").text(data.total_price+"₺");
            },
            error : function(error){
                console.log(error);
            }
        });
    })
