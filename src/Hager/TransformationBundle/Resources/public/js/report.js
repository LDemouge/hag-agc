(function(){
	var app = angular.module('report', ['ngRoute', 'ui.bootstrap']);
	
	app.controller('security',['$http', function($scope, $http){
		$scope.apiKey = null;
		this.login = function(username, userpassword){
			return;};
	}]);
	
	app.controller('main', function($scope){
		$scope.show = false;
		$scope.selectedMenu = 1;
		$scope.isSelected = function(menu){
			return $scope.selectedMenu == menu;
		};
		$scope.select = function(menu){
			$scope.selectedMenu = menu;
		};
	});
	
	app.controller('inventory', function($scope){
		$scope.types = [{label: 'Activity', value:"Activity"}, {label: 'Project', value: 'Project'}];
		$scope.inventory = inventory;
		$scope.isCollapsedAdd = true;
		$scope.isCollapsedOverview = true;
		$scope.isVisibleOverview = true;
		$scope.isVisibleAdd = true;
		$scope.isVisibleRemove = false;
		$scope.isVisibleEdit = false;
		$scope.newItem = null;
		$scope.totalItems = function(){
			return $scope.inventory.length;
		};
		$scope.countByStatus = function(status){
			var count = 0;
			var index;
			for (var key in data = $scope.inventory)
				{
					if(data[key].status == status) {++count;}
					//++count;
				}
			return count;
		};
		$scope.totalTransfers = function(){
			var progress = $scope.countByStatus('TRANSFER IN PROGRESS');
			var transfered = $scope.countByStatus('TRANSFERED');
			var totalTransfers = progress + transfered + $scope.countByStatus('LATE');
			return totalTransfers;
		};
		
		$scope.unsettled = function(){
			return $scope.countByStatus('UNSETTLED');
		};
		
		$scope.transferProgress = function(){
			var progress =$scope.countByStatus('TRANSFERED') * 100 / $scope.totalTransfers();
			return Math.round(progress);
		};
		
		this.contextualize = function(item){
			if(item.status=='TRANSFERED') return 'success';
			if(item.status=='UNSETTLED') return 'info';
			if(item.status=='LATE') return 'danger';
			if(item.status=='TRANSFER IN PROGRESS') return 'warning';
			
		};
		
		this.addItem = function(){
			$scope.inventory.push($scope.newItem);
			$scope.newItem = null;
		};
		
		this.settleLater = function(){
			$scope.newItem.status = 'UNSETTLED';
		};
		
		this.keep = function(){
			$scope.newItem.status = 'KEPT';
		};
		
		this.transfer = function(){
			$scope.newItem.status = 'TRANSFER IN PROGRESS';
		};
		
		this.reset = function(){
			$scope.newItem = null;
		};
	});
	
	app.controller('functionning_target', function($scope){
		$scope.targets = targets;
		$scope.test =0;
		$scope.numberOfComments = function(target){
			return target.comments.length;
		};
		$scope.nameLength = function(target){
			return target.name.length;
		};
		$scope.newItem = null;
		
		this.contextualize = function(target){
			if(target.name == $scope.newItem.category && $scope.newItem.comment) {return 'panel-danger';}
			//if(!$scope.newItem) {return'panel-info';}
			return 'panel-info';
		};
		this.resetForm = function(){
			$scope.newItem = null;
		};
		$scope.isCollapsedAdd = false;
		
		this.addComment= function(){
			for(var i=0; i<$scope.targets.length; i++){
				$scope.test++;
				if($scope.targets[i].name == $scope.newItem.category)
					{
						$scope.targets[i].comments.push($scope.newItem.comment);
						$scope.newItem = null;
					}
			}
		};
		//$scope.selectedItem = null;
		//$scope.selectItem = function(target){
		//	$scope.newItem = null;
		//	$scope.newItem.category = target.name;
		//	$scope.selectedItem.name = target.name;
		//	$scope.selectedItem.comments = [];
		//};
		//$scope.isSelected= function(toCheck){
		//	return toCheck.name == $scope.newItem.category;
		//};
	});
	
	app.controller('action_plan', function($scope, $http){
		$scope.actions = actions;
		$scope.isCollapsedAdd = true;
		
				
		$scope.totalItems = function(){
			return $scope.actions.actions.length;
		};
		
		$scope.newItem = null;
		//$scope.newItem.deadline = $scope.dt;
		
		this.addItem = function(){
			$scope.newItem.deadline = $scope.newItem.deadline.getFullYear()+'-'+($scope.newItem.deadline.getMonth()+1)+'-'+$scope.newItem.deadline.getDate();
			$scope.actions.actions.push($scope.newItem);
			$http.post(Routing.generate('api_actionPlan_addItem'), $scope.newItem).then(
				function(response){console.log(response);}	
			);
			
					
			$scope.newItem = null;
		};
	});
	
	app.controller('hr_plan', function($scope){
		$scope.carto = carto;
		var t = 0;
		var formatCarto = function(carto){
			while(carto[t]){t++;}
			$scope.i = t;
		};
		formatCarto(carto);
		
		this.contextualize = function(status){
			if(status==0) return 'active';
			if(status==1) return 'success';
			if(status==2) return 'warning';
			if(status==3) return 'danger';
			if(status==4) return 'info';
			
		};
		
	});
	
	app.factory('selectedDate', function(){
		var selectedDate;
		
		return slectedDate;
	});
	
	app.controller('DatepickerCtrl', function ($scope) {
		  $scope.today = function() {
		    $scope.dt = new Date();
		  };
		 // $scope.today();

		  $scope.clear = function () {
		    $scope.dt = null;
		  };

		  // Disable weekend selection
		  $scope.disabled = function(date, mode) {
		    return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
		  };

		  $scope.toggleMin = function() {
		    $scope.minDate = $scope.minDate ? null : new Date();
		  };
		  $scope.toggleMin();
		  $scope.maxDate = new Date(2020, 5, 22);

		  $scope.open = function($event) {
		    $scope.status.opened = true;
		  };

		  $scope.dateOptions = {
		    formatYear: 'yy',
		    startingDay: 1
		  };

		  $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
		  $scope.format = $scope.formats[1];

		  $scope.status = {
		    opened: false
		  };

		  var tomorrow = new Date();
		  tomorrow.setDate(tomorrow.getDate() + 1);
		  var afterTomorrow = new Date();
		  afterTomorrow.setDate(tomorrow.getDate() + 2);
		  $scope.events =
		    [
		      {
		        date: tomorrow,
		        status: 'full'
		      },
		      {
		        date: afterTomorrow,
		        status: 'partially'
		      }
		    ];

		  $scope.getDayClass = function(date, mode) {
		    if (mode === 'day') {
		      var dayToCheck = new Date(date).setHours(0,0,0,0);

		      for (var i=0;i<$scope.events.length;i++){
		        var currentDay = new Date($scope.events[i].date).setHours(0,0,0,0);

		        if (dayToCheck === currentDay) {
		          return $scope.events[i].status;
		        }
		      }
		    }

		    return '';
		  };
		});
	
	app.directive('home', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('reporter_home')
		};
	});
	
	app.directive('inventory', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('reporter_inventory'),
			
		};
	});
	
	app.directive('addInventoryItem', function(){
		return {
			restrict:	"E",
			templateUrl: Routing.generate('inventory_addItem')
		};
	});
	
	app.directive('actionPlan', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('reporter_actionPlan')
		};
	});
	
	app.directive('addActionPlanItem', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('actionPlan_addItem')
		};
	});
	
	app.directive('functionningTarget', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('reporter_functionningTarget'),
			
		};
	});
	
	app.directive('addTarget', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('add_target')
		};
	});
	
	app.directive('hrPlan', function(){
		return {
			restrict:	'E',
			templateUrl: Routing.generate('reporter_hrPlan')
		};
	});
	
	app.config(['$routeProvider',
                function($routeProvider) {
        $routeProvider.
          when('/', {
            templateUrl: Routing.generate('reporter_home'),
            controller:	'main'
            
          })//.
         // when('/ordo', {
         // 	templateUrl: Routing.generate('go_adjustOrdoItem'),
         // 	controller: 'ordoCtrl'
         // })
          ;
        	
      }]);
	
	var inventory = [
	                 {name: 'Staff management', type: 'Activity', status:'KEPT'},
	                 {name: 'Paris 2016 Conference', type: 'Project', status:'TRANSFERED', transfer: {to_service:'EC/MARCOM', to_person:'Dieter Holtzleitner'}},
	                 {name: 'Dept. accounting', type: 'Activity', status:'TRANSFER IN PROGRESS'},
	                 {name: 'Mauris ultricies odio', type: 'Activity', status:'UNSETTLED'},
	                 {name: 'Nulla ultricies erat qui', type: 'Project', status:'LATE'},
	                ];
	
	var targets = [
                      {name:'Key missions of my entity', comments: ['Aenean id lorem gravida, fermentum','Maecenas eros est, finibus condimentum.']},
                      {name:'KPIs of my entity', comments: ['Pellentesque sem urna, viverra pulvinar.']},
                      {name:'key objectives of my entity', comments: ['Integer commodo iaculis porttitor. Vestibulum. ','Pellentesque sem urna, viverra pulvinar.','Maecenas eros est, finibus condimentum.']},
                      {name:'Key deliverables of my entity', comments: []},
                      {name:'# of people in the entity', comments: ['Aenean id lorem gravida, fermentum']},
                      {name:'processes impacting / implying the entity', comments: ['Pellentesque sem urna, viverra pulvinar.', 'Aenean id lorem gravida, fermentum']},
                      {name:'key activities  of the entity', comments: []},
                      {name:'key interactions of my entity with other services', comments: ['Aenean id lorem gravida, fermentum'] },
                      {name:'Nature of the interactions ', comments: ['Maecenas eros est, finibus condimentum.']},
                      {name:'key projects ', comments: []},
                      {name:'yearly milestones ', comments: ['Pellentesque sem urna, viverra pulvinar.']},
                      {name:'functionning budget', comments: ['Maecenas eros est, finibus condimentum.']}
                   ];
	
	var actions = {actions:[
	      	{
	      		id :1,
	      		activity:'do something important ',
	      		leader:'M.  Markus Scholz',
	      		deadline:'2015-12-31',
	      		description:'a better description for the sublentionned activity and maybe some additional comments',
	      		status:1
	      	},
	      	{
	      		id :2,
	      		activity:'this is extremly important',
	      		leader:'M. Goodman',
	      		deadline:'2015-11-30',
	      		description:'Sed consequat arcu felis, quis aliquet metus aliquet vitae. Maecenas egestas eleifend est ut blandit. In ut justo in augue. ',
	      		status:2
	      	},
	      	{
	      		id :3,
	      		activity:'last but not least, another one',
	      		leader:'Matthias Brodbeck',
	      		deadline:'2015-09-15',
	      		description:'Mauris ultricies odio, ulla ultricies erat qui, and maybe some additional comments',
	      		status:1
	      	}
	      ]};
	
	var carto = [
	             {
	            	department:'Southern Europe',
	            	entities:[
	            	          	{id:'EC1', progress:'0'},
	            	          	{id:'EC2', progress:'3'},
	            	          	{id:'MC12', progress:'4'},
	            	          	{id:'AG', progress:'2'},
	            	          	{id:'ALS', progress:'1'},
	            	          	
	            	          ]
	             },
	             {
		            	department:'Middle East',
		            	entities:[
		            	          	{id:'KKR', progress:'0'},
		            	          	{id:'AUA', progress:'3'},
		            	          	{id:'DZ6', progress:'2'},
		            	          	{id:'AZE', progress:'4'},
		            	          	{id:'MC12', progress:'2'},
		            	          	{id:'RTY', progress:'1'},
		            	          	
		            	          ]
		             },
		             {
			            	department:'Benelux',
			            	entities:[
			            	          	{id:'KKR', progress:'0'},
			            	          	{id:'MC12', progress:'3'},
			            	          	{id:'DZ6', progress:'2'},
			            	          	{id:'PRR', progress:'4'},
			            	          	{id:'LAR5', progress:'2'},
			            	          	{id:'SFU2', progress:'1'},
			            	          	
			            	          ]
			             },
			             {
				            	department:'UK',
				            	entities:[
				            	          	{id:'GSQ', progress:'0'},
				            	          	{id:'SXP6', progress:'3'},
				            	          	{id:'OSS1', progress:'2'},
				            	          	{id:'AZE', progress:'2'},
				            	          	{id:'MC12', progress:'2'},
				            	          	{id:'RTY', progress:'1'},
				            	          	{id:'LAR5', progress:'2'},
				            	          	{id:'SFU2', progress:'1'},
				            	          	
				            	          	
				            	          ]
				             }
			             
	             ];
})();