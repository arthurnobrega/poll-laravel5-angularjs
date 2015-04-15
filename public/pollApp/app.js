
angular.module('pollApp', ['ngRoute', 'ngResource'])
.config(function($routeProvider) {
    $routeProvider.otherwise({redirectTo: '/polls'});
});