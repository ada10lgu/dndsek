<form action="#" method="post"><input type="text" name="search" /><input type="submit" value=">" /></form>

<form action="#" method="post">
<h1>{$article->title}</h1>
<input type="hidden" value="{$article->title}" name="article" />
{if $self['admin']}
<div class="outer">
  <div class="inner"><textarea name="wiki">{$article->text}</textarea></div>
  <div class="divider"></div>
  <div class="inner"><textarea name="wikiadmin">{$article->adminText}</textarea></div>
</div>
{else}
<textarea name="wiki">{$article->text}</textarea>
{/if}

<input type="submit" value="Save" />

</form>

{if $self['admin']}
<script src="script/Splitshot.js"></script>
{/if}