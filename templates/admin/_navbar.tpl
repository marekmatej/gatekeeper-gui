<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{$wwwRoot}">
            {include file="gate.tpl"}
            {$brand}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{if isset($active) && $active == 'dashboard'} active{/if}"{if isset($active) && $active == 'dashboard'} aria-current="page"{/if} href="{$adminRoot}">Prehľad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{if isset($active) && $active == 'users'} active{/if}"{if isset($active) && $active == 'dashboard'} aria-current="page"{/if}" href="{$adminRoot}users/">Užívatelia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{if isset($active) && $active == 'gates'} active{/if}"{if isset($active) && $active == 'dashboard'} aria-current="page"{/if}" href="{$adminRoot}gates/">Brány</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{if isset($active) && $active == 'logs'} active{/if}"{if isset($active) && $active == 'dashboard'} aria-current="page"{/if}" href="{$adminRoot}logs/">Logy</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{$adminRoot}logout.php">Odhlásiť</a>
                </li>
            </ul>
        </div>
    </div>
</nav>