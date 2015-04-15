angular.module('pollApp')

.config(function($routeProvider) {
    $routeProvider.when('/poll/:id', {
        controller: 'SinglePollController',
        templateUrl: 'pollApp/user/poll/poll.html',
        controllerAs: 'ctrl'
    }).when('/poll/:id/results', {
        controller: 'SinglePollController',
        templateUrl: 'pollApp/user/poll/results.html',
        controllerAs: 'ctrl'
    });
})

.controller('SinglePollController', function(Polls, $routeParams, $location) {
    var self = this;

    self.pollIndex = $routeParams.id;

    self.selectedOption = null;
    self.poll = Polls.getSinglePoll($routeParams.id);

    self.vote = function(selectedOptionIndex) {
        Polls.voteInPoll(self.pollIndex, selectedOptionIndex);
        $location.path('/poll/' + self.pollIndex + '/results');
    }
});