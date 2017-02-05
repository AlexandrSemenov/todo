<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">TODO</a>
        </div>
        <p class="navbar-text"><a href="/task/create">Добавить задачу</a></p>
        <p class="navbar-text navbar-right">
            <?= isset($_SESSION['auth'])? '<a href="/login/logout">Logout</a>' : '<a href="/login/">Login</a>'?>
        </p>
    </div>
</nav>