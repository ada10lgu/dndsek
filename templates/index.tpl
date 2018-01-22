<!DOCTYPE html>
<html>
<head>
<title>{$page_title}</title>
<link rel="stylesheet" href="styles/{$page_style}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


</head>
<body>

<div class="container">

<header>
   <h1>title</h1>
</header>
  
<nav>
<div class="menuItem"><a href="./">Start</a></div>
{if $loggedIn}
<div class="menuItem"><a href="./?p=map">Maproom</a></div>
<div class="menuItem"><a href="./?p=roster">Roster</a></div>
<div class="menuItem"><a href="./?p=library">Library</a></div>
<div class="menuItem"><a href="./?p=users">Users</a></div>
<div class="menuItem">{$self['username']}</div>
<div class="menuItem"><a href="./?p=login&a=logout">Logout</a></div>
{if $self['admin']}
<div class="menuItem"><a href="./?p=settings">Settings</a></div>
{/if}
{else}
<div class="menuItem"><a href="./?p=login">Login</a></div>
{/if}
</nav>

<article>
{include $page}
</article>

<footer>&copy; fivefactorial.se</footer>

</div>

</body>
<script src="script/Splitshot.js"></script>
</html>

