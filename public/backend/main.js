$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.change-category').change(function(){
        var category_id=$(this).val();
        $.ajax({
            url:'admin/change-type-product',
            type:'POST',
            data:{
                category_id:category_id
            },
            success:function(resp){
                $('#appendcategorieslevel').html(resp);
            },
            error:function(){
                alert('ERROR');
            }
        })
    })
});
var loadfile = function (event) {
    $('#preview').html('');
    for(let i=0; i<event.target.files.length; ++i){
        var image = document.createElement('img');
        image.src = URL.createObjectURL(event.target.files[i]);
        image.width = "100";
        image.height="100";
        document.querySelector("#preview").appendChild(image);
    }
};
var loadfile1 = function (event) {
    $('#preview1').html('');
    for(let i=0; i<event.target.files.length; ++i){
        var image = document.createElement('img');
        image.src = URL.createObjectURL(event.target.files[i]);
        image.width = "100";
        image.height="100";
        document.querySelector("#preview1").appendChild(image);
    }
};

