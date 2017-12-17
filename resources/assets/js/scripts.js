// $(document).ready(function(){
// 	$('#brand').on('change', function() {
// 		$("#model-fields").show();
// 	    var id = $(this).find(":selected").data('id');
// 	    $("#model :nth-child(1)").prop('selected', true); 

// 	    $("#model option").each(function(idelm, elm){
// 			var idModel = $(elm).data('mark');
// 			if(id != idModel){
// 				$(elm).attr("hidden", "hidden");
// 			}
// 			else{
// 				$(elm).attr("hidden", false);
// 			}
// 		});
// 	});
// });

var app = new Vue({
  	el: '#app',
  	data: {
  		brands: window.brands,
		models: window.models,
  		cars: window.cars,
  		selectedbrand: null,
  		selectedmodel: null
 	},
 	methods:{
 		seen: function(car){
			if(car.brand_id == this.selectedbrand){
				return true
			}
 			return false
 		},
 		filter: function(car){
            if(!this.selectedbrand){
 				return true
 			}
 			if(!this.selectedmodel&&this.selectedbrand==car.brand_id){
 				return true
 			}
 			if(this.selectedbrand==car.brand_id&&this.selectedmodel==car.id)
 			{
 				return true
 			}
 			return false
 		},
 		onChange: function(){
 			var component = this;

 			component.selectedmodel = null
			$url = "/query/" + component.selectedbrand;

            axios.get($url)
			  .then(function(response){
			  	component.cars = response.data;
			  	console.log(component.cars);
			  });  

		},
		search: function () {
            $url = "/discription/" + this.selectedmodel;
            window.location = $url;
        },

        clear: function () {
            this.selectedmodel = null;
        },

        select: function(car){
            $url = "/discription/" + car.id;
            window.location = $url;
        }
	}
})
