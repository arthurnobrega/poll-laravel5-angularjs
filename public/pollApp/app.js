
angular.module('pollApp', ['ngRoute'])
.config(function($routeProvider) {
    $routeProvider.otherwise({redirectTo: '/polls'});
});