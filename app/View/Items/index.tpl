<div class="items index">
    <{include file="../Elements/title.tpl"}>
    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/item.tpl"}>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{/foreach}>
</div>
