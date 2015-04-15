<!DOCTYPE html>
<html ng-app="pollApp">
<head>
    <title>Sistema de Enquete</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/Font-Awesome/css/font-awesome.min.css">
</head>
<body>
    <div id="view" ng-view class="container"></div>

    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script src="bower_components/angular-resource/angular-resource.min.js"></script>

    <script src="pollApp/app.js"></script>
    <script>
        angular.module("pollApp").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
    </script>
    <script src="pollApp/components/polls/pollService.js"></script>

    <!-- Admin -->
    <script src="pollApp/admin/list/list.js"></script>
    <script src="pollApp/admin/form/form.js"></script>

    <!-- User -->
    <script src="pollApp/user/list/list.js"></script>
    <script src="pollApp/user/poll/poll.js"></script>
</body>
</html>