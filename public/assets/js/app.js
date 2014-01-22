var myApp = angular.module('myApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
});

function Man($scope, $http) {
	$http.get('http://localhost:8000/api/main/manufacturers').
	success(function(data) {
    	$scope.manufacturers = data.manufacturers;
	});
}
