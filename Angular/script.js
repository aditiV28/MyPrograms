angular.module('myApp',['ngRoute'])

.config(['$routeProvider',function($routeProvider) {
	$routeProvider.
	when('/',{
		templateUrl:'main.html',
		controller:'myCtrl'
	}).
	when('/insert',{
		templateUrl:'insert.html'
	}).
	otherwise({redirectTo:'/'})
	
}])

.controller('myCtrl', ['$scope','$http', function($scope,$http){
	getInfo();
	function getInfo(){
		$http.get('api.php').then(function(response){
			$scope.details=response.data;
			console.log(response);
		})
	}
	$scope.insertInfo=function (info){
		alert('You are in insert function');
		$data={'emp_id':info.emp_id,'emp_fname':info.emp_fname,'emp_lname':info.emp_lname,
			'emp_gender':info.emp_gender,'emp_department':info.emp_department};
		$http.post('api.php',$data).success(function(response){
				
				if(response == true){
					getInfo();
					console.log(response);
				}
			})
	}
}]);