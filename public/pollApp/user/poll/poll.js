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

.controller('SinglePollController', function(Polls, PollOptions, $routeParams, $location) {
    var self = this;

    // Initialize some variables
    self.pollId = $routeParams.id;
    self.selectedOptionId = null;
    self.poll = {};

    // Get the Poll from API
    Polls.get({pollId: self.pollId}, function(poll) {
        self.poll = poll;
    });

    self.vote = function(selectedOptionIndex) {
        // Increment the votes
        var option = self.poll.options[selectedOptionIndex];
        option.votes++;

        // Save the votes in API
        PollOptions.update({pollId: self.pollId, optionId: option.id}, {votes: option.votes});

        $location.path('/poll/' + self.pollId + '/results');
    }
});