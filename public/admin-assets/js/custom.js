
$(document).ready(function() {
    var products = $(".product").length
    var i = 0;
    var i = products+i;
    var productList = $("#buildOrders")
    var url = $("input[id='add-product-url']").val();
    var token = $("input[name='_token']").val();
    $("#addProduct").on('click', function(){
        $.ajax({
            url : url,
            method : "POST",
            data : {
                _token : token
            },
            dataType : "Json",
            success : function(result) {
                html = `
                        <div class="col-md-6 product">
                            <label>Yeni Ürün </label>
                            <select class="form-control" name="products[`+i+`]" id="select`+i+`">

                            </select>
                            <a class="btn btn-danger text-white ml-4" id="delete">Sil</a>
                        </div>
                        `;

                productList.append(html);
                $.each(result.products, function(key, value)
                {
                    $('#select'+i).append('<option value='+value.id+'>'+value.name+'</option>' );
                });

                i++;
            },
            error : function(error)
            {
                console.log(error)
            }
        })
    $(document).on('click', "[id^=delete]", function(event) {
        event.preventDefault()
        $(this).parent('.product').remove();
        })
    })

});

$(document).ready(function(){
    $(".delete-data").click(function(){
      if (!confirm("Veriyi silmek istiyor musunuz")){
        return false;
      }
    });
  });

$(document).ready(function(){
    $(".w-change").on("change", function() {
        var confirmChange = confirm("Sipariş durumunu değiştirmek istiyor musunuz?");
        var url = $(this).parent().find("#urlChangeStatus").val();
        var id = $(this).parent().find("#idChangeStatus").val();
        var status = $(this).val();
        var token = $(this).parent().find("input[name='_token']").val();
        var email = $(this).parent().find("#email").val();
        var $t = $(this);
        if(confirmChange == true)
        {
            $.ajax({
                url : url,
                method : "POST",
                data : {
                    id : id,
                    status : status,
                    email : email,
                    _token : token
                },
                dataType : "json",
                success : function(data){
                    $.each(data.order_status, function(key, value)
                    {
                        if(data.status == key)
                        {
                        $t.parent().parent().find('span#newstatus').text(value)
                        }
                    });
                },
                error: function(error){
                    console.log(error)
                }
                })

        }else{
            return false;
        }
    })

  });
  $(document).ready(function(){
    $(".s-change").on("change", function() {
        var confirmChange = confirm("Ürünün durumunu değiştirmek istiyor musunuz?");
        var url = $(this).parent().find("#urlChangeProductStatus").val();
        var id = $(this).parent().find("#idChangeProductStatus").val();
        var status = $(this).val();
        var token = $(this).parent().find("input[name='_token']").val();
        var $t = $(this);
        if(confirmChange == true)
        {
            $.ajax({
                url : url,
                method : "POST",
                data : {
                    id : id,
                    status : status,
                    _token : token
                },
                dataType : "json",
                success : function(data){
                    $t.parent().parent().find(".quantity").text(data.quantity)
                    $.each(data.product_status, function(key, value)
                    {
                        if(data.stock_status == key)
                        {
                        $t.parent().parent().find('span#newstatus').text(value);
                        }
                    });
                },
                error: function(error){
                    console.log(error)
                }
                })

        }else{
            return false;
        }
    })


  });

