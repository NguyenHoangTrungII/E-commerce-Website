function getAdress_edit_Employee(){
    $.ajax({
    url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
    dataType:'json',         
    success: function(data){     
        $("#Provice__edit_employee").html("");
        $("#Provice__edit_employee").append($('<option>', {value:-1, text:"Chọn tỉnh/thành phố"}));
        for (i=0; i<data.length; i++){            
            var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
            
            // console.log(provice);
            $('#Provice__edit_employee').append($('<option>', {value:provice['id'], text:provice['name']}));
        }

        $("#Provice__edit_employee").on("change", function(e){
            $("#Town__edit_employee").html("");
            $("#Town__edit_employee").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
            var Provice_id = $( "#Provice__edit_employee option:selected" ).val();
            console.log(Provice_id);
            $.ajax({
                url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                dataType:'json',         
                success: function(data){  
                    $("#District__edit_employee").html("");
                    $("#District__edit_employee").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                    
                    for (i=0; i<data.length; i++){            
                    var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                    
                    // console.log(district);
                    $('#District__edit_employee').append($('<option>', {value:district['id'], text:district['name']}));
                    }  
                    
                    $("#District__edit_employee").on("change", function(e){
                        var District_id = $( "#District__edit_employee option:selected" ).val();
                        console.log(District_id);
                        $.ajax({
                            url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                            dataType:'json',         
                            success: function(data){  
                                // console.log(data);
                                $("#Town__edit_employee").html("");
                                $("#Town__edit_employee").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                for (i=0; i<data.length; i++){            
                                var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                
                                $('#Town__edit_employee').append($('<option>', {value:town['id'], text:town['name']}));
                                }                  
                            }

                
                         });
                    });
                }

                
            });
        });

    }
});
}