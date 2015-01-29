var app;
app = angular.module("myApp",['ui.bootstrap'], function($interpolateProvider){
		$interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
});

app.controller("ContactCtrl", ['$scope','$http','$modal', function($scope, $http, $modal){
	
	// Get data from REST /contacts
	$scope.load = function(){
		$http.get('/api/contact').
				success(function(data, status, headers, config) {
	    			$scope.list = data.list;
	  			}).
	  			error(function(data, status, headers, config) {
	    			// When error
	    			$scope.errors = ['Unable to contact server. Please try again later'];
	  			});
	}

  	$scope.add = function(){

  		  	var modalInstance = $modal.open({
		      	templateUrl: 'html/contact/add.html',
		      	controller: 'ModalInstanceCtrl',
		      	size: 'md',

		    });

		    modalInstance.result.then(function (userinput) {
		      	$scope.list.unshift(userinput);
		      	$scope.info = [ "Data has been successfully added"];

		    }, function () {
		      	// When closed
		    });

  	}

  	$scope.edit = function(item){

  		  	var modalInstance = $modal.open({
		      	templateUrl: 'html/contact/edit.html',
		      	controller: 'ModalInstanceEditCtrl',
		      	size: 'md',
		      	resolve: {
		      		edited: function(){
		      			return item;
		      		}
		      	}
		    });

		    modalInstance.result.then(function (userinput) {
		      	$scope.info = [ "Data has been successfully updated"];
		      	$scope.load();
		    }, function () {
		      	// When closed
		    });

  	}

  	$scope.remove = function(item){
  		if(confirm('Are you sure ?')){
  			$http.delete('/api/contact/' + item.id).
				success(function(data, status, headers, config) {
    				if(data.status=='OK'){
    					alert("Data has been deleted");	
    					$scope.load();
    				}else{
    					$scope.errors = [];
	    				angular.forEach(data.errors,function(value, index){
	    					$scope.errors.push(value[0]);
	    				});
    				}
  				}).
  				error(function(data, status, headers, config) {
    				// When error
    				$scope.errors = ['Unable to contact server. Please try again later'];
  				});
  		}
  	}

  	// Load when page is loaded
  	$scope.load();
}]);

app.controller('ModalInstanceCtrl',[ '$scope' ,'$http', '$modalInstance', function($scope, $http, $modalInstance){

	$scope.userinput = {};

	$scope.ok = function(){
		// call REST add

		$http.post('/api/contact', $scope.userinput).
			success(function(data, status, headers, config) {
				console.log(data);
    			if(data.status=='OK'){
    				// Add success
    				$modalInstance.close($scope.userinput);
    			} else {
    				$scope.errors = [];
    				angular.forEach(data.errors,function(value, index){
    					$scope.errors.push(value[0]);
    				});
    			}
  			}).
  			error(function(data, status, headers, config) {
    			// When error
    			$scope.errors = ['Unable to contact server. Please try again later'];
  			});

		
	}
	$scope.cancel = function(){
		$modalInstance.dismiss('cancel');
	}
}]);


app.controller('ModalInstanceEditCtrl',[ '$scope' ,'$http', '$modalInstance', 'edited', function($scope, $http, $modalInstance, edited){

	$scope.userinput = {};	
	angular.copy(edited, $scope.userinput);

	$scope.ok = function(){
		// call REST edit

		$http.put('/api/contact/' + edited.id, $scope.userinput).
			success(function(data, status, headers, config) {
				console.log(data);
    			if(data.status=='OK'){
    				// Add success
    				$modalInstance.close( $scope.userinput );
    					
    			} else {
    				$scope.errors = [];
    				angular.forEach(data.errors,function(value, index){
    					$scope.errors.push(value[0]);
    				});
    			}
  			}).
  			error(function(data, status, headers, config) {
    			// When error
    			$scope.errors = ['Unable to contact server. Please try again later'];
  			});

		
	}
	$scope.cancel = function(){
		$modalInstance.dismiss('cancel');
	}
}]);
