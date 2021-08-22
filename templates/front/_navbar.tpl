<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{$wwwRoot}">
            {include file="dungeon.svg"}
            {$brand}
        </a>

        {if isset($loggedUser) && $loggedUser}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{$wwwRoot}?a=logout">Odhlásiť</a>
                </li>
            </ul>
        {/if}
    </div>
</nav>