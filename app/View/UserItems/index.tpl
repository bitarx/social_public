<div class="items index">
    <{include file="../Elements/title.tpl"}>
    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/item.tpl"}>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{foreachelse}>
        <div style="position:relative;top:20px;text-align:center;height:100px;">
        保有アイテムはありません
        </div>
    <{/foreach}>
    <div style="height:20px;">
    </div>
</div>