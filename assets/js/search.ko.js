var rules = {
	"plate_number":/^[A-Z]{3}\-{0,1}[0-9]{3,4}$/i

}

var errormessages = {
	"plate_number":"Please enter a valid plate number"


}

var required = {
	"default": "Required.",
	"plate_number": "Please enter a plate number."
}

var SearchModel = function(){
	var self=this;
	self.to_search = ko.observable("");
	self.searchBar = ko.observable(false);
	self.isSearching=false;

	self.search = function(item,event){

			
		if(self.to_search()===""){
			self.validate($('input[name="plate_number"'));
			return false;
		}else{
			if(self.validate($('input[name="plate_number"'))){
				var href=$("#submit-search").attr('data-href');
				window.location.href=href+"?plate_number="+self.to_search();
			}

		}
	}

	self.validateOnBlur = function(item,event){
		var $target = $(event.target);
		
		self.validate($target);

		
	}

	self.validate = function($target,allrequired){

		var allrequired = (allrequired === undefined) ? 0 : allrequired;
		var name = $target.attr("name");

		var input = $target.val();
		var $p = $target.next('p');
		if(input==""){

			if(!allrequired){
				if($target.attr("data-notrequired")!=undefined)
					return true;				
			}
			

			$target.addClass('danger');
		
				if(required[name]!=undefined){

					if($p.length==0)
						$target.after('<p class="error">'+ required[name]+'</p>');

				}else{
					if($p.length==0)
						$target.after('<p class="error">'+required['default'] + '</p>');
			
				}
						
			return false;
		}
		else{
			if(name!=""&&name!=undefined){

				if(rules[name]!=undefined)
					if(!input.match(rules[name])){
						$target.addClass("danger");
				
						
						if(errormessages[name]!=undefined){
							if($p.length==0)				
								$target.after('<p class="error">'+ errormessages[name] +'</p>');
						
						}else{
							var errormessage = (name.charAt(0).toUpperCase() + name.slice(1)).replace(/_/g, " ") + " " + errormessages['default'];
							if($p.length==0)				
								$target.after('<p class="error">'+ errormessage +'</p>');
						}

						return false;
					}

				
			}
		}



		return true;
		

	}
	self.resetInput = function(item,event){
		var $target = $(event.target);
		$target.removeClass("danger");
		$target.next('p').fadeOut(100, function(){
			$(this).remove();});
	}
	ko.bindingHandlers.enterkey = {
    init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
        var allBindings = allBindingsAccessor();
        $(element).keypress(function (event) {
            var keyCode = (event.which ? event.which : event.keyCode);
            if (keyCode === 13) {
                allBindings.enterkey.call(viewModel);
                return false;
            }
            return true;
        });
    }
};
}
