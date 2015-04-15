angular.module('pollApp')

.factory('Polls', function($resource) {
    return $resource('/api/polls/:pollId', {pollId: '@id'}, {
        'update': {method: 'PUT'}
    });
})

.factory('PollOptions', function($resource) {
    return $resource('/api/polls/:pollId/options/:optionId', {pollId: '@pollId', optionId: '@optionId'}, {
        'update': {method: 'PUT'}
    });
});