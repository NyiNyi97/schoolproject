$(document).ready(function() {
	 showdata();
	 countnoti()
	

	$('.cart').on('click', function(){
		var id=$(this).data('id');
		// alert(id);
		var name=$(this).data('name');
		var codeno=$(this).data('codeno');
		var photo=$(this).data('photo');
		var price=$(this).data('price');
		var discount=$(this).data('discount');
		var qty=1;
		// var qtys=('#qty').val(); 

		var myshop={
					id:id, codeno:codeno,
					name:name, photo:photo,
					price:price, discount:discount,
					qty:qty
				};
		var cartlist=localStorage.getItem('myshop');
		var cartarray;
		if (cartlist==null) {
			cartarray=[];
		}
		else{
			cartarray=JSON.parse(cartlist);
		}

		var status=false;
				$.each(cartarray, function(i,v){
					if (v.id==id) {
						v.qty++;
						status=true;
					}
				})
				if (!status) {
				cartarray.push(myshop);	
				}

	   var string_myshop=JSON.stringify(cartarray);
	   localStorage.setItem("myshop", string_myshop );

	    showdata();
	    countnoti()
	});

		function showdata(){
		
			var cartlist=localStorage.getItem("myshop");
				if (cartlist) {
					var cartarray=JSON.parse(cartlist);
					var html ='';
					var total=0;
					j=1;
					$.each(cartarray, function(i,v){
						if (v.discount>0) {
						var price = v.discount;
					}
					else{
						var price = v.price;
					}
						var subtotal=v.qty*price;
						total += subtotal; 
						html+= `<tr>
						<td>${j++}</td>
						<td>${v.name}</td>
						<td><img src="${v.photo}" width="50px" height="50px" </td>
						<td>
						<button class="btn btn-outline-info increase_btn" data-id="${i}"> 
								<i class="fas fa-plus"></i>
									</button>
								</td>
								<td>
									<p> ${v.qty} </p>
									</td>
								<td>
								<button class="btn btn-outline-info decrease_btn" data-id="${i}"> 
								<i class="fas fa-minus"></i></button>
								</td>				 
							<td>`
					if (v.discount > 0) {
						html += `<p > 
									${v.discount} MMk
								</p>`
											
					}
					else{
						html += `<p > 
									${v.price} MMK
								</p>`
					}

					html+=`</td>;
						<td> 
						<p> ${subtotal}MMK</p> 
						
							<button class="btn btn-outline-info remove btn-sm" data-id="${i}"> 
						<i class="fas fa-times"></i>
							</button></td>
						</tr>
						`
							
					})
					$('.cartTotal').html(total);
					$('#Cart').html(html);
		};	
	};

		$("#Cart").on("click",".remove", function(){
				var id=$(this).data("id");
				var cartlist=localStorage.getItem("myshop");
				var cartarray=JSON.parse(cartlist);
				cartarray.splice(id,1);

				var cartstring=JSON.stringify(cartarray);
				localStorage.setItem("myshop", cartstring);
				showdata();
				countnoti()

			});

		$("#Cart").on("click", ".increase_btn", function(){
				// alert("ok");
				var id=$(this).data("id");
				var cartlist=localStorage.getItem("myshop");
				var cartarray=JSON.parse(cartlist);
				$.each(cartarray, function(i,v){
					if (i==id) {
						v.qty++;
					}
				})
				var cartstring=JSON.stringify(cartarray);
				localStorage.setItem("myshop", cartstring);
				showdata();
				countnoti()
			})


			$("#Cart").on("click", ".decrease_btn", function(){
				// alert("ok");
				var id=$(this).data("id");
				var cartlist=localStorage.getItem("myshop");
				var cartarray=JSON.parse(cartlist);
				$.each(cartarray, function(i,v){
					if (i==id) {
						v.qty--;
						if (v.qty==0) {
						cartarray.splice(id,1);
						}

					}
				})
				var cartstring=JSON.stringify(cartarray);
				localStorage.setItem("myshop", cartstring);
				showdata();
				countnoti()
			})

			function countnoti(){
				var totalcount=0;
				var cartlist=localStorage.getItem("myshop");
				if (cartlist) {
					cartarray=JSON.parse(cartlist);
					$.each(cartarray, function(i,v)	{
						totalcount+=v.qty;
					})
				}
				$("#cartnoti").html(totalcount);
			}

			
});