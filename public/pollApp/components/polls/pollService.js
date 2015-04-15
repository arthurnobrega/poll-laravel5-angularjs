angular.module('pollApp')

.factory('Polls', function($resource) {
    var polls = [
        {
            title: 'Você gostou da estreia da quinta temporada de "Game of Thrones"?',
            options: [
                {
                    text: 'Sim, amei o começo dessa nova temporada',
                    votes: 0
                },
                {
                    text: 'Não, foi mais do mesmo',
                    votes: 0
                },
                {
                    text: 'Não sei, preciso assistir de novo para formar opinião',
                    votes: 0
                }
            ]
        },
        {
            title: 'Qual foi o melhor jurado na estreia da temporada 2015 de "SuperStar"?',
            options: [
                {
                    text: 'O "boa-praça" Thiaguinho',
                    votes: 0
                },
                {
                    text: 'A "paz e amor" Sandy',
                    votes: 0
                },
                {
                    text: 'O "técnico" Paulo Ricardo',
                    votes: 0
                }
            ]
        },
        {
            title: 'Amanda e Cézar estão na final do "BBB15". Quem você acha que será campeão?',
            options: [
                {
                    text: 'Cézar',
                    votes: 0
                },
                {
                    text: 'Amanda',
                    votes: 0
                }
            ]
        }
    ];

    var service = {};

    service.getAllPolls = function() {
        return polls;
    };

    service.getSinglePoll = function(pollIndex) {
        return polls[pollIndex];
    };

    service.voteInPoll = function (pollIndex, optionIndex) {
        polls[pollIndex].options[optionIndex].votes++;
    };

    return service;
    // return $resource('/api/poll/:pollId', {pollId: '@id'});
});