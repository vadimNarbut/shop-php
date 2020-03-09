function init(){
    $.post(
        "core.php",
        {
            "action" : "init"
        },
        ShowGoods
    )
}

function ShowGoods(data){
    data = JSON.parse(data);
    console.log(data);
    var out = "<select>";
    out += '<option data-id="0">Новый товар</option>';
    for(var id in data){
        out += `<option data-id=${id}>${data[id].name}</option>`
    }
    out += "</select>";
    $('.goods-out').html(out);
    $('.goods-out select').on('change', selectGoods);
}

function selectGoods(){
    var id = $('.goods-out select option:selected').attr('data-id');
    // console.log(id);
    $.post(
        "core.php",{
            "action": "selectOneGoods", 
            "gid" : id
        },
        function(data){
            // console.log(data);
            data = JSON.parse(data);
            $('#gname').val(data.name);
            $('#gcost').val(data.price);
            $('#img').val(data.image);
            $('#gcategory_numb').val(data.categorie_id);
            $('#gdescr').val(data.description);
            $('#gpubdate').val(data.pub_date);
            $('#gorders_count').val(data.orders_count);
            $('#gviews').val(data.views);
            $('#gid').val(data.id);
        }
    );
}

function saveToDb(){
    var id = $('#gid').val();
    console.log(id);
    if(id != ""){
        $.post(
            "core.php",
            {
                "action" : "updateGoods",
                "gid" : id,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "img" : $('#img').val(),
                "gcategory_numb" : $('#gcategory_numb').val(),
                "gdescr" : $('#gdescr').val(),
                "gpubdate" : $('#gpubdate').val(),
                "gorders_count" : $('#gorders_count').val(),
                "gviews" : $('#gviews').val(),
            },
            function(data){
                if(data == 1){
                    alert('Зaпись добавлена');
                    init();
                }else{
                    console.log(data);
                }
            }
        )
    }else{
        console.log('new');
        $.post(
            "core.php",
            {
                "action" : "newGoods",
                "gid" : 0,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "img" : $('#img').val(),
                "gcategory_numb" : $('#gcategory_numb').val(),
                "gdescr" : $('#gdescr').val(),
                "gpubdate" : $('#gpubdate').val(),
                "gorders_count" : $('#gorders_count').val(),
                "gviews" : $('#gviews').val(),
            },
            function(data){
                if(data == 1){
                    alert('Зaпись добавлена');
                    init();
                }else{
                    console.log(data);
                }
            }
        )
    }
}



$(document).ready(function (){
    init();
    $('.add-to-db').on('click', saveToDb);
});