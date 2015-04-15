angular.module('pollApp')

.config(function($routeProvider) {
    $routeProvider.when('/admin/polls', {
        controller: 'AdminListPollController',
        templateUrl: 'pollApp/admin/list/list.html',
        controllerAs: 'ctrl'
    });
})

.controller('AdminListPollController', function(Polls) {
    var self = this;

    Polls.query(function(polls) {
        self.polls = polls;
    });

    self.deletePoll = function(pollIndex) {
        var poll = self.polls[pollIndex];

        Polls.delete({pollId: poll.id}, function() {
            self.polls.splice(pollIndex, 1);
        });
    };
});