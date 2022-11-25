$(document).ready(function(){

  $('.gallery_type').select2({
  width:'resolve',
  placeholder:"Select gallery type",
    ajax: {
      url: baseUrl+'gallerySet/getGalleryDropdown',
      dataType: 'json',
    }
  });

  $.validator.setDefaults({
       ignore: []
   });
	$("#gallery_edit").validate({
		errorClass: "errormesssage",
		rules : {

			gls_name : "required",

			// blg_slug : "required",

      gls_type : "required",

			// img_alt : "required",

      // gls_order_by : "required",


		},
		messages: {
			gls_name : "This field is required",



			gls_type : "Please select gallery type",



      // gls_order_by : "This field is required",


		},
		submitHandler: function(form) {
			try
			{

				var gls_name        	= document.getElementById("gls_name").value;

        var gls_type     		  = document.getElementById("gls_type").value;

        var gls_order_by      = document.getElementById("gls_order_by").value;

        var old_img           = document.getElementById("old_img").value;

        var gls_id            = document.getElementById("gls_id").value;






				var formData = new FormData();
				formData.append('img', $('input[name=img]')[0].files[0]);

				formData.append("gls_name",gls_name);
        formData.append("gls_type",gls_type);
        formData.append("old_img",old_img);
        formData.append("gls_order_by",gls_order_by);
        formData.append("gls_id",gls_id);
				// formData.append("description",description);


        // console.log($('input[name=img]')[0].files[0]);
        // console.log($('input[name=img2]')[0].files[0]);
        $('.btn_save').button('loading');
				$.ajax({

					type: "POST",
	                url: baseUrl + "gallerySet/gallery_set_update",
	                data : formData,
	                dataType:"json",
	                contentType: false,       // The content type used when sending data to the server.
	                cache: false,             // To unable request pages to be cached
	                processData:false,
	                success:function(response) {
          //           if(response.success == true)

	         //        	{

										// 	swal({

										// 		 title:"Done",

          //                text:response.message,

          //                type:"success",

          //                icon:"success",

          //                button: true,

          //             }).then(()=>{
          //                 window.location.href=response.linkn;
          //               }
          //            );

	         //        	}

	         //        	else

	         //        	{
          //             $('.btn_save').button('reset');
										// 	swal({

										// 	title:"Opps",

										// 	 text:response.message,

										// 	 icon:"danger",

										// 	 button: true,

										// });

	         //        		// alert(response.message);

	         //        	}
	         			responsemsg(response,function(){
                        	window.location.href = response.linkn;
                      	});
	                }
				});

			}catch(e){
				console.log(e);
			}



	        },
			 errorPlacement: function(error, element){
				error.appendTo( element.next('.help-block') );
			}
      });

	// $('#blogadd').validate({ignore:[]});
});
