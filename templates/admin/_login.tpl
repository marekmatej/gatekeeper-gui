
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">

            <div class="mt-5">
                <h3 class="mb-5"><a href="{$wwwRoot}">{$brand}</a></h3>

                <form method="post" action="{$requestUri}" class="mb-5">
                    <div class="mb-3">
                        <label for="adminInputLogin" class="form-label">Login</label>
                        <input name="admin[login]" type="text" class="form-control" id="adminInputLogin">
                    </div>
                    <div class="mb-3">
                        <label for="adminInputPassword" class="form-label">Heslo</label>
                        <input name="admin[password]" type="password" class="form-control" id="adminInputPassword">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Prihlásiť</button>
                    </div>
                </form>

                {include file="_flash_data.tpl"}

            </div>

        </div>
    </div>
</div>