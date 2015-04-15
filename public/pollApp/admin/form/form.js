angular.module('pollApp')

.config(function($routeProvider) {
    $routeProvider.when('/admin/polls/add', {
        controller: 'AdminFormPollController',
        templateUrl: 'pollApp/admin/form/form.html',
        controllerAs: 'ctrl'
    }).when('/admin/polls/edit/:id', {
        controller: 'AdminFormPollController',
        templateUrl: 'pollApp/admin/form/form.html',
        controllerAs: 'ctrl'
    });
})

.controller('AdminFormPollController', function(Polls, PollOptions, $routeParams, $location) {
    var self = this;

    self.poll = {
        options: []
    };

    self.addOption = function() {
        var option = {
            text: '',
            votes: 0
        };

        self.poll.options.push(option);
    };

    self.sendForm = function(poll) {
        if ($routeParams.id) {
            Polls.update({pollId: poll.id}, poll);
        } else {
            Polls.save(poll);
        }

        $location.path('/admin/polls');
    };

    // If "id" is setted, then it's an edition
    if ($routeParams.id) {
        Polls.get({pollId:$routeParams.id}, function(poll) {
            self.poll = poll;
        });
    } else {
        self.addOption();
    }
});