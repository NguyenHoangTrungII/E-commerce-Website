
//dùng để lấy tình thành phố
    function getAdress_Employee(){
        $.ajax({
        url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/LayTinh.php",       
        dataType:'json',         
        success: function(data){     
            $("#Provice").html("");
            $("#Provice").append($('<option>', {value:-1, text:"Chọn tỉnh/thành phố"}));
            for (i=0; i<data.length; i++){            
                var provice = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                
                // console.log(provice);
                $('#Provice').append($('<option>', {value:provice['id'], text:provice['name']}));
            }

            $("#Provice").on("change", function(e){
                $("#Town").html("");
                $("#Town").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                var Provice_id = $( "#Provice option:selected" ).val();
                console.log(Provice_id);
                $.ajax({
                    url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/GetDistrict.php?ProviceId=" + Provice_id,
                    dataType:'json',         
                    success: function(data){  
                        $("#District").html("");
                        $("#District").append($('<option>', {value:-1, text:"Chọn quận/huyện"}));
                        
                        for (i=0; i<data.length; i++){            
                        var district = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                        
                        // console.log(district);
                        $('#District').append($('<option>', {value:district['id'], text:district['name']}));
                        }  
                        
                        $("#District").on("change", function(e){
                            var District_id = $( "#District option:selected" ).val();
                            console.log(District_id);
                            $.ajax({
                                url: "http://localhost/DoAnWeb_testMVC/admin/Controller/Formcheck/GetTown.php?DistrictId=" + District_id,
                                dataType:'json',         
                                success: function(data){  
                                    // console.log(data);
                                    $("#Town").html("");
                                    $("#Town").append($('<option>', {value:-1, text:"Chọn Phường/xã"}));
                                    for (i=0; i<data.length; i++){            
                                    var town = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                                    
                                    $('#Town').append($('<option>', {value:town['id'], text:town['name']}));
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