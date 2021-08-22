<!doctype html>
<html lang="sk">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{$wwwRoot}assets/bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{$wwwRoot}assets/images/favicon.svg">
    <link rel="icon" type="image/png" href="{$wwwRoot}assets/images/favicon.png">
    <title>{$brand}</title>
    {block name=styles}{/block}
  </head>
  <body>

    {if isset($loggedAdmin) && $loggedAdmin}

        {include file="admin/_navbar.tpl"}
      
        {block name=content}{/block}

        {include file="admin/_modal.tpl"}

    {else}

      {include file="admin/_login.tpl"}

    {/if}


    <script src="{$wwwRoot}assets/bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="{$wwwRoot}assets/jquery-3.6.0.min.js"></script>

    <script>

      var $body = $('body');

      $body.delegate("a.modal-link", "click", function (e) {

        let link = $(this).attr('href');

        $.ajax({
          url: link,
        }).done(function( data ) {

          var myModal = new bootstrap.Modal(document.getElementById('modalWrap'), {
            keyboard: true
          });

          $('#ajaxModal').html(data).promise().done(function(){
            myModal.show();
            let mtitle = $('#ajaxModal h1').html();
            $('#ajaxModal h1').remove();
            $('#modalWrapLabel').html(mtitle);

            $('#ajaxModal').find('input[autofocus]').focus();
          });
        });

        e.preventDefault();
      });

    </script>

    {block name=scripts}{/block}

  </body>
</html>