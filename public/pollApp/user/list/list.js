angular.module('pollApp')

.config(function($routeProvider) {
    $routeProvider.when('/polls', {
        controller: 'ListPollController',
        templateUrl: 'pollApp/user/list/list.html',
        controllerAs: 'ctrl'
    });
})

.controller('ListPollController', function(Polls) {
    var self = this;

    Polls.query(function(polls) {
        self.polls = polls;
    });
});