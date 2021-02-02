
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

