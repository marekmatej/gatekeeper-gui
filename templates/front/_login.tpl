
<div class="container text-center">
    <form method="post" action="{$wwwRoot}auth.php" autocomplete="off" class="mt-5">
        <div class="mb-5">
            <label for="pin" class="form-label">PIN</label><br>
            <input id="pin" autofocus type="number" class="form-control form-control-lg d-inline-block w-auto" maxlength="4"
                   size="5">
        </div>

        <div id="response" class="mb-5" style="display: none">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Nesprávny PIN</strong>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
        </div>
    </form>
</div>