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

  {include file="front/_navbar.tpl"}

  {if isset($loggedUser) && $loggedUser}

    {block name=content}{/block}

  {else}

    {include file="front/_login.tpl"}

  {/if}


    <script src="{$wwwRoot}assets/jquery-3.6.0.min.js"></script>

    {block name=scripts}{/block}

  </body>
</html>