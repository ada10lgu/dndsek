<form action="#" method="post"><input type="text" name="search" /><input type="submit" value=">" /></form>

<h1>{$article->title}</h1>
<input type="hidden" value="{$article->title}" name="article" />
{if $self['admin']}
<div class="outer">
  <div class="inner">{$article->text}</div>
  <div class="divider"></div>
  <div class="inner">{$article->adminText}</div>
</div>

<script src="script/Splitshot.js"></script>
{else}
{$article->text}
{/if}
{if $edit}
<p><a href="./?p=library&a={$article->title}&edit">Edit</a></p>
{/if}