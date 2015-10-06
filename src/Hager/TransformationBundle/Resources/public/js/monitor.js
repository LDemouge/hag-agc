(function(){
	var app = angular.module('monitor', ['ui.bootstrap']);
	
	app.controller('main', function($http, $scope){
		$scope.authorized = false;
		$scope.count = 0;
		$scope.radioModel = "global";
		$http.get(Routing.generate('api_monitor_load')).success(function(response){$scope.carto = response; $scope.authorized = true; $scope.count = $scope.carto.records.length;});
		this.contextualize = function(item){
			viewBy = $scope.radioModel;
			status = item[viewBy];
			if(status==0) return 'btn-success';
			if(status==1) return 'btn-primary';
			if(status==2) return 'btn-danger';
			if(status==3) return 'btn-warning';
			if(status==4) return 'btn-default';
		};
		
		
	});
	
	app.directive('cartography', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('supervisor_cartography')
			
		};
	});
})();