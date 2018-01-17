<h1>Login</h1>
<form action="#" method="post">
<p>Username<br>
<input type="text" name="username"></p>
<p>Password<br>
<input type="password" name="password"></p>
<p><input type="submit" value="Login"></p>
{if isset($error)}
<p>{$error}</p>
{/if}
<p>Not a memeber yet?<br><a href="./?p=login&a=signup">Sign up</a></p>
</form>
