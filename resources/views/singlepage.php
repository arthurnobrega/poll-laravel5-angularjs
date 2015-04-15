<!DOCTYPE html>
<html ng-app="pollApp">
<head>
    <title>Sistema de Enquete</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
    <div id="view" ng-view></div>

    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>

    <script src="pollApp/app.js"></script>
    <script>
        angular.module("pollApp").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
    </script>
    <script src="pollApp/components/polls/pollService.js"></script>

    <script src="pollApp/user/list/list.js"></script>
    <script src="pollApp/user/poll/poll.js"></script>
</body>
</html>