var token = $('input[name="_token"]').val();

$("a.cart_quantity_down").on('click', function(e){
        var total_price = $('[id="total_price"]').val();
        var product_id = $(this).parent().parent().find("input#product_id").val();
        var price = $(this).parent().parent().find('input#price').val();
        var quantity = $(this).parent().parent().find('input#quantity').val();
        var url = $("#decrease-qty").val();

        var $t = $(this)
        $.ajax({
            url : url,
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
                $t.parent().parent().find('td#total-pr').text(data.quantity*data.price+" TRY");
                $t.parent().parent().find('input#quantity').val(data.quantity);
                $("#total_price_show").text(data.total_price+" TRY");
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
            var url = $("#increase-qty").val();
            var $t = $(this)

        $.ajax({
            url : url,
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
                $t.parent().parent().find('td#total-pr').text(data.quantity*data.price+" TRY");
                $t.parent().parent().find('input#quantity').val(data.quantity);
                $("#total_price_show").text(data.total_price+" TRY");
            },
            error : function(error){
                console.log(error);
            }
        });
    })

    $(document).ready(function() {

        $('#city-dropdown').on('change', function(e) {
            var city_id = this.value;
            var url = $("#address_url").val();
            console.log(url);
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    city_id: city_id,
                    _token: token
                },

                dataType : 'json',
                success: function(result){
                    $('#district-dropdown').html('<option value="">---İlçe seçiniz---</option>');
                    $.each(result.districts,function(key,value){
                    $("#district-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                    }
            });
        });
    })

